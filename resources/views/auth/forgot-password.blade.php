<x-guest-layout>

    @php $titulo = "Recuperar senha"  @endphp
    @php $pagina = "Recuperar senha"  @endphp
    @include('layouts.headerAuth')

    <div class="row m-0 heigth-dsk m-auto p-0 py-5 justify-content-center dsk-container-4x25 align-items-center ">
        <div class=" dsk-container-4x10 sm-container-4x20 d-flex sombrinha">
            <div class="w-100 row  m-0 p-0 justify-content-center ">

                <div class="my-4 mx-5 text-center text-sm text-gray-600">
                    {{ __('Esqueceu sua senha? Sem problemas. Basta nos informar seu endereço de e-mail e enviaremos um link de redefinição de senha que permitirá que você escolha uma nova.') }}
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form class="w-100 mx-5" method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input placeholder="E-mail" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <div class="flex items-center text-center justify-content-center my-4 w-100">
                        <x-button class="btn btn-primary">
                            {{ __('Enviar link por e-mail') }}
                        </x-button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</x-guest-layout>
