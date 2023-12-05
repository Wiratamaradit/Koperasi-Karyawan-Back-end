<?php

namespace App\Http\Controllers;

use App\Models\Pinjaman;
use Illuminate\Http\Request;

class PinjamanController extends Controller
{
    function addPinjaman(Request $request)
    {
        $pinjaman = new Pinjaman;
        $pinjaman->id_anggota = $request->input('id_anggota'); // Sesuaikan dengan nama field yang sesuai di formulir atau permintaan
        $pinjaman->no_pinjaman = $request->input('no_pinjaman');
        $pinjaman->tgl_pinjaman = $request->input('tgl_pinjaman');
        $pinjaman->pinjaman = $request->input('pinjaman');
        $pinjaman->bunga = $request->input('bunga');
        $pinjaman->tenor = $request->input('tenor');
        $pinjaman->jatuh_tempo = $request->input('jatuh_tempo');
        $pinjaman->deskripsi = $request->input('deskripsi');
        $pinjaman->status = $request->input('status');
        $pinjaman->save();

        return response()->json(["message" => "Pinjaman berhasil ditambahkan"]);
    }

    function listPinjaman()
    {
        return Pinjaman::all();
    }

    function updatePinjaman(Request $request, $id)
    {
        $pinjaman = Pinjaman::find($id);
        // Lakukan validasi jika diperlukan
        $pinjaman->no_pinjaman = $request->input('no_pinjaman');
        $pinjaman->tgl_pinjaman = $request->input('tgl_pinjaman');
        $pinjaman->pinjaman = $request->input('pinjaman');
        $pinjaman->bunga = $request->input('bunga');
        $pinjaman->tenor = $request->input('tenor');
        $pinjaman->jatuh_tempo = $request->input('jatuh_tempo');
        $pinjaman->deskripsi = $request->input('deskripsi');
        $pinjaman->status = $request->input('status');
        $pinjaman->save();

        return response()->json(["message" => "Pinjaman berhasil diperbarui"]);
    }

    function editPinjaman(Request $request, $id)
    {
        $pinjaman = Pinjaman::find($id);
        $pinjaman->update($request->all());

        return response()->json(["message" => "Pinjaman berhasil diperbarui"]);
    }

    function deletePinjaman(Request $request, $id)
    {
        Pinjaman::destroy($id);

        return response()->json(["message" => "Pinjaman berhasil dihapus"]);
    }
}
