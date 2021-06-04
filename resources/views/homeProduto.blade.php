<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
    <link rel="stylesheet" href="{{ asset('css/home-produto.css') }}">
    <title>Netuno</title>
</head>
<body class="dsk-container-4x25">

    <header>
        @include('layouts.headernaologado')
    </header>

    <section class="banner bg-primary dsk-container-4x25">
    </section>

    <div class=" mt-4 row m-0 justify-content-center">
        <div class=" col-12 text-center mb-4">
            <h2 class="m-0 text-uppercase text-h2 ">Lançamentos</h2>
        </div>
    </div>


    <div class="kards dsk-container-4x25 ">
        <div class="row">
            <!------ inicio foreach ------>
            @foreach (\App\Models\Produto::ultProdutos() as $produto)
                <div class="mt-3 dsk-container-4x5 sm-container-4x11 kard shadow text-center">
                    <img class="img-kard" src="{{ asset($produto->hx_foto1) }}" alt="{{ $produto->ds_nome}}">
                    <div class="w-100 cont-kard text-center">
                        <p class=" text-kard ">{{ $produto->ds_nome}}</p>
                        <p class=" money-kard d-inline">R$ </p><p class="money-kard mt-4 d-inline">{{ number_format($produto->vl_produto, 2, ',', '.') }}</p>
                    </div>
                    <div class="w-100 mt-3">
                        <button class="btn-kard text-uppercase w-100" onclick="window.location.href = '{{ route('produto.show', $produto->id) }}'" >Comprar</button>
                    </div>
                </div>
            @endforeach
            <!------ end ------->
        </div>
    </div>

    <div class=" my-5 m-0 dsk-container-4x25 row justify-content-center">
        <div class="dsk-container-4x23 img-banner">
           <img class="w-100" src="{{asset('images/banner1.png')}}" alt="first banner">
        </div>
    </div>



    <div class=" mt-4 row m-0 justify-content-center">
        <div class=" col-12 text-center mb-4">
            <h2 class="m-0 text-uppercase text-h2 ">MAIS VENDIDOS</h2>
        </div>
    </div>

    <div class="kards dsk-container-4x25 ">
        <div class="row">
            <!------ inicio foreach ------>
            @foreach (\App\Models\PedidoItem::produtoMaisVendidos() as $produto)
                <div class="mt-3 dsk-container-4x5 sm-container-4x11 kard shadow text-center">
                    <img class="img-kard" src="{{ asset($produto->produto()->hx_foto1) }}" alt="{{ $produto->ds_nome}}">
                    <div class="w-100 cont-kard text-center">
                        <p class=" text-kard ">{{ $produto->produto()->ds_nome}}</p>
                        <p class=" money-kard d-inline">R$ </p><p class="money-kard mt-4 d-inline">{{ number_format($produto->produto()->vl_produto, 2, ',', '.') }}</p>
                    </div>
                    <div class="w-100 mt-3">
                        <button class="btn-kard text-uppercase w-100" onclick="window.location.href = '{{ route('produto.show', $produto->produto()->id) }}'" >Comprar</button>
                    </div>
                </div>
            @endforeach
            <!------ end ------->
        </div>
    </div>

    <div class=" py-5 mb-5 m-0 dsk-container-4x25 row justify-content-center">
        <div class="dsk-container-4x23 img-banner">
           <img class="w-100" src="{{asset('images/banner2.png')}}" alt="first banner">
        </div>
    </div>

    <div class="mt-3 footer-dark">
    </div>

</body>
</html>
