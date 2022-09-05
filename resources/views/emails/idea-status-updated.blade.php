@component('mail::message')
# Introduction

The Idae : {{ $idea->title }}

has been updated to status of : 

{{ $idea ->status->name }}

@component('mail::button', ['url' => route('idea.show',$idea)])
View Idea
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
