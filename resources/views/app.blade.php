<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
{{--    @if (auth()->user())--}}
{{--        <meta name="user_id" content="{{ auth()->user()->id}}" />--}}
{{--        <meta name="user_role_id" content="{{ auth()->user()->role_id}}" />--}}

{{--    @endif--}}
    <title>Vue-Laravel app</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ mix('css/app.css')}}" type="text/css">

</head>
<body>
<div id="app"></div>
<script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</body>
</html>
