<?php

namespace App\Livewire\Forms;

use App\Models\PendaftaranSantri;
use App\Models\ProgramPendidikan;
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
        $this->validate();

        // cases seatAvailable
        $prodikLimit = ProgramPendidikan::find($this->programIdnId)->limit_kuota;
        $totalPendaftar = PendaftaranSantri::where('cabang_idn_id', $this->cabangIdnId)->where('program_pendidikan', $this->programIdnId);
        $isSeatsAvailable = $prodikLimit - $totalPendaftar->count() >  0;
        // dd($this,$isSeatsAvailable,$totalPendaftar->count(),$prodikLimit);
        if ($isSeatsAvailable) {
            $filename = Str::uuid() . '.' . $this->buktiTransferImage->extension();
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
            try {
                $newUser = User::create([
                    'email' => $this->email,
                    'password' => bcrypt($this->password)
                ]);
            } catch (\Throwable $th) {
                session()->flash('error', 'Email Sudah Terdaftar, silakan login dengan akun anda');
                return;
            }
            $pendaftaran->user()->associate($newUser);
            $pendaftaran->save();
            session()->flash('daftar-santri-ok', 'Daftar Satri baru berhasil dilakukan');
        } else {
            session()->flash('error', 'KUOTA SUDAH PENUH, silakan pilih cabang lainn');
        }
    }
}
