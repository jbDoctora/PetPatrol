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
    <link href="//db.onlinewebfonts.com/c/a575313c6dc4fd00c1a9506e1c3ea4fc?family=Euclid+Circular+A" rel="stylesheet"
        type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Climate+Crisis&display=swap" rel="stylesheet">
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
            {{-- <img style="aspect-ratio: 4/2; object-fit: contain; margin-left: 2px; margin-right: 4px;"
                src="images/apple-touch-icon-76x76.png"><span class="text-md font-semibold tracking-wide"
                style="font-family: 'Climate Crisis', cursive;">PET PATROL</span> --}}
            <svg version="1.0" class="mx-3" xmlns="http://www.w3.org/2000/svg" width="35.000000pt" height="35.000000pt"
                viewBox="0 0 72.000000 72.000000" preserveAspectRatio="xMidYMid meet">

                <g transform="translate(0.000000,72.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                    <path d="M262 673 c-19 -14 -26 -14 -48 -3 -27 15 -38 9 -48 -27 -10 -33 43
                -88 99 -102 46 -11 75 -46 75 -89 0 -35 -31 -108 -61 -145 -24 -29 -37 -37
                -64 -37 -19 0 -37 5 -40 10 -3 6 -11 10 -18 10 -6 0 2 -14 20 -31 25 -25 39
                -32 72 -32 39 0 43 -3 57 -36 28 -68 98 -117 129 -91 25 20 17 38 -25 60 -56
                28 -75 62 -74 130 1 79 43 150 89 150 33 0 72 36 95 86 19 44 40 52 40 14 0
                -10 10 -36 23 -59 18 -31 26 -38 35 -29 20 20 14 -13 -11 -56 -30 -53 -49 -64
                -88 -49 -18 7 -36 10 -40 7 -5 -3 -11 -27 -15 -54 -7 -53 -10 -55 -63 -40 -33
                9 -33 9 -15 -11 74 -82 218 -74 274 15 36 59 29 162 -18 249 -47 88 -118 109
                -267 81 -52 -10 -97 -15 -101 -12 -3 4 4 20 16 36 36 49 17 86 -28 55z" />
                    <path d="M72 517 c-29 -31 -42 -78 -42 -155 0 -71 12 -102 39 -102 38 0 44 24
                30 110 -9 58 -10 92 -2 125 12 51 6 55 -25 22z" />
                    <path d="M210 505 c-7 -9 -11 -17 -9 -20 3 -2 10 5 17 15 14 24 10 26 -8 5z" />
                    <path d="M145 429 c-11 -17 1 -21 15 -4 8 9 8 15 2 15 -6 0 -14 -5 -17 -11z" />
                    <path d="M245 399 c-4 -11 -4 -23 -2 -26 9 -8 24 5 30 27 7 27 -20 27 -28 -1z" />
                    <path d="M530 390 c0 -5 5 -10 11 -10 5 0 7 5 4 10 -3 6 -8 10 -11 10 -2 0 -4
                -4 -4 -10z" />
                </g>
            </svg><span class="text-md font-semibold tracking-wide" style="font-family: 'Climate Crisis', cursive;">PET
                PATROL</span>
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
                class="tracking-wide rounded-md px-5 py-4 bg-yellow-400 text-black text-sm font-bold border border-black hover:rounded-3xl transition-all duration-400"><a
                    href="/login"><span class="normal-case">Sign in</span></a></button>
            <button
                class="tracking-wide rounded-md px-5 py-4 bg-white text-black text-sm font-bold border border-black hover:rounded-3xl transition-all duration-400"><a
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