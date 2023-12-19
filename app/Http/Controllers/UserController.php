<?php

namespace App\Http\Controllers;

use Faker\Provider\UserAgent;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function register(Request $request)
    {
        try {
            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->save();

            return ["success" => true, "message" => "Daftar akun berhasil!"];
        } catch (\Exception $e) {
            return ["success" => false, "message" => "Gagal mendaftar. Silakan coba lagi."];
        }
    }

    function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response(["message" => "Maaf, Email dan Password anda salah"], 400);
        }
        return $user;
    }

    function userList() 
    {
        $user = User::all();
        return response()->json(["message" => "Berhasil menampilkan data", "data" => $user], 200);
    }

    function userAdd(Request $request) 
    {
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->role = $request->input('role');
        $user->save();
    
        return response(["message" => "User berhasil ditambahkan", "data" => $request->input()], 200);
    }

    function userEdit($id) 
    {
        $user = User::find($id);
        return response(["message" => "Data", "data" => $user], 200);
    }

    function updateAnggota(Request $request, $id) 
    {
        $user = User::find($id);

        if (!$user) {
            return response(["message" => "User tidak ditemukan"], 404);
        }

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->role = $request->input('role');
        $user->save();
        
        return response(["message" => "User berhasil diupdate", "data" => $request->input()], 200);
    }

    function delete(Request $request, $id) 
    {
        $user = User::find($id);

        if (!$user) {
            return response(["message" => "User tidak ditemukan"], 404);
        }

        $user->delete();

        return response(["message" => "User berhasil dihapus"], 200);
    }
}
