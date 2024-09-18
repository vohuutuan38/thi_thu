<?php

namespace App\Livewire\Posts;

use Livewire\Component;

class CreatePost extends Component
{
    public $title = null;
    
    public function mourse($title){
        $this->title = $title;
    }
    public function render()
    {
        return view('livewire.posts.create-post');
    }

   

}
