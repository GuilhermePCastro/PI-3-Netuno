<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de Clientes</title>
  <script src="{{ asset('js/menu.js') }}"></script>

  <link href="{{ asset('css/header.css') }}" rel="stylesheet">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
  <link href="{{ asset('css/pg-users.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rhodium+Libre&display=swap" rel="stylesheet">

    <script>
        function remover(){
            return confirm('Você deseja remover o produto ?');
        }
    </script>
</head>
<body>
  <header>
    <div class="bg-blue">
    </div>
    <div class="bg-yellow">
    </div>
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
                <a class="item__link" href="./clienteconsultar.php">Clientes</a>
              </li>
              <li class="subnav__item">
                <a class="item__link" href="./produtoconsultar.php">Produtos</a>
              </li>
              <li class="subnav__item">
                <a class="item__link" href="./usuarioconsultar.php">Usuários</a>
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
                <a class="item__link" href="./logsconsultar.php">Logs</a>
              </li>
              <li class="subnav__item">
                <a class="item__link" href="../backend/functions/logout.php">Logout</a>
              </li>
            </ul>
          </li>
        </ul>
        <a href="../web/src/views/welcome.php">
          <img src="{{ asset('images/logo.png') }}">
        </a>
    </nav>
    <section class="main__page-content right-container">
      <div class="page-content__title">
        <h1 class="title__text">Produtos</h1>
        <a href="{{ Route('produto.create') }}">
          <button type="button" class="title__include">
            <img src="{{ asset('svgs/plus-square.svg') }}" alt="+">
            Incluir Registro
          </button>
        </a>
      </div>

        <!-- Mostrando mensagem na tela com a session -->
        @if(session()->has('valido'))
            <div class="valido">
                {{session()->get('valido')}}
            </div>
        @endif

            <!-- Mostrando mensagem na tela com a session -->
        @if(session()->has('invalido'))
            <div class="invalido">
                {{session()->get('invalido')}}
            </div>
        @endif

      <form class="page-content__inputs inputs-group">
        <label class="input-container input-container-10">
          Código
          <input name="codigo" type="text" class="input-container__input">
        </label>
        <label class="input-container input-container-40">
          Nome
          <input name="nome" type="text" class="input-container__input">
        </label>
        <label class="input-container input-container-30">
          Categoria
          <select name="categoria" id="" required>
            <option value="0"></option>
            <option value="1">Boneco</option>
            <option value="2">Carro</option>
          </select>
        </label>
        <button type="submit" class="inputs__search">
          <img  src="{{ asset('svgs/search-icon.svg') }}" alt="buscar">
          Buscar
        </button>
      </form>

      <table class="page-content__table"  border="0" cellpadding="0" cellspacing="0">
        <tr align="center">
          <th>Cód.</th>
          <th>Nome</th>
          <th>Preço</th>
          <th>Ação</th>
        </tr>
        @foreach($produtos as $produto)
            <tr>
                <td>{{ $produto -> id }}</td>
                <td>{{ $produto -> ds_nome }}</td>
                <td>{{ $produto -> vl_produto }}</td>
                <td>
                    <a href="#" >
                        <button class='table__button table__edit' type='button'>
                            <img src="{{ asset('svgs/edit-icon.svg') }}"  alt='editar'>
                            View
                        </button>
                    </a>
                    <a href="{{ route('produto.edit', $produto->id) }}" >
                        <button class='table__button table__edit' type='button'>
                            <img src="{{ asset('svgs/edit-icon.svg') }}"  alt='editar'>
                            Alterar
                        </button>
                    </a>
                    <form style="display: inline;" method="POST" action="{{route('produto.destroy', $produto->id) }}" onsubmit="return remover();">
                        @method('DELETE')
                        @csrf
                        <button type="submit"  class='table__button table__remove'>
                            <img src="{{ asset('svgs/trash-icon.svg') }}" alt='remover'>
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
      </table>
    </section>
  </main>
</body>
</html>
