<nav class="sidebar">
    <ul class="sidebar__nav">
        <li class="nav__item hide-children">
            <span class="item__title">
                <span>Cadastros</span>
                <img class="title__icon" src="{{ asset('svgs/arrow-down.svg') }}" alt="arrow down">
                </span>
            <ul class="item__subnav">
                <li class="subnav__item">
                    <a class="item__link" href="{{ Route('produto.index') }}">Produtos</a>
                </li>
                <li class="subnav__item">
                    <a class="item__link" href="{{ Route('category.index') }}">Categoria</a>
                </li>
                <li class="subnav__item">
                    <a class="item__link" href="{{ Route('tag.index') }}">Tag</a>
                </li>
            </ul>
        </li>
        <li class="nav__item hide-children">
            <span class="item__title">
                <span>Mais</span>
                <img
                    class="title__icon"
                    src="{{ asset('svgs/arrow-down.svg') }}"
                    alt="arrow down"
                />
            </span>
            <ul class="item__subnav">
                <li class="subnav__item">
                    <a class="item__link" href="/">Home</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
