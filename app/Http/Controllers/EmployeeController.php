<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::where('employee_status', 1)->get();
        return view('employee.alphalist.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.alphalist.create');
    }

    public function store(Request $request)
    {
        // Validation rules
        $validated = $request->validate([
            // Basic Personal Information
            'employee_id' => 'required|string|unique:employees,employee_id',
            'employee_surname' => 'required|string|max:255',
            'employee_firstname' => 'required|string|max:255',
            'employee_middlename' => 'nullable|string|max:255',
            'employee_suffix' => 'nullable|string|max:50',
            'employee_maiden_name' => 'nullable|string|max:255',
            'employee_gender' => 'required|in:Male,Female',
            'employee_age' => 'required|integer|min:18|max:100',
            'employee_birthdate' => 'required|date|before:today',
            'employee_birthplace' => 'required|string|max:255',
            'employee_religion' => 'required|string|max:255',
            
            // Address Information
            'employee_present_address' => 'required|string',
            'employee_permanent_address' => 'required|string',
            
            // Contact Information
            'employee_personal_email' => 'required|email|unique:employees,employee_personal_email',
            'employee_contact_no1' => 'required|string|max:20',
            'employee_contact_no2' => 'nullable|string|max:20',
            'employee_viber_number' => 'nullable|string|max:20',
            
            // Educational Information
            'employee_educational_attainment' => 'required|string|max:255',
            'employee_school_attended' => 'required|string|max:255',
            'employee_college_vocational_status' => 'nullable|string|max:255',
            
            // Employment Information
            'employee_job_position' => 'required|string|max:255',
            'employee_department' => 'required|string|max:255',
            'employee_company_email' => 'required|email|unique:employees,employee_company_email',
            'employee_employment_type' => 'required|string|max:255',
            
            // Civil Status Information
            'employee_civil_status' => 'required|string|max:255',
            'marriage_certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'parents_birth_certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            
            // Government Details Update Status (for married employees)
            'sss_updated' => 'nullable|boolean',
            'philhealth_updated' => 'nullable|boolean',
            'pagibig_updated' => 'nullable|boolean',
            'pagibig_mdf' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            
            // Government IDs
            'employee_sss_number' => 'nullable|string|max:50',
            'employee_philhealth_number' => 'nullable|string|max:50',
            'employee_pagibig_number' => 'nullable|string|max:50',
            'employee_tin_number' => 'nullable|string|max:50',
            
            // Family Information
            'employee_children_count' => 'nullable|string|max:50',
            'children_birth_certificates' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120', // 5MB for multiple files
            'employee_children_details' => 'nullable|string',
            'parents_birth_certificate_dependents' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'employee_parents_details' => 'nullable|string',
            
            // Medical Information
            'employee_blood_type' => 'required|string|max:10',
            
            // Emergency Contact 1
            'emergency_contact_1_name' => 'required|string|max:255',
            'emergency_contact_1_relationship' => 'required|string|max:255',
            'emergency_contact_1_number' => 'required|string|max:20',
            'emergency_contact_1_address' => 'required|string',
            
            // Emergency Contact 2
            'emergency_contact_2_name' => 'required|string|max:255',
            'emergency_contact_2_relationship' => 'required|string|max:255',
            'emergency_contact_2_number' => 'required|string|max:20',
            'emergency_contact_2_address' => 'required|string',
            
            // Profile Image
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            // Handle file uploads
            $filePaths = [];
            
            // Profile Image
            if ($request->hasFile('profile_image')) {
                $filePaths['profile_image'] = $request->file('profile_image')->store('employee_profiles', 'public');
            }
            
            // Marriage Certificate
            if ($request->hasFile('marriage_certificate')) {
                $filePaths['marriage_certificate_path'] = $request->file('marriage_certificate')->store('employee_documents', 'public');
            }
            
            // Parents Birth Certificate
            if ($request->hasFile('parents_birth_certificate')) {
                $filePaths['parents_birth_certificate_path'] = $request->file('parents_birth_certificate')->store('employee_documents', 'public');
            }
            
            // Pag-ibig MDF
            if ($request->hasFile('pagibig_mdf')) {
                $filePaths['pagibig_mdf_path'] = $request->file('pagibig_mdf')->store('employee_documents', 'public');
            }
            
            // Children Birth Certificates
            if ($request->hasFile('children_birth_certificates')) {
                $filePaths['children_birth_certificates_path'] = $request->file('children_birth_certificates')->store('employee_documents', 'public');
            }
            
            // Parents Birth Certificate (Dependents)
            if ($request->hasFile('parents_birth_certificate_dependents')) {
                $filePaths['parents_birth_certificate_dependents_path'] = $request->file('parents_birth_certificate_dependents')->store('employee_documents', 'public');
            }

            // Create employee record
            $employee = Employee::create([
                // Basic Personal Information
                'employee_id' => $validated['employee_id'],
                'employee_surname' => $validated['employee_surname'],
                'employee_firstname' => $validated['employee_firstname'],
                'employee_middlename' => $validated['employee_middlename'],
                'employee_suffix' => $validated['employee_suffix'],
                'employee_maiden_name' => $validated['employee_maiden_name'],
                'employee_gender' => $validated['employee_gender'],
                'employee_age' => $validated['employee_age'],
                'employee_birthdate' => $validated['employee_birthdate'],
                'employee_birthplace' => $validated['employee_birthplace'],
                'employee_religion' => $validated['employee_religion'],
                
                // Address Information
                'employee_present_address' => $validated['employee_present_address'],
                'employee_permanent_address' => $validated['employee_permanent_address'],
                
                // Contact Information
                'employee_personal_email' => $validated['employee_personal_email'],
                'employee_contact_no1' => $validated['employee_contact_no1'],
                'employee_contact_no2' => $validated['employee_contact_no2'],
                'employee_viber_number' => $validated['employee_viber_number'],
                
                // Educational Information
                'employee_educational_attainment' => $validated['employee_educational_attainment'],
                'employee_school_attended' => $validated['employee_school_attended'],
                'employee_college_vocational_status' => $validated['employee_college_vocational_status'],
                
                // Employment Information
                'employee_job_position' => $validated['employee_job_position'],
                'employee_department' => $validated['employee_department'],
                'employee_company_email' => $validated['employee_company_email'],
                'employee_employment_type' => $validated['employee_employment_type'],
                
                // Civil Status Information
                'employee_civil_status' => $validated['employee_civil_status'],
                'marriage_certificate_path' => $filePaths['marriage_certificate_path'] ?? null,
                'parents_birth_certificate_path' => $filePaths['parents_birth_certificate_path'] ?? null,
                
                // Government Details Update Status
                'sss_updated' => $validated['sss_updated'] ?? null,
                'philhealth_updated' => $validated['philhealth_updated'] ?? null,
                'pagibig_updated' => $validated['pagibig_updated'] ?? null,
                'pagibig_mdf_path' => $filePaths['pagibig_mdf_path'] ?? null,
                
                // Government IDs
                'employee_sss_number' => $validated['employee_sss_number'],
                'employee_philhealth_number' => $validated['employee_philhealth_number'],
                'employee_pagibig_number' => $validated['employee_pagibig_number'],
                'employee_tin_number' => $validated['employee_tin_number'],
                
                // Family Information
                'employee_children_count' => $validated['employee_children_count'],
                'children_birth_certificates_path' => $filePaths['children_birth_certificates_path'] ?? null,
                'employee_children_details' => $validated['employee_children_details'],
                'parents_birth_certificate_dependents_path' => $filePaths['parents_birth_certificate_dependents_path'] ?? null,
                'employee_parents_details' => $validated['employee_parents_details'],
                
                // Medical Information
                'employee_blood_type' => $validated['employee_blood_type'],
                
                // Emergency Contact 1
                'emergency_contact_1_name' => $validated['emergency_contact_1_name'],
                'emergency_contact_1_relationship' => $validated['emergency_contact_1_relationship'],
                'emergency_contact_1_number' => $validated['emergency_contact_1_number'],
                'emergency_contact_1_address' => $validated['emergency_contact_1_address'],
                
                // Emergency Contact 2
                'emergency_contact_2_name' => $validated['emergency_contact_2_name'],
                'emergency_contact_2_relationship' => $validated['emergency_contact_2_relationship'],
                'emergency_contact_2_number' => $validated['emergency_contact_2_number'],
                'emergency_contact_2_address' => $validated['emergency_contact_2_address'],
                
                // System fields
                'employee_status' => 1,
            ]);

            return redirect()->route('employee.alphalist.index')
                ->with('success', 'Employee profile created successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error creating employee profile: ' . $e->getMessage());
        }
    }

    public function show(Employee $employee)
    {
        return view('employees.alphalist.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('employees.alphalist.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        // Similar validation and update logic as store method
        $validated = $request->validate([
            // Same validation rules as store method
            'employee_id' => ['required', 'string', Rule::unique('employees')->ignore($employee->employee_id)],
            'employee_surname' => 'required|string|max:255',
            // ... rest of validation rules
        ]);

        try {
            // Handle file uploads for update
            $filePaths = [];
            
            if ($request->hasFile('profile_image')) {
                // Delete old file if exists
                if ($employee->profile_image) {
                    Storage::disk('public')->delete($employee->profile_image);
                }
                $filePaths['profile_image'] = $request->file('profile_image')->store('employee_profiles', 'public');
            }
            
            // Handle other file uploads similarly...

            $employee->update([
                // Update all fields
                'employee_id' => $validated['employee_id'],
                'employee_surname' => $validated['employee_surname'],
                // ... rest of the fields
            ]);

            return redirect()->route('employee.alphalist.index')
                ->with('success', 'Employee profile updated successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error updating employee profile: ' . $e->getMessage());
        }
    }

    public function destroy(Employee $employee)
    {
        try {
            // Soft delete by setting status to 0
            $employee->update(['employee_status' => 0]);
            
            return redirect()->route('employee.alphalist.index')
                ->with('success', 'Employee profile deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error deleting employee profile: ' . $e->getMessage());
        }
    }

    public function search(Request $request)
    {
        $employees = Employee::where('employee_firstname', 'like', '%' . $request->query('q') . '%')
            ->orWhere('employee_lastname', 'like', '%' . $request->query('q') . '%')
            ->limit(10)
            ->get();

        return response()->json($employees);
    }

    public function manpowerRequisition()
    {
        return view('employee.manpower-requisition.index');
    }

    public function vacancyList()
    {
        return view('employee.vacancy-list.index');
    }

    public function employeeProfile($employee_id)
    {
        $employee = Employee::find($employee_id);
        // dd($employee);
        return view('employee.alphalist.view-employee-profile', compact('employee'));
    }
}