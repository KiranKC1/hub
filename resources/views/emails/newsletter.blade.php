@component('mail::message')

{!! $content !!}

<br><br>
<p style="font-size: 14px; font-weight: 400; line-height: 20px; color: #777777;">
    If you didn't create an account using this email address, please ignore this email or <a href="{{route('unsubscribe',$subscriber->token)}}" target="_blank" style="color: #777777;">unsusbscribe</a>.
</p>
@endcomponent

