<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    //

    public function index(){

        $projects = Project::all();
    
        return view('projects/index', compact('projects'));
    }
    
    public function show(Project $project){
        return view('projects/show', compact('project'));
    }

    public function create(){
        return view('projects/create');
    }

    public function store(){

        // $project = new Project;
        // $project->title = request('title');
        // $project->description = request('description');
        // $project->save();

        // Project::create([
        //     'title' => request('title'),
        //     'description' => request('description')
        // ]);

        // Project::create(request(['title', 'description']));

        Project::create(request()->validate([
            'title' => 'required | min:3',
            'description' => ['required','min:3','max:100']
        ]));

        return redirect('/projects');
    }

    public function edit(Project $project){
        return view('projects/edit', compact('project'));
    }

    public function update(Project $project){

        // $project = Project::findOrFail($id);
        // $project->title = request('title');
        // $project->description = request('description');
        // $project->save();

        $project->update(request(['title', 'description']));

        return redirect('projects');
    }

    public function destroy(Project $project){
        // Project::findOrFail($id)->delete();

        $project->delete();

        return redirect('projects');
    }
}
