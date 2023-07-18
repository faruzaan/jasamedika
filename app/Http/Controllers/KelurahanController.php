<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    public function index(){
        $data['result'] = \App\Models\Kelurahan::all();
        return view('kelurahan.index')->with($data);
    }
    public function Store(Request $request){
        $input = $request->all();
        $status = \App\Models\Kelurahan::create($input);

        if($status) return redirect('/kelurahan')->with('success','Data Berhasil Ditambahkan');
        else return redirect('/kelurahan')->with('error', 'Data Gagal Ditambahkan');
    }
    public function Update(Request $request){
        $input = $request->all();
        var_dump($input);
        $result = \App\Models\Kelurahan::where('id_kelurahan', $input["id_kelurahan"])->first();
        $status = $result->update($input);

        if($status) return redirect('/kelurahan')->with('success','Data Berhasil Diubah');
        else return redirect('/kelurahan')->with('error', 'Data Gagal Diubah');
    }
    public function Destroy(Request $request, $id){
        $result = \App\Models\Kelurahan::where('id_kelurahan', $id)->first();
        $status = $result->delete();

        if($status) return redirect('/kelurahan')->with('success','Data Berhasil Dihapus');
        else return redirect('/kelurahan')->with('error', 'Data Gagal Dihapus');
    }
}
