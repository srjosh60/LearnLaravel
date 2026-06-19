<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Projects::paginate(3);
        return view('pages.projects', compact('projects'));
    }

    public function show($id)
    {
        $project = Projects::findOrFail($id);
        return view('pages.projects-detail', compact('project'));
    }

    public function create()
    {
        return view('pages.projects-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'teknologi' => 'required',
            'status' => 'required',
        ]);

        Projects::create([
            'title' => $request->title,
            'description' => $request->description,
            'teknologi' => $request->teknologi,
            'image' => $request->image,
            'status' => $request->status,
        ]);

        return redirect()->route('projects')->with('success', 'Project berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $project = Projects::findOrFail($id);
        return view('pages.projects-edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'teknologi' => 'required',
            'status' => 'required',
        ]);

        $project = Projects::findOrFail($id);
        $project->update([
            'title' => $request->title,
            'description' => $request->description,
            'teknologi' => $request->teknologi,
            'image' => $request->image,
            'status' => $request->status,
        ]);

        return redirect()->route('projects')->with('success', 'Project berhasil diupdate!');
    }

    public function destroy($id)
    {
        $project = Projects::findOrFail($id);
        $project->delete();

        return redirect()->route('projects')->with('success', 'Project berhasil dihapus!');
    }
}