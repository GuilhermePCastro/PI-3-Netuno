<!DOCTYPE html>
<html lang="pt-br">
<head>
    @include('layouts.head')
    <link rel="stylesheet" href="{{ asset('css/home-filtro.css') }}">
    <title>{{ $tag->tag_nome }} - Netuno</title>
</head>
<body class="dsk-container-4x25">
    <header>
       @include('layouts.headernaologado')
    </header>

    <!-- Mostrando mensagem na tela com a session -->
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert"> {{session()->get('success')}}</div>
    @endif
        <!-- Mostrando mensagem na tela com a session -->
    @if(session()->has('error'))
        <div class="alert alert-danger" role="alert"> {{session()->get('error')}} </div>
    @endif

    <div class=" mt-4 row m-0 justify-content-center">
        <div class=" dsk-container-4x25">
            <div class=" row m-0 my-3">
                <div class="dsk-container-4x1"></div>
                <h2 class="m-0 text-uppercase text-h2 ">{{ $tag->tag_nome }}</h2>
            </div>
            <p class="text-muted">{{ "Encontramos " . count($produtos) . " produtos"}}</p>
        </div>
    </div>

    <div class=" kards dsk-container-4x25 ">

        <div class=" row m-0 justify-content-center">

            <div class="dsk-container-4x1"></div>

            @foreach ($produtos as $produto)
                <div class="mt-3 dsk-container-4x5 sm-container-4x11 kard shadow text-center">
                    <img class="img-kard" src="{{ asset($produto->hx_foto1) }}" alt="{{ $produto->ds_nome}}">
                    <div class="w-100 cont-kard text-center">
                        <p class="m-0  text-kard ">{{ $produto->ds_nome}}</p>
                        <p class="m-0  money-kard d-inline">R$ </p><p class="money-kard mt-4 d-inline">{{ number_format($produto->vl_produto, 2, ',', '.') }}</p>
                    </div>
                    <div class="w-100 mt-3">
                        <button class="btn-kard text-uppercase w-100" onclick="window.location.href = '{{ route('produto.show', $produto->id) }}'" >Comprar</button>
                    </div>
                </div>

                <div class="dsk-container-4x1"></div>
            @endforeach

        </div>
        <div class="mt-5 mb-4 d-flex justify-content-center">
            {{ $produtos->links()}}
        </div>
    </div>

    <div class="mt-3 footer-dark">
    </div>
</body>
</html>
