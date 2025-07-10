<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'employee_profile_picture',
        'employee_lastname',
        'employee_firstname',
        'employee_middlename',
        'employee_suffix',
        'employee_mother_maiden_name',
        'employee_gender',
        'employee_age',
        'employee_birthdate',
        'employee_birthplace',
        'employee_religion',
        'department_id',
        
        // Address Information
        'employee_present_house_no',
        'employee_present_street',
        'employee_present_brgy',
        'employee_present_city',
        'employee_present_province',
        'employee_present_zip_code',

        'employee_permanent_house_no',
        'employee_permanent_street',
        'employee_permanent_brgy',
        'employee_permanent_city',
        'employee_permanent_province',
        'employee_permanent_zip_code',
        
        // Contact Information
        'employee_contact_no1',
        'employee_contact_no2', // Optional number
        'employee_personal_email',
        'employee_viber_number',
        'employee_company_number',
        'employee_company_email',
        
        // Educational Information
        'employee_educational_attainment',
        'employee_school_attended',
        'employee_college_course',
        'employee_section',
        
        // Employment Information
        'employee_job_position',
        'employee_department',
        'employee_employment_type',
        
        // Civil Status Information
        'employee_civil_status',
        'employee_marriage_certificate_path',
        
        // Government Details Update Status
        'employee_sss_updated',
        'employee_philhealth_updated',
        'employee_pagibig_updated',
        'employee_pagibig_mdf_path',
        
        // Government IDs
        'employee_sss_number',
        'employee_philhealth_number',
        'employee_pagibig_number',
        'employee_tin_number',
        
        // Family Information
        'employee_parents_details',
        'employee_father_name',     
        'employee_father_birthdate',
        'employee_father_birth_certificate',
        'employee_mother_name',
        'employee_mother_birthdate',
        'employee_mother_birth_certificate',
        
        // Medical Information
        'employee_blood_type',
        
        // Emergency Contact 1
        'employee_emergency_contact_1_name',
        'employee_emergency_contact_1_relationship',
        'employee_emergency_contact_1_number',
        'employee_emergency_contact_1_address',
        
        // Emergency Contact 2
        'employee_emergency_contact_2_name',
        'employee_emergency_contact_2_relationship',
        'employee_emergency_contact_2_number',
        'employee_emergency_contact_2_address',
        
        // System fields
        'employee_status',
    ];

    protected $casts = [
        'employee_birthdate' => 'date',
        'employee_age' => 'integer',
        'employee_status' => 'boolean',
        'employee_sss_updated' => 'boolean',
        'employee_philhealth_updated' => 'boolean',
        'employee_pagibig_updated' => 'boolean',
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

    public function employeeChildren(): HasMany
    {
        return $this->hasMany(EmployeeChild::class, 'employee_id', 'employee_id');
    }

    public function employeeEmergencyContacts(): HasMany
    {
        return $this->hasMany(EmployeeEmergencyContact::class, 'employee_id', 'employee_id');
    }
}