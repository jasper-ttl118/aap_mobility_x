<?php

namespace App\Livewire\Employee\ManpowerRequisition;

use App\Models\Employee;
use App\Models\Requisition;
use Livewire\Component;

class WaitingForApproveTable extends Component
{
    public $status_class;
    public $status_text;
    public function render()
    {
        $role = auth()->user()->roles;
        $role_name = $role[0]->role_name;
        $employee_id = auth()->user()->employee_id;
        $employee = Employee::find($employee_id);
        $employee_position = $employee->employee_position;
        $department_id = $employee->department->department_id;
        $waitingApprovalRequisitions = '';
        
        if ($role_name === 'Department Head' || $role_name === 'Super Admin'){
            // Get all newly created requisition
            // Only get the request from their own department
            $waitingApprovalRequisitions = Requisition::where('requisition_status', 1)
            ->where('department_id', $department_id)
            ->latest()
            ->paginate(5, ['*'], 'waitingApprovalPage');
            $this->status_class ='bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg dark:bg-gray-700 dark:text-gray-300';
            $this->status_text = 'Pending';
        } 
        else if ($role_name === 'HR Manager'){
            // Get all dept. head approved requisition
            $waitingApprovalRequisitions = Requisition::where('requisition_status', 2)
            ->latest()
            ->paginate(5, ['*'], 'waitingApprovalPage');
            $this->status_class ='text-indigo-800 bg-indigo-200 text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg';
            $this->status_text = 'Dept. Head Approved';
        }
        else if ($role_name === 'CFO'){
            // Get all HR approved requisition
            $waitingApprovalRequisitions = Requisition::where('requisition_status', 3)
            ->latest()
            ->paginate(5, ['*'], 'waitingApprovalPage');
            $this->status_class ='bg-[#9333EA] text-[#F3E8FF] text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg';
            $this->status_text = 'HR Approved';
        }
        else if ($role_name === 'CEO' || $role_name === 'COO'){
            // Get all CFO approved requisitions
            $waitingApprovalRequisitions = Requisition::where('requisition_status', 4)
            ->latest()
            ->paginate(5, ['*'], 'waitingApprovalPage');
            $this->status_class ='text-yellow-700 bg-yellow-100 text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg';
            $this->status_text = 'CFO Approved';
        }
        
        return view('livewire.employee.manpower-requisition.waiting-for-approve-table', compact('waitingApprovalRequisitions'));
    }
}
