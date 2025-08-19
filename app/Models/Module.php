<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Submodule;
use App\Models\CustomRole as Role;
use App\Models\CustomPermission as Permission;

class Module extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'module_id';
    protected $fillable = [
        'module_name',
        'module_description',
        'module_status',
    ];

    // One-to-Many relationship with Submodule
    public function submodules()
    {
        return $this->hasMany(Submodule::class, 'module_id', 'module_id');
    }

    public function permission()
    {
        return $this->hasOne(Permission::class, 'module_id');
    }

    public function organization()
    {
        return $this->belongsToMany(Organization::class, 'org_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_has_modules', 'module_id', 'role_id');
    }
}
