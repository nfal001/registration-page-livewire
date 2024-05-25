<?php

namespace App\Livewire;

use App\Models\CabangIdn;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class SummaryKuotaCabang extends Component
{
    #[Reactive]
    public $cabangId;

    public function render()
    {
        return view('livewire.summary-kuota-cabang',[
            'cabang' => CabangIdn::find($this->cabangId)->load('programPendidikan')
        ]);
    }
}
