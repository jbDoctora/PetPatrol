<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@700&display=swap" rel="stylesheet">
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
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;700&display=swap" rel="stylesheet">
    {{-- FULLCALENDAR CDN --}}
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.print.min.css' rel='stylesheet'
        media='print' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>
    @vite('resources/css/app.css')
    <style>
        .class-name {
            white-space: pre-wrap;
        }
    </style>
    <script>
        $(document).ready(function() {
        // Initialize the calendar
        $('#calendar').fullCalendar({
            events: {
                url: '{{ url('/events/owner') }}',
                type: 'GET',
                error: function() {
                    alert('There was an error while fetching events.');
                }
            },
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            defaultView: 'month',
            editable: false,
            eventLimit: true,
            navLinks: true,
            timezone: 'local',
            timeFormat: 'h:mm a',
        });
    });
    </script>

</head>

<body class="bg-gray-200 flex min-h-screen flex-col">
    {{-- CHATBOT --}}
    <div x-data="{ isOpen: false }">
        <div class="fixed right-0 bottom-0 m-1">
            <button @click="isOpen = true"
                class="bg-blue-700 text-white px-4 py-3 rounded-l-lg rounded-t-lg focus:outline-none text-lg"><i
                    class="fa-regular fa-life-ring pr-3"></i>Need
                Help</button>
        </div>

        <div x-show="isOpen"
            class="fixed right-0 bottom-0 h-screen w-screen bg-gray-900 bg-opacity-75 z-50 flex justify-center items-center">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div style="height:400px; width:400px">
                    <iframe src="https://ora.sh/embed/d64b5f6a-6d36-42c9-8777-4d40fab62bc5" width="100%" height="100%"
                        style="border:0; border-radius: 4px"></iframe>
                </div>
                <div class="flex justify-end">
                    <button @click="isOpen = false"
                        class="bg-blue-700 text-white px-4 py-2 rounded-lg mt-4 focus:outline-none hover:bg-blue-800">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div x-data="{ sidebarOpen: localStorage.getItem('sidebarOpen') === 'true' }"
        x-init="() => { sidebarOpen ? null : localStorage.setItem('sidebarOpen', false) }"
        class="flex h-screen overflow-x-hidden">
        {{-- ARI IBUTANG ANG ASIDE IF GANAHAN MABALIK TO --}}
        <div class="flex-1 overflow-x-scroll">
            <header class="flex items-center">
                <div class="navbar bg-blue-700 shadow-lg text-white px-12">
                    {{-- ARI E BUTANG ANG BUTTON --}}
                    <svg version="1.0" class="ml-3" xmlns="http://www.w3.org/2000/svg" width="40.000000pt"
                        height="35.000000pt" viewBox="0 0 206.000000 196.000000" preserveAspectRatio="xMidYMid meet">

                        <g transform="translate(0.000000,196.000000) scale(0.100000,-0.100000)" fill="white"
                            stroke="none">
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
                    <span class="text-xl font-bold tracking-wide text-white text-center ml-3"
                        style="font-family: 'Lora', serif;">PETPATROL</span>
                    <div class="flex-1 bg-fixed">

                    </div>

                    @auth
                    <div class="relative dropdown dropdown-end mx-2">
                        <div class="indicator">
                            <button tabindex="0" class="hover:text-yellow-400">
                                <i class="fa-solid fa-bell fa-lg"></i>
                                <span class="sr-only">Notifications</span>
                                @if(auth()->user()->notifications->count() > 0)
                                <span
                                    class="indicator-item badge bg-yellow-400 text-black font-bold text-xs rounded-full absolute -top-1 -right-1">
                                    {{ auth()->user()->notifications->count() }}
                                </span>
                                @endif
                            </button>
                        </div>
                        <ul tabindex="0" class="dropdown-content menu bg-white w-72">
                            <h6 class="text-base text-blue-700 bg-white p-2 border-b border-gray-300">Notification
                            </h6>
                            @forelse(auth()->user()->notifications as $notification)
                            <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <a href="/bookings">
                                    <li
                                        class="{{ $notification->read_at ? 'bg-white' : 'bg-blue-300 border-l-4 border-blue-700 rounded' }} rounded cursor-pointer border-b border-gray-300">
                                        <button type="submit"
                                            class="block px-4 py-4 text-xs hover:bg-gray-400 text-black text-left">
                                            {{ $notification->data['message']}}
                                        </button>
                                    </li>
                                </a>
                            </form>
                            @empty
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-200 text-black">Empty
                                    notification</a>
                            </li>
                            @endforelse

                            {{-- Mark All as Read --}}
                            @if (auth()->user()->unreadNotifications->count() > 0)
                            <form action="{{ route('notifications.markAllAsRead') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-center px-4 py-2 text-xs hover:bg-gray-200 bg-green-100 text-green-700">
                                    Mark All as Read
                                </button>
                            </form>
                            @endif
                        </ul>
                    </div>

                    <div class="dropdown dropdown-end mx-2">
                        <button tabindex="0" class="hover:text-yellow-400"><i
                                class="fa-solid fa-circle-question fa-lg"></i></button>
                        <ul tabindex="0"
                            class="dropdown-content menu bg-base-300 rounded w-52 text-black shadow text-sm">
                            <li><a href="">About us</a></li>
                            <li><a href="/help-center">Need Help?</a></li>
                            <li><a href="">Be a Pet Patroller</a></li>
                        </ul>
                    </div>

                    <div class="avatar dropdown dropdown-end text-black">
                        <div tabindex="0" class="avatar mx-4 h-11 w-11 rounded-full bg-white">
                            <img
                                src="{{ auth()->user()->profile_photo ? asset('storage/' . auth()->user()->profile_photo) : asset('/images/placeholder.png') }}">
                        </div>
                        <ul tabindex="0" class="dropdown-content menu rounded w-52 shadow bg-gray-200 text-sm">
                            <li><a href="/profile">Profile</a></li>
                            <li>
                                <form method="POST" action="/logout">
                                    @csrf
                                    <button type="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <div class="mr-3">
                    </div>
                    @else
                    <button class="btn btn-outline mx-1"><a href="/login"><span class="normal-case">Sign
                                in</span></a></button>
                    <button class="btn btn-primary mx-2"><a href="/register-owner"><span class="normal-case">Sign
                                up</span></a></button>

                    @endauth
                </div>
            </header>

            <nav class="bg-gray-100">
                <div class="max-w-8xl mx-auto px-3 sm:px-6 lg:px-3">
                    <div class="flex items-center justify-between h-11">
                        <nav class="flex items-center">
                            <div class="hidden md:block">
                                <div class="ml-10 flex items-baseline space-x-4">
                                    <a href="/owner"
                                        class="text-black hover:text-blue-700 px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>
                                    <a href="/pet-info"
                                        class="text-black hover:text-blue-700 px-3 py-2 rounded-md text-sm font-medium">Pet
                                        Profile</a>
                                    <a href="/request"
                                        class="text-black hover:text-blue-700 px-3 py-2 rounded-md text-sm font-medium">Request</a>
                                    <a href="/bookings"
                                        class="text-black hover:text-blue-700 px-3 py-2 rounded-md text-sm font-medium">Bookings</a>
                                </div>
                            </div>
                        </nav>
                        <div class="-mr-2 flex md:hidden">
                            <button type="button"
                                class="bg-gray-900 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                                aria-controls="mobile-menu" aria-expanded="false">
                                <span class="sr-only">Open main menu</span>
                                <!-- Heroicon name: menu -->
                                <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                                <!-- Heroicon name: x -->
                                <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="md:hidden" id="mobile-menu">
                    <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                        <a href="#"
                            class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Dashboard</a>
                        <a href="#"
                            class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Request</a>
                        <a href="#"
                            class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Bookings</a>
                        <a href="#"
                            class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Pet
                            Profiles</a>
                    </div>
                </div>
            </nav>

            <main>
                {{ $slot }}
            </main>
        </div>
    </div>

    <x-toast />
</body>

</html>