<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{   
    public $timestamps = false;
    protected $primaryKey = 'employee_id';
    protected $fillable = [
        'employee_firstname',
        'employee_middlename', 
        'employee_lastname',
        'employee_email', 
        'employee_address', 
        'employee_position',
        'employee_department',
        'employee_contact_number',
        'employee_status',
    ];
}
