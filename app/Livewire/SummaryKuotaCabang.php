<?php

namespace App\Livewire;

use App\Models\CabangIdn;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class SummaryKuotaCabang extends Component
{
    #[Reactive]
    public $cabangId;

    private function getCabang() {
        $cabg = CabangIdn::find($this->cabangId);
        if ($cabg){
            return $cabg->load('programPendidikan');
        }
        return false;
    }

    public function render()
    {
        return view('livewire.summary-kuota-cabang',[
            'cabang' => $this->getCabang()
        ]);
    }
}
