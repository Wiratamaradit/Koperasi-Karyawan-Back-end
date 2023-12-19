<?php

namespace App\Http\Controllers;

use App\Models\Pinjaman;
use App\Models\Anggota;
use Illuminate\Http\Request;

class PinjamanController extends Controller
{
    function addPinjaman(Request $request)
    {
        $pinjaman = new Pinjaman;
        $anggota = Anggota::find($request->input('anggotaId'));
        $pinjaman->kode = 'PJM - ' . $anggota->nik . ' -00 ' . Pinjaman::count() + 1;
        $pinjaman->anggotaId = $request->input('anggotaId');
        $pinjaman->tgl_pinjaman = $request->input('tgl_pinjaman');
        $pinjaman->pinjaman = $request->input('pinjaman');
        $pinjaman->bunga = $request->input('bunga');
        $pinjaman->tenor = $request->input('tenor');
        $pinjaman->jatuh_tempo = $request->input('jatuh_tempo');
        $pinjaman->deskripsi = $request->input('deskripsi');
        $pinjaman->angsuran = ($pinjaman->pinjaman / $pinjaman->tenor) + ($pinjaman->pinjaman * $pinjaman->bunga);
        $pinjaman->status = $request->input('status');
        $pinjaman->save();

        return response()->json(["message" => "Pinjaman berhasil ditambahkan"], 200);
    }

    function listPinjaman()
    {
        $pinjamans = Pinjaman::with('anggotas')->get();
        return response()->json(["message" => "Berhasil menampilkan data", "data" => $pinjamans], 200);
    }

    function updatePinjaman(Request $request, $id)
    {
        $pinjaman = Pinjaman::find($id);

        if (!$pinjaman) {
            return response()->json(["message" => "Pinjaman tidak ditemukan"], 404);
        }

        $pinjaman->update($request->all());

        return response()->json(["message" => "Pinjaman berhasil diperbarui"], 200);
    }

    function editPinjaman(Request $request, $id)
    {
        $pinjaman = Pinjaman::find($id);

        if (!$pinjaman) {
            return response()->json(["message" => "Pinjaman tidak ditemukan"], 404);
        }

        $pinjaman->update($request->all());

        return response()->json(["message" => "Pinjaman berhasil diperbarui"], 200);
    }

    function deletePinjaman(Request $request, $id)
    {
        $pinjaman = Pinjaman::find($id);

        if (!$pinjaman) {
            return response()->json(["message" => "Pinjaman tidak ditemukan"], 404);
        }

        $pinjaman->delete();

        return response()->json(["message" => "Pinjaman berhasil dihapus"], 200);
    }
}
