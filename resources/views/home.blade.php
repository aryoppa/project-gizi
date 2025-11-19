<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/img/logo_semai.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nerko+One&display=swap"
        rel="stylesheet">
    <title>SEMAI</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body style="background-color: #FFFFFF; overflow-x: hidden; padding-top: 70px;">
    <x-navbar class="montserrat" />
    <x-header title="FUEL YOUR DAY WITH<br>GOOD NUTRITION"
        subtitle="MULAILAH HARIMU DENGAN PILIHAN BERGIZI YANG<br> MENYEHATKAN TUBUH DAN MENYEGARKAN PIKIRAN."
        foodImage="/img/header1.png" :showDownloadButton="true" />

    <!-- SECTION: TENTANG KAMI -->
    <section id="tentang-kami" class="tentang-kami py-5 position-relative my-5">
        <img src="/icons/bg-icon1.png" alt="decoration" class="section-icon icon-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <img src="/img/tentang_kami.png" alt="Tentang Kami" class="img-fluid">
                </div>
                <div class="col-lg-8">
                    <span class="badge montserrat montserrat-semibold mb-2 px-4 py-3"
                        style="background-color: #FFDABB; color: #FF821C; font-size: 1.5rem; border-radius: 10px;">
                        Tentang Kami
                    </span>
                    <h2 class="nerko-one-regular mb-3" style="font-size: 2.5rem;">APA ITU PROGRAM SEMAI?</h2>
                    <p class="montserrat montserrat-medium lh-lg" style="text-align: justify;">
                        Program Semai diperuntukkan untuk meningkatkan pengetahuan Guru TK terkait gizi seimbang untuk
                        anak pra sekolah,
                        perencanaan menu yang sesuai serta keamanan makanan dalam penyelenggaraan makanan di sekolah
                        sehingga dapat
                        menciptakan generasi yang sehat, unggul & berprestasi.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- EDUKASI -->
    <section class="edukasi py-5 position-relative my-5" style="background-color: #ffffff;">
        <img src="/icons/bg-icon2.png" alt="decoration" class="section-icon icon-2">
        <div class="container">
            <div>
                <span class="badge montserrat montserrat-semibold mb-2 px-4 py-3"
                    style="background-color: #FFDABB; color: #FF821C; font-size: 1.5rem; border-radius: 10px;">
                    Edukasi
                </span>
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="nerko-one-regular mb-0"
                        style="color: #000000; font-size: 2.5rem; letter-spacing: 0.5px;">
                        EDUKASI TENTANG GIZI
                    </h2>
                    <a href="/edukasi" class="montserrat montserrat-semibold" style="color: #287BBF; font-size: 1rem;">
                        Lihat Semuanya
                    </a>
                </div>
            </div>

            <x-carousel type="edukasi" carouselId="edukasiCarousel" :items="$carouselItems" />
        </div>
    </section>

    <!-- RESEP MAKANAN -->
    <section class="resep py-5 position-relative mt-5" style="background-color: #BFD8EC;">
        <img src="/icons/resep1.png" alt="decoration" class="resep-icon icon-1">
        <img src="/icons/resep2.png" alt="decoration" class="resep-icon icon-2">
        <div class="container pb-5">
            <div>
                <span class="badge montserrat montserrat-semibold mb-2 px-4 py-3"
                    style="background-color: #FFDABB; color: #FF821C; font-size: 1.5rem; border-radius: 10px;">
                    Resep Makanan
                </span>
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="nerko-one-regular mb-0"
                        style="color: #000000; font-size: 2.5rem; letter-spacing: 0.5px;">
                        RESEP MAKANAN SEHAT
                    </h2>
                    <a href="/edukasi" class="montserrat montserrat-semibold" style="color: #FF821C; font-size: 1rem;">
                        Lihat Semuanya
                    </a>
                </div>
            </div>

            <x-carousel type="resep" carouselId="resepCarousel" :items="$resepItems" />
        </div>
    </section>

    <!-- SECTION: MEAL PLAN -->
    <section id="mealplan" class="mealplan py-5 position-relative" style="background-color: #ffffff;">
        <img src="/icons/bg-icon3.png" alt="decoration" class="section-icon icon-3">
        <img src="/icons/bg-icon4.png" alt="decoration" class="section-icon icon-4">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge montserrat montserrat-semibold mb-2 px-4 py-3"
                    style="background-color: #FFDABB; color: #FF821C; font-size: 1.5rem; border-radius: 10px;">
                    <i>MealPlan</i>
                </span>
            </div>

            <div class="row g-4 justify-content-center">
                <!-- MAKAN PAGI -->
                <div class="col-lg-5 col-md-6">
                    <div class="mealplan border-0 h-100">
                        <div class="text-center">
                            <div class="meal-icon-wrapper mb-4">
                                <img src="/icons/makan_pagi.png" alt="Makan Pagi" class="meal-icon">
                            </div>
                            <h2 class="nerko-one-regular mb-4">MAKAN PAGI</h2>

                            <!-- Nasi Uduk -->
                            <div class="meal-menu-item mb-4 text-center montserrat">
                                <h5 class="montserrat-bold mb-3">Nasi Uduk</h5>
                                <ul class="list-unstyled meal-list text-center">
                                    <li>
                                        <p class="mb-0"><i class="bi bi-dot"></i>Karbohidrat: Nasi uduk</p>
                                    </li>
                                    <li>
                                        <p class="mb-0"><i class="bi bi-dot"></i>Protein Hewani: Telur dadar</p>
                                    </li>
                                    <li>
                                        <p class="mb-0"><i class="bi bi-dot"></i>Protein Nabati: Semur tahu</p>
                                    </li>
                                    <li>
                                        <p class="mb-0"><i class="bi bi-dot"></i>Sayuran: Timun, selada air</p>
                                    </li>
                                </ul>
                            </div>

                            <!-- Snack -->
                            <div class="meal-menu-item montserrat text-center">
                                <h5 class="montserrat-bold mb-2"><i>Snack</i></h5>
                                <p class="montserrat-regular mb-0";">Sup buah Pelangi</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MAKAN SIANG -->
                <div class="col-lg-5 col-md-6">
                    <div class="mealplan border-0 h-100">
                        <div class="text-center">
                            <div class="meal-icon-wrapper mb-4">
                                <img src="/icons/makan_siang.png" alt="Makan Siang" class="meal-icon">
                            </div>
                            <h2 class="nerko-one-regular mb-4">MAKAN SIANG</h2>

                            <!-- Sup Ayam -->
                            <div class="meal-menu-item mb-4 text-center montserrat">
                                <h5 class="montserrat-bold mb-3">Sup Ayam</h5>
                                <ul class="list-unstyled meal-list text-center">
                                    <li>
                                        <p class="mb-0"><i class="bi bi-dot"></i>Karbohidrat: Nasi, kentang</p>
                                    </li>
                                    <li>
                                        <p class="mb-0"><i class="bi bi-dot"></i>Protein Hewani: Ayam bumbu lengkuas
                                        </p>
                                    </li>
                                    <li>
                                        <p class="mb-0"><i class="bi bi-dot"></i>Protein Nabati: Tahu goreng</p>
                                    </li>
                                    <li>
                                        <p class="mb-0"><i class="bi bi-dot"></i>Sayuran: Kol, wortel, kembang kol
                                        </p>
                                    </li>
                                    <li>
                                        <p class="mb-0"><i class="bi bi-dot"></i>Buah: Melon</p>
                                    </li>
                                </ul>
                            </div>

                            <!-- Saryu Asam -->
                            <div class="meal-menu-item mb-4 text-center montserrat">
                                <h5 class="montserrat-bold mb-3">Sayur Asam</h5>
                                <ul class="list-unstyled meal-list text-center">
                                    <li>
                                        <p class="mb-0"><i class="bi bi-dot"></i>Karbohidrat: Nasi putih</p>
                                    </li>
                                    <li>
                                        <p class="mb-0"><i class="bi bi-dot"></i>Protein Hewani: Ikan teri kacang
                                            balado</p>
                                    </li>
                                    <li>
                                        <p class="mb-0"><i class="bi bi-dot"></i>Protein Nabati: Tempe goreng</p>
                                    </li>
                                    <li>
                                        <p class="mb-0"><i class="bi bi-dot"></i>Sayuran: Labu siam, melinjo</p>
                                    </li>
                                    <li>
                                        <p class="mb-0"><i class="bi bi-dot"></i>Buah: Semangka</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- SECTION: DOKUMENTASI -->
    <section id="dokumentasi" class="dokumentasi py-5 position-relative">
        <div class="container-fluid dokum">
            <div>
                <div class="container pb-3">
                    <span class="badge montserrat montserrat-semibold mb-3 px-4 py-3"
                        style="background-color: #FFDABB; color: #FF821C; font-size: 1.5rem; border-radius: 10px;">
                        Dokumentasi
                    </span>
                    <h2 class="nerko-one-regular mb-0"
                        style="color: #000000; font-size: 2.5rem; letter-spacing: 0.5px;">
                        DOKUMENTASI KEGIATAN
                    </h2>
                </div>


                <x-carousel-dokumentasi :items="$dokItems" />
            </div>
    </section>

    <x-footer />

    <style>
        html {
            scroll-behavior: smooth;
        }

        section[id] {
            scroll-margin-top: 100px;
        }

        .section-icon {
            position: absolute;
            width: 150px;
            height: 150px;
            object-fit: contain;
            pointer-events: none;
            z-index: 0;
        }

        /* Icon 1: Kanan section tentang kami */
        .tentang-kami .icon-1 {
            top: 20%;
            right: 3%;
        }

        /* Icon 2: Kiri section edukasi */
        .edukasi .icon-2 {
            top: 30%;
            left: 3%;
        }

        /* Icon 3: Kanan atas meal plan */
        .mealplan .icon-3 {
            top: 10%;
            right: 3%;
        }

        /* Icon 4: Kiri bawah meal plan */
        .mealplan .icon-4 {
            bottom: 10%;
            left: 2%;
        }

        .resep-icon {
            position: absolute;
            object-fit: contain;
            pointer-events: none;
            /* z-index: 1; */
        }

        /* Icon 1: Bottom-left */
        .resep .icon-1 {
            width: 450px;
            height: 450px;
            bottom: 25%;
            right: 85%;
        }

        /* Icon 2: Top-right */
        .resep .icon-2 {
            width: 225px;
            height: 225px;
            top: 75%;
            left: 85%;
        }


        /* ========== RESPONSIVE ENHANCEMENTS ========== */

        /* Tablet and below (992px and down) */
        @media (max-width: 991px) {
            body {
                padding-top: 60px;
            }

            section[id] {
                scroll-margin-top: 80px;
            }

            /* Badge adjustments */
            .badge {
                font-size: 1.2rem !important;
                padding: 0.5rem 1.5rem !important;
            }

            /* Heading adjustments */
            .nerko-one-regular {
                font-size: 2rem !important;
            }

            /* Section spacing */
            .py-5 {
                padding-top: 2rem !important;
                padding-bottom: 2rem !important;
            }

            .my-5 {
                margin-top: 2rem !important;
                margin-bottom: 2rem !important;
            }

            /* Tentang Kami section */
            .tentang-kami .col-lg-4 {
                text-align: center;
            }

            .tentang-kami .col-lg-8 {
                text-align: center;
            }

            .tentang-kami p {
                text-align: center !important;
            }

            /* Edukasi & Resep sections */
            .edukasi .d-flex,
            .resep .d-flex {
                flex-direction: column;
                align-items: flex-start !important;
                gap: 1rem;
            }

            .edukasi a,
            .resep a {
                align-self: flex-end;
            }

            /* Meal plan adjustments */
            .meal-icon-wrapper img {
                max-width: 120px;
                height: auto;
            }

            .meal-menu-item h5 {
                font-size: 1.1rem;
            }

            .meal-menu-item p {
                font-size: 0.9rem;
            }

            /* Resep icons hide on tablet */
            .resep .resep-icon {
                display: none;
            }
        }

        /* Mobile (768px and down) */
        @media (max-width: 767px) {
            body {
                padding-top: 60px;
            }

            /* Badge adjustments */
            .badge {
                font-size: 1rem !important;
                padding: 0.4rem 1rem !important;
            }

            /* Heading adjustments */
            .nerko-one-regular {
                font-size: 1.5rem !important;
                line-height: 1.3;
            }

            /* Text adjustments */
            .montserrat-medium,
            .montserrat-regular {
                font-size: 0.9rem;
            }

            /* Section spacing */
            .py-5 {
                padding-top: 1.5rem !important;
                padding-bottom: 1.5rem !important;
            }

            .my-5 {
                margin-top: 1.5rem !important;
                margin-bottom: 1.5rem !important;
            }

            /* Container padding */
            .container {
                padding-left: 1rem;
                padding-right: 1rem;
            }

            /* Tentang Kami image */
            .tentang-kami .col-lg-4 img {
                max-width: 70%;
                margin: 0 auto;
            }

            /* Section header flex adjustments */
            .edukasi .d-flex,
            .resep .d-flex,
            .dokumentasi .d-flex {
                flex-direction: column;
                align-items: flex-start !important;
                gap: 0.5rem;
            }

            .edukasi h2,
            .resep h2,
            .dokumentasi h2 {
                font-size: 1.5rem !important;
            }

            .edukasi a,
            .resep a {
                font-size: 0.85rem !important;
            }

            /* Meal plan */
            .mealplan .text-center.mb-5 {
                margin-bottom: 2rem !important;
            }

            .meal-icon-wrapper {
                margin-bottom: 1.5rem !important;
            }

            .meal-icon-wrapper img {
                max-width: 100px;
            }

            .mealplan h2.nerko-one-regular {
                font-size: 1.8rem !important;
                margin-bottom: 1.5rem !important;
            }

            .meal-menu-item {
                margin-bottom: 2rem !important;
            }

            .meal-menu-item h5 {
                font-size: 1rem;
                margin-bottom: 1rem !important;
            }

            .meal-menu-item p,
            .meal-list li p {
                font-size: 0.85rem;
            }

            .meal-list li {
                margin-bottom: 0.3rem;
            }

            /* Hide decorative icons on mobile */
            .section-icon,
            .resep-icon {
                display: none !important;
            }

            /* Row gap adjustments */
            .row.g-4 {
                gap: 2rem !important;
            }
        }

        /* Small mobile (576px and down) */
        @media (max-width: 575px) {
            body {
                padding-top: 55px;
            }

            /* Badge */
            .badge {
                font-size: 0.9rem !important;
                padding: 0.3rem 0.8rem !important;
            }

            /* Headings */
            .nerko-one-regular {
                font-size: 1.3rem !important;
            }

            /* Paragraph text */
            .montserrat-medium,
            .montserrat-regular {
                font-size: 0.85rem;
                line-height: 1.6;
            }

            /* Section spacing */
            .py-5 {
                padding-top: 1.25rem !important;
                padding-bottom: 1.25rem !important;
            }

            .my-5 {
                margin-top: 1.25rem !important;
                margin-bottom: 1.25rem !important;
            }

            /* Tentang Kami */
            .tentang-kami .col-lg-4 img {
                max-width: 80%;
            }

            /* Links */
            .edukasi a,
            .resep a {
                font-size: 0.8rem !important;
            }

            /* Meal plan */
            .meal-icon-wrapper img {
                max-width: 80px;
            }

            .mealplan h2.nerko-one-regular {
                font-size: 1.5rem !important;
            }

            .meal-menu-item h5 {
                font-size: 0.95rem;
            }

            .meal-menu-item p,
            .meal-list li p {
                font-size: 0.8rem;
            }

            /* Container adjustments */
            .container {
                padding-left: 0.75rem;
                padding-right: 0.75rem;
            }
        }

        /* Extra small devices (480px and down) */
        @media (max-width: 480px) {
            .nerko-one-regular {
                font-size: 1.2rem !important;
            }

            .badge {
                font-size: 0.85rem !important;
            }

            .meal-icon-wrapper img {
                max-width: 70px;
            }

            .mealplan h2.nerko-one-regular {
                font-size: 1.3rem !important;
            }
        }

        /* Landscape orientation adjustments */
        @media (max-height: 600px) and (orientation: landscape) {
            body {
                padding-top: 50px;
            }

            .py-5 {
                padding-top: 1rem !important;
                padding-bottom: 1rem !important;
            }

            .my-5 {
                margin-top: 1rem !important;
                margin-bottom: 1rem !important;
            }
        }

        .navbar-scrolled {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1) !important;
        }
    </style>

    <script>
        // Add shadow to navbar when scrolling
        window.addEventListener('DOMContentLoaded', function() {
            const navbar = document.getElementById('mainNavbar');
            const header = document.querySelector('.header-hero');

            if (navbar && header) {
                function handleScroll() {
                    const headerHeight = header.offsetHeight;
                    const scrollPosition = window.scrollY;

                    if (scrollPosition > 50) {
                        navbar.classList.add('navbar-scrolled');
                    } else {
                        navbar.classList.remove('navbar-scrolled');
                    }
                }

                // Check on load
                handleScroll();

                // Check on scroll
                window.addEventListener('scroll', handleScroll);
            }
        });
    </script>
</body>

</html>
