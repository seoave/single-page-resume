<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resume</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
@php /** @var App\DataObjects\Resume */ @endphp
<h1>Hello {{ $resume->basics->name }} {{$resume->basics->label}}</h1>

</body>
</html>
