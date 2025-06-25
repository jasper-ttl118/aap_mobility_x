<?php

namespace App\Livewire\Employee\Alphalist;

use App\Models\Intern;
use Livewire\Attributes\Rule;
use Livewire\Component;

class EditInternModal extends Component
{
    public $intern;
    public $intern_firstname;
    public $intern_middlename;
    public $intern_lastname;
    public $intern_type;
    public $intern_required_hours;
    public $intern_contact_number;
    public $intern_email;
    public $intern_address;
    public $intern_department;
    public $intern_position;
    public $intern_school;
    public $intern_status;
    public $intern_id;
    protected $listeners = ['loadInternInfo', 'resetInternProfile'];

    public function rules()
    {
        return [
            'intern_firstname' => 'required',
            'intern_lastname' => 'required',
            'internship_type' => 'required',
            'intern_required_hours' => 'required|integer',
            'intern_contact_number' => 'required|min:11',
            'intern_email' => 'required',
            'intern_address' => 'required',
            'intern_department' => 'required',
            'intern_position' => 'required',
            'intern_school' => 'required'   
        ];
    }

    public function messages()
    {
        return [
            'intern_firstname.required' => 'First name is required.',
            'intern_lastname.required' => 'Last name is required.',
            'internship_type.required' => 'Internship type is required.',
            'intern_required_hours.required' => 'Required hours is required.',
            'intern_required_hours.integer' => 'Must be an integer.',
            'intern_contact_number.required' => 'Contact number is required.',
            'intern_contact_number.min' => 'Must be at least 11 characters.',
            'intern_email.required' => 'Email is required.',
            'intern_address.required' => 'Address is required.',
            'intern_department.required' => 'Department is required.',
            'intern_position.required' => 'Intern position is required.',
            'intern_school.required' => 'School name is required.'
        ];
    }


    public function loadInternInfo($intern_id)
    {
         $this->intern = Intern::find($intern_id);
         $this->intern_id = $this->intern->intern_id;
         $this->intern_firstname =  $this->intern->intern_firstname;
         $this->intern_middlename = $this->intern->intern_middlename;
         $this->intern_lastname =  $this->intern->intern_lastname;
         $this->intern_email = $this->intern->intern_email;
         $this->intern_address = $this->intern->intern_address;
         $this->intern_position = $this->intern->intern_position;
         $this->intern_department = $this->intern->intern_department;
         $this->intern_contact_number = $this->intern->intern_contact_number;
         $this->intern_status = $this->intern->intern_status;
         $this->intern_required_hours = $this->intern->intern_required_hours;
         $this->intern_school = $this->intern->intern_school;
         $this->intern_type = $this->intern->intern_type;
    }

    public function resetInternProfile()
    {
        $this->intern = null;
    }

    public function edit()
    {   
        $this->validate();

        $query = Intern::find($this->intern_id)->update([
            'intern_firstname' => $this->intern_firstname, 
            'intern_middlename' => $this->intern_middlename,
            'intern_lastname' => $this->intern_lastname,
            'intern_email' => $this->intern_email,
            'intern_address' => $this->intern_address,
            'intern_position' => $this->intern_position,
            'intern_department' => $this->intern_department,
            'intern_contact_number' => $this->intern_contact_number,
            'intern_status' => $this->intern_status,
            'intern_required_hours' => $this->intern_required_hours,
        ]);

        if($query){
            $this->dispatch('refreshTable', 'interns');

            $this->dispatch('show-toast', [
                'title' => 'Success',
                'content' => 'Intern Updated Successfully!',
            ]);
        }
        else{
            $this->dispatch('show-toast', [
                'title' => 'Error',
                'content' => 'An Error Occured!',
            ]);
        }
        
        $this->resetInternProfile();
        $this->dispatch('close-modal');
    }

    public function render()
    {
        return view('livewire.employee.alphalist.edit-intern-modal');
    }
}
