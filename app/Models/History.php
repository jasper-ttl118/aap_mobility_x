<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class History extends Model
{
    use HasFactory;

    protected $primaryKey = 'history_id';

    protected $fillable = [
        'asset_id',
        'emp_id_transfer_from',
        'emp_id_transfer_to',
        'borrow_id',
        'transfer_id',
        'date',
    ];

    // Relationships

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }

    public function transferFrom()
    {
        return $this->belongsTo(Employee::class, 'emp_id_transfer_from');
    }

    public function transferTo()
    {
        return $this->belongsTo(Employee::class, 'emp_id_transfer_to');
    }

    public function borrow()
    {
        return $this->belongsTo(AssetBorrow::class, 'borrow_id');
    }

    public function transfer()
    {
        return $this->belongsTo(AssetTransfer::class, 'transfer_id');
    }
}
