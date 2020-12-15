<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Flash extends Component
{
    public $type;
    public $message;

    public $colors = [
        'error' => 'text-red-700 px-1 py-2 rounded-sm',
        'success' => 'text-green-700 px-1 py-2 rounded-sm',
    ];

    protected $listeners = ['flash'=> 'setFlashMessage'];

    public function setFlashMessage($message, $type)
    {
       $this->message = $message; 
       $this->type = $type; 

       $this->dispatchBrowserEvent('flash-message');
    }
    public function render()
    {
        return view('livewire.flash');
    }
}
