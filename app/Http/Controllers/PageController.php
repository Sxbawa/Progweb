<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;

class PageController extends Controller
{
    public function home(){
        return view('home',['key'=>'home']);
    }

    public function profile(){
        return view('profile',['key'=>'profile']);
    }

    public function mahasiswa(){
        $mhs = Mahasiswa::orderby('id','desc')->paginate(3);
        return view('mahasiswa',['key'=>'mahasiswa', 'mhs' =>$mhs]);
    }

    public function contact(){
        return view('contact',['key'=>'contact']);
    }

   
    public function tambah(){
        return view('formtambah',['key'=>'mahasiswa']);
    }

    public function simpan(Request $request){
        // $nim = $request->nim;
        // $nama = $request->nama;
        // $gender= $request->gender;
        // $prodi = $request->prodi;
        // $minat = $request->minat;
        $minat = implode(',',$request->get('minat'));
        Mahasiswa::create([
            'nim'=>$request->nim,
            'name'=>$request->name,
            'gender'=>$request->gender,
            'prodi'=>$request->prodi,
            'minat'=>$minat
        ]);
        return redirect('mahasiswa')->with('alert', 'Data Berhasil di Simpan');
    }

    public function formedit($id){
        $mhs = Mahasiswa::find($id);

        return view('formedit',['key'=>'mahasiswa','mhs'=>$mhs]);
    }
    public function update($id, Request $request){
    $minat = implode(',',$request->get('minat'));
    $mhs = Mahasiswa::find($id);
    $mhs->nim = $request->nim;
    $mhs->name = $request->name;
    $mhs->gender = $request->gender;
    $mhs->prodi = $request->prodi;
    $mhs->minat = $minat; 
    $mhs->save();

    return redirect('mahasiswa')->with('alert', 'Data Berhasil di ubah');
    }

    public function delete($id)
    {
        $mhs = Mahasiswa::find($id);
        $mhs ->delete();

        return redirect('mahasiswa')->with('alert', 'Data Berhasil di Hapus');
    }
    public function pencarian(Request $request){
        $cari = $request->search;
        $mhs = Mahasiswa::where('name', 'like', '%' . $cari . '%')->orwhere('nim', 'like', '%' . $cari . '%')->paginate(5);
        $mhs->appends($request -> all());
        return view('mahasiswa',['key'=> 'mahasiswa','mhs'=>$mhs]);
    }


    // public function edit($id)
    // {
    //     $mhs = Mahasiswa::find($id);
    //     return view('formedit', ['key'=> 'mahasiswa','mhs'=>$mhs]);

    // }

    // public function hapusmhs($id)
    // {
    //     $mhs = Mahasiswa::find($id);
    //     $mhs->delete();
    //     return redirect('mahasiswa')-> with('alert','Data berhasil di delete');
    // }

    // public function update($id, Request $request)
    // {
    //     $mhs = Mahasiswa::find($id);
    //     minat = implode(',',$request->get(('minat)'));
    //     $mhs->nim =$request->nim;
    //     $mhs->nama = $request->nama;
    //     $mhs->gender = $request->gender;
    //     $mhs->prodi = $request->prodi;
    //     $mhs->minat = $minat;
    //     $mhs->save();

    //     return redirect('/mahasiswa')->with('alert', 'Data Berhasil Di Update');
    // }

    // @if(session('alert'))
    // <div class = 'alert alert-succes mt-3'>
    //     {{ session('alert') }}
    // </div>
    // @endif@if(session('alert_update'))
    // <div class = 'alert alert-primary mt-3'>
    // {{ session('alert_update') }}
    // </div>
    // @if(session('alert_delete'))
    // <div class='alert alert-danger mt-3'>
    // {{ session('alert_hapus') }}
    // </div>
    // @endif

    
    // return redirect ('mahasiswa')-›with('alert', 'Data Berhasil Ditambahkan');
    // return redirect ('mahasiswa')-›with('alert_hapus', 'Data Berhasil Di Hapus');
    // return redirect ('/mahasiswa')-›with('alert_update', 'Data Berhasil Di Update');
    
    // <a class="btn btn-outline-danger" onclick="return confirm('Apakah yakin inging menghapus ?')" href="/mahasiswa/hapusmhs/{{ $data->id }}"><i class="bi bi-trash-fill"></i></i>Delete</a>
}
