<nav id="mainNavbar" class="navbar navbar-expand-lg fixed-top" style="background-color: #BFD8EC; z-index: 1030; transition: box-shadow 0.3s ease;">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="/img/allLogo.png" alt="Logo"></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="montserrat montserrat-semibold collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0" style="color: #000">
                <li class="nav-item">
                    <x-nav-link href="/" :active="request()->is('/')">
                        Beranda
                    </x-nav-link>
                </li>
                <li class="nav-item">
                    <x-nav-link href="/#tentang-kami" :active="request()->is('/')">
                        Tentang Kami
                    </x-nav-link>
                </li>
                <li class="nav-item">
                    <x-nav-link href="/#dokumentasi" :active="request()->is('/')">
                        Dokumentasi
                    </x-nav-link>
                </li>
                <li class="nav-item">
                    <x-nav-link href="/edukasi" :active="request()->is('edukasi')">
                        Edukasi
                    </x-nav-link>
                </li>
                <li class="nav-item">
                    <x-nav-link href="/resep" :active="request()->is('resep')">
                        Resep
                    </x-nav-link>
                </li>
                <li class="nav-item">
                    <x-nav-link href="/#mealplan" :active="request()->is('/')">
                        <i>MealPlan</i>
                    </x-nav-link>
                </li>
            </ul>
        </div>
    </div>
</nav>
