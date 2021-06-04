
<x-guest-layout>
  
    <x-jet-authentication-card>
        <x-slot name="logo">
            <svg xmlns="http://www.w3.org/2000/svg" width="188" height="39" class="mx-auto sm:mx-0"><text
                transform="translate(87 29)" fill="#454f5b">
                <tspan x="0" y="0" class="text-xlfont-bold">ZeroBug</tspan>
              </text>
              <path d="M54 39H0L27 6l27 33zM23 22v11h8V22h-8z" fill="#4ad5f6" />
              <path d="M54 0L40 16h27L54 0" fill="#95cdb1" />
              <path d="M69 18L55 34h27L69 18" fill="#ffc48b" /></svg>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4 bg-blue-700">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
