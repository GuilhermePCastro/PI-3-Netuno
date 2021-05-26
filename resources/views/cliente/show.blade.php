<!DOCTYPE html>
<html lang="pt-br">
    <head>
        @include('layouts.head')
        <link rel="stylesheet" href="{{ asset('css/show-cliente.css') }}">
        <title>Netuno</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </head>
    <body class="dsk-container-4x25">

        <header>
            @include('layouts.headernaologado')
        </header>

        <main>

            <!-- Mostrando mensagem na tela com a session -->
            @if(session()->has('valido'))
                <div class="alert alert-success" role="alert"> {{session()->get('valido')}}</div>
            @endif
                <!-- Mostrando mensagem na tela com a session -->
            @if(session()->has('error'))
                <div class="alert alert-danger" role="alert"> {{session()->get('error')}} </div>
            @endif

            <div class=" mt-4 row m-0 justify-content-center">
                <div class=" col-12 text-center mb-4">
                    <h2 class="m-0 text-uppercase text-h2 ">Perfil</h2>
                </div>
            </div>

            <div class=" ml-2 mt-4 row m-0">
                <div class="col-12 mb-4">
                    <h3 class="m-0 text-uppercase text-h3">Dados pessoais</h3>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 d-inline-block">
                    <span class="titulo-campo">Nome: </span><span class="titulo-valor">{{ Auth()->user()->name }}</span>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 d-inline-block">
                    <span class="titulo-campo">CPF: </span><span class="titulo-valor">{{ $cliente->ds_cpf }}</span>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 d-inline-block">
                    <span class="titulo-campo">Celular: </span><span class="titulo-valor">{{ $cliente->ds_celular }}</span>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 d-inline-block">
                    <span class="titulo-campo">E-mail: </span><span class="titulo-valor">{{ Auth()->user()->email }}</span>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 d-inline-block">
                    <span class="titulo-campo">Endereço: </span><span class="titulo-valor">{{ $cliente->ds_endereco }}</span>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 d-inline-block">
                    <span class="titulo-campo">Número: </span><span class="titulo-valor">{{ $cliente->ds_numero }}</span>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 d-inline-block">
                    <span class="titulo-campo">CEP: </span><span class="titulo-valor">{{ $cliente->ds_cep }}</span>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 d-inline-block">
                    <span class="titulo-campo">Cidade: </span><span class="titulo-valor">{{ $cliente->ds_cidade }}</span>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 d-inline-block">
                    <span class="titulo-campo">Estado: </span><span class="titulo-valor">{{ $cliente->ds_uf }}</span>
                </div>

                <div class="mt-5 mb-5 col-12 text-center">
                    <button class="btn btn-primary " onclick="window.location.href = '{{ route('cliente.edit', $cliente->id) }}'">Alterar Dados</button>
                </div>

            </div>

            <div class=" mt-4 row m-0">
                <div class=" col-12 mb-4">
                    <h3 class="m-0 text-uppercase text-h3">Meus pedidos</h3>

                    <div class="accordion mt-4 mb-2 col-11 mx-auto ">

                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#item-1">
                                        Pedido Nº 1 - Data - Status
                                    </button>
                                </div>
                                <div class="accordion-collapse collapse" id="item-1">
                                    <div class="mt-2 ml-4">
                                        <div>
                                            <span class="titulo-campo">Entregue em: </span><span class="titulo-valor">SP</span>
                                        </div>
                                        <div>
                                            <span class="titulo-campo">Pago com: </span><span class="titulo-valor">4450 - 2x de R$ 250,00</span>
                                        </div>
                                        <div>
                                            <span class="titulo-campo">Total: </span><span class="titulo-valor">R$ 500,00</span>
                                        </div>
                                    </div>
                                    <div class="accordion-body">
                                    <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Produto</th>
                                                    <th></th>
                                                    <th>Quantidade</th>
                                                    <th>Valor Unit.</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                    <tr>
                                                        <td>1</td>
                                                        <td>2</td>
                                                        <td>3</td>
                                                        <td>4</td>
                                                        <td>
                                                            5
                                                        </td>

                                                    </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                    </div>


                </div>
            </div>

        </main>
        <footer class="mt-3"></footer>
    </body>
</html>
