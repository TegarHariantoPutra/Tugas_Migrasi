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
            'nama_anggota'=>'Tegar',
            'alamat'=>'jl mawar',
            'telp'=>'0821041',
            'created_at'=> \Carbon\Carbon::now('Asia/Jakarta')
        ],
        [
            'nama_anggota'=>'Harianto',
            'alamat'=>'jl melati',
            'telp'=>'088410401',
            'created_at'=> \Carbon\Carbon::now('Asia/Jakarta')
        ],
        [
            'nama_anggota'=>'Putra',
            'alamat'=>'jl jalan',
            'telp'=>'0853251',
            'created_at'=> \Carbon\Carbon::now('Asia/Jakarta')
        ],
        [
            'nama_anggota'=>'Hari',
            'alamat'=>'jl in aja dulu',
            'telp'=>'082153',
            'created_at'=> \Carbon\Carbon::now('Asia/Jakarta')
        ],
        [
            'nama_anggota'=>'Anto',
            'alamat'=>'jl danau ranau',
            'telp'=>'084512315',
            'created_at'=> \Carbon\Carbon::now('Asia/Jakarta')
        ]

    ]);
    }
}
