<?php

namespace App\Livewire\Employee\Alphalist;

use Livewire\Attributes\Rule;
use Livewire\Component;

class AddInternModal extends Component
{
        // #[Rule('required|alpha')]

    #[Rule('required|alpha')]
    public $intern_firstname;
    #[Rule('required|alpha')]
    public $intern_middlename;
    #[Rule('required|alpha')]
    public $intern_lastname;
    #[Rule('required')]
    public $internship_type;
    #[Rule('required|numeric')]
    public $required_hours;
    #[Rule('required|numeric|min:11')]
    public $intern_contact_number;
    #[Rule('required|email')]
    public $intern_email;
    #[Rule('required|alpha_dash')]
    public $intern_address;
    #[Rule('required')]
    public $intern_department;
    #[Rule('required')]
    public $intern_position;
    public function add()
    {
       $this->validate();
    }
    public function render()
    {
        return view('livewire.employee.alphalist.add-intern-modal');
    }
}
