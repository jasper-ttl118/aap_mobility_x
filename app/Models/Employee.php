<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{   
    use HasFactory;
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

    protected $casts = [
        'employee_date_created' => 'datetime',
        'employee_date_updated' => 'datetime',
    ];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

}
