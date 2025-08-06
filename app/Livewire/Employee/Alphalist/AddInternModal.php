<?php

namespace App\Livewire\Employee\Alphalist;

use App\Models\Intern;
use Livewire\Attributes\Rule;
use Livewire\Component;

class AddInternModal extends Component
{
    public $intern_firstname;
    public $intern_middlename;
    public $intern_lastname;
    public $internship_type;
    public $intern_required_hours;
    public $intern_contact_number;
    public $intern_email;
    public $intern_address;
    public $intern_department;
    public $intern_position;
    public $intern_school;

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

    public function mount()
    {
        $this->intern_department = "IST";
        $this->intern_position = "Manager";
    }

    public function add()
    {
       $this->validate();
        
       $query = Intern::create([
          'intern_firstname' => $this->intern_firstname,
          'intern_middlename' => $this->intern_middlename,
          'intern_lastname' => $this->intern_lastname,
          'intern_type' => $this->internship_type,
          'intern_school' => $this->intern_school,
          'intern_required_hours' => $this->intern_required_hours,
          'intern_email' => $this->intern_email,
          'intern_address' => $this->intern_address,
          'intern_position' => $this->intern_position,
          'intern_department' => $this->intern_department,
          'intern_contact_number' => $this->intern_contact_number,
          'intern_status' => 1,
       ]);

        if($query){      
            $this->dispatch('refreshTable', 'interns');

            $this->dispatch('show-toast', [
                'title' => 'Success',
                'content' => 'Intern Added Successfully!',
            ]);
        }
        else{
            $this->dispatch('show-toast', [
                'title' => 'Error',
                'content' => 'An Error Occured!',
            ]);
        }

        $this->dispatch('close-modal');
    }

    public function render()
    {
        return view('livewire.employee.alphalist.add-intern-modal');
    }
}
