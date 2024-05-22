<?php

namespace App\Http\Controllers\Admin;

use App\Functions\Helper;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $projects = Project::all();

        return view('admin.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $exist = Project::where('title', $request->title)->first();

        if ($exist) {

            return redirect()->route('admin.projects.index')->with('error', 'Questo TITOLO esiste già!');
        }else{

            $new_project = new Project();

            $new_project->title = $request->title;
            $new_project->slug = Helper::makeSlug($new_project->title, Project::class);

            $new_project->save();

            return redirect()->route('admin.projects.index')->with('good', 'Il Progetto è stato aggiunto con successo');
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {

        $val_data = $request->validate([

            "title" => "required|min:4|max:100"

        ],

        [

            "title.required" => "Devi inserire il nome del progetto",
            "title.min" => "ci devono essere almeno :min caratteri",
            "title.max" => "ci sono più di :max caratteri"

        ]);

        $exist = Project::where('title', $request->title)->first();

        if ($exist) {

            return redirect()->route('admin.projects.index')->with('error', 'Questo TITOLO esiste già!');
        }else{


            $val_data['slug'] = Helper::makeSlug($request->title, Project::class);

            $project->update($val_data);

            return redirect()->route('admin.projects.index')->with('good', 'Il Progetto è stato aggiunto con successo');
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
