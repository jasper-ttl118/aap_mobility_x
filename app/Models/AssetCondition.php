<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetCondition extends Model
{
    protected $primaryKey = 'condition_id';

    protected $fillable = [
        'condition_name',
        'conidition_description',
    ];

     public function assets()
    {
        return $this->hasMany(Asset::class,'condition_id');
    }
}
