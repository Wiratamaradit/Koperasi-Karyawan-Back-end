<?php

namespace App\Http\Controllers;

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
}
