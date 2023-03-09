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

        .dataTables_filter input,
        .dataTables_length select {
            padding: 50px;
        }
    </style>
    <x-head.tinymce-config />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://kit.fontawesome.com/ceb9fb7eba.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Round"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Climate+Crisis&display=swap" rel="stylesheet">
    <link href="//db.onlinewebfonts.com/c/a575313c6dc4fd00c1a9506e1c3ea4fc?family=Euclid+Circular+A" rel="stylesheet"
        type="text/css" />
    <link rel="icon" type="image/x-icon" href="images/apple-touch-icon-72x72.png" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</head>

<body class="flex min-h-screen flex-col">
    <!-- NavBar -->
    <div x-data="{ sidebarOpen: localStorage.getItem('sidebarOpen') === 'true' }"
        x-init="() => { sidebarOpen ? null : localStorage.setItem('sidebarOpen', false) }"
        class="flex h-screen overflow-x-hidden">
        <aside class="flex h-screen w-64 flex-shrink-0 flex-col border-r transition-all duration-300"
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
                <a href="/trainer" class="flex items-center w-full p-5 hover:bg-gray-200">
                    <span class="material-icons-outlined" style="font-size: 27px;">
                        donut_small
                    </span>
                    <span class="font-semibold ml-7">Dashboard</span>
                </a>
                <a href="/trainer/portfolio" class="flex items-center w-full p-5 hover:bg-gray-200">
                    <span class="material-icons-outlined" style="font-size: 27px;">
                        contact_page
                    </span>
                    <span class="font-semibold ml-7">Portfolio</span>
                </a>
                <a href="/trainer/service/add" class="flex items-center w-full p-5 hover:bg-gray-200">
                    <span class="material-icons-outlined" style="font-size: 27px;">
                        home_repair_service
                    </span>
                    <span class="font-semibold ml-7">Service</span>
                </a>
                <a href="/trainer/bookings" class="flex items-center w-full p-5 hover:bg-gray-200">
                    <span class="material-icons-outlined" style="font-size: 27px;">
                        event
                    </span>
                    <span class="font-semibold ml-7">Bookings</span>
                </a>
                <a href="/trainer/profile" class="flex items-center w-full p-5 hover:bg-gray-200">
                    <span class="material-icons-outlined md-36" style="font-size: 27px;">
                        person_outline
                    </span>
                    <span class="font-semibold ml-7">Profile</span>
                </a>
            </nav>
        </aside>
        <div class="flex-1">
            <header class="flex items-center">
                <div class="navbar bg-white text-black shadow-lg">
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
                        {{-- EMPTY --}}
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
                            class="dropdown-content menu bg-base-100 rounded-box w-52 p-2 text-black shadow">
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
                            class="dropdown-content menu bg-base-100 rounded-box w-52 p-2 text-black shadow">
                            <li><a href="">About us</a></li>
                            <li><a href="">Need Help?</a></li>
                            <li><a href="">Be a Pet Patroller</a></li>
                        </ul>
                    </div>

                    <div class="avatar dropdown dropdown-end text-black">
                        <div tabindex="0" class="avatar mx-4 h-11 w-11 rounded-full bg-white">
                            <img src="{{ auth()->user()->profile_photo ? asset('storage/' . auth()->user()->profile_photo) : asset('/images/placeholder.png') }}"
                                class="bg-base-300">
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

    <x-toast />
    <script type="text/javascript">
        $(document).ready(function () {
                $('#myTable').DataTable();
            });
    </script>
</body>

</html>