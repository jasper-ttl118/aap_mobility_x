<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    // public $timestamps = false;
    protected $primaryKey = "requisition_id";
    protected $fillable = [
        'requisition_job_position',
        'requisition_job_description',
        'requisition_type',
        'requisition_department',
        'requisition_requestor_name',
        'requisition_salary_min',
        'requisition_salary_max',
        'requisition_status'
    ];
}
