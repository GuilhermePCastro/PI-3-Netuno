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
            <div class=" py-2 dsk-container-2x4 sm-container-4x19">
                <a class="m-0 h6" href="{{ url('/')}}">Home ></a>
                <a class="m-0 text-sm h6" href="{{ route('category.show' , $produto->category->id)}}">{{ $produto->category->cate_nome}} ></a>
                <span class="m-0 text-sm" href="{{ route('category.show' , $produto->category->id)}}">{{ $produto->ds_nome}}</span>
            </div>
        </div>
    </header>

    <!-- Mostrando mensagem na tela com a session -->
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert"> {{session()->get('success')}}</div>
    @endif
        <!-- Mostrando mensagem na tela com a session -->
    @if(session()->has('error'))
        <div class="alert alert-danger" role="alert"> {{session()->get('error')}} </div>
    @endif


<div class=" row mx-0 my-4 justify-content-center ">
    <div class=" col-12 col-md-7 col-xl-5 produto text-center p-3">
        <img src="{{ asset($produto->hx_foto1) }}" alt="imagem">
    </div>

    <div class=" col-12 col-md-4 col-xl-4 produto d-flex align-items-center">
        <div class="row m-0 w-100">
            <div class=" col-12 text-center-sm">
                <p class="mb-0 prod-desc-title text-uppercase">{{ $produto->ds_nome}}</p>
                <p class="mb-3 prod-desc-price">R$ {{ number_format($produto -> vl_produto, 2, ',', '.') }}</p>
                <p class="mb-3 prod-desc-parcela">em até 6x de R$ {{ number_format($produto -> vl_produto/6, 2, ',', '.') }} (Sem juros)</p>
                <button class=" mt-3 mb-4 w-100 btn btn-danger text-uppercase" onclick="window.location.href = '{{ Route('carrinho.add',  $produto->id) }}'">Adicionar ao carrinho</button>
                <div class="d-block">
                    <span class="h6 d-block">Tags</span>
                    @foreach ($produto->tags as $tag)
                        <a class="btn btn-sm btn-light" href="{{ route('tag.show' , $tag->id)}}">{{ $tag->tag_nome }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4 bg-light col-11 col-md-10 col-xl-9 p-3 ">
        <div class=" row m-0 ">
            <h3 class=" px-2 col-12">Descrição do Produto</h3>
            <p class=" px-2 colo-12 text-desc">{{ $produto->ds_descricao}}</p>
        </div>
    </div>

    <div class=" footer-dark mt-5">
    </div>

</div>
</body>
</html>
