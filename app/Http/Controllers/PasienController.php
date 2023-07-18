<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index(){
        $data['result'] = \App\Models\Pasien::all();
        return view('pasien.index')->with($data);
    }
    public function Store(Request $request){
        $input = $request->all();
        $totaldata = \App\Models\Pasien::all()->count();
        $input['id_pasien'] = date('Y').date('m').$totaldata;
        $status = \App\Models\Pasien::create($input);


        if($status) return redirect('/pasien')->with('success','Data Berhasil Ditambahkan');
        else return redirect('/pasien')->with('error', 'Data Gagal Ditambahkan');
    }
    public function Update(Request $request){
        $input = $request->all();
        var_dump($input);
        $result = \App\Models\Pasien::where('id_pasien', $input["id_pasien"])->first();
        $status = $result->update($input);

        if($status) return redirect('/pasien')->with('success','Data Berhasil Diubah');
        else return redirect('/pasien')->with('error', 'Data Gagal Diubah');
    }
    public function Destroy(Request $request, $id){
        $result = \App\Models\Pasien::where('id_pasien', $id)->first();
        $status = $result->delete();

        if($status) return redirect('/pasien')->with('success','Data Berhasil Dihapus');
        else return redirect('/pasien')->with('error', 'Data Gagal Dihapus');
    }
}
