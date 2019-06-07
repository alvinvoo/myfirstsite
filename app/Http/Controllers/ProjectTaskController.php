<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;

class ProjectTaskController extends Controller {

  public function create(Project $project){

    // explicit creation accessing db/model variables straight
    // not so elegant
    // Task::create([
    //   'project_id' => $project->id,
    //   'description' => request('description')
    // ]);

    // $project->addTask(request('description'));
    // logic encapsulation
    $project->addTask(
      request()->validate([
        'description'=>'required'
      ]) // this returns an array of [ 'description' => $description ]
    );

    return back();
  }

  public function update(Task $task){
    
    // $task->update([
    //   'completed' => request()->has('completed')
    // ]);

    request()->has('completed') ? $task->complete() : $task->incomplete();

    return back();
  }
}