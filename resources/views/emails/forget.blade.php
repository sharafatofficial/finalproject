@component('mail::message')

<p> Hello {{ $user->name }}</p>

@component('mail::button', ['url' => url('reset/'.$user->remember_token)])
    Reset Your Password
@endcomponent

<p>In case of any issue please Contact Us.</p>

Thanks <br/>

{{ config('app.name') }}
    
@endcomponent 