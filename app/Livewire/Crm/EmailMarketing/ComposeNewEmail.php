<?php

namespace App\Livewire\Crm\EmailMarketing;

use Livewire\Component;

class ComposeNewEmail extends Component
{
    public $subject;
    public $content;
    public $selected_variables = [];

    public function create()
    {       
        $this->dispatch('show-toast', [
            'title' => 'Success',
            'content' => 'Message Sent Successfully!',
        ]);
    }
    
    public function updatedContent()
    {
        foreach ($this->selected_variables as $key => $variable) {
            if (!str_contains($this->content, $variable)) {
                unset($this->selected_variables[$key]);

                $label = preg_quote(trim($variable, '[]'), '/');

                $pattern = '/(\[?[^\]]*' . substr($label, 0, 3) . '[^\]]*\]?)/i';

                $this->content = preg_replace($pattern, '', $this->content);
            }
        }

        $this->selected_variables = array_values($this->selected_variables);
    }

    public function addVarToContent($given_variable)
    {
        $braces_variable = '[' . $given_variable . ']';

        if (in_array($braces_variable, $this->selected_variables)){
            dump("Already exist!");
        }else{
            $this->content .= $braces_variable;
            $this->selected_variables[] = $braces_variable;
        }        
        // dump($given_variable);
    }

    public function render()
    {
        return view('livewire.crm.email-marketing.compose-new-email');
    }
}
