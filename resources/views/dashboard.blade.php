<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>

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

        <h2>Últimos 5 pedidos</h2>
        <table class="page-content__table"  border="0" cellpadding="0" cellspacing="0">
            <tr align="center">
            <th>Cód.</th>
            <th>CPF Cliente</th>
            <th>Status</th>
            <th>Data</th>
            <th>Total</th>
            </tr>
            @foreach(\App\Models\Pedido::ult5pedidos() as $pedido)
                <tr>
                    <td>{{ $pedido -> id }}</td>
                    <td>{{ $pedido->cliente()->ds_cpf }}</td>
                    <td>{{ $pedido -> ds_status }}</td>
                    <td>{{ $pedido -> created_at }}</td>
                    <td>{{ number_format($pedido -> vl_total, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </table>
    </section>

  </main>
</body>
</html>
