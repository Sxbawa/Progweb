<?php

namespace App\Http\Controllers;
use App\Mahasiswa;
use Illuminate\Http\Request;

class MhsAPIController extends Controller
{
    public function read(){
        $mhs = Mahasiswa::all();
        return response()->json([
            'massage'=>'data berhasil ditampilkan',
            'data'=>$mhs
        ],200);
    }

    public function create(Request $request){
        $mhs = Mahasiswa::create([
            'nim'=>$request->nim,
            'nama'=>$request->nama,
            'gender'=>$request->gender,
            'prodi'=>$request->prodi,
            'minat'=>$request->minat,
        ]);

        if($mhs){
            return response()->json([
                'success'=>true,
                'massage'=>'Data Berhasil di Tambahkan'
            ],200);
        }else{
            return response()->json([
                'success'=>false,
                'massage'=>'Data Gagal di Tambahkan'
            ],400);
        }
    }

    public function update($id, Request $request){
        $mhs = mahasiswa::find($id)->update([
            'nim'=>$request->nim,
            'nama'=>$request->nama,
            'gender'=>$request->gender,
            'prodi'=>$request->prodi,
            'minat'=>$request->minat,
        ]);

        
        if($mhs){
            return response()->json([
                'success'=>true,
                'massage'=>'Data Berhasil di Tambahkan'
            ],200);
        }else{
            return response()->json([
                'success'=>false,
                'massage'=>'Data Gagal di Tambahkan'
            ],400);
        }
    }

    public function delete($id){
        $mhs = Mahasiswa::find($id)->delete();

        if($mhs){
            return response()->json([
                'success'=>true,
                'massage'=>'Data Berhasil di Hapus'
            ],200);
        }else{
            return response()->json([
                'success'=>false,
                'massage'=>'Data Gagal di Hapus'
            ],400);
        }
        
    }

    
}
