<?php

namespace App\Models;

// use Spatie\Permission\Exceptions\RoleAlreadyExists;
// use Spatie\Permission\Guard;
// use Spatie\Permission\PermissionRegistrar;
// use Spatie\Permission\Traits\HasRoles;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Permission\Contracts\Role as RoleContract;
use Spatie\Permission\Exceptions\GuardDoesNotMatch;
use Spatie\Permission\Exceptions\RoleAlreadyExists;
use Spatie\Permission\Exceptions\RoleDoesNotExist;
use Spatie\Permission\Guard;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\RefreshesPermissionCache;
use Spatie\Permission\Models\Role;

/**
 * @property ?\Illuminate\Support\Carbon $created_at
 * @property ?\Illuminate\Support\Carbon $updated_at
 */
class CustomRole extends Role
{
    use HasPermissions;
    use RefreshesPermissionCache;

    public $timestamps = false;
    protected $primaryKey = 'role_id';
    protected $guard_name = 'web';
    protected $guarded = [];

    public function __construct(array $attributes = [])
    {
        $attributes['role_guard_name'] = $attributes['role_guard_name'] ?? config('auth.defaults.guard');

        parent::__construct($attributes);

        $this->guarded[] = $this->primaryKey;
        $this->table = config('permission.table_names.roles') ?: parent::getTable();
    }

    /**
     * @return RoleContract|Role
     *
     * @throws RoleAlreadyExists
     */
    public static function create(array $attributes = [])
    {
        $attributes['role_guard_name'] = $attributes['role_guard_name'] ?? Guard::getDefaultName(static::class);

        $params = ['role_name' => $attributes['role_name'], 'role_guard_name' => $attributes['role_guard_name']];
        if (app(PermissionRegistrar::class)->teams) {
            $teamsKey = app(PermissionRegistrar::class)->teamsKey;

            if (array_key_exists($teamsKey, $attributes)) {
                $params[$teamsKey] = $attributes[$teamsKey];
            } else {
                $attributes[$teamsKey] = getPermissionsTeamId();
            }
        }
        if (static::findByParam($params)) {
            throw RoleAlreadyExists::create($attributes['role_name'], $attributes['role_guard_name']);
        }

        return static::query()->create($attributes);
    }





     // Modifications for guard_name conflict

     public function getAttribute($key)
     {
         if ($key === 'guard_name') {
             return $this->attributes['role_guard_name'] ?? null;
         }
 
         return parent::getAttribute($key);
     }
 
     public function setAttribute($key, $value)
     {
         if ($key === 'guard_name') {
             $this->attributes['role_guard_name'] = $value;
             return $this;
         }
 
         return parent::setAttribute($key, $value);
     }

     public function getGuardName()
     {
         return $this->role_guard_name ?? config('auth.defaults.guard');
     }

     protected function ensureModelSharesGuard($permission)
     {
         $givenGuard = $permission->getAttribute('guard_name'); // Use the overridden getAttribute
         $expectedGuards = $this->getGuardNames();
 
         if ($givenGuard === null || !$expectedGuards->contains($givenGuard)) {
             throw GuardDoesNotMatch::create($givenGuard ?? 'null', $expectedGuards);
         }
     }
 
 
 
 

