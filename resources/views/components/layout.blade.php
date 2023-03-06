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
    <!-- TAILWINDCSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Euclid Circular A'],
                    },
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
    <!-- FONTAWESOME -->
    <script src="https://kit.fontawesome.com/ceb9fb7eba.js" crossorigin="anonymous"></script>
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="//db.onlinewebfonts.com/c/a575313c6dc4fd00c1a9506e1c3ea4fc?family=Euclid+Circular+A" rel="stylesheet"
        type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sniglet&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Epilogue:wght@500&family=Poppins&family=Rampart+One&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="images/apple-touch-icon-72x72.png" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="flex min-h-screen flex-col">

    <!-- NavBar -->
    <div class="navbar sticky top-0 z-50 bg-white text-black">
        <div class="flex-1 bg-fixed">
            {{-- e add ni if mawala ang logo mix-blend-mode: color-burn --}}
            <img style="aspect-ratio: 4/2; object-fit: contain; margin-left: 2px; margin-right: 4px;"
                src="images/apple-touch-icon-76x76.png"><span class="text-md font-semibold tracking-wide"
                style="font-family: 'Baby Panda', cursive;">PET PATROL</span>
        </div>

        <div class="navbar-start hidden px-5 lg:flex">
            <ul class="menu menu-horizontal px-5 text-sm font-bold">
                <li class="px-5">About Us</li>
                <li class="px-5">Need Help?</li>
                <a href="/register-trainer">
                    <li class="px-5">Be A Pet Patroller</li>
                </a>
            </ul>
        </div>

        @auth
        <div class="dropdown dropdown-end">
            <div class="indicator">
                <span class="indicator-item badge bg-yellow-400 outline-0 text-black font-bold">99+</span>
                <button tabindex="0" class="fa-solid fa-bell fa-xl m-4"></button>
            </div>
            <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box w-52 p-2 shadow">
                <li><a href="">--upcoming features--</a></li>
                <li><a href="">--upcoming features--</a></li>
            </ul>
        </div>

        <div class="avatar dropdown dropdown-end">
            <div tabindex="0" class="mr-4 ml-8 h-9 w-9 rounded-full ring-2 ring-yellow-400 ring-offset-2">
                <img src="/images/avatar/Avatar-9.png" />
            </div>
            <ul tabindex="0" class="dropdown-content menu rounded-box w-52 bg-base-200 p-2 shadow">
                <li><a>Profile</a></li>
                <li>
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="mr-3">
            <p class="font-bold">Hi, {{ auth()->user()->name }}</p>
        </div>
        @else
        <div class="flex gap-3">
            <button
                class="tracking-wide rounded-md px-5 py-4 bg-yellow-400 text-black text-sm font-bold border border-black hover:rounded-3xl"><a
                    href="/login"><span class="normal-case">Sign in</span></a></button>
            <button
                class="tracking-wide rounded-md px-5 py-4 bg-white text-black text-sm font-bold border border-black hover:rounded-3xl"><a
                    href="/register-owner"><span class="normal-case">Sign
                        up</span></a></button>
        </div>
        @endauth
    </div>

    <main>
        {{ $slot }}
    </main>
    <!-- FOOTER -->
    <footer class="footer bg-neutral text-neutral-content mt-auto p-10">
        <div>
            <span class="footer-title">Services</span>
            <a class="link link-hover">Branding</a>
            <a class="link link-hover">Design</a>
            <a class="link link-hover">Marketing</a>
            <a class="link link-hover">Advertisement</a>
        </div>
        <div>
            <span class="footer-title">Company</span>
            <a class="link link-hover">About us</a>
            <a class="link link-hover">Contact</a>
            <a class="link link-hover">Jobs</a>
            <a class="link link-hover">Press kit</a>
        </div>
        <div>
            <span class="footer-title">Legal</span>
            <a class="link link-hover">Terms of use</a>
            <a class="link link-hover">Privacy policy</a>
            <a class="link link-hover">Cookie policy</a>
        </div>
    </footer>
    <x-toast />
</body>

</html>