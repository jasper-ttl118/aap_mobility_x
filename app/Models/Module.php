<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Submodule;

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

    public function organization()
    {
        return $this->belongsToMany(Organization::class, 'org_id');
    }

}
