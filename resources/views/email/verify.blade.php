<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>

    <div>
        {{ __('mail.hello', ['name' => $name]) }}
        <br>
        {{ __('mail.bodOne') }}
        <br>
        {{ __('mail.bodSec') }}
        <br>

        <a href="{{ url('user/verify', $verification_code)}}">{{ __('mail.confirm') }}</a>

        <br/>
    </div>

</body>
</html>