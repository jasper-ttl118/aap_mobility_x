<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'department_id';
    protected $fillable = [
        'department_name'
    ];

    public function asset(){
        return $this->hasMany(Asset::class, "department_id");
    }
}
