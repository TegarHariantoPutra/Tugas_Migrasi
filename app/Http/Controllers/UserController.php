<?php

namespace App\Http\Controllers;

use App\User;
use App\User2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Petugas_model;
use Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'));
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_petugas' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telp' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'level' => 'required|string|max:255',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create([
            'nama_petugas' => $request->get('nama_petugas'),
            'alamat' => $request->get('alamat'),
            'telp' => $request->get('telp'),
            'username' => $request->get('username'),
            'password' => Hash::make($request->get('password')),
            'level' => $request->get('level'),
        ]);

        $token = JWTAuth::fromUser($user);

        $update = User::where('nama_petugas', $request->nama_petugas)->update([
            'nama_petugas' => $request->get('nama_petugas'),
            'alamat' => $request->get('alamat'),
            'telp' => $request->get('telp'),
            'username' => $request->get('username'),
            'password' => Hash::make($request->get('password')),
            'level' => $request->get('level'),
        ]);

        return response()->json(compact('user','token'),201);
    }

    public function update($id_petugas,Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'nama_petugas'=>'required',
            'alamat'=>'required',
            'telp'=>'required',
            'username'=>'required',
            'password'=>'required',
            'level'=>'required'
        ]);

        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $ubah=Petugas_model::where('id', $id_petugas)->update([
            'nama_petugas'=>$req->nama_petugas,
            'alamat'=>$req->alamat,
            'telp'=>$req->telp,
            'username'=>$req->username,
            'password'=>$req->password,
            'level'=>$req->level
        ]);
        if($ubah){
            return Response()->json(['status'=>1]);
        }else{
            return Response()->json(['status'=>0]);
        }
    }
    
    public function hapus($id_petugas)
    {
        $hapus=Petugas_model::where('id',$id_petugas)->delete();
        if($hapus){
            return Response()->json(['status'=>1]);
        }else{
            return Response()->json(['status'=>0]);
        }
    }

    public function tampil_petugas()
    {
        $data_petugas=Petugas_model::get();
        return Response()->json($data_petugas);
    }


    
    //////////////////////ANGGOTA

    public function register2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_anggota' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telp' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'level' => 'required|string|max:255',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User2::create([
            'nama_anggota' => $request->get('nama_anggota'),
            'alamat' => $request->get('alamat'),
            'telp' => $request->get('telp'),
            'username' => $request->get('username'),
            'password' => Hash::make($request->get('password')),
            'level' => $request->get('level'),
        ]);

        $token = JWTAuth::fromUser($user);

        $update = User2::where('nama_anggota', $request->nama_anggota)->update([
            'nama_anggota' => $request->get('nama_anggota'),
            'alamat' => $request->get('alamat'),
            'telp' => $request->get('telp'),
            'username' => $request->get('username'),
            'password' => Hash::make($request->get('password')),
            'level' => $request->get('level'),
        ]);

        return response()->json(compact('user','token'),201);
    }

    public function update2($id_anggota,Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'nama_anggota'=>'required',
            'alamat'=>'required',
            'telp'=>'required',
            'username'=>'required',
            'password'=>'required',
            'level'=>'required'
        ]);

        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $ubah=User2::where('id', $id_anggota)->update([
            'nama_anggota'=>$req->nama_anggota,
            'alamat'=>$req->alamat,
            'telp'=>$req->telp,
            'username'=>$req->username,
            'password'=>$req->password,
            'level'=>$req->level
        ]);
        if($ubah){
            return Response()->json(['status'=>1]);
        }else{
            return Response()->json(['status'=>0]);
        }
    }
    
    public function hapus2($id_anggota)
    {
        $hapus=User2::where('id',$id_anggota)->delete();
        if($hapus){
            return Response()->json(['status'=>1]);
        }else{
            return Response()->json(['status'=>0]);
        }
    }

    public function tampil_anggota()
    {
        $data_anggota=User2::get();
        return Response()->json($data_anggota);
    }
    
    public function getAuthenticatedUser()
    {
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }

        return response()->json(compact('user'));
    }
}
