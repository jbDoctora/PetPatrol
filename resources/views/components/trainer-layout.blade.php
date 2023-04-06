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
        .tox-tinymce {
            height: 400px;
            width: 90%;
            margin-left: 5px;
            margin-bottom: 5px;
            padding: 5px;
            border: 1px solid #928d8d;
        }

        .dataTables_filter input {
            margin: 15px;
        }

        .dataTables_length select {
            margin: 15px;
        }

        .dataTables_wrapper {
            border: none;
        }

        table.dataTable thead th {
            border-bottom: none;
        }
    </style>
    <x-head.tinymce-config />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://kit.fontawesome.com/ceb9fb7eba.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Round"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Climate+Crisis&display=swap" rel="stylesheet">
    <link href="//db.onlinewebfonts.com/c/a575313c6dc4fd00c1a9506e1c3ea4fc?family=Euclid+Circular+A" rel="stylesheet"
        type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="images/apple-touch-icon-72x72.png" />
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

</head>

<body class="bg-slate-200 flex min-h-screen flex-col">
    <!-- NavBar -->
    <div x-data="{ sidebarOpen: localStorage.getItem('sidebarOpen') === 'true' }"
        x-init="() => { sidebarOpen ? null : localStorage.setItem('sidebarOpen', false) }"
        class="flex h-screen overflow-x-hidden">
        <aside class="flex h-screen w-64 flex-shrink-0 flex-col transition-all duration-300"
            :class="{ '-ml-64': !sidebarOpen }">
            <div class="flex h-28 flex-row items-center justify-center bg-blue-700 text-white border-r border-gray-300">

                <svg version="1.0" class="flex justify-between items-center" xmlns="http://www.w3.org/2000/svg"
                    width="44.000000pt" height="44.000000pt" viewBox="0 0 206.000000 196.000000"
                    preserveAspectRatio="xMidYMid meet">

                    <g transform="translate(0.000000,196.000000) scale(0.100000,-0.100000)" fill="white" stroke="none">
                        <path d="M482 1797 c-25 -8 -39 -21 -53 -53 -23 -48 -36 -54 -131 -54 -60 0
                                -69 -3 -87 -26 -25 -32 -28 -111 -6 -153 23 -46 103 -109 166 -132 33 -12 59
                                -27 59 -33 0 -6 -14 -58 -31 -116 -27 -93 -31 -120 -32 -240 0 -99 4 -151 16
                                -195 9 -33 24 -85 33 -115 17 -62 30 -206 21 -241 -4 -14 -24 -34 -46 -46 -25
                                -15 -46 -37 -60 -66 -25 -52 -27 -80 -5 -102 14 -14 33 -15 133 -9 64 3 124
                                10 133 15 9 5 19 21 22 36 3 16 19 102 36 193 74 391 123 577 174 665 17 27
                                34 45 45 45 47 0 182 -85 220 -139 l20 -28 -75 -74 c-116 -114 -188 -223 -236
                                -359 -15 -40 -22 -91 -25 -186 -7 -169 -12 -164 146 -164 224 0 391 12 408 29
                                13 13 15 35 10 142 -10 205 -49 364 -128 524 l-33 65 56 58 c35 35 67 80 83
                                117 15 35 50 86 88 126 34 37 81 89 104 115 l42 49 1 -36 c0 -33 3 -37 39 -48
                                38 -11 91 -60 91 -84 0 -7 9 -23 20 -37 11 -14 20 -34 20 -46 0 -26 -36 -60
                                -73 -69 -15 -4 -37 -19 -48 -34 -19 -24 -20 -34 -14 -146 l7 -120 -62 -124
                                c-47 -93 -63 -137 -67 -180 -9 -100 28 -183 86 -194 32 -7 56 -39 47 -63 -4
                                -11 -27 -14 -96 -14 -73 0 -90 -3 -90 -15 0 -12 18 -15 104 -15 118 0 132 7
                                122 64 -7 38 -29 61 -73 76 -76 27 -84 155 -18 280 71 136 76 147 84 198 4 27
                                4 82 -2 121 -7 60 -6 76 7 96 9 14 25 25 36 25 26 0 85 53 100 91 11 26 11 35
                                0 53 -7 11 -24 44 -38 71 -29 59 -57 92 -95 111 -24 13 -27 19 -21 49 8 45 -3
                                75 -28 75 -32 0 -118 -69 -153 -124 -18 -28 -56 -73 -85 -101 -51 -50 -90
                                -110 -90 -140 0 -20 -98 -125 -116 -125 -7 0 -38 25 -70 55 -59 57 -163 115
                                -206 115 -45 0 -95 -73 -137 -197 -53 -158 -112 -430 -132 -608 -18 -163 -12
                                -155 -118 -155 -49 0 -96 3 -105 6 -30 11 -17 47 35 97 l51 49 5 91 c5 80 2
                                108 -26 220 -40 164 -43 318 -10 443 53 196 58 218 50 233 -5 8 -32 20 -60 28
                                -63 16 -135 64 -162 106 -13 21 -19 46 -17 72 l3 40 80 5 c94 7 122 20 141 65
                                23 56 62 66 166 44 99 -22 167 -127 176 -276 5 -94 -2 -119 -41 -143 -38 -24
                                -68 -25 -107 -5 -70 36 -57 182 24 267 43 45 31 65 -17 28 -36 -29 -77 -118
                                -84 -181 -10 -102 37 -163 126 -163 58 1 106 25 128 67 37 68 9 271 -51 362
                                -52 79 -203 125 -304 92z m716 -929 c68 -140 104 -290 118 -490 5 -76 4 -101
                                -7 -114 -13 -15 -36 -16 -253 -10 -132 4 -243 9 -246 12 -10 11 0 164 15 231
                                20 87 71 191 133 273 55 73 166 180 187 180 7 0 31 -37 53 -82z" />
                    </g>
                </svg>

                <div class="flex flex-col">
                    <div class="text-xl font-black tracking-wide text-white text-center ml-3"
                        style="font-family: 'Jost', sans-serif;">
                        PETPATROL
                    </div>
                    <div class="text-xs text-white ml-3">Trainer</div>
                </div>

            </div>
            <nav
                class="flex flex-col items-center w-full h-full bg-blue-700 text-sm font-medium subpixel-antialiased border-r border-gray-300">
                <a href="/trainer" class="flex items-center w-full px-8 py-3 hover:bg-blue-900 text-white">
                    <span class="material-icons" style="font-size: 25px;">
                        donut_small
                    </span>
                    <span class=" ml-9">Dashboard</span>
                </a>
                {{-- <a href="/trainer/portfolio"
                    class="flex items-center w-full px-8 py-3 hover:bg-blue-900 hover:text-white">
                    <span class="material-icons" style="font-size: 25px;">
                        contact_page
                    </span>
                    <span class="ml-9">Portfolio</span>
                </a> --}}
                <a href="/trainer/service/add" class="flex items-center w-full px-8 py-3 hover:bg-blue-900 text-white">
                    <span class="material-icons" style="font-size: 25px;">
                        home_repair_service
                    </span>
                    <span class="ml-9">Service</span>
                </a>
                <a href="/trainer/bookings" class="flex items-center w-full px-8 py-3 hover:bg-blue-900 text-white">
                    <span class="material-icons" style="font-size: 25px">
                        bookmark
                    </span>
                    <span class="ml-9">Bookings</span>
                </a>
                <a href="#" class="flex items-center w-full px-8 py-3 hover:bg-blue-900 text-white">
                    <span class="material-icons md-36" style="font-size: 25px;">
                        assessment
                    </span>
                    <span class="ml-9">Report</span>
                </a>
                <a href="/settings" class="flex items-center w-full px-8 py-3 hover:bg-blue-900 text-white">
                    <span class="material-icons md-36" style="font-size: 25px;">
                        settings
                    </span>
                    <span class="ml-9">Settings</span>
                </a>

                <a class="flex items-center w-full px-8 py-4 text-xs text-white"></a>
                <div class="mx-1">
                    <a
                        class="flex items-center w-full px-24 py-6 md:py-3 text-xs text-white border-t-2 border-gray-400"></a>
                </div>
                <a class="flex items-center w-full px-8 py-3 text-xs text-yellow-400"></a>
                <a href="" class="flex items-center w-full px-8 py-3 text-white hover:bg-blue-900"><span
                        class="material-icons" style="font-size: 25px;">
                        lightbulb
                    </span>
                    <span class="ml-9">About us</span></a>
                <a href="" class="flex items-center w-full px-8 py-3 text-white hover:bg-blue-900"><span
                        class="material-icons" style="font-size: 25px;">
                        contact_support
                    </span>
                    <span class="ml-9">Need help?</span></a>
                <a href="" class="flex items-center w-full px-8 py-3 text-white hover:bg-blue-900"><span
                        class="material-icons" style="font-size: 25px;">
                        fitness_center
                    </span>
                    <span class="ml-9">Become a trainer</span></a>
            </nav>
        </aside>
        <div class="flex-1 overflow-x-scroll">
            <header class="flex items-center">
                <div class="navbar bg-white text-black shadow-lg pr-12">
                    <button class="mr-4 rounded-lg border-0 py-3 px-4"
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
                            <span
                                class="indicator-item badge border-0 bg-blue-700 text-white font-bold text-xs">1</span>
                            <button tabindex="0" class="hover:text-blue-400"><i
                                    class="fa-solid fa-bell fa-lg mr-1"></i></button>
                        </div>
                        <ul tabindex="0"
                            class="dropdown-content menu bg-base-100 rounded-box w-52 p-2 text-black shadow">
                            <li><a href="">--upcoming features--</a></li>
                            <li><a href="">--upcoming features--</a></li>
                        </ul>
                    </div>
                    {{-- <div class="dropdown dropdown-end mx-2">
                        <button tabindex="0" class="hover:text-blue-400"><i
                                class="fa-solid fa-circle-question fa-lg"></i></button>
                        <ul tabindex="0"
                            class="dropdown-content menu bg-base-100 rounded-box w-52 p-2 text-black shadow">
                            <li><a href="">About us</a></li>
                            <li><a href="">Need Help?</a></li>
                            <li><a href="">Be a Pet Patroller</a></li>
                        </ul>
                    </div> --}}

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