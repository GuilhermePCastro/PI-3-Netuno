<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro de Categoria</title>
    <script src="../assets/js/menu.js"></script>

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
    <nav class="sidebar">
            <ul class="sidebar__nav">
              <li class="nav__item hide-children">
                <span class="item__title">
                  Cadastros
                  <img class="title__icon" src="{{ asset('svgs/arrow-down.svg') }}" alt="arrow down">
                </span>
                <ul class="item__subnav">
                  <li class="subnav__item">
                    <a class="item__link" href="../../../backend/clienteconsultar.php">Clientes</a>
                  </li>
                  <li class="subnav__item">
                    <a class="item__link" href="../../../backend/produtoconsultar.php">Produtos</a>
                  </li>
                  <li class="subnav__item">
                    <a class="item__link" href="../../../backend/usuarioconsultar.php">Usuários</a>
                  </li>
                </ul>
              </li>
              <li class="nav__item hide-children">
                <span class="item__title">
                  Mais
                  <img
                    class="title__icon"
                    src="{{ asset('svgs/arrow-down.svg') }}"
                    alt="arrow down"
                  />
                </span>
                <ul class="item__subnav">
                  <li class="subnav__item">
                    <a class="item__link" href="../../../backend/logsconsultar.php">Logs</a>
                  </li>
                  <li class="subnav__item">
                    <a class="item__link" href="../../../backend/functions/logout.php">Logout</a>
                  </li>
                </ul>
              </li>
            </ul>
            <a href="./welcome.php">
                <img src="{{ asset('images/logo.png') }}">
            </a>
      </nav>
      <section class="main__page-content right-container">
        <div class="page-content__title">
          <h1 class="page-title mb">Categorias</h1>
        </div>

        <form class="page-content__inputs mb" method='POST'  action="{{ Route('category.update', $category->id) }}">
            @method('PATCH')
          @csrf
          <div class="inputs-group mb">
            <label class="input-container input-container-80">
              Nome da Categoria*
              <input name="cate_nome" type="text" value="{{ $category->cate_nome }}" required/>
            </label>
          </div>
          <div class="inputs-group mb">
            <label class="input-container input-container-80">
              Descricao da Categoria
              <input name="cate_descricao" type="text" value="{{ $category->cate_descricao }}" required/>
            </label>
          </div>

          <label class="checkbox-container mt mb">
            <input name="tg_inativo" type="checkbox"  id="" />
            Inativo
          </label>

          <button class="blue-button mr" type="submit">Salvar</button>
          <button class="white-button" type="button">Limpar</button>

        </form>
      </section>
    </main>
  </body>
</html>
