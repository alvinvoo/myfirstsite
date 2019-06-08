@component('mail::message')
# Introduction

<h1>
  {{ $project->title }}
</h1>

<p>
  {{ $project->description }}
</p>


Written by

<p>
  {{ $project->owner_id }}
</p>


@component('mail::button', ['url' => url('/projects/'.$project->id)])
View Project
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
