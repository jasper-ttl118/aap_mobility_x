<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RequisitionEducationLevel extends Model
{
    protected $primaryKey = 'requisition_education_level_id';
    public $timestamps = false;
    protected $fillable = [
        'requisition_id',
        'requisition_education_level_description'
    ];

    public function requisition(): BelongsTo
    {
        return $this->belongsTo(Requisition::class, 'requisition_id');
    }
}
