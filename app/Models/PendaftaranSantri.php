<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranSantri extends Model
{
    use HasFactory;

    protected $fillable = ['nama','jenis_kelamin','cabang_idn_id','program_pendidikan','bukti_transfer'];
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function cabangIdn() {
        return $this->belongsTo(CabangIdn::class);
    }
}
