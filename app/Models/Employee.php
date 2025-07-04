<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $primaryKey = 'employee_id';
    
    // Disable Laravel's default timestamps since we're using custom ones
    public $timestamps = false;

    protected $fillable = [
        // Basic Personal Information
        'employee_id',
        'employee_surname',
        'employee_firstname',
        'employee_middlename',
        'employee_suffix',
        'employee_maiden_name',
        'employee_gender',
        'employee_age',
        'employee_birthdate',
        'employee_birthplace',
        'employee_religion',
        
        // Address Information
        'employee_present_address',
        'employee_permanent_address',
        
        // Contact Information
        'employee_personal_email',
        'employee_contact_no1',
        'employee_contact_no2',
        'employee_viber_number',
        
        // Educational Information
        'employee_educational_attainment',
        'employee_school_attended',
        'employee_college_vocational_status',
        
        // Employment Information
        'employee_job_position',
        'employee_department',
        'employee_company_email',
        'employee_employment_type',
        
        // Civil Status Information
        'employee_civil_status',
        'marriage_certificate_path',
        'parents_birth_certificate_path',
        
        // Government Details Update Status
        'sss_updated',
        'philhealth_updated',
        'pagibig_updated',
        'pagibig_mdf_path',
        
        // Government IDs
        'employee_sss_number',
        'employee_philhealth_number',
        'employee_pagibig_number',
        'employee_tin_number',
        
        // Family Information
        'employee_children_count',
        'children_birth_certificates_path',
        'employee_children_details',
        'parents_birth_certificate_dependents_path',
        'employee_parents_details',
        
        // Medical Information
        'employee_blood_type',
        
        // Emergency Contact 1
        'emergency_contact_1_name',
        'emergency_contact_1_relationship',
        'emergency_contact_1_number',
        'emergency_contact_1_address',
        
        // Emergency Contact 2
        'emergency_contact_2_name',
        'emergency_contact_2_relationship',
        'emergency_contact_2_number',
        'emergency_contact_2_address',
        
        // System fields
        'employee_status',
    ];

    protected $casts = [
        'employee_birthdate' => 'date',
        'employee_age' => 'integer',
        'employee_status' => 'boolean',
        'sss_updated' => 'boolean',
        'philhealth_updated' => 'boolean',
        'pagibig_updated' => 'boolean',
        'employee_date_created' => 'datetime',
        'employee_date_updated' => 'datetime',
    ];

    // Accessor for full name
    public function getFullNameAttribute()
    {
        $name = $this->employee_firstname;
        
        if ($this->employee_middlename) {
            $name .= ' ' . $this->employee_middlename;
        }
        
        $name .= ' ' . $this->employee_surname;
        
        if ($this->employee_suffix) {
            $name .= ' ' . $this->employee_suffix;
        }
        
        return $name;
    }

    // Accessor for display name (Last, First Middle)
    public function getDisplayNameAttribute()
    {
        $name = $this->employee_surname . ', ' . $this->employee_firstname;
        
        if ($this->employee_middlename) {
            $name .= ' ' . substr($this->employee_middlename, 0, 1) . '.';
        }
        
        if ($this->employee_suffix) {
            $name .= ' ' . $this->employee_suffix;
        }
        
        return $name;
    }

    // Scope for active employees
    public function scopeActive($query)
    {
        return $query->where('employee_status', 1);
    }

    // Scope for specific department
    public function scopeByDepartment($query, $department)
    {
        return $query->where('employee_department', $department);
    }

    // Scope for specific position
    public function scopeByPosition($query, $position)
    {
        return $query->where('employee_job_position', $position);
    }

    // Helper method to get profile image URL
    public function getProfileImageUrlAttribute()
    {
        if ($this->profile_image) {
            return asset('storage/' . $this->profile_image);
        }
        
        // Return default avatar if no profile image
        return asset('images/default-avatar.png');
    }

    // Helper method to check if employee is married
    public function isMarried()
    {
        return strtolower($this->employee_civil_status) === 'married';
    }

    // Helper method to check if employee has children
    public function hasChildren()
    {
        return $this->employee_children_count && $this->employee_children_count !== 'n/a' && $this->employee_children_count > 0;
    }

    // Helper method to format children details
    public function getFormattedChildrenDetailsAttribute()
    {
        if (!$this->employee_children_details) {
            return null;
        }
        
        return explode("\n", $this->employee_children_details);
    }

    // Helper method to format parents details
    public function getFormattedParentsDetailsAttribute()
    {
        if (!$this->employee_parents_details) {
            return null;
        }
        
        return explode("\n", $this->employee_parents_details);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}