<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Requisition;
use Illuminate\Http\Request;

class RequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('employee.manpower-requisition.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.manpower-requisition.create-requisition-request');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($requisition_id)
    {
        $requisition = Requisition::find($requisition_id);
        return view('employee.manpower-requisition.view-requisition-request', compact('requisition'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $requisition_id)
    {
        $requisition = Requisition::find($requisition_id);
        return view('employee.manpower-requisition.edit-requisition-request', compact('requisition'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function pendingList()
    {
        return view('employee.manpower-requisition.pending-list');
    }

    public function viewPendingRequest($requisition_id)
    {
        $requisition = Requisition::find($requisition_id);
        return view('employee.manpower-requisition.view-pending-request', compact('requisition'));
    }
    
    public function waitApprovalList()
    {
        return view('employee.manpower-requisition.waiting-for-approve-list');
    }

    public function viewWaitingApprovalRequest($requisition_id)
    {
        $requisition = Requisition::find($requisition_id);
        return view('employee.manpower-requisition.view-waiting-approval-request', compact('requisition'));
    }
}
