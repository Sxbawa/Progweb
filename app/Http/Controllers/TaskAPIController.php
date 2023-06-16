<?php

namespace App\Http\Controllers;
use App\Task;
use Illuminate\Http\Request;


class TaskAPIController extends Controller
{
    public function read(){
        $task = Task::all();
        return response()->json([
            'massage'=>'data berhasil ditampilkan',
            'data'=>$task
        ],200);
    }

    public function create(Request $request){
        $task = Task::create([
            'name'=>$request->name,
            'judul_task'=>$request->judul_task,
            'deskripsi_task'=>$request->deskripsi_task,
        ]);

        if($task){
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
        $task = Task::find($id)->update([
            'name'=>$request->name,
            'judul_task'=>$request->judul_task,
            'deskripsi_task'=>$request->deskripsi_task,
        ]);

        
        if($task){
            return response()->json([
                'success'=>true,
                'massage'=>'Data Berhasil di uabh'
            ],200);
        }else{
            return response()->json([
                'success'=>false,
                'massage'=>'Data Gagal di ubah'
            ],400);
        }
    }

    public function delete($id){
        $task = Task::find($id)->delete();

        if($task){
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
