<?php

namespace App\Livewire;

use Livewire\Component;

class Count extends Component
{
   
    public $count = 10;

    public function plus(){
        $this->count ++;

    }

    public function unplus(){
        $this->count --;

    }

    public function render()
    {
        return view('livewire.count');
    }
}
