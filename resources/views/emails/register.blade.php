@component('mail::message')

<p> Hello {{ $user->name }}</p>

@component('mail::button', ['url' => url('verify/'.$user->remember_token)])
    Verify your Email
@endcomponent

<p>In case of any issue contact us by Contact Page</p>

Thanks <br/>

{{ config('app.name') }}
    
@endcomponent