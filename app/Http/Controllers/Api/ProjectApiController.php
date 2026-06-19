<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectApiController extends Controller
{
    // GET - Ambil semua project
    public function index()
    {
        $projects = Projects::all();
        return response()->json([
            'status' => 'success',
            'message' => 'Data projects berhasil diambil',
            'data' => $projects
        ], 200);
    }

    // GET - Ambil detail project
    public function show($id)
    {
        $project = Projects::find($id);
        if (!$project) {
            return response()->json([
                'status' => 'error',
                'message' => 'Project tidak ditemukan'
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Detail project berhasil diambil',
            'data' => $project
        ], 200);
    }

    // POST - Tambah project baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'teknologi' => 'required',
            'status' => 'required',
        ]);

        $project = Projects::create([
            'title' => $request->title,
            'description' => $request->description,
            'teknologi' => $request->teknologi,
            'image' => $request->image ?? null,
            'status' => $request->status,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Project berhasil ditambahkan',
            'data' => $project
        ], 201);
    }

    // PUT - Update project
    public function update(Request $request, $id)
    {
        $project = Projects::find($id);
        if (!$project) {
            return response()->json([
                'status' => 'error',
                'message' => 'Project tidak ditemukan'
            ], 404);
        }

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'teknologi' => 'required',
            'status' => 'required',
        ]);

        $project->update([
            'title' => $request->title,
            'description' => $request->description,
            'teknologi' => $request->teknologi,
            'image' => $request->image ?? $project->image,
            'status' => $request->status,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Project berhasil diupdate',
            'data' => $project
        ], 200);
    }

    // DELETE - Hapus project
    public function destroy($id)
    {
        $project = Projects::find($id);
        if (!$project) {
            return response()->json([
                'status' => 'error',
                'message' => 'Project tidak ditemukan'
            ], 404);
        }

        $project->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Project berhasil dihapus'
        ], 200);
    }
}