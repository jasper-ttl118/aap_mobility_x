<?php

namespace App\Livewire\Employee\Alphalist;

use App\Models\Intern;
use Livewire\Attributes\Rule;
use Livewire\Component;

class EditInternModal extends Component
{
    public $intern;
    #[Rule('required|alpha')]
    public $intern_firstname;
    #[Rule('regex:/^[A-Za-z .]+$/')]
    public $intern_middlename;
    #[Rule('required|alpha')]
    public $intern_lastname;
    #[Rule('required')]
    public $intern_type;
    #[Rule('required|numeric')]
    public $intern_required_hours;
    #[Rule('required|numeric|min:11')]
    public $intern_contact_number;
    #[Rule('required|email')]
    public $intern_email;
    #[Rule('required|string')]
    public $intern_address;
    #[Rule('required')]
    public $intern_department;
    #[Rule('required')]
    public $intern_position;
    #[Rule('required|alpha')]
    public $intern_school;
    public $intern_status;
    public $intern_id;
    protected $listeners = ['loadInternInfo', 'resetInternProfile'];

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
            $this->dispatch('show-toast', [
                'title' => 'Success',
                'content' => 'Intern Updated Successfully!',
            ]);

            $this->dispatch('close-modal');
        }
        else{
            $this->dispatch('show-toast', [
                'title' => 'Error',
                'content' => 'An Error Occured!',
            ]);
        }
    }

    public function render()
    {
        return view('livewire.employee.alphalist.edit-intern-modal');
    }
}
