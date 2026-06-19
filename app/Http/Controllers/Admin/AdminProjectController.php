<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminProjectController extends Controller
{
    public function index()
    {
        $projects = Projects::all();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'teknologi' => 'required',
            'status' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'public');
        }

        Projects::create([
            'title' => $request->title,
            'description' => $request->description,
            'teknologi' => $request->teknologi,
            'status' => $request->status,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Project added successfully!');
    }

    public function edit($id)
    {
        $project = Projects::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'teknologi' => 'required',
            'status' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $project = Projects::findOrFail($id);

        $imagePath = $project->image;
        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $imagePath = $request->file('image')->store('projects', 'public');
        }

        $project->update([
            'title' => $request->title,
            'description' => $request->description,
            'teknologi' => $request->teknologi,
            'status' => $request->status,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully!');
    }

    public function destroy($id)
    {
        $project = Projects::findOrFail($id);
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully!');
    }

    public function exportPdf()
    {
        $projects = Projects::all();
        $pdf = Pdf::loadView('admin.projects.pdf', compact('projects'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('data-projects.pdf');
    }
}