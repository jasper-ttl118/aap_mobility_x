<?php

namespace App\View\Components;

use Closure;
use App\Models\Module;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;
use App\Models\User;
use App\Models\CustomPermission as Permission;
use App\Enums\PermissionType;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     */
    public Collection $modules;
    public function __construct()
    {
        $this->modules = $this->getAccessibleModules();
    }

    protected function getAccessibleModules(): Collection
    {
        $user = auth()->user();

        if (! $user) {
            return collect();
        }

        $moduleIds = $user->getAllPermissions()
            ->where('permission_type', PermissionType::MODULE->value)
            ->pluck('module_id')
            ->filter();

        return Module::whereIn('module_id', $moduleIds)->pluck('module_name');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts.navbar');
    }
}
