<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro de pedido</title>

    @include('layouts.bootstrap')
    <script src="{{ asset('js/menu.js') }}"></script>
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('css/register-client.css') }}" rel="stylesheet">

    <link
      href="https://fonts.googleapis.com/css2?family=Rhodium+Libre&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <header>
        @include('layouts.headerdashboard')
    </header>
    <main class="main">
      @include('layouts.menu')
      <section class="main__page-content right-container">
        <div class="page-content__title">
          <h1 class="page-title mt mb ">Pedido</h1>
        </div>

        <form class="page-content__inputs mb" method='POST'  action="{{ Route('pedido.update', $pedido->id) }}" enctype="multipart/form-data">@csrf
            @method('PATCH')
          <div class="inputs-group mb">
            <label class="input-container input-container-60">
              Nome do cliente
              <input name="ds_nome" type="text" value="{{ $pedido->usuario()->name }}" disabled/>
            </label>
            <label class="input-container input-container-40">
              CPF do cliente
              <input name="ds_cpf" type="text" value="{{ $pedido->cliente()->ds_cpf }}" disabled/>
            </label>
          </div>

          <div class="inputs-group mb">
            <label class="input-container input-container-60">
              E-mail
              <input name="ds_email" type="text" value="{{ $pedido->usuario()->email }}" disabled/>
            </label>
            <label class="input-container input-container-40">
              Celular
              <input name="ds_celular" type="text" value="{{ $pedido->cliente()->ds_celular }}" disabled/>
            </label>
          </div>

          <div class="inputs-group mb">
            <label class="input-container input-container-40">
              CEP
              <input name="ds_cep" type="text" value="{{ $pedido->ds_cep }}" disabled/>
            </label>
            <label class="input-container input-container-60">
              Endereço
              <input name="ds_endereco" value="{{ $pedido->ds_endereco }}" type="text" disabled/>
            </label>
          </div>

          <div class="inputs-group mb">
            <label class="input-container input-container-10">
              Número
              <input name="ds_numero" type="text" value="{{ $pedido->ds_numero }}" disabled/>
            </label>
            <label class="input-container input-container-80">
              Cidade
              <input name="ds_cidade" type="text" value="{{ $pedido->ds_cidade }}" disabled/>
            </label>
            <label class="input-container input-container-10">
              Estado
              <input name="ds_uf" type="text" value="{{ $pedido->ds_uf }}" disabled/>
            </label>
          </div>

          <div class="inputs-group mb">
            <label class="input-container input-container-20">
              Data do Pedido
              <input name="created-at" type="text" value="{{  date_format($pedido->created_at, 'd/m/Y') }}" disabled/>
            </label>
            <label class="input-container input-container-20">
              Ult. 4 dígitos do cartão
              <input name="cd_cartao" type="text" value="{{ $pedido->cd_cartao }}" disabled/>
            </label>
            <label class="input-container input-container-20">
              Nr. Parcelas
              <input name="nr_parcela" type="text" value="{{ $pedido->nr_parcela }}" disabled/>
            </label>
            <label class="input-container input-container-20">
              Valor Parcelas
              <input name="vl_parcela" type="text" value="{{ number_format($pedido->vl_total/$pedido->nr_parcela, 2, ',', '.') }}" disabled/>
            </label>
            <label class="input-container input-container-20">
              Valor total
              <input name="vl_total" type="text" value="{{ number_format($pedido->vl_total, 2, ',', '.') }}" disabled/>
            </label>
          </div>

          <div class="page-content__title mt-5">
            <h1 class="page-title mt mb ">Itens do Pedido</h1>
          </div>

          <div class="inputs-group mb">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Valor Unit.</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($itens as $item)
                        <tr>
                            <td>{{ $item->produto()->id }}</td>
                            <td>{{ $item->produto()->ds_nome }}</td>
                            <td>{{ $item->qt_produto }}</td>
                            <td>{{ number_format($item->vl_produto, 2, ',', '.') }}</td>
                            <td>{{ number_format($item->vl_produto * $item->qt_produto, 2, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
          </div>

          <div class="page-content__title mt-5">
            <h1 class="page-title mt mb ">Status</h1>
          </div>

          <div class="inputs-group mb input-container input-container-40 mb-5">
                <select name="ds_status">
                    <option value="Em Aberto" @if($pedido->ds_status == 'Em Aberto') selected @endif>Em Aberto</option>
                    <option value="Em Atendimento" @if($pedido->ds_status == 'Em Atendimento') selected @endif>Em Atendiemnto</option>
                    <option value="Em Separação" @if($pedido->ds_status == 'Em Separação') selected @endif>Em Separação</option>
                    <option value="Enviado" @if($pedido->ds_status == 'Enviado') selected @endif>Enviado</option>
                    <option value="Finalizado" @if($pedido->ds_status == 'Finalizado') selected @endif>Finalizado</option>
                    <option value="Cancelado" @if($pedido->ds_status == 'Cancelado') selected @endif>Cancelado</option>
                </select>
          </div>

          <button class="blue-button mr" type="submit">Atualizar Status</button>
          <button class="white-button mr mb-5" onclick="window.location.href = '{{ route('pedido.index') }}'" type="button">Voltar</button>

        </form>
      </section>
    </main>
  </body>
</html>
