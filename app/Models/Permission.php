<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    public function role() // this is a different method from role (with an s) in the Permission model of Spatie
    {
        return $this->belongsToMany(Role::class, 'role_has_submodule_permissions', 'role_id', 'permission_id')
            ->withPivot('submodule_id');
    }

    public function submodules()
    {
        return $this->belongsToMany(Submodule::class, 'role_has_submodule_permissions','submodule_id', 'permission_id')
            ->withPivot('role_id');
    }
}