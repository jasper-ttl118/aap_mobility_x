<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RequisitionOther extends Model
{
    protected $primaryKey = 'requisition_other_id';
    public $timestamps = false;
    protected $fillable = [
        'requisition_id',
        'requisition_other_description'
    ];
    
    public function requisition(): BelongsTo
    {
        return $this->belongsTo(Requisition::class, 'requisition_id');
    }
}
