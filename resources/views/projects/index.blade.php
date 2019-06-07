@extends('layout')

@section('title', 'Project Page')

@section('content')
    <ul>
        @foreach($projects as $proj)
        <li>
            <a href="/projects/{{$proj->id}}">
            {{ $proj->title }}
            </a>
        </li>
        @endforeach
    </ul>
    <br>
    <a href="/projects/create">Create New Project</a>

@endsection