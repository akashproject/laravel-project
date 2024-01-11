@component('mail::message')

{{-- Dear {{ env('APP_NAME') }} Admin,<br>

There is a new message from <b>{{ $contactInfo['name'] }}</b><br>

Here are the details:<br>


<b>Name:</b> {{$contactInfo['name']}}<br> 
<b>Email:</b> {{$contactInfo['email']}}<br>
<b>Subject:</b> {{$contactInfo['subject']}}<br>
<b>Message:</b> {{$contactInfo['message']}}<br> --}}

{!! $template !!}


@endcomponent
