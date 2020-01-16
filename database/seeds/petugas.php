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
                'nama_petugas'=>'Abel',
                'alamat'=>'Jl Mangga',
                'telp'=>'089765433',
                'username'=>'Abelino',
                'password'=>'123',
                'created_at'=> \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_petugas'=>'Atha',
                'alamat'=>'Jl Apel',
                'telp'=>'082341567',
                'username'=>'Athallah',
                'password'=>'123',
                'created_at'=> \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_petugas'=>'Fynas ',
                'alamat'=>'Jl Blimbing',
                'telp'=>'081234567',
                'username'=>'Malfynas',
                'password'=>'123',
                'created_at'=> \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_petugas'=>'Tegar',
                'alamat'=>'Jl Jeruk',
                'telp'=>'085463289',
                'username'=>'Harianto',
                'password'=>'123',
                'created_at'=> \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_petugas'=>'Rafi',
                'alamat'=>'Jl Salak',
                'telp'=>'034219876',
                'username'=>'Raihan',
                'password'=>'123',
                'created_at'=> \Carbon\Carbon::now('Asia/Jakarta')
            ]
        ]);
    }
}
