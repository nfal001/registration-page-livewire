<?php

namespace App\Livewire\Forms;

use App\Models\PendaftaranSantri;
use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class DaftarSantriIdnForm extends Form
{
    use WithFileUploads;

    #[Validate('required|email')]
    public $email = '';

    #[Validate('required|string|min:8')]
    public $password = '';

    #[Validate('required|string')]
    public $namaSantri = null;

    #[Validate('required|string')]
    public $jenisKelamin;

    #[Validate('required|integer')]
    public $cabangIdnId;

    #[Validate('required|integer')]
    public $programIdnId;

    #[Validate('required|image|max:1024')]
    public $buktiTransferImage;

    public function store()
    {
        // todo
        $this->validate();
        // dd($this->all());
        $filename = Str::uuid();
        $this->buktiTransferImage->storeAs('public/data-pendaftaran', $filename);
        $pendaftaran = new PendaftaranSantri(
            [
                'nama' => $this->namaSantri,
                'jenis_kelamin' => $this->jenisKelamin,
                'bukti_transfer' => $filename,
                'cabang_idn_id' => $this->cabangIdnId,
                'program_pendidikan' => $this->programIdnId
            ]
        );
        $newUser = User::create($this->only(['email', 'password']));
        $pendaftaran->user()->associate($newUser);
        $pendaftaran->save();
    }
}
