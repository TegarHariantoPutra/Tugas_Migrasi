<?php

use Illuminate\Database\Seeder;

class petugas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Petugas_model::insert([
            [
                'nama_petugas'=>'Tegar',
                'alamat'=>'Jl Pelangi',
                'telp'=>'086316361',
                'username'=>'Tegar',
                'password'=>'1234',
                'created_at'=> \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_petugas'=>'Harianto',
                'alamat'=>'Jl Batu',
                'telp'=>'0823442113',
                'username'=>'Harianto',
                'password'=>'1234',
                'created_at'=> \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_petugas'=>'Putra',
                'alamat'=>'Jl kerikil',
                'telp'=>'0812321412',
                'username'=>'Putra',
                'password'=>'1234',
                'created_at'=> \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_petugas'=>'Budi',
                'alamat'=>'Jl Pohon',
                'telp'=>'0854641413',
                'username'=>'Budi',
                'password'=>'1234',
                'created_at'=> \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_petugas'=>'Putri',
                'alamat'=>'Jl Raya',
                'telp'=>'0342191316',
                'username'=>'Putri',
                'password'=>'1234',
                'created_at'=> \Carbon\Carbon::now('Asia/Jakarta')
            ]
        ]);
    }
}
