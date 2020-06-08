@component('mail::message')
# You got a special gift!

Hi {{$user->name}}! I have some gift for you!

@component('mail::button', ['url' => '#'])
Click to receive!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
