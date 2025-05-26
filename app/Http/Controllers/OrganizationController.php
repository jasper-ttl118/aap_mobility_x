<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use Illuminate\Support\Facades\Storage;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::all();     
        return view('role-permission.organization.index', compact('organizations'));
    }

    public function create()
    {
        return view('role-permission.organization.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'org_name' => 'required|string|max:255',
            'org_description' => 'required|string',
            'org_logo' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
            'org_color' => 'required|string|max:255',
        ]);

        $path = null;

        //Store the file in the "public/uploads" directory
        if ($request->hasFile('org_logo')) {
            $path = $request->file('org_logo')->store('uploads', 'public'); // Saves to storage/app/public/uploads
        }

        // Create a new organization record and store the path
        Organization::create([
            'org_name' => $request->org_name,
            'org_description' => $request->org_description,
            'org_logo' => $path, // Save the path in the database
            'org_color' => $request->org_color,
        ]);
        
        return redirect('/organization')->with('status', 'Organization \''.$request->org_name.'\' has been created successfully');
    }

    public function edit(Organization $organization)
    {   
        return view('role-permission.organization.edit', compact('organization'));
    }

    public function update(Request $request, Organization $organization)
    {
        $request->validate([
            'org_name' => 'required|string|max:255',
            'org_description' => 'required|string',
            'org_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp', //Allow nullable logo
            'org_color' => 'required|string|max:255',
            'org_status' => 'required|integer|in:0,1',
        ]);
    
        $data = [
            'org_name' => $request->org_name,
            'org_description' => $request->org_description,
            'org_status' => $request->org_status,
            'org_color' => $request->org_color,
        ];
    
        //Only update the logo if a new file is uploaded
        if ($request->hasFile('org_logo')) {
            // Delete the old logo if it exists
            if ($organization->org_logo && Storage::disk('public')->exists($organization->org_logo)) {
                Storage::disk('public')->delete($organization->org_logo);
            }
    
            //Store the new file and update the path
            $path = $request->file('org_logo')->store('uploads', 'public');
            $data['org_logo'] = $path; //Include in update only if a new file is uploaded
        }
    
        //Update organization record
        $organization->update($data);

        return redirect('/organization')->with('status', 'Organization Details has been updated successfully');
    }

    public function destroy($id)
    {
        $organization = Organization::findOrFail($id);
    
        // ✅ Delete the uploaded logo if it exists
        if ($organization->org_logo && Storage::disk('public')->exists($organization->org_logo)) {
            Storage::disk('public')->delete($organization->org_logo);
        }
    
        // ✅ Delete the organization record
        $organization->delete();
    
        return redirect('organization')->with('status', 'Organization Deleted Successfully');
    }
    
}
