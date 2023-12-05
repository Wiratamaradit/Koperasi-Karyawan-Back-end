<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use Illuminate\Support\Facades\DB;

class AnggotaController extends Controller
{
    function list() 
    {
        return Anggota::all();
    }
    function addAnggota(Request $request) 
    {
        $anggota = new Anggota;
        $anggota->nik = $request->input('nik');
        $anggota->name = $request->input('name');
        $anggota->ttl = $request->input('ttl');
        $anggota->alamat = $request->input('alamat');
        $anggota->departemen = $request->input('departemen');
        $anggota->jabatan = $request->input('jabatan');
        $anggota->status_karyawan = $request->input('status_karyawan');
        $anggota->deskripsi = $request->input('deskripsi');
        $anggota->status = $request->input('status');
        $anggota->save();
    

        return $request->input();
    }
    function editAnggota($id) 
    {
        $anggota = Anggota::find($id);
        return $anggota;
    }
    
    function updateAnggota(Request $request, $id) 
    {
        $anggota = Anggota::find($id);
        // Logika untuk mengupdate anggota
        $anggota->nik = $request->input('nik');
        $anggota->name = $request->input('name');
        $anggota->ttl = $request->input('ttl');
        $anggota->alamat = $request->input('alamat');
        $anggota->departemen = $request->input('departemen');
        $anggota->jabatan = $request->input('jabatan');
        $anggota->status_karyawan = $request->input('status_karyawan');
        $anggota->deskripsi = $request->input('deskripsi');
        $anggota->status = $request->input('status');
        $anggota->save();
        
        return $request->input();
    }

    function delete(Request $request, $id) {
        DB::table('anggotas')->where('id_anggota',$id)->delete();
        if($request) {
            return ["result" => "Anggota berhasil di hapus"];
        }
    }
}
