<?php

use Illuminate\Database\Seeder;

class buku extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Buku_model::insert([
            [
                'judul'=>'Matematika',
                'penerbit'=>'Erlangga',
                'pengarang'=>'Bambang Mulyanto',
                'foto'=>'-',
                'created_at'=> \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'judul'=>'Ilmu Pengetahuan Alam',
                'penerbit'=>'Erlangga',
                'pengarang'=>'Mulyadi',
                'foto'=>'-',
                'created_at'=> \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'judul'=>'Bujang Lapuk',
                'penerbit'=>'Media Hits',
                'pengarang'=>'Harianto Putra',
                'foto'=>'-',
                'created_at'=> \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'judul'=>'Bandung Lautan Api',
                'penerbit'=>'Media Intertainment',
                'pengarang'=>'Joko Sabuanto',
                'foto'=>'-',
                'created_at'=> \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'judul'=>'Pertempuran Ambarawa',
                'penerbit'=>'Dopung',
                'pengarang'=>'Budi Santoso',
                'foto'=>'-',
                'created_at'=> \Carbon\Carbon::now('Asia/Jakarta')
            ]
        ]);
    }
}
