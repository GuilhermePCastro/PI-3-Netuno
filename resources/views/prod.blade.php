<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
    <link rel="stylesheet" href="{{ asset('css/prod-desc.css') }}">
    <title>Document</title>
</head>
<body class="dsk-container-4x25">
    <header>
        @include('layouts.headernaologado')
        <div class="header-secondary bg-light d-flex align-items-center">
            <div class=" dsk-container-4x1"></div>
            <div class=" dsk-container-4x4 sm-container-4x19">
                <p class="m-0 font-weight-bold h5">Acesse sua conta</p>
                <p class="m-0 ">home > Acessar</p>
            </div>
        </div>
    </header>

<div class=" row m-0 justify-content-center ">
    <div class=" col-12 col-md-7 col-xl-5 produto text-center p-3">
        <img src="{{asset('images/logo4.png')}}" alt="imagem">
    </div>

    <div class=" col-12 col-md-4 col-xl-4 produto d-flex align-items-center">
        <div class="row m-0 w-100">
            <div class=" col-12 text-center-sm">
                <p class="mb-0 prod-desc-title">Camiseta Dupla Face Cobra KAI dOÔ</p>
                <p class="mb-3 prod-desc-price">R$ 79,90</p>
                <p class="mb-3 prod-desc-parcela">em 6x de R$ 13,92 (Sem juros)</p>
                <div class=" mb-3 justify-content-center-sm d-flex align-items-center">
                    <button class="m-0 btn btn-secondary h3 "><i class="fas fa-caret-left fa-2x"></i></button>
                    <input class=" m-0 icone " disabled type="text">
                    <button class="m-0 btn btn-secondary h3 "><i class="fas fa-caret-right fa-2x"></i></button>
                </div>
                <button class=" mt-3 w-100 btn btn-danger text-uppercase">Adicionar ao carrinho</button>
            </div>
        </div>
    </div>

    <div class="mt-4 bg-light col-11 col-md-10 col-xl-9 p-3 ">
        <div class=" row m-0 ">
            <h3>Descrição do Produto</h3>
            <p class=" text-desc">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Totam inventore vel,
                tempora ipsam rerum dignissimos dolores doloribus magni iusto mollitia quo nam optio vero aperiam
                 voluptatum voluptates corporis est vitae! Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Atque error provident molestias quae nostrum illum sint, maxime cupiditate ipsam. Beatae laborum,
                   officiis quaerat aut eos at saepe ducimus porro incidunt?</p>
        </div>
    </div>

    <div class=" footer-dark mt-5">
    </div>

</div>
</body>
</html>
