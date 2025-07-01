<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{   
    public $timestamps = false;
    protected $primaryKey = 'employee_id';
    protected $fillable = [
        'employee_firstname',
        'employee_middlename', 
        'employee_lastname',
        'employee_email', 
        'employee_address', 
        'employee_position',
        'employee_department',
        'employee_contact_number',
        'employee_status',
    ];

    protected $casts = [
        'employee_date_created' => 'datetime',
        'employee_date_updated' => 'datetime',
    ];

    public function assets()
    {
        return $this->hasMany(Asset::class, "employee_id");
    }


    public function borrowRequests()
    {
        return $this->hasMany(AssetBorrow::class, 'emp_id_borrowing');
    }

    public function borrowedFrom()
    {
        return $this->hasMany(AssetBorrow::class, 'emp_id_borrow_from');
    }

    public function transferFrom()
    {
        return $this->hasMany(AssetTransfer::class, 'emp_id_transfer_from');
    }

    public function transferTo()
    {
        return $this->hasMany(AssetTransfer::class, 'emp_id_transfer_to');
    }
}
