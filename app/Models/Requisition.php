<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    // public $timestamps = false;
    protected $primaryKey = "requisition_id";
    protected $fillable = [
        'requisition_job_description',
        'requisition_type',
        'requisition_candidates',
        'requisition_department',
        'requisition_requestor_name',
        'requisition_status',
        'requisition_section',
        'requisition_initial_job_position',
        'requisition_justification',
        'requisition_eventual_job_position',
        'requisition_number_required',
        'requisition_contract_duration',
        'requisition_signature',
        'requisition_employment_type',
        'requisition_budget',
        'requisition_engagement_type',
        'requisition_education',
        'requisition_work_experience',
        'requisition_special_skills',
        'requisition_other_description',
        'requisition_applicants_sources',
        'requisition_requestor_position',
        'requisition_requestor_signature',
        'requisition_endorser_name',
        'requisition_endorser_position',
        'requisition_endorser_signature',
        'requisition_approver_name',
        'requisition_approver_position',
        'requisition_approver_signature',
        'requisition_approver_name_1',
        'requisition_approver_position_1',
        'requisition_approver_signature_1',
    ];

}
