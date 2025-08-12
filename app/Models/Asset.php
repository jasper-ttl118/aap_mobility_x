<?php

namespace App\Models;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asset extends Model
{
    use HasFactory;

    protected $primaryKey = 'asset_id';

    protected $fillable = [
        'property_code',
        'asset_name',
        'brand_id',
        'brand_name_custom',
        'model_name',
        'category_id',
        'status_id',
        'condition_id',
        'device_serial_number',
        'charger_serial_number',
        'imei1',
        'imei2',
        'acquisition_cost',
        'asset_type',
        'employee_id',
        'department_id',
        'date_accountable',
        'purchase_date',
        'warranty_exp_date',
        'free_replacement_period',
        'maint_sched',
        'last_maint_sched',
        'service_provider',
        'check_out_status',
        'check_out_date',
        'check_in_date',
        'description',
        'qr_code_path',
        'qr_code_data',
        'ams_active',
        'created_by_id',
    ];

    protected $casts = [
        'purchase_date' => 'date',
        'warranty_exp_date' => 'date',
        'free_replacement_period' => 'date',
        'maint_sched' => 'date',
        'last_maint_sched' => 'date',
        'check_out_date' => 'date',
        'check_in_date' => 'date',
        'date_accountable' => 'date',
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

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
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
    public function condition()
    {
        return $this->belongsTo(AssetCondition::class, 'condition_id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
}


}
