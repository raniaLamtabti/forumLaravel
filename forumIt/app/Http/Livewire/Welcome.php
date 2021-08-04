<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;

class Welcome extends Component
{
     /**
     * The read function.
     *
     * @return void
     */
    public function read()
    {
        return Question::with("user")->get();
    }


    public function render()
    {
        return view('livewire.Welcome', [
            'data' => $this->read(),
        ]);
    }
}
