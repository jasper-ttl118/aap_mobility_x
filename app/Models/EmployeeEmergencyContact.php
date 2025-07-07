<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeeEmergencyContact extends Model
{
    protected $primaryKey = 'employee_emergency_contact_id';
    protected $fillable = [
        'employee_id',
        'employee_emergency_contact_name',
        'employee_emergency_contact_relationship',
        'employee_emergency_contact_number',
        'employee_emergency_contact_address'
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
