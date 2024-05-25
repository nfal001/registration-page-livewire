<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CabangIdn;
use App\Models\ProgramPendidikan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $jonggolIkhwan = CabangIdn::factory()->create(
            [
                'nama' => 'IDN Jonggol Ikhwan',
        ]);
        $jonggolAkhwat = CabangIdn::factory()->create(
            [
                'nama' => 'IDN Jonggol Akhwat',
        ]);
        $sentulIdn = CabangIdn::factory()->create(
            [
                'nama' => 'IDN Sentul',
            ],
    
        );

        $jonggolIkhwan->programPendidikan()->createMany([
            [
                'nama' => 'TKJ',
                'limit_kuota' => 2,
            ],
            [
                'nama' => 'RPL',
                'limit_kuota' => 2
            ],
            [
                'nama' => 'DKV',
                'limit_kuota' => 2
            ],
            [
                'nama' => 'SMP',
                'limit_kuota' => 2
            ],
        ]);

        $jonggolAkhwat->programPendidikan()->createMany([
            [
                'nama' => 'RPL',
                'limit_kuota' => 5
            ],
            [
                'nama' => 'DKV',
                'limit_kuota' => 5
            ],
            [
                'nama' => 'SMP',
                'limit_kuota' => 5
            ],
        ]);

        $sentulIdn->programPendidikan()->createMany([
            [
                'nama' => 'TKJ',
                'limit_kuota' => 3,
            ],
            [
                'nama' => 'RPL',
                'limit_kuota' => 3
            ],
            [
                'nama' => 'DKV',
                'limit_kuota' => 3
            ],
            [
                'nama' => 'SMP',
                'limit_kuota' => 3
            ],
        ]);
    }
}
