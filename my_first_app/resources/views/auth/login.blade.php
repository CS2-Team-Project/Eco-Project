<x-guest-layout>
    <style>
      
        .log-form {
            width: 100%;
            max-width: 600px;
            margin: 0 auto 50px;
            padding: 20px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .log-form h1 {
            text-align: center;
            font-size: 26px;
            color: #000;
        }

        .log-form p {
            text-align: center;
            font-size: 14px;
            color: #555;
            margin-bottom: 20px;
            margin-top: 0px;
        }

        .log-form form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .log-form #email,
        .log-form #password,
        .log-form input[type="submit"],
        .log-form a {
            width: 100%;
            padding: 12px;
            font-size: 14px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            transition: border-color 0.3s ease, background-color 0.3s ease, color 0.3s ease;
        }

        .log-form #email:focus,
        .log-form #password:focus {
            border-color: #555;
        }

        .log-form input[type="submit"] {
            background-color: black;
            color: white;
            font-size: 16px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .log-form input[type="submit"]:hover {
            background-color: #333;
        }

        .log-form a {
            display: inline-block;
            text-align: center;
            text-decoration: none;
            color: white;
            background-color: black;
            border: none;
            padding: 12px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .log-form a:hover {
            background-color: #333;
        }
    </style>

    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="log-form">
            <h1>Login</h1>
            <p>Please log in to access your account.</p>

            <x-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-black-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

               
                <div>
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

               
                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" type="password" name="password" required autocomplete="current-password" />
                </div>

                
                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ms-2 text-sm text-black-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

               
                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-black-600 hover:text-blue-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                 
                    <x-button class="ms-4">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>