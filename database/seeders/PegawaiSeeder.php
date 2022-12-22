<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pegawais')->insert([
            'nama' => 'Elisabeth Tiara',
            'tglLahir' => '2022-03-13',
            'jenisKelamin' => 'Perempuan',
            'alamat' => 'jln.sukasuka',
            'pekerjaan' => 'bidan',
            'nohp' => '081326218471',
            'email' => 'elisabethtiarad@gmail',
            'foto' => 'img/eli.jpeg'
        ]);
    }
}