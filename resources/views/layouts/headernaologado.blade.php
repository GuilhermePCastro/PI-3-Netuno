<div class="header-principal navbar-expand-md bg-light d-flex align-items-center d-flex bd-highlight mb-0">
    <div class=" dsk-container-4x1 sm-container-4x1 "></div>
    <div class="logo-header mb-0 bg-primary dsk-container-4x4 sm-container-4x9"></div>

    <button class="navbar-toggler ml-auto p-2 bd-highlight" type="button" data-toggle="collapse" data-target="#openClose" aria-controls="openClose" aria-expanded="false" aria-label="Toggle navigation">
        <i class="far fa-caret-square-down icon-yellow fa-2x"></i>
    </button>

    <div class="collapse navbar-collapse" id="openClose">
        <div class=" nav-item dropdown pl-3">
            <a class="nav-link h-100 btn btn-outline-primary dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Filtro
            </a>
            <!-- colocar aqui o foreach de tags -->
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach (\App\Models\Tag::all() as $tag)
                    @if (\App\Models\Tag::quantidadesProdutos($tag->id) > 0)
                        <a class="dropdown-item" href="{{ route('tag.show', $tag->id)}}">{{ $tag->tag_nome }}</a>
                    @endif
                @endforeach
            </div>
            <!-- terminar aqui -->
        </div>

        <div class=" nav-item dropdown pl-3">
            <a class="nav-link h-100 btn btn-outline-primary dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categorias
            </a>
            <!-- colocar aqui o foreach de categorias -->
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach (\App\Models\Category::all() as $category)
                    @if (\App\Models\Category::quantidadesProdutos($category->id) > 0)
                        <a class="dropdown-item" href="{{ route('category.show', $category->id)}}">{{ $category->cate_nome }}</a>
                    @endif
                @endforeach
            </div>
            <!-- terminar aqui -->
        </div>


        @if(Auth()->user())
            <div class=" nav-item dropdown pl-3 ml-auto p-2 bd-highlight">
                <a class="nav-link h-100 btn btn-warning dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth()->user()->name }}
                </a>
                <!-- colocar aqui as informações do usuário -->
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @if (Auth()->user()->IsAdmin == 1)
                        <a class="dropdown-item" href="{{ Route('produto.index') }}">Admin</a>
                    @endif
                    @if (\App\Models\User::cliente())
                        <a class="dropdown-item" href="{{ route('cliente.show', \App\Models\User::cliente()->id )}} ">Perfil</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link style="" class="dropdown-item" :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Sair') }}
                        </x-dropdown-link>
                    </form>
                </div>
                <!-- terminar aqui -->
            </div>
             <!-- colocar aqui logout -->
            <div class=" nav-item dropdown pl-3 ">
                <a class="color-warning h5" href="{{ Route('carrinho.show')}}"><i class="fas fa-shopping-cart fa-2x""></i>{{ \App\Models\Carrinho::quantidade() }}</a>
            </div>
            <div class=" dsk-container-4x1 sm-container-4x1 "></div>
        @else
            <div class="ml-auto p-2">
                <a href="{{ Route('register') }}" class="mr-3">Registrar</a>
                <a href="{{ Route('login') }}"class="mr-5">Entrar</a>
            <div class=" dsk-container-4x1 sm-container-4x1"></div>
        @endif



    </div>
</div>
