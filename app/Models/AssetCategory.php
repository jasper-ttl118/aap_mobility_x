<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetCategory extends Model
{
    protected $primaryKey = "category_id";

    protected $fillable = [
        'category_name',
        'category_description',
    ];

    // Relationship with Asset
    public function assets()
    {
        return $this->hasMany(Asset::class, 'category_id');
    }
}
