<?php

namespace App\Livewire\Crm\EmailMarketing;

use Livewire\Component;

class SuccessToast extends Component
{
    
    public $toast_title = '';
    public $toast_content = '';
    public function render()
    {
        return view('livewire.crm.email-marketing.success-toast');
    }
}
