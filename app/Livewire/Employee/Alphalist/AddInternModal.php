<?php

namespace App\Livewire\Employee\Alphalist;

use App\Models\Intern;
use Livewire\Attributes\Rule;
use Livewire\Component;

class AddInternModal extends Component
{
    #[Rule('required|alpha')]
    public $intern_firstname;
    #[Rule('required|alpha')]
    public $intern_middlename;
    #[Rule('required|alpha')]
    public $intern_lastname;
    #[Rule('required')]
    public $internship_type;
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
            $this->dispatch('show-toast', [
                'title' => 'Success',
                'content' => 'Intern Added Successfully!',
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
        return view('livewire.employee.alphalist.add-intern-modal');
    }
}
