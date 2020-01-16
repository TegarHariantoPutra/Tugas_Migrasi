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
                'judul'=>'Ilmu Pengetahuan Sosial',
                'penerbit'=>'Erlagga',
                'pengarang'=>'Budi Setiawan',
                'foto'=>'-',
                'created_at'=> \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'judul'=>'Ilmu Dasar Matematika',
                'penerbit'=>'Erlangga',
                'pengarang'=>'Budi Setiawan',
                'foto'=>'-',
                'created_at'=> \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'judul'=>'Ronaldowati ',
                'penerbit'=>'Gagas Media',
                'pengarang'=>'Roy Marten',
                'foto'=>'-',
                'created_at'=> \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'judul'=>'Si Buta Dari Goa Hantu',
                'penerbit'=>'Gramedia',
                'pengarang'=>'Wawan Budianto',
                'foto'=>'-',
                'created_at'=> \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'judul'=>'Pendekar Cilik',
                'penerbit'=>'Mizan',
                'pengarang'=>'Budi Cahya',
                'foto'=>'-',
                'created_at'=> \Carbon\Carbon::now('Asia/Jakarta')
            ]
        ]);
    }
}