    /**
     * A role may be given various permissions.
     */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(
            config('permission.models.permission'),
            config('permission.table_names.role_has_permissions'),
            app(PermissionRegistrar::class)->pivotRole,
            app(PermissionRegistrar::class)->pivotPermission
        );
    }

        /**
     * Relationships
     */
    public function organization()
    {
        return $this->belongsTo(Organization::class, 'org_id');
    }

    public function modules()
    {
        return $this->belongsToMany(Module::class, 'role_has_modules', 'role_id', 'module_id');
    }

    public function submodules()
    {
        return $this->belongsToMany(Submodule::class, 'role_has_submodule_permissions', 'role_id', 'submodule_id')
            ->withPivot('permission_id');
    }

    public function permissions_pivot() // this is a different method from permissions (with an s) in the Role model of Spatie
    {
        return $this->belongsToMany(Permission::class, 'role_has_submodule_permissions', 'permission_id', 'role_id')
            ->withPivot('submodule_id');
    }





    /**
     * A role belongs to some users of the model associated with its guard.
     */
    public function users(): BelongsToMany
    {
        return $this->morphedByMany(
            getModelForGuard($this->attributes['role_guard_name'] ?? config('auth.defaults.guard')),
            'model',
            config('permission.table_names.model_has_roles'),
            app(PermissionRegistrar::class)->pivotRole,
            config('permission.column_names.model_morph_key')
        );
    }

    /**
     * Find a role by its name and guard name.
     *
     * @return RoleContract|Role
     *
     * @throws RoleDoesNotExist
     */
    public static function findByName(string $name, ?string $guardName = null): RoleContract
    {
        $guardName = $guardName ?? Guard::getDefaultName(static::class);
        $role = static::findByParam(['role_name' => $name, 'role_guard_name' => $guardName]);

        if (! $role) {
            throw RoleDoesNotExist::named($name, $guardName);
        }

        return $role;
    }

    /**
     * Find a role by its id (and optionally guardName).
     *
     * @return RoleContract|Role
     */
    public static function findById(int|string $id, ?string $guardName = null): RoleContract
    {
        $guardName = $guardName ?? Guard::getDefaultName(static::class);
        $role = static::findByParam([(new static)->getKeyName() => $id, 'role_guard_name' => $guardName]);

        if (! $role) {
            throw RoleDoesNotExist::withId($id, $guardName);
        }

        return $role;
    }

    /**
     * Find or create role by its name (and optionally guardName).
     *
     * @return RoleContract|Role
     */
    public static function findOrCreate(string $name, ?string $guardName = null): RoleContract
    {
        $guardName = $guardName ?? Guard::getDefaultName(static::class);
        $role = static::findByParam(['role_name' => $name, 'role_guard_name' => $guardName]);

        if (! $role) {
            return static::query()->create(['role_name' => $name, 'role_guard_name' => $guardName] + (app(PermissionRegistrar::class)->teams ? [app(PermissionRegistrar::class)->teamsKey => getPermissionsTeamId()] : []));
        }

        return $role;
    }

    /**
     * Finds a role based on an array of parameters.
     *
     * @return RoleContract|Role|null
     */
    protected static function findByParam(array $params = []): ?RoleContract
    {
        $query = static::query();

        if (app(PermissionRegistrar::class)->teams) {
            $teamsKey = app(PermissionRegistrar::class)->teamsKey;

            $query->where(fn ($q) => $q->whereNull($teamsKey)
                ->orWhere($teamsKey, $params[$teamsKey] ?? getPermissionsTeamId())
            );
            unset($params[$teamsKey]);
        }

        foreach ($params as $key => $value) {
            $query->where($key, $value);
        }

        return $query->first();
    }


    

    /**
     * Determine if the role may perform the given permission.
     *
     * @param  string|int|\Spatie\Permission\Contracts\Permission|\BackedEnum  $permission
     *
     * @throws PermissionDoesNotExist|GuardDoesNotMatch
     */
    public function hasPermissionTo($permission, ?string $guardName = null): bool
    {
        if ($this->getWildcardClass()) {
            return $this->hasWildcardPermission($permission, $guardName);
        }

        $permission = $this->filterPermission($permission, $guardName);

        if (! $this->getGuardNames()->contains($permission->guard_name)) {
            throw GuardDoesNotMatch::create($permission->guard_name, $guardName ? collect([$guardName]) : $this->getGuardNames());
        }

        return $this->loadMissing('permissions')->permissions
            ->contains($permission->getKeyName(), $permission->getKey());
    }
}
