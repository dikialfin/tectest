<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('tb_jabatan_pegawai')->insert([
            ['nama_jabatan' => 'UI/UX Designer'],
            ['nama_jabatan' => 'Front End Developer'],
            ['nama_jabatan' => 'Backend Developer'],
        ]);
        DB::table('tb_pegawai')->insert([
            [
                'id_jabatan' => 1,
                'nama_lengkap' => 'Asep Godeg',
                'alamat' => 'jl alamat no alamat sektor alamat kota alamat kecamatan alamat',
                'tempat_lahir' => 'ciamis',
                'tanggal_lahir' => '1990-01-12'
            ],
            [
                'id_jabatan' => 2,
                'nama_lengkap' => 'Asep Sanes',
                'alamat' => 'jl alamat no alamat sektor alamat kota alamat kecamatan alamat',
                'tempat_lahir' => 'bandung',
                'tanggal_lahir' => '1991-01-11'
            ],
            [
                'id_jabatan' => 3,
                'nama_lengkap' => 'Asep Hungkul',
                'alamat' => 'jl alamat no alamat sektor alamat kota alamat kecamatan alamat',
                'tempat_lahir' => 'majalengka',
                'tanggal_lahir' => '1992-02-12'
            ],
        ]);
    }
}
