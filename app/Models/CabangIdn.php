<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CabangIdn extends Model
{
    use HasFactory;

    public function programPendidikan() {
        return $this->hasMany(ProgramPendidikan::class);
    }
}
