<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Contracts\Role;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasRoles, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'employee_id', 
        'user_name', 
        'user_password', 
        'org_id', 
        'role_id', 
        'user_status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'org_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function roles()
    {
        return $this->morphToMany(
            \Spatie\Permission\Models\Role::class, // Use the actual Role model, NOT the contract
            'model',
            'model_has_roles',
            'model_id',
            'role_id'
        );
    }

    public function getGuardName()
    {
        return config('auth.defaults.guard');
    }

    // Fix for ensureModelSharesGuard
    protected function ensureModelSharesGuard($role)
    {
        $givenGuard = $role->getGuardName(); // Use the overridden method from Role
        $expectedGuard = $this->getGuardName();

        if ($givenGuard !== $expectedGuard) {
            throw \Spatie\Permission\Exceptions\GuardDoesNotMatch::create(
                $givenGuard ?? 'null',
                collect([$expectedGuard])
            );
        }
    }

    public function assignRole($roles)
{
    $roles = is_array($roles) ? $roles : [$roles];

    foreach ($roles as $role) {
        if (is_string($role)) {
            $role = Role::findByName($role, $this->getGuardName());
        }

        if (!$role) {
            throw new \Exception("Role not found.");
        }

        // Check guard match
        $this->ensureModelSharesGuard($role);

        // Insert into model_has_roles
        $exists = $this->roles()
            ->where('model_has_roles.role_id', $role->role_id) // Correct role_id
            ->exists();

        if (!$exists) {
            // Include org_id if necessary
            $this->roles()->attach($role->role_id, ['org_id' => $this->org_id]);
        }
    }
}




}
