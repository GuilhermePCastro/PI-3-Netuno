<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro de produto</title>

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
      <div class="bg-blue"></div>
      <div class="bg-yellow"></div>
    </header>
    <main class="main">
      @include('layouts.menu')
      <section class="main__page-content right-container">
        <div class="page-content__title">
          <h1 class="page-title mb">Produtos</h1>
        </div>

        <form class="page-content__inputs mb" method='POST'  action="{{ Route('produto.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="inputs-group mb">
            <label class="input-container input-container-80">
              Nome do produto*
              <input name="ds_nome" type="text" required/>
            </label>
          </div>

          <div class="inputs-group">
            <label class="input-container input-container-40">
              Categoria*
                <select name="category_id">
                    <option value="">Selecione um valor</option>
                    @foreach ($categories as $category )
                        <option value="{{$category->id}}">{{$category->cate_nome}}</option>
                    @endforeach
                </select>
            </label>
            <label class="input-container input-container-40">
              Tag*
              <select name="fk_tagproduto" id="" required>
                <option value="0"></option>
                <option value="1">Boneco</option>
                <option value="2">Carro</option>
              </select>
            </label>
          </div>

          <div class="inputs-group">
            <label class="input-container input-container-25">
              Preço venda*
              <input min='0' name="vl_produto" type="number" required/>
            </label>
            <label class="input-container input-container-25">
              Estoque mínimo
              <input min='0' name="qt_estoquemin" type="number" />
            </label>
            <label class="input-container input-container-25">
              Estoque máximo
              <input min='0' name="qt_estoquemax" type="number" />
            </label>
            <label class="input-container input-container-25">
              Estoque atual
              <input min='0' name="qt_estoque" type="number" />
            </label>
          </div>
            <label class="input-container input-container">
              Foto Principal
              <input type="file" name='hx_foto1'/>
            </label>
            <label class="input-container input-container">
              Foto Secundaria
              <input type="file" name='hx_foto2'/>
            </label>
            <label class="input-container">
                Descrição
                <textarea name="ds_descricao" id="" cols="30" rows="10"></textarea>
            </label>

          <button class="blue-button mr" type="submit">Salvar</button>
          <button class="white-button" type="button">Limpar</button>

        </form>
      </section>
    </main>
  </body>
</html>
