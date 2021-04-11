<nav class="sidebar">
    <ul class="sidebar__nav">
        <li class="nav__item hide-children">
            <span class="item__title">
                Cadastros
                <img class="title__icon" src="{{ asset('svgs/arrow-down.svg') }}" alt="arrow down">
                </span>
            <ul class="item__subnav">
                <li class="subnav__item">
                    <a class="item__link" href="{{ Route('produto.index') }}">Clientes</a>
                </li>
                <li class="subnav__item">
                    <a class="item__link" href="{{ Route('produto.index') }}">Produtos</a>
                </li>
                <li class="subnav__item">
                    <a class="item__link" href="{{ Route('category.index') }}">Categoria</a>
                </li>
                <li class="subnav__item">
                    <a class="item__link" href="{{ Route('tag.index') }}">Tag</a>
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
