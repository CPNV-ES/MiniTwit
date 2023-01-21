<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikesCounter extends Component
{
    public $post;

    public function render()
    {

        return view('livewire.likes-counter', [
            'post' => $this->post,
        ]);
    }

    public function increment()
    {
        $this->post->like();
        $this->post->save();
        $this->post->refresh();
    }

    public function decrement()
    {
        $this->post->unlike();
        $this->post->save();
        $this->post->refresh();
    }
}