<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.46.1/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
    <style>
        .class-name {
            white-space: pre-wrap;
        }

        .navbar {
            height: 10px;
            margin: 0px;
        }

        ul {
            list-style-type: disc;
        }
    </style>
    <script src="https://kit.fontawesome.com/ceb9fb7eba.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Epilogue:wght@500&family=Poppins&family=Rampart+One&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="images/apple-touch-icon-72x72.png" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body class="bg-base-200 flex min-h-screen flex-col">

    <div x-data="{ sidebarOpen: localStorage.getItem('sidebarOpen') === 'true' }" x-init="() => { sidebarOpen ? null : localStorage.setItem('sidebarOpen', false) }" class="flex h-screen overflow-x-hidden">
        <aside class="flex h-screen w-64 flex-shrink-0 flex-col border-r transition-all duration-300"
            :class="{ '-ml-64': !sidebarOpen }">
            <div class="flex h-28 flex-row items-center justify-center bg-slate-900 text-white">
                <div>
                    <img src="/images/vector.jpg" class="h-full w-full" alt="">
                    {{-- <span class="font-bold">Hi, {{ auth()->user()->name }}</span> --}}
                </div>
                <div>
                    {{-- <span class="text-xl font-semibold tracking-wide" style="font-family: 'Baby Panda', cursive;">PET
                        PATROL</span> --}}
                </div>
            </div>
            <nav class="flex h-full flex-col bg-yellow-300 p-2 text-black">
                <a href="/owner" class="flex items-center p-5 hover:bg-gray-200"><i
                        class="fa-solid fa-house fa-lg mr-8"></i><span class="font-semibold">Dashboard</span></a>
                <a href="/request" class="flex items-center p-5 hover:bg-gray-200"><i
                        class="fa-solid fa-book fa-lg mr-8"></i><span class="font-semibold">My Request</span></a>
                <a href="/bookings" class="flex items-center p-5 hover:bg-gray-200"><i
                        class="fa-solid fa-calendar-check fa-lg mr-8"></i><span class="font-semibold">My
                        Bookings</span></a>
                <a href="/pet-info" class="flex items-center p-5 hover:bg-gray-200"><i
                        class="fa-solid fa-paw fa-lg mr-8"></i><span class="font-semibold">Pet Profile</span></a>
                <a href="/profile" class="flex items-center p-5 hover:bg-gray-200" target="_parent"><i
                        class="fa-solid fa-user fa-xl mr-8"></i><span class="font-semibold">User
                        Profile</span></a>
            </nav>
        </aside>
        <div class="flex-1">
            <header class="flex items-center">
                <div class="navbar bg-white shadow-lg">
                    <button class="btn mr-4 border-0 bg-blue-600 py-3 hover:bg-blue-700"
                        @click="sidebarOpen = !sidebarOpen; localStorage.setItem('sidebarOpen', sidebarOpen)"
                        style="transition: all 0.3s ease;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="h-6 w-6">
                            <path x-show="!sidebarOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path x-show="sidebarOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <div class="flex-1 bg-fixed">
                    </div>

                    {{-- <div class="navbar-start hidden lg:flex">
                        <ul class="menu menu-horizontal text-sm font-bold">
                            <li class="pr-3">About Us</li>
                            <li class="px-3">Need Help?</li>
                            <a href="/register-trainer">
                                <li class="pl-3">Be A Pet Patroller</li>
                            </a>
                        </ul>
                    </div> --}}

                    @auth
                        <div class="dropdown dropdown-end">
                            <div class="indicator">
                                <span class="indicator-item badge border-0 bg-blue-600">1</span>
                                <button tabindex="0" class="fa-solid fa-bell fa-lg m-3"></button>
                            </div>
                            <ul tabindex="0"
                                class="dropdown-content menu bg-base-100 rounded-box w-52 p-2 text-black shadow">
                                <li><a href="">--upcoming features--</a></li>
                                <li><a href="">--upcoming features--</a></li>
                            </ul>
                        </div>

                        <div class="avatar dropdown dropdown-end text-black">
                            <div tabindex="0" class="avatar mx-4 h-11 w-11 rounded-full bg-white">
                                <img
                                    src="{{ auth()->user()->profile_photo ? asset('storage/' . auth()->user()->profile_photo) : asset('/images/placeholder.png') }}">
                                {{-- <img src="/images/placeholder.png" /> --}}
                            </div>
                            <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box w-52 p-2 shadow">
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
                            {{-- <p class="text-xs font-bold">Hi, {{ auth()->user()->name }}</p> --}}
                        </div>
                    @else
                        <button class="btn btn-outline mx-1"><a href="/login"><span class="normal-case">Sign
                                    in</span></a></button>
                        <button class="btn btn-primary mx-2"><a href="/register-owner"><span class="normal-case">Sign
                                    up</span></a></button>

                    @endauth
                </div>
            </header>
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>
    {{-- FOOTER --}}
    {{-- <footer class="footer footer-center bg-base-300 text-base-content static p-4 text-xs">
        <div>
            <p><i class="fa-solid fa-paw mr-8"></i>Copyright © 2023 - All right reserved by Pet Patrol<i
                    class="fa-solid fa-paw ml-8"></i></p>

        </div>
    </footer> --}}
    <x-toast />
</body>

</html>
