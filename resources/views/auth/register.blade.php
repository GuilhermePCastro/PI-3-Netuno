<x-guest-layout>

    @php $titulo = "Cadastro de usuário"  @endphp
    @php $pagina = "Cadastrar-se"  @endphp
    @include('layouts.headerAuth')

    <div class="row m-0 heigth-dsk m-auto p-0 py-5 justify-content-center dsk-container-4x25 align-items-center ">
        <div class=" dsk-container-4x10 sm-container-4x20 d-flex sombrinha">
            <div class=" w-100 row  m-0 p-0 justify-content-center ">
                <x-auth-validation-errors class="my-2" :errors="$errors" />

                <form class="w-100  mx-5 my-5" method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input placeholder="Nome" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input placeholder="E-mail" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input placeholder="Senha" id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input placeholder="Confirmar senha" id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required />
                    </div>

                    <div class="flex items-center text-center justify-content-center mt-4 w-100">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Já é registrado ?') }}
                        </a>

                        <x-button class="ml-3 btn btn-primary">
                            {{ __('Cadastrar') }}
                        </x-button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</x-guest-layout>
