<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramPendidikan extends Model
{
    use HasFactory;

    public function cabangIdn() {
        return $this->belongsTo(CabangIdn::class);
    }
}
