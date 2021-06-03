<!DOCTYPE html>
<html lang="pt-br">
<head>
    @include('layouts.head')
    <title>Netuno</title>
    <link rel="stylesheet" href="{{ asset('css/pagamento.css')}}">
    <script src="{{ asset('js/pagamento.js') }}"></script>
</head>
<body>

    <header>
        @include('layouts.headernaologado')
    </header>

    <!-- MultiStep Form -->
    <div class="container-fluid " id="grad1">
        <div class="row justify-content-center mt-0 vah-100 align-items-center">
            <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2><strong>Siga o passo a passo para finalizar a compra</strong></h2>
                    <p>Preencha as informações a baixo</p>
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <form id="msform" method='POST' action="{{ Route('pedido.add') }}">
                                @csrf
                                <!-- progressbar -->
                                <ul class="reus bg-light row justify-content-center" id="progressbar">
                                    <li id="personal" class=" active">
                                        <strong>Localização</strong>
                                    </li>
                                    <li id="payment">
                                        <strong>Pagamento</strong>
                                    </li>
                                    <li id="confirm">
                                        <strong>Finalizado</strong>
                                    </li>
                                </ul> <!-- fieldsets -->
                                <fieldset id="steep-first">
                                    <div class="form-card">
                                        <h2 class="fs-title">Informações de Localização</h2>
                                        <input type="text" value="{{ $cliente->ds_endereco }}" name="ds_endereco" placeholder="Endereço" required/>
                                        <input type="text" value="{{ $cliente->ds_numero }}" name="ds_numero" placeholder="Número" required/>
                                        <input type="text" value="{{ $cliente->ds_cep }}" name="ds_cep" placeholder="CEP (99999-999)" required pattern="[0-9]{5}-[0-9]{3}$"/>
                                        <input type="text" value="{{ $cliente->ds_cidade }}" name="ds_cidade" placeholder="Cidade" required/>
                                        <input type="text" value="{{ $cliente->ds_uf }}" name="ds_uf" placeholder="Estado" required />
                                    </div>

                                    <input type="button" name="next" class="next action-button" value="Próximo Passo" />
                                </fieldset>
                                <fieldset id="steep-seccond">
                                    <div class="form-card">
                                        <h2 class="fs-title">Informações de Pagamento</h2>

                                        <label class="pay">Nome no Cartão*</label>
                                        <input type="text" name="holdername" placeholder="" required/>
                                        <div class="row">
                                            <div class="col-9"> <label class="pay">Número do cartão*</label>
                                                <input type="text" name="nr_cartao" placeholder="" maxlength="12" pattern="[0-9]{12}$" required/>
                                            </div>
                                            <div class="col-3"> <label class="pay">CVC*</label>
                                                <input type="password" name="cvcpwd"  maxlength="3" placeholder="***" pattern="[0-9]{3}$" required/>
                                            </div>
                                            <input type="hidden" value="{{ \App\Models\Carrinho::totalCarrinho() }}" name="vl_total"/>
                                        </div>
                                        <select name="nr_parcela" id="nr_parcela" class="custom-select" id="inputGroupSelect01">
                                            <option value="1">1X - R$ {{ number_format(\App\Models\Carrinho::totalCarrinho()/1, 2, ',', '.') }}</option>
                                            <option value="2">2X - R$ {{ number_format(\App\Models\Carrinho::totalCarrinho()/2, 2, ',', '.') }}</option>
                                            <option value="3">3X - R$ {{ number_format(\App\Models\Carrinho::totalCarrinho()/3, 2, ',', '.') }}</option>
                                            <option value="4">4X - R$ {{ number_format(\App\Models\Carrinho::totalCarrinho()/4, 2, ',', '.') }}</option>
                                            <option value="5">5X - R$ {{ number_format(\App\Models\Carrinho::totalCarrinho()/5, 2, ',', '.') }}</option>
                                            <option value="6">6X - R$ {{ number_format(\App\Models\Carrinho::totalCarrinho()/6, 2, ',', '.') }}</option>
                                        </select>
                                        <input type="hidden" value="{{ \App\Models\Carrinho::totalCarrinho() }}" name="vl_total" disabled/>
                                    </div>
                                    <input type="button" name="make_payment" class="next action-button" value="Próximo Passo" />
                                </fieldset>
                                <fieldset id="steep-third">
                                    <div class="form-card">
                                        <h2 class="fs-title text-center">Informacões Gerais</h2> <br><br>
                                        <div class=" row m-0">
                                            <div class=" col-12 p-0 py-2 border-bottom">
                                                <p class="h6 mr-2 d-inline">Nome:</p>
                                                <!-- informação do nome completo do usuario -->
                                                <p class=" text-uppercase d-inline">Aqui será colocado meu nome</p>
                                            </div>
                                            <div class=" col-12 p-0 py-2 border-bottom">
                                                <p class="h6 mr-2 d-inline ">Localização:</p>
                                                <!-- informação do nome completo do usuario -->
                                                <p class=" d-inline">Aqui será colocado minha localização com javascript</p>
                                            </div>
                                            <div class=" col-12 py-2 p-0">
                                                <p class="h6 mr-2 d-inline">Localização:</p>
                                                <!-- informação do nome completo do usuario -->
                                                <p class=" d-inline">Aqui será colocado minha forma de pagamento com javascript</p>
                                            </div>

                                        </div>
                                    </div>
                                    <button name="submit" class="action-button" type="submit">Confirmar</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
