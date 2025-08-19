<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Permission\Contracts\Permission as PermissionContract;
use Spatie\Permission\Exceptions\PermissionAlreadyExists;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use Spatie\Permission\Guard;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Traits\RefreshesPermissionCache;
use App\Enums\PermissionType;

class CustomPermission extends Model implements PermissionContract
{
    use HasRoles;
    use RefreshesPermissionCache;

    protected $table = 'permissions';
    protected $primaryKey = 'permission_id';
    protected $fillable = [
        'permission_name',
        'permission_type',
        'permission_description',
        'permission_status',
        'permission_guard_name',
    ];
    public $timestamps = true;

    protected $casts = [
        'permission_type' => PermissionType::class,
    ];

    public function __construct(array $attributes = [])
    {
        $attributes['permission_guard_name'] ??= Guard::getDefaultName(static::class);
        parent::__construct($attributes);
        $this->guarded[] = $this->primaryKey;
    }

    /*
    |--------------------------------------------------------------------------
    | Attribute Accessors and Mutators
    |--------------------------------------------------------------------------
    */

    public function getNameAttribute()
    {
        return $this->attributes['permission_name'];
    }

    public function setNameAttribute($value)
    {
        $this->attributes['permission_name'] = $value;
    }

    public function getGuardNameAttribute()
    {
        return $this->attributes['permission_guard_name'];
    }

    public function setGuardNameAttribute($value)
    {
        $this->attributes['permission_guard_name'] = $value;
    }

    /*
    |--------------------------------------------------------------------------
    | Static Methods Required by Spatie
    |--------------------------------------------------------------------------
    */

    public static function create(array $attributes = [])
    {
        $attributes['permission_guard_name'] ??= Guard::getDefaultName(static::class);

        $permission = static::getPermission([
            'permission_name' => $attributes['permission_name'],
            'permission_guard_name' => $attributes['permission_guard_name'],
        ]);

        if ($permission) {
            throw PermissionAlreadyExists::create($attributes['permission_name'], $attributes['permission_guard_name']);
        }

        return static::query()->create($attributes);
    }

    public static function findByName(string $name, ?string $guardName = null): PermissionContract
    {
        $guardName ??= Guard::getDefaultName(static::class);

        $permission = static::getPermission([
            'permission_name' => $name,
            'permission_guard_name' => $guardName,
        ]);

        if (! $permission) {
            throw PermissionDoesNotExist::create($name, $guardName);
        }

        return $permission;
    }

    public static function findById(int|string $id, ?string $guardName = null): PermissionContract
    {
        $guardName ??= Guard::getDefaultName(static::class);

        $permission = static::getPermission([
            (new static)->getKeyName() => $id,
            'permission_guard_name' => $guardName,
        ]);

        if (! $permission) {
            throw PermissionDoesNotExist::withId($id, $guardName);
        }

        return $permission;
    }

    public static function findOrCreate(string $name, ?string $guardName = null): PermissionContract
    {
        $guardName ??= Guard::getDefaultName(static::class);

        $permission = static::getPermission([
            'permission_name' => $name,
            'permission_guard_name' => $guardName,
        ]);

        if (! $permission) {
            return static::query()->create([
                'permission_name' => $name,
                'permission_guard_name' => $guardName,
            ]);
        }

        return $permission;
    }

    public static function updateOrCreate(array $attributes, array $values = [])
    {
        if (isset($attributes['name'])) {
            $attributes['permission_name'] = $attributes['name'];
            unset($attributes['name']);
        }

        if (isset($attributes['guard_name'])) {
            $attributes['permission_guard_name'] = $attributes['guard_name'];
            unset($attributes['guard_name']);
        }

        return static::query()->updateOrCreate($attributes, $values);
    }

    protected static function getPermissions(array $params = [], bool $onlyOne = false): Collection
    {
        return app(PermissionRegistrar::class)
            ->setPermissionClass(static::class)
            ->getPermissions($params, $onlyOne);
    }

    protected static function getPermission(array $params = []): ?PermissionContract
    {
        return static::getPermissions($params, true)->first();
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
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

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
