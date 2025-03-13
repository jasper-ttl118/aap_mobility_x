<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Contracts\Permission;

class Submodule extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'submodule_id';
    protected $fillable = [
        'submodule_name', 
        'submodule_description', 
        'submodule_status',
    ];

    public function permission()
    {
        return $this->belongsToMany(Permission::class, 'permission_id');
    }

    // Belongs to a Module
    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id', 'module_id');
    }
}
