<?php

namespace App\Livewire;
use App\Livewire\Forms\DaftarSantriIdnForm;
use App\Models\PendaftaranSantri;
use Livewire\Component;
use Livewire\WithFileUploads;

class DaftarSantriSection extends Component
{
    use WithFileUploads;
    public DaftarSantriIdnForm $formDaftarSantri;


    public function daftarSantriSubmit() {
        // dd($this);
        
        $this->formDaftarSantri->store();
        session()->flash('daftar-santri-ok','Daftar Satri baru berhasil dilakukan');
        return;
    }

    public function render()
    {
        return view('livewire.daftar-santri-section',['']);
    }
}
