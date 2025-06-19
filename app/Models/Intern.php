<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Intern extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'intern_id';
    protected $fillable = [
        'intern_firstname',
        'intern_middlename', 
        'intern_lastname',
        'intern_school',
        'intern_type',
        'intern_required_hours',
        'intern_email', 
        'intern_address', 
        'intern_position',
        'intern_department',
        'intern_contact_number',
        'intern_status',
    ];
}
