<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.46.1/dist/full.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.tiny.cloud/1/t3yr3j2qwq03mq0638f9ob1i3d97win8i57rt6ssmvj1p9ku/tinymce/6/content.min.css"
        rel="stylesheet">
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
        h2 {
            font-weight: bold;
            font-size: 40px;
        }

        .tox-tinymce {
            height: 400px;
            width: 90%;
            margin-left: 5px;
            margin-bottom: 5px;
            padding: 5px;
            border: 1px solid #928d8d;
        }

        ul {
            list-style-type: disc;
            margin: 0;
            padding: 0;
        }

        ul li::before {
            content: "\2022";
            color: black;
            font-weight: bold;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
        }
    </style>
    <x-head.tinymce-config />
    <script src="https://kit.fontawesome.com/ceb9fb7eba.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Epilogue:wght@500&family=Poppins&family=Rampart+One&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="images/apple-touch-icon-72x72.png" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body class="bg-base-200 flex min-h-screen flex-col">
    <!-- NavBar -->
    <div x-data="{ sidebarOpen: localStorage.getItem('sidebarOpen') === 'true' }" x-init="() => { sidebarOpen ? null : localStorage.setItem('sidebarOpen', false) }" class="flex h-screen overflow-x-hidden">
        <aside class="flex h-screen w-64 flex-shrink-0 flex-col border-r transition-all duration-300"
            :class="{ '-ml-64': !sidebarOpen }">
            <div class="flex h-32 flex-row items-center justify-center bg-slate-900 text-white">
                <div>
                    <img src="/images/vector.jpg" alt="">
                </div>
            </div>
            <nav class="flex h-full flex-col bg-yellow-300 p-2 text-black">
                <a href="/trainer" class="flex items-center p-5 hover:bg-gray-200">
                    <i class="fa-solid fa-house fa-xl mr-5"></i>
                    <span class="font-semibold">Dashboard</span>
                </a>
                <a href="/trainer/portfolio" class="flex items-center p-5 hover:bg-gray-200">
                    <i class="fa-sharp fa-solid fa-record-vinyl fa-xl mr-5"></i>
                    <span class="font-semibold">My Portfolio</span>
                </a>
                <a href="#" class="flex items-center p-5 hover:bg-gray-200">
                    <i class="fa-solid fa-calendar-check fa-xl mr-5"></i>
                    <span class="font-semibold">My Bookings</span>
                </a>
                <a href="/trainer/service/add" class="flex items-center p-5 hover:bg-gray-200">
                    <i class="fa-solid fa-bell-concierge fa-xl mr-5"></i>
                    <span class="font-semibold">My Service</span>
                </a>
                <a href="/profile" class="flex items-center p-5 hover:bg-gray-200" target="_blank">
                    <i class="fa-solid fa-user fa-xl mr-5"></i>
                    <span class="font-semibold">User Profile</span>
                </a>
            </nav>
        </aside>
        <div class="flex-1">
            <header class="flex items-center">
                <div class="navbar bg-white text-black shadow-lg">
                    <button class="mr-4 border-0 py-3"
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
                        {{-- <img style="aspect-ratio: 4/2; object-fit: contain; margin-left: 2px; margin-right: 4px;"
                            src="images/apple-touch-icon-76x76.png"><span class="text-md font-semibold tracking-wide"
                            style="font-family: 'Baby Panda', cursive;">PET PATROL</span> --}}
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
    {{-- <footer class="footer footer-center bg-base-300 text-base-content p-4 text-xs">
        <div>
            <p><i class="fa-solid fa-paw mr-8"></i>Copyright © 2023 - All right reserved by Pet Patrol<i
                    class="fa-solid fa-paw ml-8"></i></p>

        </div>
    </footer> --}}
    <x-toast />
</body>

</html>
