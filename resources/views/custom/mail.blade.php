@component('mail::message')
# Hi Friend!
Some one text you with content:
<br>
*{{$mailData->content}}*
<br>
Send from {{ config('app.name') }}
@endcomponent
