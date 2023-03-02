<x-noNav>
    <div class="flex min-h-screen flex-col justify-center bg-gray-100 py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <img class="mx-auto h-12 w-auto" src="{{ asset('images/apple-touch-icon-72x72.png') }}" alt="Logo">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Verify Your Email Address
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                {{ __('Before proceeding, please check your email for a verification link.') }}
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
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 text-center text-sm font-medium text-green-600">

                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif

                <div class="mt-4 flex items-center justify-center">

                    <form class="ml-3" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="font-medium text-indigo-600 hover:text-indigo-500">
                            {{ __('Resend Verification Email') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-noNav>
