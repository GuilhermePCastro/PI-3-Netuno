
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro de produto</title>
    <script src="../web/src/assets/js/menu.js"></script>
    <link rel="stylesheet" href="../web/src/assets/styles/css/menu.css" />
    <link rel="stylesheet" href="../web/src/assets/styles/css/header.css" />
    <link rel="stylesheet" href="../web/src/assets/styles/css/main.css" />
    <link rel="stylesheet" href="../web/src/assets/styles/css/register-client.css">
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
    <nav class="sidebar">
        <ul class="sidebar__nav">
          <li class="nav__item hide-children">
            <span class="item__title">
              Cadastros
              <img
                class="title__icon"
                src="../web/src/assets/svgs/arrow-down.svg"
                alt="arrow down"
              />
            </span>
            <ul class="item__subnav">
              <li class="subnav__item">
                <a class="item__link" href="../backend/clienteconsultar.php">Clientes</a>
              </li>
              <li class="subnav__item">
                <a class="item__link" href="../backend/produtoconsultar.php">Produtos</a>
              </li>
              <li class="subnav__item">
                <a class="item__link" href="../backend/usuarioconsultar.php">Usuários</a>
              </li>
            </ul>
          </li>
          <li class="nav__item hide-children">
            <span class="item__title">
              Mais
              <img
                class="title__icon"
                src="../web/src/assets/svgs/arrow-down.svg"
                alt="arrow down"
              />
            </span>
            <ul class="item__subnav">
              <li class="subnav__item">
                <a class="item__link" href="../backend/logsconsultar.php">Logs</a>
              </li>
              <li class="subnav__item">
                <a class="item__link" href="../backend/functions/logout.php">Logout</a>
              </li>
            </ul>
          </li>
        </ul>
        <a href="../web/src/views/welcome.php">
          <img src="../web/src/assets/images/logo.png" alt="netuno" />
        </a>
      </nav>
      <section class="main__page-content right-container">
        <div class="page-content__title">
          <h1 class="page-title mb">Produtos(Alterar)</h1>
        </div>

         <form class="page-content__inputs mb" method='POST'  action="{{ route('produto.update', $produto->id) }}">
          @method('PATCH')
          @csrf
          <div class="inputs-group mb">
            <label class="input-container input-container-80">
              Nome do produto*
              <input name="ds_nome" type="text" value="{{ $produto->ds_nome}}" required/>
            </label>
          </div>

          <div class="inputs-group">
            <label class="input-container input-container-40">
              Categoria*
              <select name="fk_categoria" selected="{{ $produto->fk_categoria}}" id="" required>
                <option value="0"></option>
                <option value="1">ToyShow</option>
                <option value="2">MuitoBrinquedo's</option>
              </select>
            </label>
            <label class="input-container input-container-40">
              Tag*
              <select name="fk_tagproduto" value="{{ $produto->fk_tagproduto}}" id="" required>
                <option value="0"></option>
                <option value="1">Boneco</option>
                <option value="2">Carro</option>
              </select>
            </label>
          </div>

          <div class="inputs-group">
            <label class="input-container input-container-25">
              Preço venda*
              <input min='0' name="vl_produto" type="number" value="{{ $produto->vl_produto}}" required/>
            </label>
            <label class="input-container input-container-25">
              Estoque mínimo
              <input min='0' name="qt_estoquemin" value="{{ $produto->qt_estoquemin}}" type="number" />
            </label>
            <label class="input-container input-container-25">
              Estoque máximo
              <input min='0' name="qt_estoquemax" value="{{ $produto->qt_estoquemax}}" type="number" />
            </label>
            <label class="input-container input-container-25">
              Estoque atual
              <input min='0' name="qt_estoque" value="{{ $produto->qt_estoque}}" type="number" />
            </label>
          </div>

          <label class="input-container">
            Descrição
            <textarea name="ds_descricao" id="" cols="30" rows="10">{{ $produto->ds_descricao}}</textarea>
          </label>

          <label class="checkbox-container mt mb">
            <input name="tg_inativo" type="checkbox" @if($produto->tg_inativo==1) checked @endif/>
            Inativo
          </label>

          <button class="blue-button mr" type="submit">Salvar</button>
          <button class="white-button" type="button">Limpar</button>

        </form>
      </section>
    </main>
  </body>
</html>
