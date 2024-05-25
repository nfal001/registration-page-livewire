<?php

namespace App\Livewire;

use App\Models\CabangIdn;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class CekKuotaSantri extends Component
{
    public $cabangId = 1;

    public function render()
    {
        return view('livewire.cek-kuota-santri',[
            'cabangList' => CabangIdn::all()
        ]);
    }
}
