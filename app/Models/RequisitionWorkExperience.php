<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RequisitionWorkExperience extends Model
{
    protected $primaryKey = 'requisition_work_experience_id';
    public $timestamps = false;
    protected $fillable = [
        'requisition_id',
        'requisition_work_experience_description'
    ];

    public function requisition(): BelongsTo
    {
        return $this->belongsTo(Requisition::class, 'requisition_id');
    }
}
