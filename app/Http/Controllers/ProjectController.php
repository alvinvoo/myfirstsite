<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    //
    public function __construct(){
        // middleware here applies to all REST endpoints below
        // so now can only access after authorized
        // but doesnt limit this user from accessing another user's project
        // $this->middleware('auth')->only(['create','update']);
        // $this->middleware('auth)->except(['show']);
        $this->middleware('auth');
    }

    public function index(){

        // auth helper functions
        // auth()->id()
        // auth()->user()
        // auth()->check()
        // auth()->guest()

        $projects = Project::where('owner_id', auth()->id())->get();
    
        return view('projects/index', compact('projects'));
    }
    
    public function show(Project $project){

        // abort_if($project->owner_id !== auth()->id(), 403);
        // abort_unless(auth()->user()->owns($project), 403); need to define owns for user model here
        // make use of policy
        $this->authorize('update', $project);
        // abort_unless(\Gate::allows('update', $project), 403);
        // abort_unless(auth()->user()->can('update', $project), 403);
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
        
        $attributes = request()->validate([
            'title' => 'required | min:3',
            'description' => ['required','min:3','max:100']
        ]);

        $attributes +=  [ 'owner_id' => auth()->id() ];

        Project::create($attributes);

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
