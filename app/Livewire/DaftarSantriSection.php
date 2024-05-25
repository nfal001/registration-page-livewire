<?php

namespace App\Livewire;
use App\Livewire\Forms\DaftarSantriIdnForm;
use App\Models\PendaftaranSantri;
use App\Models\ProgramPendidikan;
use Livewire\Component;
use Livewire\WithFileUploads;

class DaftarSantriSection extends Component
{
    use WithFileUploads;
    public DaftarSantriIdnForm $formDaftarSantri;


    public function daftarSantriSubmit() {
        // dd($this);
        
        $this->formDaftarSantri->store();

        return;
    }

    public function render()
    {

        // todo
        // draft quotachecker
        // if($this->formDaftarSantri->programIdnId){
        //     if(ProgramPendidikan::find($this->formDaftarSantri->programIdnId)->limit_kuota <= 0){
        //         session()->flash('max-quota','');
        //     }
        // }

        return view('livewire.daftar-santri-section');
    }
}
