<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asset extends Model
{
     use HasFactory;

    protected $primaryKey = 'asset_id';

    protected $fillable = [
        'property_code',
        'asset_name',
        'category_id',
        'status_id',
        'purchase_date',
        'warranty_exp_date',
        'maint_sched',
        'last_maint_sched',
        'service_provider',
        'check_out_status',
        'check_out_date',
        'check_in_date',
        'description',
        'employee_id',
        'date_accountable',
        'qr_code_path',
        'qr_code_data',
        'ams_active',
        'created_by_id',
    ];

    // Relationships

    public function category()
    {
        return $this->belongsTo(AssetCategory::class, 'category_id');
    }

    public function status()
    {
        return $this->belongsTo(AssetStatus::class, 'status_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    // When user is integrated
    // public function creator()
    // {
    //     return $this->belongsTo(User::class, 'created_by_id');
    // }

    public function borrows()
    {
        return $this->hasMany(AssetBorrow::class, 'asset_id');
    }

    public function transfers()
    {
        return $this->hasMany(AssetTransfer::class, 'asset_id');
    }

    public function histories()
    {
        return $this->hasMany(History::class, 'asset_id');
    }
}
