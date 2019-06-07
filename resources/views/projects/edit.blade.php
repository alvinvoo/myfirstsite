@extends('layout')

@section('title', 'Edit Project')

@section('content')
    <form method="POST" action="/projects/{{ $project->id }}">
      <!-- {{ csrf_field() }} -->
      <!-- {{ method_field('PATCH') }} -->
      @method('PATCH')
      @csrf
      <div>
        <input type="text" name="title" placeholder="Project Title" value="{{ $project->title }}">
      </div>

      <div>
        <textarea name="description" id="" cols="30" rows="10" placeholder="Project Description">{{ $project->description }}</textarea>
      </div>

      <div>
        <button type="submit">Update project</button>
        <!-- below works as well -->
        <!-- <button name="_method" value="PATCH">Update User</button>
        <button name="_method" value="DELETE">Delete User</button> -->
      </div>
    </form>

    <form method="POST" action="/projects/{{ $project->id }}">
      @method('DELETE')
      @csrf
      <div>
        <button type="submit">Delete project</button>
      </div>
    </form>

@endsection