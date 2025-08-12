<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $primaryKey = 'department_id';
    protected $fillable = [
        'department_code',
        'department_name'
    ];

    public function asset()
    {
        return $this->hasMany(Asset::class, "department_id");
    }

    public function employees()
    {
        return $this->hasMany(Employee::class, 'department_id', 'department_id');
    }
}
