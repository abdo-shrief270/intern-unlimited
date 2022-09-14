@component('mail::message')
# Introduction

There is new user has been registered whom name {{$user->name}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
