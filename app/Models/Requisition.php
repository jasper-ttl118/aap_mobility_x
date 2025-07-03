<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Requisition extends Model
{
    // public $timestamps = false;
    protected $primaryKey = "requisition_id";
    protected $fillable = [
        'requisition_type',
        'department_id',
        'requisition_status',
        'requisition_section',
        'requisition_education_level',
        'requisition_initial_job_position',
        'requisition_justification',
        'requisition_eventual_job_position',
        'requisition_number_required',
        'requisition_date_required',
        'requisition_contract_duration',
        'requisition_employment_type',
        'requisition_budget',
        'requisition_engagement_type',
        'requisition_job_description',
        'requisition_work_experience',
        'requisition_special_skill',
        'requisition_other',
        'requisition_applicants_sources',
        'requisition_requestor_name',
        'requisition_requestor_position',
        'requisition_endorser_name',
        'requisition_endorser_position',
        'requisition_approver_name',
        'requisition_approver_position',
        'requisition_approver_name_1',
        'requisition_approver_position_1',
 
    ];

    public function requisitionDuties(): HasMany
    {
       return $this->hasMany(RequisitionDuty::class, foreignKey: 'requisition_id');
    }

    public function requisitionEducationLevels(): HasMany
    {
       return $this->hasMany(RequisitionEducationLevel::class, foreignKey: 'requisition_id');
    }

    public function requisitionOthers(): HasMany
    {
       return $this->hasMany(RequisitionOther::class, foreignKey: 'requisition_id');
    }

    public function requisitionSpecialSkills(): HasMany
    {
       return $this->hasMany(RequisitionSpecialSkill::class, foreignKey: 'requisition_id');
    }

    public function requisitionWorkExperiences(): HasMany
    {
       return $this->hasMany(RequisitionWorkExperience::class, foreignKey: 'requisition_id');
    }

    public function candidates(): BelongsToMany
    {
        return $this->belongsToMany(Candidate::class, 
            'requisition_candidates', 
            'requisition_id', 
            'candidate_id'
        );
    }

   public function department(): BelongsTo  
   {
       return $this->belongsTo(Department::class, 'department_id', 'department_id');
   }
}
