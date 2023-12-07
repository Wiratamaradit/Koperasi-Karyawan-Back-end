<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use Illuminate\Support\Facades\DB;

class AnggotaController extends Controller
{
    function list() 
    {
        return response(["message" => "Berhasil menampilkan data", "data" => Anggota::all()], 200);
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
    
        return response(["message" => "Anggota berhasil ditambahkan", "data" => $request->input()], 200);
    }

    function editAnggota($id) 
    {
        $anggota = Anggota::find($id);
        return response(["message" => "Data", "data" => $anggota], 200);
    }
    
    function updateAnggota(Request $request, $id) 
    {
        $anggota = Anggota::find($id);

        if (!$anggota) {
            return response(["message" => "Anggota tidak ditemukan"], 404);
        }

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
        
        return response(["message" => "Anggota berhasil diupdate", "data" => $request->input()], 200);
    }

    function delete(Request $request, $id) 
    {
        $anggota = Anggota::find($id);

        if (!$anggota) {
            return response(["message" => "Anggota tidak ditemukan"], 404);
        }

        $anggota->delete();

        return response(["message" => "Anggota berhasil dihapus"], 200);
    }
}
