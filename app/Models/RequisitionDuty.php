<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RequisitionDuty extends Model
{
    protected $primaryKey = 'requisition_duty_id';
    public $timestamps = false;
    protected $fillable = [
        'requisition_id',
        'requisition_duty_description'
    ];

    public function requisition(): BelongsTo
    {
        return $this->belongsTo(Requisition::class, 'requisition_id');
    }
}
