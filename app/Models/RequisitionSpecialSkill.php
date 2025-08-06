<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RequisitionSpecialSkill extends Model
{
    protected $primaryKey = 'requisition_special_skill_id';
    public $timestamps = false;
    protected $fillable = [
        'requisition_id',
        'requisition_special_skill_description'
    ];
    
    public function requisition(): BelongsTo
    {
        return $this->belongsTo(Requisition::class, 'requisition_id');
    }
}
