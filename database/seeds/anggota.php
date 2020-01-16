<?php

use Illuminate\Database\Seeder;

class anggota extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Anggota_model::insert([
        [
            'nama_anggota'=>'abel',
            'alamat'=>'jl jalan',
            'telp'=>'0812345678',
            'created_at'=> \Carbon\Carbon::now('Asia/Jakarta')
        ],
        [
            'nama_anggota'=>'athallah',
            'alamat'=>'jl jalan',
            'telp'=>'0812345678',
            'created_at'=> \Carbon\Carbon::now('Asia/Jakarta')
        ],
        [
            'nama_anggota'=>'wiyangga',
            'alamat'=>'jl jalan',
            'telp'=>'0812345678',
            'created_at'=> \Carbon\Carbon::now('Asia/Jakarta')
        ],
        [
            'nama_anggota'=>'atha',
            'alamat'=>'jl jalan',
            'telp'=>'0812345678',
            'created_at'=> \Carbon\Carbon::now('Asia/Jakarta')
        ],
        [
            'nama_anggota'=>'abelino',
            'alamat'=>'jl jalan',
            'telp'=>'0812345678',
            'created_at'=> \Carbon\Carbon::now('Asia/Jakarta')
        ]

    ]);
    }
}
