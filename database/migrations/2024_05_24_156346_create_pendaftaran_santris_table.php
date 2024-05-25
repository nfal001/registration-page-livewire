<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftaran_santris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->string('nama');
            $table->enum('jenis_kelamin',['Ikhwan','Akhwat']);
            $table->foreignId('cabang_idn_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('program_pendidikan')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('bukti_transfer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_santris');
    }
};
