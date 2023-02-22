<x-mail::message>
# Introduction
Hello {{ $data['name'] }}
Greetings! I hope this email finds you well. Your employee account was created at {{ config('app.name') }}.
Login Information
Email Address : {{ $email }}
Password : {{ $password }}

To log in to your account go to this URL: {{ $url }}
<x-mail::button :url="'{{ $url }}'">
Login your account
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
