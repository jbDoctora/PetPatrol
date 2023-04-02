<x-noNav>
    <section class="bg-inherit">
        <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
            <aside class="relative block h-16 lg:order-last lg:col-span-5 lg:h-full xl:col-span-6">
                <img alt="Pattern" src="/images/8271009_5503.jpg" class="absolute inset-0 h-full w-full object-cover" />
            </aside>

            <main aria-label="Main"
                class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:py-12 lg:px-16 xl:col-span-6">
                <div class="max-w-xl lg:max-w-3xl">

                    <div class="mb-4 flex flex-col justify-center">
                        <svg version="1.0" class="mx-auto" xmlns="http://www.w3.org/2000/svg" width="68.000000pt"
                            height="68.000000pt" viewBox="0 0 206.000000 196.000000"
                            preserveAspectRatio="xMidYMid meet">

                            <g transform="translate(0.000000,196.000000) scale(0.100000,-0.100000)" fill="#1d4fd8"
                                stroke="#000" stroke-width="3">
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
                    </div>

                    <h1 class="mt-6 text-2xl font-bold text-blue-700 sm:text-3xl md:text-4xl">
                        Sign in
                    </h1>

                    <form method="POST" action="/users/authenticate" class="mt-8 grid grid-cols-2 gap-6">
                        @csrf
                        <div class="col-span-6">
                            <label for="email" class="mb-5 block text-sm text-gray-700">
                                Email
                            </label>

                            <input type="email" name="email" value="{{ old('email') }}"
                                class="input input-bordered w-full" />
                            @error('email')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-6">
                            <label for="password" class="mb-5 block text-sm text-gray-700">
                                Password
                            </label>

                            <input type="password" name="password" value="{{ old('password') }}"
                                class="input input-bordered w-full" />
                            @error('password')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:flex sm:items-center sm:gap-4">
                            <button type="submit" {{-- class="btn btn-primary" --}}
                                class="bg-blue-700 px-6 py-3 text-white font-bold rounded text-sm hover:bg-blue-900">
                                Login
                            </button>

                            <p class="mt-4 text-sm text-gray-500 sm:mt-0">
                                Don't have an account?
                                <a href="#" class="text-gray-700 underline">Register</a>.
                            </p>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </section>
</x-noNav>