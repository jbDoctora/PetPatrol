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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
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

<body class="bg-base-300 flex min-h-screen flex-col">

    <div x-data="{ sidebarOpen: localStorage.getItem('sidebarOpen') === 'true' }"
        x-init="() => { sidebarOpen ? null : localStorage.setItem('sidebarOpen', false) }"
        class="flex h-screen overflow-x-hidden">
        <aside class="flex h-full w-64 flex-shrink-0 flex-col border-r transition-all duration-300"
            :class="{ '-ml-64': !sidebarOpen }">
            <div class="flex h-32 flex-row items-center justify-center bg-slate-900 text-white">
                <div>
                    {{-- <img src="/images/vector.jpg" class="h-full w-full rounded-lg" alt=""> --}}
                    {{-- <div class="bg-blue-600 px-4 py-3 rounded-lg border border-black">
                        <p style="font-family: 'Climate Crisis', cursive;" class="text-black">PET PATROL</p>
                    </div> --}}
                    <svg version="1.0" class="mx-auto" xmlns="http://www.w3.org/2000/svg" width="35.000000pt"
                        height="35.000000pt" viewBox="0 0 72.000000 72.000000" preserveAspectRatio="xMidYMid meet">

                        <g transform="translate(0.000000,72.000000) scale(0.100000,-0.100000)" fill="white"
                            stroke="none">
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
                    </svg><span class="text-lg font-semibold tracking-wide text-white text-center"
                        style="font-family: 'Climate Crisis', cursive;">PET
                        PATROL</span>
                </div>
            </div>
            <nav class="flex flex-col items-start w-full h-full bg-slate-900 text-white">
                <a href="/owner" class="flex items-center w-full p-5 hover:bg-gray-200 hover:text-black">
                    <span class="material-icons-outlined" style="font-size: 27px;">
                        donut_small
                    </span>
                    <span class="font-semibold ml-7">Dashboard</span>
                </a>

                <a href="/request" class="flex items-center w-full p-5 hover:bg-gray-200 hover:text-black">
                    <span class="material-icons-outlined" style="font-size: 27px;">
                        build
                    </span>
                    <span class="font-semibold ml-7">Request</span>
                </a>

                <a href="/bookings" class="flex items-center w-full p-5 hover:bg-gray-200 hover:text-black">
                    <span class="material-icons-outlined" style="font-size: 27px;">
                        event
                    </span>
                    <span class="font-semibold ml-7">Bookings</span>
                </a>

                <a href="/pet-info" class="flex items-center w-full p-5 hover:bg-gray-200 hover:text-black">
                    <span class="material-icons-outlined" style="font-size: 27px;">
                        pets
                    </span>
                    <span class="font-semibold ml-7">Pet Profile</span>
                </a>

                <a href="/profile" class="flex items-center w-full p-5 hover:bg-gray-200 hover:text-black">
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

    <x-toast />
</body>

</html>