<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'department_id';
    protected $fillable = [
        'department_name',
        'department_code',
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
