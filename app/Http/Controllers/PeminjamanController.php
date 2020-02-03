<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Peminjaman_model;
use App\Detail_model;
use Auth;
class PeminjamanController extends Controller
{
    public function store(Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'id_anggota'=>'required',
            'id_petugas'=>'required',
            'tgl_pinjam'=>'required',
            'tgl_deadline'=>'required'
            // 'denda'=>'required'
           
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $simpan=Peminjaman_model::create([
            'id_anggota'=>$req->id_anggota,
            'id_petugas'=>$req->id_petugas,
            'tgl_pinjam'=>$req->tgl_pinjam,
            'tgl_deadline'=>$req->tgl_deadline
        ]);
        if($simpan){
            return Response()->json(['status'=>1]);
        }else{
            return Response()->json(['status'=>0]);
        }
    }
    public function update($id,Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'id_anggota'=>'required',
            'id_petugas'=>'required',
            'tgl_pinjam'=>'required',
            'tgl_deadline'=>'required'
        ]);

        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $ubah=Peminjaman_model::where('id', $id)->update([
            'id_anggota'=>$req->id_anggota,
            'id_petugas'=>$req->id_petugas,
            'tgl_pinjam'=>$req->tgl_pinjam,
            'tgl_deadline'=>$req->tgl_deadline
        ]);
        if($ubah){
            return Response()->json(['status'=>1]);
        }else{
            return Response()->json(['status'=>0]);
        }
    }
    
    public function hapus($id)
    {
        $hapus=Peminjaman_model::where('id',$id)->delete();
        if($hapus){
            return Response()->json(['status'=>1]);
        }else{
            return Response()->json(['status'=>0]);
        }
    }

    public function tampil_peminjaman($id)
    {
        $peminjaman=Peminjaman_model::get();
        $data_peminjaman=Peminjaman_model::join('anggota','anggota.id_anggota','peminjaman.id_anggota')->where('id_peminjaman',$id)->first();
        $arr_data=array();
        foreach ($data_peminjaman as $dt_peminjaman) {
            $ok=Detail_model::where('id',$dt_peminjaman->id)->get();
            $arr_detail=array();
            foreach ($ok as $yes) {
                $arr_detail[]=array(
                'id'=>$yes->id,
                'id_peminjaman'=>$yes->id_peminjaman,
                'id_buku'=>$yes->id_buku,
                'qty'=>$yes->qty

            );
        }
            $arr_data[]=array(
                'id_anggota'=>$dt_peminjaman->id_anggota,
                'nama_anggota'=>$dt_peminjaman->nama_anggota,
                'id_petugas'=>$dt_peminjaman->id_petugas,
                'tgl_pinjam'=>$dt_peminjaman->tgl_pinjam,
                'tgl_deadline'=>$dt_peminjaman->tgl_deadline,
                'detail_buku'=>$arr_detail

            );
            
        }
        return Response()->json($arr_data);
    }


    ///////////////////////DETAIL PEMIJANMAN
    public function store2(Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'id_peminjaman'=>'required',
            'id_buku'=>'required',
            'qty'=>'required'
            
           
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $simpan=Detail_model::create([
            'id_peminjaman'=>$req->id_peminjaman,
            'id_buku'=>$req->id_buku,
            'qty'=>$req->qty
        ]);
        if($simpan){
            return Response()->json(['status'=>1]);
        }else{
            return Response()->json(['status'=>0]);
        }
    }
    public function update2($id,Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'id_peminjaman'=>'required',
            'id_buku'=>'required',
            'qty'=>'required'
        ]);

        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $ubah=Detail_model::where('id', $id)->update([
            'id_peminjaman'=>$req->id_peminjaman,
            'id_buku'=>$req->id_buku,
            'qty'=>$req->qty
        ]);
        if($ubah){
            return Response()->json(['status'=>1]);
        }else{
            return Response()->json(['status'=>0]);
        }
    }
    
    public function hapus2($id)
    {
        $hapus=Detail_model::where('id',$id)->delete();
        if($hapus){
            return Response()->json(['status'=>1]);
        }else{
            return Response()->json(['status'=>0]);
        }
    }

}
