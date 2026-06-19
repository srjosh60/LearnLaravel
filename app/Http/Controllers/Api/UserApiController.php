<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DataUser;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function index()
    {
        $users = DataUser::all();
        return response()->json([
            'status' => 'success',
            'message' => 'Data users berhasil diambil',
            'data' => $users
        ], 200);
    }

    public function show($id)
    {
        $user = DataUser::find($id);
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User tidak ditemukan'
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Detail user berhasil diambil',
            'data' => $user
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:data_users',
            'no_hp' => 'required',
            'alamat' => 'required',
            'role' => 'required',
        ]);

        $user = DataUser::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'role' => $request->role,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'User berhasil ditambahkan',
            'data' => $user
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $user = DataUser::find($id);
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User tidak ditemukan'
            ], 404);
        }

        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:data_users,email,' . $id,
            'no_hp' => 'required',
            'alamat' => 'required',
            'role' => 'required',
        ]);

        $user->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'role' => $request->role,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'User berhasil diupdate',
            'data' => $user
        ], 200);
    }

    public function destroy($id)
    {
        $user = DataUser::find($id);
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User tidak ditemukan'
            ], 404);
        }

        $user->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'User berhasil dihapus'
        ], 200);
    }
}