<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Show extends Component
{
    public $annonce;

    public function addLike()
    {
        if (auth()->check()) {
            auth()->user()->likes()->toggle($this->annonce->id);
        }
        
    }
    public function render()
    {
        return view('livewire.show');
    }
}
