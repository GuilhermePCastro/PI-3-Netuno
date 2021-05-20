<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
    <link rel="stylesheet" href="{{ asset('css/home-produto.css') }}">
    <title>Document</title>
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

    <div class=" kards dsk-container-4x25 ">

        <div class=" row m-0 justify-content-center">

            <div class="dsk-container-4x1"></div>

            <!------ inicio foreach ------>
            @foreach (\App\Models\Produto::ultProdutos() as $produto)

                <div class="mt-3 dsk-container-4x5 sm-container-4x11 kard shadow text-center">
                    <img class="img-kard" src="{{ asset($produto->hx_foto1) }}" alt="{{ $produto->ds_nome}}">
                    <div class="w-100 cont-kard text-center">
                        <p class=" text-kard ">{{ $produto->ds_nome}}</p>
                        <p class=" money-kard d-inline">R$ </p><p class="money-kard mt-4 d-inline">{{ number_format($produto->vl_produto, 2, ',', '.') }}</p>
                    </div>
                    <div class="w-100 mt-3">
                        <button class="btn-kard text-uppercase w-100">Adicionar</button>
                    </div>
                </div>

                <div class="dsk-container-4x1"></div>
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

    <div class=" kards dsk-container-4x25 ">

        <div class=" row m-0 justify-content-center">

            <div class="dsk-container-4x1"></div>

            <!------ inicio foreach ------>

            <div class="mt-3 dsk-container-4x5 sm-container-4x11 kard shadow text-center">
                <img class="img-kard" src="https://via.placeholder.com/400" alt="">
                <div class="w-100 cont-kard text-center">
                    <p class=" text-kard ">Camiseta Dupla Face Naruto</p>
                    <p class=" money-kard d-inline">R$ </p><p class="money-kard mt-4 d-inline">79.90</p>
                </div>
                <div class="w-100 mt-3">
                    <button class="btn-kard text-uppercase w-100">Adicionar</button>
                </div>
            </div>

            <div class="dsk-container-4x1"></div>

            <!------ end ------->

            <div class="mt-3 dsk-container-4x5 sm-container-4x11 kard shadow text-center">
                <img class="img-kard" src="https://via.placeholder.com/400" alt="">
                <div class="w-100 cont-kard text-center">
                    <p class=" text-kard ">Camiseta Dupla Face Naruto</p>
                    <p class=" money-kard d-inline">R$ </p><p class="money-kard mt-4 d-inline">79.90</p>
                </div>
                <div class="w-100 mt-3">
                    <button class="btn-kard text-uppercase w-100">Adicionar</button>
                </div>
            </div>

            <div class="dsk-container-4x1"></div>
            <div class="sm-container-4x1"></div>

            <div class="mt-3 dsk-container-4x5 sm-container-4x11 kard shadow text-center">
                <img class="img-kard" src="https://via.placeholder.com/400" alt="">
                <div class="w-100 cont-kard text-center">
                    <p class=" text-kard ">Camiseta Dupla Face Naruto</p>
                    <p class=" money-kard d-inline">R$ </p><p class="money-kard mt-4 d-inline">79.90</p>
                </div>
                <div class="w-100 mt-3">
                    <button class="btn-kard text-uppercase w-100">Adicionar</button>
                </div>
            </div>

            <div class="dsk-container-4x1"></div>

            <div class="mt-3 dsk-container-4x5 sm-container-4x11 kard shadow text-center">
                <img class="img-kard" src="https://via.placeholder.com/400" alt="">
                <div class="w-100 cont-kard text-center">
                    <p class=" text-kard ">Camiseta Dupla Face Naruto</p>
                    <p class=" money-kard d-inline">R$ </p><p class="money-kard mt-4 d-inline">79.90</p>
                </div>
                <div class="w-100 mt-3">
                    <button class="btn-kard text-uppercase w-100">Adicionar</button>
                </div>
            </div>

            <div class="dsk-container-4x1"></div>

            <div class="dsk-container-4x1"></div>
        </div>
    </div>

    <div class=" py-5 mb-5 m-0 dsk-container-4x25 row justify-content-center">
        <div class="dsk-container-4x23 img-banner">
           <img class="w-100" src="{{asset('images/banner2.png')}}" alt="first banner">
        </div>
    </div>

</body>
</html>
