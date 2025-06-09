<?php

namespace App\Http\Controllers;

use App\Models\Corporate;
use App\Models\Customer;
use Illuminate\Http\Request;

class CorporateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $corporate = Corporate::orderByDesc('customer_id')->paginate(perPage: 10);
        
        // dd($corporate);
        return view("crm.dashboard.index", ['customer' => $corporate]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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

    public function Agent(){
        return view('crm.corporate.agent');
    }

    public function contacts()
    {
        return view('crm.customer.index');
    }

    public function emailMarketing()
    {
        return view('crm.email-marketing.index');
    }
    
    public function messageTemplate()
    {
    }

    public function corporates()
    {
        return view('crm.corporate.resellers-table');
    }

    public function corporate()
    {
        return view('crm.corporate.index');
    }

    public function salesTracking()
    {
        return view('crm.sales-tracking.index');
    }

    // public function showModal()
    // {
    //     $corporates = Customer::all(); 

    //     return view('crm.corporate.resellers-profile', ['corporates'=> $corporates]);
    // }
}
