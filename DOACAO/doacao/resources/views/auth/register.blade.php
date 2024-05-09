<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/cadastro.css">
    
    <title>Document</title>
</head>
<body>
        <form method="POST" action="{{ route('register') }}">
        <div class="card">
            <div class="card-top">
                <img class="imglogin" src=/img/dlogo.png alt="">
                <figcaption>DoAção</figcaption>
            </div>
            @csrf
            <div class="campo">
                <x-label for="name" value="{{ __('Nome') }}" />
                <input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="campo">
                <x-label for="cpf" value="{{ __('CPF') }}" />
                <x-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf')" required autofocus autocomplete="cpf" />
            </div>

            <form method="get" action=".">
                <div class="campo">
                    <x-label for="cep" value="{{ __('CEP') }}" />
                    <x-input id="cep" class="block mt-1 w-full" type="text" name="cep" onblur="pesquisacep(this.value);"/>
                </div>

                <div class="mt-4">
                    <x-label for="rua" value="{{ __('Rua') }}" />
                    <x-input id="rua" class="block mt-1 w-full" type="text" name="rua"/>
                </div>

                <div class="mt-4">
                    <x-label for="bairro" value="{{ __('Bairro') }}" />
                    <x-input id="bairro" class="block mt-1 w-full" type="text" name="bairro"/>
                </div>
        
                <div class="mt-4">
                    <x-label for="cidade" value="{{ __('Cidade') }}" />
                    <x-input id="cidade" class="block mt-1 w-full" type="text" name="cidade"/>
                </div>

                <div class="mt-4">
                    <x-label for="uf" value="{{ __('Estado') }}" />
                    <x-input id="uf" class="block mt-1 w-full" type="text" name="uf"/>
                </div>
            </form>
            
            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <script src="{{ asset('js/cep.js') }}"></script>
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
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('register') }}
                </x-button>
            </div>
        </form>
    </body>
</html>