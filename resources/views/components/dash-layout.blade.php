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
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.46.1/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Roboto', 'sans-serif'],
                    },
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
    <script src="https://kit.fontawesome.com/ceb9fb7eba.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="images/apple-touch-icon-72x72.png" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body class="flex min-h-screen flex-col">

    <!-- NavBar -->
    <div x-data="{ sidebarOpen: localStorage.getItem('sidebarOpen') === 'true' }" x-init="() => { sidebarOpen ? null : localStorage.setItem('sidebarOpen', false) }" class="flex h-screen overflow-x-hidden">
        <aside class="flex h-screen w-64 flex-shrink-0 flex-col border-r transition-all duration-300"
            :class="{ '-ml-64': !sidebarOpen }">
            <div class="h-56 bg-gray-900"></div>
            <nav class="flex flex-1 flex-col bg-white">
                <a href="/owner" class="m-7"><i class="fa-solid fa-house mr-5"></i>Dashboard</a>
                <a href="/request" class="m-7"><i class="fa-solid fa-book fa-xl mr-5"></i>My Request</a>
                <a href="/bookings" class="m-7"><i class="fa-solid fa-calendar-check mr-5"></i>My Bookings</a>
                <a href="/pet-info" class="m-7"><i class="fa-solid fa-paw fa-xl mr-5"></i>Pet Profile</a>
                <a href="/profile" class="m-7" target="_parent"><i class="fa-solid fa-user fa-xl mr-5"></i>User
                    Profile</a>
            </nav>
        </aside>
        <div class="flex-1">
            <header class="flex items-center">
                <div class="navbar">
                    <button class="mr-4 p-1"
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
                                <span class="indicator-item badge badge-primary">99+</span>
                                <button tabindex="0" class="fa-solid fa-bell fa-xl m-4"></button>
                            </div>
                            <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box w-52 p-2 shadow">
                                <li><a href="">--upcoming features--</a></li>
                                <li><a href="">--upcoming features--</a></li>
                            </ul>
                        </div>

                        <div class="avatar dropdown dropdown-end">
                            <div tabindex="0"
                                class="ring-primary ring-offset-base-100 mr-4 ml-8 h-9 w-9 rounded-full ring ring-offset-2">
                                <img src="/images/avatar/Avatar-9.png" />
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
                            <p class="font-bold">Hi, {{ auth()->user()->name }}</p>
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
    <footer class="footer footer-center bg-base-300 text-base-content p-4 text-xs">
        <div>
            <p><i class="fa-solid fa-paw mr-8"></i>Copyright © 2023 - All right reserved by Pet Patrol<i
                    class="fa-solid fa-paw ml-8"></i></p>

        </div>
    </footer>
    <x-toast />
</body>

</html>
