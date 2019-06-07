@extends('layout')

@section('title', 'Create a New Project')

@section('content')
    <form method="POST" action="/projects">
      <!-- {{ csrf_field() }} -->
      @csrf
      <div class="field">
        <div class="control">
        <input 
        class="input {{$errors->has('title') ? 'is-danger': 'is-primary'}}"
        type="text"
        name="title"
        placeholder="Project Title"
        required
        value="{{ old('title') }}">
        </div>
      </div>

      <div class="field">
        <div class="control">
          <textarea 
          class="textarea {{$errors->has('description') ? 'is-danger': 'is-primary'}}" 
          name="description" 
          placeholder="Project Description"
          required>{{  old('description')  }}</textarea>
        </div>
      </div>

      <div>
        <button class="button" type="submit">Create project</button>
      </div>
      @include('error');
    </form>


@endsection