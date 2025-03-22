<!-- Keep the styles linked -->
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<x-authentication-card>
    <x-slot name="logo">
        <img src="{{ asset('img/logo1.png') }}" alt="Logo" class="w-32 h-auto">
    </x-slot>

    <div class="sign-form">
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full input-field" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full input-field" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full input-field" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full input-field" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <!-- Address Line 1 -->
            <div class="mt-4">
                <x-label for="address_line_1" value="{{ __('Address Line 1') }}" />
                <x-input id="address_line_1" class="block mt-1 w-full input-field" type="text" name="address_line_1" :value="old('address_line_1')" required />
            </div>

            <!-- Address Line 2 (Optional) -->
            <div class="mt-4">
                <x-label for="address_line_2" value="{{ __('Address Line 2 (Optional)') }}" />
                <x-input id="address_line_2" class="block mt-1 w-full input-field" type="text" name="address_line_2" :value="old('address_line_2')" />
            </div>

            <!-- City -->
            <div class="mt-4">
                <x-label for="city" value="{{ __('City') }}" />
                <x-input id="city" class="block mt-1 w-full input-field" type="text" name="city" :value="old('city')" required />
            </div>

            <!-- Postal Code -->
            <div class="mt-4">
                <x-label for="postal_code" value="{{ __('Postal Code') }}" />
                <x-input id="postal_code" class="block mt-1 w-full input-field" type="text" name="postal_code" :value="old('postal_code')" required />
            </div>

            <!-- Country -->
            <div class="mt-4">
                <x-label for="country" value="{{ __('Country') }}" />
                <x-input id="country" class="block mt-1 w-full input-field" type="text" name="country" :value="old('country')" required />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered? Log In') }}
                </a>

                <button class="a">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</x-authentication-card>
