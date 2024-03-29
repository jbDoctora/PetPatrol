<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<style>
    .class-name {
        white-space: pre-wrap;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- DAISYUI -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.46.1/dist/full.css" rel="stylesheet" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <!-- FONTAWESOME -->
    <script src="https://kit.fontawesome.com/ceb9fb7eba.js" crossorigin="anonymous"></script>
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="//db.onlinewebfonts.com/c/a575313c6dc4fd00c1a9506e1c3ea4fc?family=Euclid+Circular+A" rel="stylesheet"
        type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- FAVICON -->
    <link rel="icon" type="image/x-icon" href="images/apple-touch-icon-72x72.png" />
    <!-- Tailwind Forms -->
    {{--
    <link href="https://unpkg.com/@tailwindcss/forms@0.2.1/dist/forms.min.css" rel="stylesheet"> --}}
    {{-- ALPINE JS --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/create-file-list"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body class="flex min-h-screen flex-col">

    <main>
        {{ $slot }}
    </main>

    <x-toast />
</body>


</html>