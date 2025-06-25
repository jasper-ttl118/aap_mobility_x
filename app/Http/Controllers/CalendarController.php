<?php
// app/Http/Controllers/CalendarController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalendarNote;
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
}