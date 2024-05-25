<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Pendaftaran Santri IDN')]
class PendaftaranSantri extends Component
{
    
    public function render()
    {
        return view('livewire.pendaftaran-santri');
    }
}
