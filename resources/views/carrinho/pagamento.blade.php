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
                                        <input type="text" value="{{ $cliente->ds_endereco }}" name="ds_endereco" id="ds_endereco" placeholder="Endereço" required/>
                                        <input type="text" value="{{ $cliente->ds_numero }}" name="ds_numero" id="ds_numero" placeholder="Número" required/>
                                        <input type="text" value="{{ $cliente->ds_cep }}" name="ds_cep" id="ds_cep" placeholder="CEP (99999-999)" required pattern="[0-9]{5}-[0-9]{3}$"/>
                                        <input class="mb-0" type="text" value="{{ $cliente->ds_cidade }}" name="ds_cidade" id="ds_cidade" placeholder="Cidade" required/>.
                                        <select name="ds_uf" class="custom-select" id="ds_uf">
                                            <option value="AC" @if ($cliente->ds_uf == 'AC') selected @endif>Acre</option>
                                            <option value="AL" @if ($cliente->ds_uf == 'AL') selected @endif>Alagoas</option>
                                            <option value="AP" @if ($cliente->ds_uf == 'AP') selected @endif>Amapá</option>
                                            <option value="AM" @if ($cliente->ds_uf == 'AM') selected @endif>Amazonas</option>
                                            <option value="BA" @if ($cliente->ds_uf == 'BA') selected @endif>Bahia</option>
                                            <option value="CE" @if ($cliente->ds_uf == 'CE') selected @endif>Ceará</option>
                                            <option value="DF" @if ($cliente->ds_uf == 'DF') selected @endif>Distrito Federal</option>
                                            <option value="ES" @if ($cliente->ds_uf == 'ES') selected @endif>Espírito Santo</option>
                                            <option value="GO" @if ($cliente->ds_uf == 'GO') selected @endif>Goiás</option>
                                            <option value="MA" @if ($cliente->ds_uf == 'MA') selected @endif>Maranhão</option>
                                            <option value="MT" @if ($cliente->ds_uf == 'MT') selected @endif>Mato Grosso</option>
                                            <option value="MS" @if ($cliente->ds_uf == 'MS') selected @endif>Mato Grosso do Sul</option>
                                            <option value="MG" @if ($cliente->ds_uf == 'MG') selected @endif>Minas Gerais</option>
                                            <option value="PA" @if ($cliente->ds_uf == 'PA') selected @endif>Pará</option>
                                            <option value="PB" @if ($cliente->ds_uf == 'PB') selected @endif>Paraíba</option>
                                            <option value="PR" @if ($cliente->ds_uf == 'PR') selected @endif>Paraná</option>
                                            <option value="PE" @if ($cliente->ds_uf == 'PE') selected @endif>Pernambuco</option>
                                            <option value="PI" @if ($cliente->ds_uf == 'PI') selected @endif>Piauí</option>
                                            <option value="RJ" @if ($cliente->ds_uf == 'RJ') selected @endif>Rio de Janeiro</option>
                                            <option value="RN" @if ($cliente->ds_uf == 'RN') selected @endif>Rio Grande do Norte</option>
                                            <option value="RS" @if ($cliente->ds_uf == 'RS') selected @endif>Rio Grande do Sul</option>
                                            <option value="RO" @if ($cliente->ds_uf == 'RO') selected @endif>Rondônia</option>
                                            <option value="RR" @if ($cliente->ds_uf == 'RR') selected @endif>Roraima</option>
                                            <option value="SC" @if ($cliente->ds_uf == 'SC') selected @endif>Santa Catarina</option>
                                            <option value="SP" @if ($cliente->ds_uf == 'SP') selected @endif>São Paulo</option>
                                            <option value="SE" @if ($cliente->ds_uf == 'SE') selected @endif>Sergipe</option>
                                            <option value="TO" @if ($cliente->ds_uf == 'TO') selected @endif>Tocantins</option>
                                        </select>
                                        <p class="fs-6 mr-2 d-block mt-2">*Endereço pego do <a class="text-muted" href="{{ route('cliente.show', \App\Models\User::cliente()->id )}}">perfil</a> de usuário</p>

                                    </div>

                                    <input type="button" name="next" class="next action-button" value="Próximo Passo" onclick="pegaValorEnd();"/>
                                </fieldset>
                                <fieldset id="steep-seccond">
                                    <div class="form-card">
                                        <h2 class="fs-title">Informações de Pagamento</h2>

                                        <label class="pay">Nome no Cartão*</label>
                                        <input type="text" name="holdername" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$" placeholder="" required/>
                                        <div class="row">
                                            <div class="col-9"> <label class="pay">Número do cartão*</label>
                                                <input type="text" name="nr_cartao" placeholder="" maxlength="16" pattern="[0-9]{16}$" required/>
                                            </div>
                                            <div class="col-3"> <label class="pay">CVC*</label>
                                                <input type="text" name="cvcpwd"  maxlength="3" pattern="[0-9]{3}$" required/>
                                            </div>
                                            <input type="hidden" value="{{ \App\Models\Carrinho::totalCarrinho() }}" name="vl_total"/>
                                        </div>
                                        <select name="nr_parcela" id="nr_parcela" class="custom-select">
                                            <option value="1">1X - R$ {{ number_format(\App\Models\Carrinho::totalCarrinho()/1, 2, ',', '.') }}</option>
                                            <option value="2">2X - R$ {{ number_format(\App\Models\Carrinho::totalCarrinho()/2, 2, ',', '.') }}</option>
                                            <option value="3">3X - R$ {{ number_format(\App\Models\Carrinho::totalCarrinho()/3, 2, ',', '.') }}</option>
                                            <option value="4">4X - R$ {{ number_format(\App\Models\Carrinho::totalCarrinho()/4, 2, ',', '.') }}</option>
                                            <option value="5">5X - R$ {{ number_format(\App\Models\Carrinho::totalCarrinho()/5, 2, ',', '.') }}</option>
                                            <option value="6">6X - R$ {{ number_format(\App\Models\Carrinho::totalCarrinho()/6, 2, ',', '.') }}</option>
                                        </select>
                                        <input type="hidden" value="{{ \App\Models\Carrinho::totalCarrinho() }}" name="vl_total" disabled/>
                                    </div>
                                    <input type="button" name="make_payment" class="next action-button" onclick="pegaValorParcela();" value="Próximo Passo" />
                                </fieldset>
                                <fieldset id="steep-third">
                                    <div class="form-card">
                                        <h2 class="fs-title text-center">Resumo da Compra</h2> <br><br>
                                        <div class=" row m-0">
                                            <div class=" col-6 p-0 py-2 text-left">
                                                <div>
                                                    <p class=" h5 mr-2 d-inline">Entrega em</p>
                                                    <address id="address" class="ms-2">
                                                        Rua Breno Bersa, 25 <br>
                                                        São Paulo - SP<br>
                                                        CEP: 04854-230<br>
                                                    </address>
                                                </div>
                                            </div>
                                            <div class=" col-6 p-0 py-2 text-right border-left mb-3">
                                                <div>
                                                    <p class=" h5 mr-2 d-inline">{{ \App\Models\Carrinho::quantidade() }} @if(\App\Models\Carrinho::quantidade() > 1)produtos @else produto @endif</p>
                                                    <p class=" d-inline float-end"> R$ {{ number_format(\App\Models\Carrinho::totalCarrinho(), 2, ',', '.') }}</p>
                                                </div>
                                                <div>
                                                    <p class="h5 mr-2 d-inline">Frete</p>
                                                    <p class=" d-inline float-end h6 text-success"> GRÁTIS</p>
                                                </div>
                                                <div>
                                                    <hr>
                                                    <p class="h5 mr-2 d-inline ">Total da compra:</p>
                                                    <p class=" d-inline h6">R$ {{ number_format(\App\Models\Carrinho::totalCarrinho(), 2, ',', '.') }}</p>
                                                    <p class="" id="parcela"></p>
                                                </div>
                                            </div>

                                            <div class=" col-12 py-2 p-0 text-center">
                                                <button name="submit" class="action-button" type="submit">Confirmar</button>
                                            </div>
                                        </div>
                                    </div>
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
