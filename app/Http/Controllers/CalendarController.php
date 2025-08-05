<?php
// app/Http/Controllers/CalendarController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalendarNote;
use App\Models\Department;
use Carbon\Carbon;

class CalendarController extends Controller
{
    public function index()
    {
        // Get all notes for the current year (you can modify this as needed)
        $notes = CalendarNote::whereYear('date', Carbon::now()->year)
                            ->get()
                            ->mapWithKeys(fn($note) => [$note->date->format('Y-m-d') => [
                                'note' => $note->note,
                                'category' => $note->category
                            ]]);
            
        return view('calendar', compact('notes'));
    }

    public function saveNote(Request $request)
    {
        try {
            $validated = $request->validate([
                'date' => 'required|date',
                'note' => 'required|string|max:65535',
                'category' => 'required|string|max:50'
            ]);

            $note = CalendarNote::updateOrCreate(
                ['date' => $validated['date']],
                [
                    'note' => $validated['note'],
                    'category' => $validated['category']
                ]
            );

            return response()->json([
                'success' => true,
                'message' => 'Note saved successfully!',
                'data' => $note
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            \Log::error('Calendar save note error: ' . $e->getMessage(), [
                'request' => $request->all(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Error saving note: ' . $e->getMessage()
            ], 500);
        }
    }

    public function deleteNote(Request $request)
    {
        $request->validate([
            'date' => 'required|date'
        ]);

        try {
            CalendarNote::where('date', $request->date)->delete();

            return response()->json([
                'success' => true,
                'message' => 'Note deleted successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting note: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getNotes(Request $request)
    {
        $year = $request->get('year', Carbon::now()->year);
        $month = $request->get('month', Carbon::now()->month);
        
        $notes = CalendarNote::whereYear('date', $year)
                            ->whereMonth('date', $month)
                            ->get()
                            ->keyBy('date');
        
        return response()->json($notes);
    }

    public function getDepartments()
    {
        try {
            // Use your actual column names: department_id and department_name
            $departments = Department::select('department_id as id', 'department_name as name')->get();
            
            // Add default colors since you don't have a color column
            $departments = $departments->map(function ($dept, $index) {
                $colors = [ '#10B981', // Emerald
                            '#3B82F6', // Blue
                            '#EF4444', // Red
                            '#8B5CF6', // Purple
                            '#F59E0B', // Amber
                            '#D9CD91', // Light Yellow-Green
                            '#EC4899', // Pink
                            '#84CC16', // Lime
                            '#FFD700', // Gold
                            '#8B4B47', // Dark Rose
                            '#FF6B35', // Orange Red
                            '#00CED1', // Dark Turquoise  
                            '#FF1493', // Deep Pink
                            '#32CD32', // Lime Green
                            '#FF69B4', // Hot Pink
                            '#00BFFF', // Deep Sky Blue
                            '#FF4500', // Orange Red
                            '#9370DB', // Medium Purple
                            '#20B2AA', // Light Sea Green
                            '#FF8C00', // Dark Orange
                            '#4169E1', // Royal Blue
                            '#DC143C', // Crimson
                            '#00FA9A', // Medium Spring Green
                            '#FF7F50', // Coral
                            '#6495ED', // Cornflower Blue
                            '#FF6347'  // Tomato
                        ];
                
                return [
                    'id' => $dept->id,
                    'name' => $dept->name,
                    'color' => $colors[$index % count($colors)]
                ];
            });
            
            return response()->json([
                'success' => true,
                'departments' => $departments
            ]);
            
        } catch (\Exception $e) {
            \Log::error('getDepartments error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch departments: ' . $e->getMessage()
            ], 500);
        }
    }
}