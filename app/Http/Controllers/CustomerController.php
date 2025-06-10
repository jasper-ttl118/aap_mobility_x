<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::orderByDesc('customer_id')->paginate(perPage: 10);
        // dd($customers);
        return view("crm.dashboard.index", ['customers' => $customers]);
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

    public function contacts()
    {
        return view('crm.customer.index');
    }

    public function emailMarketing()
    {
        $customers = Customer::paginate(perPage: 5);
        return view('crm.email-marketing.index', ['customers' => $customers]);
    }
    
    public function messageTemplate()
    {
        return view('crm.email-marketing.message-template');
    }

    public function messageList()
    {
        return view('crm.email-marketing.message-list');
    }

    public function composeEmail()
    {
        return view('crm.email-marketing.compose-email');
    }

    public function composeMobile()
    {
        return view('crm.email-marketing.compose-mobile');
    }

    public function corporate()
    {
        return view('crm.corporate.index');
    }

    public function salesTracking()
    {
        return view('crm.sales-tracking.index');
    }
}
