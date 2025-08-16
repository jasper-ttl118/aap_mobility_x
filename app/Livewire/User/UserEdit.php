<?php

namespace App\Livewire\User;

use App\Models\Module;
use Livewire\Component;
use App\Models\CustomRole as Role;

class UserEdit extends Component
{
    public $employee;
    public $user;
    public $org_with_roles;
    public $roles;
    public $user_name;
    public $organization;
    public $modules;
    public $submodules;

    public function mount()
    {
        $this->organization = $this->org_with_roles[0]->org_id;
        $this->roles = Role::where(['org_id' => $this->organization])->get();
    }

    public function updatedOrganization($value)
    {
        $this->roles = Role::where('org_id', $value)->get();
        
        // dump($this->roles->modules());
        // $moduleIds = Module::all();
        
        // dump($value[0]->role_id);
    
        // $this->modules = Module::whereIn('module_id', $moduleIds)->get();

        // dump($this->roles);
    }

    // public function updatedSelectedRole($value)
    // {
    //     $this->loadRoleData($value);
    //     dump($value);
    // }

    // public function loadRoleData($role)
    // {
        
    // }
    
    public function save()
    {
        dump($this->roles);
    }
    public function render()
    {
        return view('livewire.user.user-edit');
    }
}
