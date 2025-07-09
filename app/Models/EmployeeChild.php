<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeeChild extends Model
{
    protected $primaryKey = 'employee_child_id';
    protected $fillable = [
        'employee_id',
        'employee_child_name',
        'employee_child_birthdate',
        'employee_child_birth_certificate'
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
