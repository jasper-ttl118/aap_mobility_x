<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $primaryKey = 'branch_id';
    protected $fillable = [
        'branch_code',
        'branch_name'
    ];

    // Branch.php
    public function employees()
    {
        return $this->hasMany(Employee::class, 'branch_id', 'branch_id');
    }

}
