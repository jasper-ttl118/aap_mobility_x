<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetBorrow extends Model
{
    protected $primaryKey = "borrow_id";

    protected $fillable = [
        "asset_id",
        "emp_id_borrow_from",
        "emp_id_borrowing",
        "date_borrowed",
        "date_due",
        "date_returned",
        "borrow_status",
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
    public function borrower()
    {
        return $this->belongsTo(Employee::class, 'emp_id_borrowing');
    }

    public function borrowFrom()
    {
        return $this->belongsTo(Employee::class, 'emp_id_borrow_from');
    }
}
