<?php

namespace Spatie\Permission\Models;

use App\Models\Submodule;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Permission\Contracts\Permission as PermissionContract;
use Spatie\Permission\Exceptions\PermissionAlreadyExists;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use Spatie\Permission\Exceptions\GuardDoesNotMatch;
use Spatie\Permission\Guard;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Traits\RefreshesPermissionCache;

/**
 * @property ?\Illuminate\Support\Carbon $created_at
 * @property ?\Illuminate\Support\Carbon $updated_at
 */
class Permission extends Model implements PermissionContract
{
    use HasRoles;
    use RefreshesPermissionCache;

    public $timestamps = false;
    protected $primaryKey = 'permission_id';
    protected $guard_name = 'web';
    protected $guarded = [];
    

    public function __construct(array $attributes = [])
    {
        $attributes['permission_guard_name'] = $attributes['permission_guard_name'] ?? config('auth.defaults.guard');

        parent::__construct($attributes);

        $this->guarded[] = $this->primaryKey;
        $this->table = config('permission.table_names.permissions') ?: parent::getTable();
    }

    // Modifications for guard_name conflict

    public function getAttribute($key)
    {
        if ($key === 'guard_name') {
            return $this->attributes['permission_guard_name'] ?? null;
        }

        return parent::getAttribute($key);
    }

    public function setAttribute($key, $value)
    {
        if ($key === 'guard_name') {
            $this->attributes['permission_guard_name'] = $value;
            return $this;
        }

        return parent::setAttribute($key, $value);
    }

    public function getGuardName()
    {
        return $this->permission_guard_name ?? config('auth.defaults.guard');
    }

    protected function ensureModelSharesGuard($role)
    {
        $givenGuard = $role->getAttribute('guard_name'); // Use the overridden getAttribute
        $expectedGuards = $this->getGuardNames();
    
        if ($givenGuard === null || !$expectedGuards->contains($givenGuard)) {
            throw GuardDoesNotMatch::create($givenGuard ?? 'null', $expectedGuards);
        }
    }





    

    /**
     * @return PermissionContract|Permission
     *
     * @throws PermissionAlreadyExists
     */
    public static function create(array $attributes = [])
    {
        $attributes['permission_guard_name'] = $attributes['permission_guard_name'] ?? Guard::getDefaultName(static::class);

        $permission = static::getPermission(['permission_name' => $attributes['permission_name'], 'permission_guard_name' => $attributes['permission_guard_name']]);

        if ($permission) {
            throw PermissionAlreadyExists::create($attributes['permission_name'], $attributes['permission_guard_name']);
        }

        return static::query()->create($attributes);
    }


    

    /**
     * Relationships.
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(
            config('permission.models.role'),
            config('permission.table_names.role_has_permissions'),
            app(PermissionRegistrar::class)->pivotPermission,
            app(PermissionRegistrar::class)->pivotRole
        );
    }


    public function users(): BelongsToMany
    {
        return $this->morphedByMany(
            getModelForGuard($this->attributes['permission_guard_name'] ?? config('auth.defaults.guard')),
            'model',
            config('permission.table_names.model_has_permissions'),
            app(PermissionRegistrar::class)->pivotPermission,
            config('permission.column_names.model_morph_key')
        );
    }

    public function submodules()
    {
        return $this->belongsToMany(Submodule::class, 'submodel_id');
    }

    public function roles_pivot() // this is a different method from role (with an s) in the Permission model of Spatie
    {
        return $this->belongsToMany(Role::class, 'role_has_submodule_permissions', 'role_id', 'permission_id')
            ->withPivot('submodule_id');
    }

    public function submodules_pivot()
    {
        return $this->belongsToMany(Submodule::class, 'role_has_submodule_permissions','submodule_id', 'permission_id')
            ->withPivot('role_id');
    }


    /**
     * Find a permission by its name (and optionally guardName).
     *
     * @return PermissionContract|Permission
     *
     * @throws PermissionDoesNotExist
     */
    public static function findByName(string $name, ?string $guardName = null): PermissionContract
    {
        $guardName = $guardName ?? Guard::getDefaultName(static::class);
        $permission = static::getPermission(['permission_name' => $name, 'permission_guard_name' => $guardName]);

        if (! $permission) {
            throw PermissionDoesNotExist::create($name, $guardName);
        }

        return $permission;
    }

    /**
     * Find a permission by its id (and optionally guardName).
     *
     * @return PermissionContract|Permission
     *
     * @throws PermissionDoesNotExist
     */
    public static function findById(int|string $id, ?string $guardName = null): PermissionContract
    {
        $guardName = $guardName ?? Guard::getDefaultName(static::class);
        $permission = static::getPermission([(new static)->getKeyName() => $id, 'permission_guard_name' => $guardName]);

        if (! $permission) {
            throw PermissionDoesNotExist::withId($id, $guardName);
        }

        return $permission;
    }

    /**
     * Find or create permission by its name (and optionally guardName).
     *
     * @return PermissionContract|Permission
     */
    public static function findOrCreate(string $name, ?string $guardName = null): PermissionContract
    {
        $guardName = $guardName ?? Guard::getDefaultName(static::class);
        $permission = static::getPermission(['permission_name' => $name, 'permission_guard_name' => $guardName]);

        if (! $permission) {
            return static::query()->create(['permission_name' => $name, 'permission_guard_name' => $guardName]);
        }

        return $permission;
    }

    /**
     * Get the current cached permissions.
     */
    protected static function getPermissions(array $params = [], bool $onlyOne = false): Collection
    {
        return app(PermissionRegistrar::class)
            ->setPermissionClass(static::class)
            ->getPermissions($params, $onlyOne);
    }

    /**
     * Get the current cached first permission.
     *
     * @return PermissionContract|Permission|null
     */
    protected static function getPermission(array $params = []): ?PermissionContract
    {
        /** @var PermissionContract|null */
        return static::getPermissions($params, true)->first();
    }
}
