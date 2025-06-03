<?php 
namespace App\Http\Controllers;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(Request $request)
    {
        return Note::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'note' => 'required|string',
        ]);

        return Note::updateOrCreate(
            ['date' => $request->date],
            ['note' => $request->note]
        );
    }
}
?>