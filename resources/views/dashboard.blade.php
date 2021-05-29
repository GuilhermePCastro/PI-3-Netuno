<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de Clientes</title>

  @include('layouts.bootstrap')
  <link href="{{ asset('css/header.css') }}" rel="stylesheet">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
  <link href="{{ asset('css/pg-users.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rhodium+Libre&display=swap" rel="stylesheet">
  <script src="{{ asset('js/menu.js') }}"></script>

</head>
<body>
    <header>
        @include('layouts.headerdashboard')
    </header>

  <main class="main">

    @include('layouts.menu')

    <section class="main__page-content right-container">

        <h2>Últimos 10 clientes</h2>
        <table class="page-content__table"  border="0" cellpadding="0" cellspacing="0">
            <tr align="center">
            <th>Nome</th>
            <th>CPF</th>
            <th>Celular</th>
            <th>Admin</th>
            <th>Ação</th>
            </tr>
            @foreach(\App\Models\Cliente::ult10Clientes() as $cliente)
                <tr>
                    <td>{{ $cliente->usuario()->name }}</td>
                    <td>{{ $cliente->ds_cpf }}</td>
                    <td>{{ $cliente->ds_celular }}</td>
                    <td>{{ $cliente->usuario()->isAdmin == 1 ? 'Sim' : 'Não' }}</td>
                    <td>
                        <a href="{{ route('produto.edit', $cliente->id) }}" >
                            <button class='table__button table__edit' type='button'>
                                <img src="{{ asset('svgs/edit-icon.svg') }}"  alt='editar'>
                                Vizualizar
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </section>

  </main>
</body>
</html>
