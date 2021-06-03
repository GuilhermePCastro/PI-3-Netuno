<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
    <link rel="stylesheet" href="{{ asset('css/prod-desc.css') }}">
    <title>Document</title>
</head>
<body class="dsk-container-4x25">
    <header>
        @include('layouts.headernaologado')
    </header>



    <!-- Mostrando mensagem na tela com a session -->
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert"> {{session()->get('success')}}</div>
    @endif
        <!-- Mostrando mensagem na tela com a session -->
    @if(session()->has('error'))
        <div class="alert alert-danger" role="alert"> {{session()->get('error')}} </div>
    @endif


    <div class=" row mx-0 justify-content-center mt-4 ">

        <div class="row justify-content-center">
            <div class="col-3">
                <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image">
            </div>
        </div> <br><br>
        <div class="row justify-content-center">
            <div class="col-7 text-center">
                <h5>Compra Feita Com Sucesso</h5>
            </div>
        </div>

    </div>


    <div class="mt-3 footer-dark">
    </div>

</div>
</body>
</html>

