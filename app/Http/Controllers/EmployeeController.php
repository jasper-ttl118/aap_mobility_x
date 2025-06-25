<?php

namespace App\Http\Controllers;


use App\Models\Intern;
use App\Models\Requisition;
use Illuminate\Http\Request;
use App\Models\Employee;


class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();   
        $interns = Intern::all();  
        return view('employee.alphalist.index', compact('employees', 'interns'));
    }

    public function create()
    {
        return view('employee.alphalist.create');

    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_firstname' => 'required|string|max:255',
            'employee_middlename' => 'required|string|max:255',
            'employee_lastname' => 'required|string|max:255',
            'employee_contact_number' => 'required|string|max:255',
            'employee_email' => 'required|string|max:255|unique:employees,employee_email',
            'employee_address' => 'required|string|max:255',
            'employee_position' => 'required|string|max:255',
            'employee_department' => 'required|string|max:255',
        ]);

        Employee::create([
            'employee_firstname' => $request->employee_firstname,
            'employee_middlename' => $request->employee_middlename,
            'employee_lastname' => $request->employee_lastname,
            'employee_contact_number' => $request->employee_contact_number,
            'employee_email' => $request->employee_email,
            'employee_address' => $request->employee_address,
            'employee_position' => $request->employee_position,
            'employee_department' => $request->employee_department,
        ]);

        return redirect('/employee')->with('status', 'Employee '.$request->employee_firstname.' ' . $request->employee_lastname.' has been created successfully');
    }

    public function edit(Employee $employee)
    {
        return view('employee.alphalist.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'employee_firstname' => 'required|string|max:255',
            'employee_middlename' => 'required|string|max:255',
            'employee_lastname' => 'required|string|max:255',
            'employee_contact_number' => 'required|string|max:255',
            'employee_email' => 'required|string|max:255|unique:employees,employee_email,'.$employee->employee_id.',employee_id',
            'employee_address' => 'required|string|max:255',
            'employee_position' => 'required|string|max:255',
            'employee_department' => 'required|string|max:255',
            'employee_status' => 'required|integer|in:0,1',
        ]);

        $data = [
            'employee_firstname' => $request->employee_firstname,
            'employee_middlename' => $request->employee_middlename,
            'employee_lastname' => $request->employee_lastname,
            'employee_contact_number' => $request->employee_contact_number,
            'employee_email' => $request->employee_email,
            'employee_address' => $request->employee_address,
            'employee_position' => $request->employee_position,
            'employee_department' => $request->employee_department,
            'employee_status' => $request->employee_status,
        ];

        $employee->update($data);

        return redirect('/employee')->with('status', 'Employee Details has been updated successfully');
    }

    public function destroy($id)
    {
        $user = Employee::find($id);
        $user->delete();
        return redirect('employee')->with('status', 'Employee Deleted Successfully');
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
        $requisitions = Requisition::whereIn('requisition_status', [1, 2, 3])->get()->groupBy('requisition_status');

        $pendingRequisitions  = $requisitions->get(1, collect());
        $approvedRequisitions = $requisitions->get(2, collect());
        $rejectedRequisitions = $requisitions->get(3, collect());

        return view('employee.manpower-requisition.index', compact('pendingRequisitions', 'approvedRequisitions', 'rejectedRequisitions'));
    }

    public function vacancyList()
    {
        $approvedRequisitions = Requisition::where('requisition_status', '=', 2)->get();
        return view('employee.vacancy-list.index', compact('approvedRequisitions'));
    }

}
