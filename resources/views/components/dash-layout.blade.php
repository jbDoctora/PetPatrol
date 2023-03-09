<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <!-- Buttonizer -->
    <script type="text/javascript">
        (function(n,t,c,d){if (t.getElementById(d)){return;};var o=t.createElement("script");o.id=d;o.async=!0,o.src="https://cdn.buttonizer.io/embed.js",o.onload=function(){window.Buttonizer.init(c)},t.head.appendChild(o)})(window,document,"5b0db0ef-0d14-4350-9180-63ea88f9a988", "buttonizer_script");
    </script>
    <!-- End Buttonizer -->
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
                        'sans': ['Euclid Circular A', 'sans-serif'],
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
    </style>
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Round"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/ceb9fb7eba.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Climate+Crisis&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="images/apple-touch-icon-72x72.png" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="//db.onlinewebfonts.com/c/a575313c6dc4fd00c1a9506e1c3ea4fc?family=Euclid+Circular+A" rel="stylesheet"
        type="text/css" />
</head>

<body class="flex min-h-screen flex-col">

    <div x-data="{ sidebarOpen: localStorage.getItem('sidebarOpen') === 'true' }"
        x-init="() => { sidebarOpen ? null : localStorage.setItem('sidebarOpen', false) }"
        class="flex h-screen overflow-x-hidden">
        <aside class="flex h-full w-64 flex-shrink-0 flex-col border-r transition-all duration-300"
            :class="{ '-ml-64': !sidebarOpen }">
            <div
                class="flex h-32 flex-row items-center justify-center bg-yellow-400 text-white border-b-2 border-gray-400">
                <div>
                    {{-- <img src="/images/vector.jpg" class="h-full w-full rounded-lg" alt=""> --}}
                    <div class="bg-blue-600 px-4 py-3 rounded-lg border border-black">
                        <p style="font-family: 'Climate Crisis', cursive;" class="text-black">PET PATROL</p>
                    </div>
                </div>
            </div>
            <nav class="flex flex-col items-start w-full h-full bg-yellow-400 text-black">
                <a href="/owner" class="flex items-center w-full p-5 hover:bg-gray-200">
                    <span class="material-icons-outlined" style="font-size: 27px;">
                        donut_small
                    </span>
                    <span class="font-semibold ml-7">Dashboard</span>
                </a>

                <a href="/request" class="flex items-center w-full p-5 hover:bg-gray-200">
                    <span class="material-icons-outlined" style="font-size: 27px;">
                        build
                    </span>
                    <span class="font-semibold ml-7">Request</span>
                </a>

                <a href="/bookings" class="flex items-center w-full p-5 hover:bg-gray-200">
                    <span class="material-icons-outlined" style="font-size: 27px;">
                        event
                    </span>
                    <span class="font-semibold ml-7">Bookings</span>
                </a>

                <a href="/pet-info" class="flex items-center w-full p-5 hover:bg-gray-200">
                    <span class="material-icons-outlined" style="font-size: 27px;">
                        pets
                    </span>
                    <span class="font-semibold ml-7">Pet Profile</span>
                </a>

                <a href="/profile" class="flex items-center w-full p-5 hover:bg-gray-200">
                    <span class="material-icons-outlined md-36" style="font-size: 27px;">
                        person_outline
                    </span>
                    <span class="font-semibold ml-7">Profile</span>
                </a>
            </nav>
        </aside>
        <div class="flex-1">
            <header class="flex items-center">
                <div class="navbar bg-white shadow-lg">
                    <button class="bg-base-300 mr-4 rounded-lg border-0 py-3 px-4 hover:bg-yellow-300"
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

                    @auth
                    <div class="dropdown dropdown-end mx-2">
                        <div class="indicator">
                            <span class="indicator-item badge border-0 bg-yellow-400 text-black font-bold">1</span>
                            <button tabindex="0" class="hover:text-yellow-400"><span class="material-icons-outlined"
                                    style="font-size: 27px;">
                                    notifications
                                </span></button>
                        </div>
                        <ul tabindex="0"
                            class="dropdown-content menu bg-base-300 rounded-box w-52 p-2 text-black shadow">
                            <li><a href="">--upcoming features--</a></li>
                            <li><a href="">--upcoming features--</a></li>
                        </ul>
                    </div>
                    <div class="dropdown dropdown-end mx-2">
                        <button tabindex="0" class="hover:text-yellow-400"><span class="material-icons-outlined"
                                style="font-size: 27px;">
                                help_outline
                            </span></button>
                        <ul tabindex="0"
                            class="dropdown-content menu bg-base-300 rounded-box w-52 p-2 text-black shadow">
                            <li><a href="">About us</a></li>
                            <li><a href="">Need Help?</a></li>
                            <li><a href="">Be a Pet Patroller</a></li>
                        </ul>
                    </div>

                    <div class="avatar dropdown dropdown-end text-black">
                        <div tabindex="0" class="avatar mx-4 h-11 w-11 rounded-full bg-white">
                            <img
                                src="{{ auth()->user()->profile_photo ? asset('storage/' . auth()->user()->profile_photo) : asset('/images/placeholder.png') }}">
                            {{-- <img src="/images/placeholder.png" /> --}}
                        </div>
                        <ul tabindex="0" class="dropdown-content menu bg-base-300 rounded-box w-52 p-2 shadow">
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