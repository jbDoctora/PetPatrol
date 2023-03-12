<x-noNav>
    <div class="flex justify-end p-4">
        <form method="POST" action="/logout">
            @csrf
            <button type="submit"><i class="fa-solid fa-right-from-bracket mr-2"></i>Logout</button>
        </form>
    </div>
    <div class="flex min-h-screen flex-col justify-center bg-gray-100 py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <svg version="1.0" class="mx-auto font-bold" xmlns="http://www.w3.org/2000/svg" width="50.000000pt"
                height="50.000000pt" viewBox="0 0 206.000000 196.000000" preserveAspectRatio="xMidYMid meet">

                <g transform="translate(0.000000,196.000000) scale(0.100000,-0.100000)" fill="#344ceb" stroke="#000"
                    stroke-width="2">
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
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Verify Your Email Address
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
            <p class="text-center font-bold">Hi, {{ auth()->user()->name }}</p>
            {{-- {{ __('If you did not receive the email') }},
            <form class="inline" method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="font-medium text-indigo-600 hover:text-indigo-500">
                    {{ __('click here to request another') }}
                </button>.
            </form> --}}
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <div class="mb-4 text-sm text-gray-600">
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by
                    clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send
                    you another.') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                <div class="mb-4 text-center text-sm font-medium text-green-600">

                    {{ __('A new verification link has been sent to the email address you provided during
                    registration.') }}
                </div>
                @endif

                <div class="mt-4 flex items-center justify-center">

                    <form class="ml-3" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="font-medium text-blue-600 hover:text-blue-500">
                            {{ __('Resend Verification Email') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-noNav>