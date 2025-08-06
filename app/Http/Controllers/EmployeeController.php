<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::where('employee_status', 1)->get();
        // dd($employees);
        return view('employee.alphalist.index', compact('employees'));
    }

    public function create()
    {
        return view('employee.alphalist.add-employee');
    }

    public function store(Request $request)
    {
        // Validation rules (your existing validation stays the same)
        $validated = $request->validate([
            // ... your existing validation rules
        ]);

        // Use database transaction to ensure data integrity
        DB::beginTransaction();
        
        try {
            // Handle file uploads
            $filePaths = [];
            
            // Profile Image
            if ($request->hasFile('profile_image')) {
                $file = $request->file('profile_image');
                if (is_array($file)) {
                    $filePaths['profile_image'] = $file[0]->store('employee_profiles', 'public');
                } else {
                    $filePaths['profile_image'] = $file->store('employee_profiles', 'public');
                }
            }
            
            // Marriage Certificate
            if ($request->hasFile('marriage_certificate')) {
                $file = $request->file('marriage_certificate');
                if (is_array($file)) {
                    $filePaths['marriage_certificate_path'] = $file[0]->store('employee_documents', 'public');
                } else {
                    $filePaths['marriage_certificate_path'] = $file->store('employee_documents', 'public');
                }
            }
            
            // Parents Birth Certificate (can be multiple)
            if ($request->hasFile('parents_birth_certificate')) {
                $files = $request->file('parents_birth_certificate');
                if (is_array($files)) {
                    // Handle multiple files
                    $parentsPaths = [];
                    foreach ($files as $file) {
                        $parentsPaths[] = $file->store('employee_documents', 'public');
                    }
                    $filePaths['parents_birth_certificate_path'] = json_encode($parentsPaths);
                } else {
                    // Handle single file (backward compatibility)
                    $filePaths['parents_birth_certificate_path'] = $files->store('employee_documents', 'public');
                }
            }
            
            // Pag-ibig MDF
            if ($request->hasFile('pagibig_mdf')) {
                $file = $request->file('pagibig_mdf');
                if (is_array($file)) {
                    $filePaths['pagibig_mdf_path'] = $file[0]->store('employee_documents', 'public');
                } else {
                    $filePaths['pagibig_mdf_path'] = $file->store('employee_documents', 'public');
                }
            }
            
            // Children Birth Certificates (This one might be multiple files)
            if ($request->hasFile('children_birth_certificates')) {
                $file = $request->file('children_birth_certificates');
                if (is_array($file)) {
                    // Handle multiple files - store all and save paths as JSON
                    $childrenPaths = [];
                    foreach ($file as $childFile) {
                        $childrenPaths[] = $childFile->store('employee_documents', 'public');
                    }
                    $filePaths['children_birth_certificates_path'] = json_encode($childrenPaths);
                } else {
                    $filePaths['children_birth_certificates_path'] = $file->store('employee_documents', 'public');
                }
            }
            
            // Parents Birth Certificate (Dependents) - can be multiple
            if ($request->hasFile('parents_birth_certificate_dependents')) {
                $files = $request->file('parents_birth_certificate_dependents');
                if (is_array($files)) {
                    // Handle multiple files
                    $dependentsPaths = [];
                    foreach ($files as $file) {
                        $dependentsPaths[] = $file->store('employee_documents', 'public');
                    }
                    $filePaths['parents_birth_certificate_dependents_path'] = json_encode($dependentsPaths);
                } else {
                    // Handle single file (backward compatibility)
                    $filePaths['parents_birth_certificate_dependents_path'] = $files->store('employee_documents', 'public');
                }
            }

            // Prepare children details (combine individual children data)
            $childrenDetails = [];
            if (!empty($validated['employee_children_1_details'])) {
                $childrenDetails[] = [
                    'details' => $validated['employee_children_1_details'],
                    'age' => $validated['employee_children_1_age'] ?? null,
                    'birthdate' => $validated['employee_children_1_birthdate'] ?? null,
                ];
            }
            if (!empty($validated['employee_children_2_details'])) {
                $childrenDetails[] = [
                    'details' => $validated['employee_children_2_details'],
                    'age' => $validated['employee_children_2_age'] ?? null,
                    'birthdate' => $validated['employee_children_2_birthdate'] ?? null,
                ];
            }

            // Prepare parents details (combine individual parents data)
            $parentsDetails = [];
            if (!empty($validated['employee_parents_1_details'])) {
                $parentsDetails[] = [
                    'details' => $validated['employee_parents_1_details'],
                    'age' => $validated['employee_parents_1_age'] ?? null,
                    'birthdate' => $validated['employee_parents_1_birthdate'] ?? null,
                ];
            }

            if (!empty($validated['employee_parents_2_details'])) {
                $parentsDetails[] = [
                    'details' => $validated['employee_parents_2_details'],
                    'age' => $validated['employee_parents_2_age'] ?? null,
                    'birthdate' => $validated['employee_parents_2_birthdate'] ?? null,
                ];
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
                'employee_children_1_details' => $validated['employee_children_1_details'],
                'employee_children_1_age' => $validated['employee_children_1_age'],
                'employee_children_1_birthdate' => $validated['employee_children_1_birthdate'],
                'employee_children_2_details' => $validated['employee_children_2_details'],
                'employee_children_2_age' => $validated['employee_children_2_age'],
                'employee_children_2_birthdate' => $validated['employee_children_2_birthdate'],
                'parents_birth_certificate_dependents_path' => $filePaths['parents_birth_certificate_dependents_path'] ?? null,
                'employee_parents_1_details' => $validated['employee_parents_1_details'],
                'employee_parents_1_age' => $validated['employee_parents_1_age'],
                'employee_parents_1_birthdate' => $validated['employee_parents_1_birthdate'],
                'employee_parents_2_details' => $validated['employee_parents_2_details'],
                'employee_parents_2_age' => $validated['employee_parents_2_age'],
                'employee_parents_2_birthdate' => $validated['employee_parents_2_birthdate'],
                
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
                
                // Profile Image
                'profile_image' => $filePaths['profile_image'] ?? null,
                
                // System fields
                'employee_status' => 1,
            ]);

            // Commit the transaction only if everything succeeds
            DB::commit();

            return redirect()->route('employee.alphalist.index')
                ->with('success', 'Employee profile created successfully!');

        } catch (\Exception $e) {
            // Rollback the transaction on any error
            DB::rollback();
            
            // Clean up uploaded files if database save failed
            foreach ($filePaths as $filePath) {
                if ($filePath) {
                    // Handle JSON arrays (multiple files)
                    if (is_string($filePath) && str_starts_with($filePath, '[')) {
                        $paths = json_decode($filePath, true);
                        if (is_array($paths)) {
                            foreach ($paths as $path) {
                                if (Storage::disk('public')->exists($path)) {
                                    Storage::disk('public')->delete($path);
                                }
                            }
                        }
                    } else {
                        // Handle single file
                        if (Storage::disk('public')->exists($filePath)) {
                            Storage::disk('public')->delete($filePath);
                        }
                    }
                }
            }
            
            \Log::error('Employee store error', [
                'message' => $e->getMessage(), 
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all()
            ]);
            
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error creating employee profile: ' . $e->getMessage());
        }
    }

    public function show(Employee $employee)
    {
        return view('employees.alphalist.show', compact('employee'));
    }

    public function editEmployee($employee_id)
    {
        // $employee = $empl
        $employee = Employee::find($employee_id);
        // dump($employee->employee_id);
        // dump($employee);
        return view('employee.alphalist.edit-employee', compact('employee'));
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
        $father_age = Carbon::parse($employee->employee_father_birthdate)->age;
        $mother_age = Carbon::parse($employee->employee_mother_birthdate)->age;
        $employee_age = Carbon::parse($employee->employee_birthdate)->age;

        return view('employee.alphalist.view-employee-profile', compact('employee', 'father_age', 'mother_age', 'employee_age'));
    }

    public function addEmployee()
    {
        // dump('test');
        return view('employee.alphalist.add-employee');
    }
    
}