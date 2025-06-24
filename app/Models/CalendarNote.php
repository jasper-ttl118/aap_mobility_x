<?php
// app/Models/CalendarNote.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'note',
        'category'
    ];

    protected $casts = [
        'date' => 'date'
    ];
}