<?php

namespace App\Http\Livewire;

use App\Models\Ad;
use Livewire\Component;

class Search extends Component
{
    /*
    public $ads = [];
    public String $search='';

    protected $rules = [
        'search' => 'required|min:3',
    ];

    public function submit()
    {
        $this->validate();

        // Execution doesn't reach here if validation fails.

        $words = '%'. $this->search . '%';

        if (strlen($this->search) > 2) {    
            $this->ads = Ad::where('title', 'like', $words)->orWhere('content', 'like', $words)->get();
            //dd($this->ads);
        }
        return redirect()->route('annonce.index',[
            'annonce' => $this->ads
        ]);

        
    }


    public function updatedSearch()
    {
        $words = '%'. $this->search . '%';

        if (strlen($this->search) > 2) {    
            $this->ads = Ad::where('title', 'like', $words)->orWhere('content', 'like', $words)->get();
            //dd($this->ads);
        }

    }
    */

    public function render()
    {
        return view('livewire.search');
    }
}
