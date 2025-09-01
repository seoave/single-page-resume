<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
<main class="mx-auto px-4 py-10 max-w-4xl">
    <header class="mb-12">
        {{ $header }}
    </header>

    {{ $slot }}
    <footer class="text-center py-6 text-gray-500 text-sm">
        <p>Last updated: {{date('F Y')}} </p>
    </footer>
</main>
</body>
</html>
