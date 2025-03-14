<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    public function submodules()
    {
        return $this->belongsToMany(Submodule::class, 'role_has_submodule_permissions', 'submodule_id', 'role_id')
            ->withPivot('permission_id');
    }

    public function permission() // this is a different method from permissions (with an s) in the Role model of Spatie
    {
        return $this->belongsToMany(Permission::class, 'role_has_submodule_permissions', 'permission_id', 'role_id')
            ->withPivot('submodule_id');
    }
}