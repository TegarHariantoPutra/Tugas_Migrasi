<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman_model extends Model
{
    protected $table="peminjaman";
    protected $primarykey="id";
    public $timestamps=false;

    protected $fillable = [
        'tgl_pinjam',
        'id_anggota',
        'id_petugas',
        'tgl_deadline'

    ];
}
