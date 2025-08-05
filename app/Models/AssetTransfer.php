<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetTransfer extends Model
{
    protected $primaryKey = "transfer_id";

    protected $fillable = [
        "asset_id",
        "emp_id_transfer_from",
        "emp_id_transfer_to",
        "date_transferred",
        "notes",
    ];

    // Relationship with History
    public function history()
    {
        return $this->hasOne(History::class, foreignKey: "borrow_id");
    }

    // Relationship with Asset
    public function assets()
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }

    // Relationship with Employee
    public function transferTo()
    {
        return $this->belongsTo(Employee::class, 'emp_id_transfer_to');
    }

    public function transferFrom()
    {
        return $this->belongsTo(Employee::class, 'emp_id_transfer_from');
    }
}
