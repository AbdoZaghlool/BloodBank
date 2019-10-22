@component('mail::message')
# Introduction

welcome, your reset code is {{$code}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
