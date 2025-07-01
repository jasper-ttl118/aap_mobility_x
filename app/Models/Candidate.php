<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Candidate extends Model
{
    use HasFactory;
    protected $primaryKey = 'candidate_id';
    public $timestamps = false;
    protected $fillable = [
        'candidate_firstname',
        'candidate_middlename',
        'candidate_lastname'
    ];

    public function requisitions(): BelongsToMany
    {
        return $this->belongsToMany(Requisition::class, 
            'requisition_candidates', 
            'candidate_id', 
            'requisition_id'
        );
    }
}
