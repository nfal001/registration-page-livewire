<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0;

    function inc($val)
    {
        $this->count += $val;
    }
    function dec($val)
    {
        $this->count -= $val;
    }
    public function render()
    {
        return view('livewire.counter');
    }
}
