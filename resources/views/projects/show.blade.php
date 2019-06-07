@extends('layout')

@section('title', $project->title)

@section('content')
    <h1>{{$project->title}}</h1>
    <div>
      <textarea name="content" id="" cols="30" rows="10" disabled>
        {{$project->description}}
      </textarea>
      <a href="/projects/{{$project->id}}/edit">Edit</a>
    </div>

    @if ($project->tasks->count())
    <div class="box">
      @foreach ($project->tasks as $task)
        <form method="POST" action="/tasks/{{$task->id}}">
          @method('PATCH')
          @csrf
          <label class="checkbox {{ $task->completed ? 'is-completed' : '' }}" for="completed">
            <input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>{{$task->description}}
          </label>
        </form>
        @endforeach
      </div>
    @endif

    {{-- add a new task form --}}
    <form method="POST" action="/projects/{{ $project->id }}/task">
      @csrf
      <div class="box">
        <div class="field">
            <div class="control">
            <input class="input {{$errors->has('description') ? 'is-danger': 'is-primary'}}" type="text" name="description" placeholder="New Task">
            </div>
        </div>
        <button class="button is-link" type="submit">Add Task</button>
      </div>
      @include('error');
    </form>
@endsection