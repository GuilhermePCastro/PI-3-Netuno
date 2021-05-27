<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de Clientes</title>
  <script src="{{ asset('js/menu.js') }}"></script>

  @include('layouts.bootstrap')
  <link href="{{ asset('css/header.css') }}" rel="stylesheet">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
  <link href="{{ asset('css/pg-users.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rhodium+Libre&display=swap" rel="stylesheet">

    <script>
        function remover(){
            return confirm('Você deseja remover a categoria ?');
        }
    </script>
</head>
<body>
  <header>
        @include('layouts.headerdashboard')
    </header>
  <main class="main">
    @include('layouts.menu')

    <section class="main__page-content right-container">
      <div class="page-content__title">
        <h1 class="title__text">Categoria</h1>
        <a href="{{ Route('category.create') }}">
          <button type="button" class="title__include">
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

      <form class="page-content__inputs inputs-group" action="{{ Route('category.filtro') }}">
        <label class="input-container input-container-10">
          Código
          <input id="codigo" name="codigo" type="text" class="input-container__input">
        </label>
        <label class="input-container input-container-40">
          Nome
          <input id="nome" name="nome" type="text" class="input-container__input">
        </label>
        <button type="submit" class="inputs__search">

          Buscar
        </button>
      </form>

      <table class="page-content__table"  border="0" cellpadding="0" cellspacing="0">
        <tr align="center">
            <th>Cód.</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Ação</th>
        </tr>
        @foreach($category as $cat)
            <tr>
                <td>
                    <a href="{{ route('category.show', $cat->id) }}">{{ $cat-> id }}</a>
                </td>
                <td>{{ $cat-> cate_nome }}</td>
                <td>{{ $cat-> cate_descricao }}</td>
                <td style="text-align:center">
                    <a href="{{ route('category.edit', $cat->id) }}" >
                        <button class='table__button table__edit' type='button'>
                            <img src="{{ asset('svgs/edit-icon.svg') }}"  alt='editar'>
                            Alterar
                        </button>
                    </a>
                    <form style="display: inline;" method="POST" action="{{route('category.destroy', $cat->id) }}" onsubmit="return remover();">
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
      <div class="mt-5 mb-5 d-flex justify-content-center">
        {{ $category->withQueryString()->links()}}
        </div>
    </section>
  </main>
</body>
</html>
