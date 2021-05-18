<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/home-filtro.css') }}">
    <title>Home Filtro</title>
</head>
<body class="dsk-container-4x25">
    <header>
        <div class="header-principal bg-light d-flex align-items-center">
            <div class=" dsk-container-4x1 sm-container-4x1 "></div>
            <div class="logo-header bg-primary dsk-container-4x4 sm-container-4x9"></div>
            <div class=" nav-item dropdown pl-3">
                <a class="nav-link h-100 btn btn-outline-primary dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Filtro
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>

                  </div>
            </div>
        </div>
    </header>

    <div class=" mt-4 row m-0 justify-content-center">
        <div class=" dsk-container-4x25">
            <div class=" row m-0 my-3">
                <div class="dsk-container-4x1"></div>
                <h2 class="m-0 text-uppercase text-h2 ">Lançamentos</h2>
            </div>

        </div>
    </div>

    <div class=" kards dsk-container-4x25 ">

        <div class=" row m-0 justify-content-center">

            <div class="dsk-container-4x1"></div>

            <!------ inicio foreach ------>

            <div class="mt-3 dsk-container-4x5 sm-container-4x11 kard shadow text-center">
                <img class="img-kard" src="https://via.placeholder.com/400" alt="">
                <div class="w-100 cont-kard text-center">
                    <p class="m-0  text-kard ">Camiseta Dupla Face Naruto</p>
                    <p class="m-0  money-kard d-inline">R$ </p><p class="money-kard mt-4 d-inline">79.90</p>
                </div>
                <div class="w-100 mt-3">
                    <button class="btn-kard text-uppercase w-100">Adicionar</button>
                </div>
            </div>

            <div class="dsk-container-4x1"></div>

            <!------ end ------->

            <div class="mt-3 dsk-container-4x5 sm-container-4x11 kard shadow text-center">
                <img class="img-kard" src="https://via.placeholder.com/400" alt="">
                <div class="w-100 cont-kard text-center">
                    <p class="m-0  text-kard ">Camiseta Dupla Face Naruto</p>
                    <p class="m-0  money-kard d-inline">R$ </p><p class="money-kard mt-4 d-inline">79.90</p>
                </div>
                <div class="w-100 mt-3">
                    <button class="btn-kard text-uppercase w-100">Adicionar</button>
                </div>
            </div>

            <div class="dsk-container-4x1"></div>
            <div class="sm-container-4x1"></div>

            <div class="mt-3 dsk-container-4x5 sm-container-4x11 kard shadow text-center">
                <img class="img-kard" src="https://via.placeholder.com/400" alt="">
                <div class="w-100 cont-kard text-center">
                    <p class="m-0  text-kard ">Camiseta Dupla Face Naruto</p>
                    <p class="m-0  money-kard d-inline">R$ </p><p class="money-kard mt-4 d-inline">79.90</p>
                </div>
                <div class="w-100 mt-3">
                    <button class="btn-kard text-uppercase w-100">LANÇAMENTOS</button>
                </div>
            </div>

            <div class="dsk-container-4x1"></div>

            <div class="mt-3 dsk-container-4x5 sm-container-4x11 kard shadow text-center">
                <img class="img-kard" src="https://via.placeholder.com/400" alt="">
                <div class="w-100 cont-kard text-center">
                    <p class="m-0  text-kard ">Camiseta Dupla Face Naruto</p>
                    <p class="m-0  money-kard d-inline">R$ </p><p class="money-kard mt-4 d-inline">79.90</p>
                </div>
                <div class="w-100 mt-3">
                    <button class="btn-kard text-uppercase w-100">Adicionar</button>
                </div>
            </div>

            <div class="dsk-container-4x1"></div>
        </div>
    </div>


    <div class=" kards dsk-container-4x25 ">

        <div class=" row m-0 justify-content-center">

            <div class="dsk-container-4x1"></div>

            <!------ inicio foreach ------>

            <div class="mt-3 dsk-container-4x5 sm-container-4x11 kard shadow text-center">
                <img class="img-kard" src="https://via.placeholder.com/400" alt="">
                <div class="w-100 cont-kard text-center">
                    <p class="m-0  text-kard ">Camiseta Dupla Face Naruto</p>
                    <p class="m-0  money-kard d-inline">R$ </p><p class="money-kard mt-4 d-inline">79.90</p>
                </div>
                <div class="w-100 mt-3">
                    <button class="btn-kard text-uppercase w-100">Adicionar</button>
                </div>
            </div>

            <div class="dsk-container-4x1"></div>

            <!------ end ------->

            <div class="mt-3 dsk-container-4x5 sm-container-4x11 kard shadow text-center">
                <img class="img-kard" src="https://via.placeholder.com/400" alt="">
                <div class="w-100 cont-kard text-center">
                    <p class="m-0  text-kard ">Camiseta Dupla Face Naruto</p>
                    <p class="m-0  money-kard d-inline">R$ </p><p class="money-kard mt-4 d-inline">79.90</p>
                </div>
                <div class="w-100 mt-3">
                    <button class="btn-kard text-uppercase w-100">Adicionar</button>
                </div>
            </div>

            <div class="dsk-container-4x1"></div>
            <div class="sm-container-4x1"></div>

            <div class="mt-3 dsk-container-4x5 sm-container-4x11 kard shadow text-center">
                <img class="img-kard" src="https://via.placeholder.com/400" alt="">
                <div class="w-100 cont-kard text-center">
                    <p class="m-0  text-kard ">Camiseta Dupla Face Naruto</p>
                    <p class="m-0  money-kard d-inline">R$ </p><p class="money-kard mt-4 d-inline">79.90</p>
                </div>
                <div class="w-100 mt-3">
                    <button class="btn-kard text-uppercase w-100">LANÇAMENTOS</button>
                </div>
            </div>

            <div class="dsk-container-4x1"></div>

            <div class="mt-3 dsk-container-4x5 sm-container-4x11 kard shadow text-center">
                <img class="img-kard" src="https://via.placeholder.com/400" alt="">
                <div class="w-100 cont-kard text-center">
                    <p class="m-0  text-kard ">Camiseta Dupla Face Naruto</p>
                    <p class="m-0  money-kard d-inline">R$ </p><p class="money-kard mt-4 d-inline">79.90</p>
                </div>
                <div class="w-100 mt-3">
                    <button class="btn-kard text-uppercase w-100">Adicionar</button>
                </div>
            </div>

            <div class="dsk-container-4x1"></div>
        </div>
    </div>

</body>
</html>