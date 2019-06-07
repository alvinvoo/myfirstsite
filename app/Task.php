<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //

    protected $guarded=[];

    public function project(){
        return $this->belongsTo(Project::class);
    }

    // proper amount of abstration
    public function complete($completed = true){
        $this->update(compact('completed'));
    }

    public function incomplete(){
        $this->complete(false);
    }
}
