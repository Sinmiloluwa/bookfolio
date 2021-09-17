@component('mail::message')
{{ $mailData['title'] }}

The body of your message.

@component('mail::button', ['url' => $mailData['url']])
Verify Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
