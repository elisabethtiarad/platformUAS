<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pasiens')->insert([
            'nama' => 'Elisabeth Tiara',
            'tglLahir' => '2022-03-13',
            'jenisKelamin' => 'Perempuan',
            'alamat' => 'jln.sukasuka',
            'keluhan' => 'Sakit Perut',
            'riwayatPenyakit' => 'Tidak ada',
            'nohp' => '081326218471'
        ]);
    }
}