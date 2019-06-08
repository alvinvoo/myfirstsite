<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProjectCreated;
use App\Events\ProjectUpdated;

class Project extends Model
{
    //
    protected $fillable = ['title','description','owner_id'];

    protected $dispatchesEvents = [
        'updated' => ProjectUpdated::class
    ];

    protected static function boot(){
        parent::boot();

        // static::created(function ($project){
        //     Mail::to($project->owner->email)->queue(
        //         new ProjectCreated($project)
        //     );
        // });
    }

    public function owner(){
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($task){
        // return $this->tasks()->create([
        //     'project_id'=> $this->id, // actually there's no need for this, as it can be mapped to this's id automatically
        //     'description' => $description
        // ]);

        return $this->tasks()->create($task);
    }
}
