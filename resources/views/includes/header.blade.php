

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid ms-xl-5 me-xl-5 me-lg-0 ms-lg-0 pt-1 pb-1">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-3 me-3">
                    <li class="nav-item">
                        <a class="nav-link {{ active_link('home') }}" aria-current="page"
                           href="{{ route('home') }}">Главная</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
