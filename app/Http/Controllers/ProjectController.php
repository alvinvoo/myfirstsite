<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Events\ProjectCreated;

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
        // not readable enough?
        // $projects = Project::where('owner_id', auth()->id())->get();
        $projects = auth()->user()->projects;

        // dump($projects); // for telescope dump
        // cache()->rememberForever('alvin-key', function () {
        //     return ['my-number' => 133 ];
        // });
    
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
        
        $attributes = $this->validateProject();

        $project = auth()->user()->projects()->create($attributes);

        // send to Mail - use $project properties
        // now fired as a created hook
        // \Mail::to($project->owner->email)->queue( // why can this access as $project-owner?
        //     new ProjectCreated($project)
        // );

        // fire a custom ProjectCreated event
        event(new ProjectCreated($project));

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

        $project->update($this->validateProject());

        return redirect('projects');
    }

    public function destroy(Project $project){
        // Project::findOrFail($id)->delete();

        $project->delete();

        return redirect('projects');
    }

    public function validateProject(){
        return request()->validate([
            'title' => 'required | min:3',
            'description' => ['required','min:3','max:100']
        ]);
    }
}
