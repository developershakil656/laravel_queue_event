@component('mail::message')
# Hello {{$data->name}},

{{'Thanks for register our application'}}

@component('mail::button', ['url' => 'http://127.0.0.1:8000'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
