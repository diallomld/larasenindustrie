<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Ad extends Component
{
    public $annonce;

    public function addLike()
    {
        if (auth()->check()) {
            auth()->user()->likes()->toggle($this->annonce->id);
        }else{
            $this->emit('flash','Merci de vous connecter pour ajouter une annonces dans vos favoris','error');
        }
        
    }
    public function render()
    {
        return view('livewire.ad');
    }
}
