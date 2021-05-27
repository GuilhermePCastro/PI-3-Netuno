<!DOCTYPE html>
<html lang="pt-br">
<head>
    @include('layouts.head')
    <title>Netuno</title>
    <link rel="stylesheet" href="{{ asset('css/carrinho.css')}}">
</head>
<body>
    <header>
        @include('layouts.headernaologado')
    </header>
    <main class=" container-fluid px-0 ">
        <div class=" row m-0 justify-content-center">

            <div class=" col-12 text-center  py-3 bg-dark">
                <div class=" text-white row justify-content-center m-0 text-center">
                    <i class="fas fa-lock fa-3x"></i><p class="ml-4 m-0 text-final text-white align-items-center align-middle"> Compra 100% Segura</p>
                </div>
            </div>

             <!-- Mostrando mensagem na tela com a session -->
            @if(session()->has('success'))
                <div class="alert alert-success mt-4" role="alert"> {{session()->get('success')}}</div>
            @endif
                <!-- Mostrando mensagem na tela com a session -->
            @if(session()->has('error'))
                <div class="alert alert-danger mt-4" role="alert"> {{session()->get('error')}} </div>
            @endif

            <div class=" mt-5 col-12 mb-3 text-center">
                <h2 class=" h1 d-inline">Meu Carrinho</h2>
                <i class="fas fa-cart-plus fa-3x blue d-inline"></i>
            </div>

            <div class="mt-3 col-12 col-md-11 col-lg-10 p-0">
                <table class="table table-hover">
                    <thead>
                        <tr class="h5 h6-sm">
                            <th class=" sm-none"></th>
                            <th>Produto</th>
                            <th>Qtd.</th>
                            <th></th>
                            <th>Preço Uni.</th>
                            <th>Preço Tot.</th>
                          </tr>
                    </thead>
                    <tbody>
                        @foreach ($carrinho as $item)
                            <tr class="h5" >
                                <td class="sm-none align-middle"><img class="img-lista" src="{{ asset($item->produto()->hx_foto1) }}" alt="{{ $item->ds_nome }}" onclick="window.location.href = '{{ route('produto.show', $item->produto()->id) }}'"></td>
                                <td class="align-middle"><a class="nome-produto" href="{{ route('produto.show', $item->produto()->id) }}">{{ $item->produto()->ds_nome }}</a></td>
                                <td class="align-middle">{{ $item->qt_produto }}</td>
                                <td class="align-middle text-center">
                                    <button class=" btn btn-outline-warning" onclick="window.location.href = '{{ route('carrinho.remove', $item->produto()->id) }}'"><i class="fas fa-minus"></i></button>
                                    <button class=" btn btn-outline-warning" onclick="window.location.href = '{{ route('carrinho.add', $item->produto()->id) }}'"><i class="fas fa-plus"></i></button>
                                </td>
                                <td class="align-middle"><span class=" money">R$ {{ number_format($item->produto()->vl_produto, 2, ',', '.') }}</td>
                                <td class="align-middle"><span class=" money">R$ {{ number_format($item->produto()->vl_produto * $item->qt_produto, 2, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-12 col-md-11 col-lg-10 py-5 bg-primary">
                <div class=" m-0 row justify-content-center-md justify-content-end ">
                    <div class=" col-12 col-md-12 text-right">
                        <p class="mr-2 text-shadow text-final m-0 d-inline-block text-white">Valor total da compra:</p><span class="mr-2 text-white text-final-money d-inline-block">R$</span><p class="text-white text-final d-inline-block">{{ number_format(\App\Models\Carrinho::totalCarrinho(), 2, ',', '.') }}</p>
                    </div>
                    <div class=" col-12 col-md-2">
                        <button class="w-100 btn btn-outline-light text-button" onclick="window.location.href = '{{ route('carrinho.pagamento') }}'">Finalizar Compra</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
