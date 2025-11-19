@props(['title', 'subtitle', 'foodImage', 'showDownloadButton' => false])

<header class="header-hero position-relative">
    <div class="half-circle" aria-hidden="true">
        <!-- Food Image - z-index terendah -->
        <div class="food-image">
            <img src="{{ $foodImage }}" alt="Food">
        </div>
    </div>

    <!-- Orange Decoration Icons (Ornament) - z-index tengah -->
    <img src="/icons/header_kiri.png" alt="decoration" class="header-orange-icon orange-icon-1">
    <img src="/icons/header_kanan.png" alt="decoration" class="header-orange-icon orange-icon-2">

    <!-- Hero Content (Tulisan) - z-index tertinggi -->
    <div class="container text-center hero-content">
        <h1 class="nerko-one-regular display-4 fw-bold mt-4" style="font-size: 3.125rem;">{!! $title !!}</h1>
        <p class="nerko-one-regular lead mb-3" style="font-size: 1.5rem;">{!! $subtitle !!}</p>
        @if ($showDownloadButton)
            <a href="{{ asset('booklet/Booklet Abdimas.pdf') }}" class="btn btn-orange"><i>Download Booklet</i></a>
        @endif
    </div>
</header>

<style>
    .header-hero {
        position: relative;
        overflow: hidden;
        background: transparent;
        min-height: 560px;
    }

    .half-circle {
        position: absolute;
        left: 50%;
        top: -115vw;
        width: 120vw;
        height: 155vw;
        transform: translateX(-50%);
        background-color: #BFD8EC;
        border-radius: 50%;
        z-index: 0;
        overflow: hidden;
    }

    .header-hero .ornament {
        position: absolute;
        width: 6.5vw;
        max-width: 50px;
        pointer-events: none;
        z-index: 9;
        opacity: 1;
        user-select: none;
        display: block;
    }

    .hero-content {
        position: relative;
        z-index: 10;
    }

    .header-hero .ornament.left {
        left: 6%;
        top: 18%;
        transform: rotate(-12deg);
    }

    .header-hero .ornament.right {
        right: 8%;
        top: 30%;
        transform: rotate(12deg);
    }

    .food-image {
        position: absolute;
        bottom: 0%;
        left: 35%;
        transform: translateX(-25%);
        transform: translateY(25%);
        width: 500px;
        height: 450px;
        overflow: visible;
        z-index: 1;
    }

    .food-image img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        object-position: center;
    }

    .header-hero .icon {
        width: 48px;
        height: 48px;
        object-fit: contain;
        margin: 0 12px;
    }

    /* Orange Decoration Icons (Ornament) */
    .header-orange-icon {
        position: absolute;
        width: 80px;
        height: 80px;
        object-fit: contain;
        pointer-events: none;
        z-index: 5;
    }

    /* Icon 1: Kiri atas */
    .header-hero .orange-icon-1 {
        top: 20%;
        left: 15%;
    }

    /* Icon 2: Kanan bawah */
    .header-hero .orange-icon-2 {
        top: 50%;
        right: 20%;
    }

    .btn-orange {
        background-color: #FFFFFF;
        color: #000000;
        font-size: 16px;
        font-weight: 600;
        border: 2px solid #FF821C;
        padding: 10px 20px;
        border-radius: 25px;
        text-decoration: none;
        box-shadow: 0 2px 5px #ff821c;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-orange:hover {
        background-color: #ff821c;
        color: #fff;
        transform: translateY(-2px);
    }

    /* ========== RESPONSIVE ENHANCEMENTS ========== */

    /* Large Desktop (1400px and up) */
    @media (min-width: 1400px) {
        .header-hero {
            min-height: 650px;
        }

        .food-image {
            width: 600px;
            height: 550px;
            left: 38%;
        }

        .header-orange-icon {
            width: 100px;
            height: 100px;
        }

        .hero-content h1 {
            font-size: 3.5rem !important;
        }

        .hero-content p {
            font-size: 1.75rem !important;
        }
    }

    /* Desktop (1200px - 1399px) */
    @media (min-width: 1200px) and (max-width: 1399px) {
        .header-hero {
            min-height: 600px;
        }

        .food-image {
            width: 550px;
            height: 500px;
        }

        .hero-content h1 {
            font-size: 3.125rem !important;
        }

        .hero-content p {
            font-size: 1.5rem !important;
        }
    }

    /* Tablet Landscape (992px - 1199px) */
    @media (min-width: 992px) and (max-width: 1199px) {
        .header-hero {
            min-height: 520px;
        }

        .food-image {
            width: 450px;
            height: 400px;
            left: 33%;
        }

        .header-orange-icon {
            width: 70px;
            height: 70px;
        }

        .hero-content h1 {
            font-size: 2.75rem !important;
        }

        .hero-content p {
            font-size: 1.35rem !important;
        }

        .btn-orange {
            font-size: 15px;
            padding: 9px 18px;
        }
    }

    /* Tablet Portrait (768px - 991px) */
    @media (min-width: 768px) and (max-width: 991px) {
        .header-hero {
            min-height: 480px;
        }

        .half-circle {
            top: -125vw;
            height: 165vw;
        }

        .food-image {
            width: 380px;
            height: 350px;
            left: 30%;
            transform: translateX(-20%) translateY(30%);
        }

        .header-orange-icon {
            width: 65px;
            height: 65px;
        }

        .header-hero .orange-icon-1 {
            top: 15%;
            left: 10%;
        }

        .header-hero .orange-icon-2 {
            top: 55%;
            right: 15%;
        }

        .hero-content {
            padding: 0 2rem;
        }

        .hero-content h1 {
            font-size: 2.5rem !important;
            line-height: 1.2;
        }

        .hero-content p {
            font-size: 1.2rem !important;
            line-height: 1.4;
        }

        .btn-orange {
            font-size: 14px;
            padding: 8px 16px;
        }
    }

    /* Mobile Large (576px - 767px) */
    @media (min-width: 576px) and (max-width: 767px) {
        .header-hero {
            min-height: 420px;
        }

        .half-circle {
            top: -130vw;
            height: 175vw;
        }

        .food-image {
            width: 320px;
            height: 300px;
            left: 50%;
            transform: translateX(-50%) translateY(35%);
            bottom: -5%;
        }

        .header-orange-icon {
            width: 55px;
            height: 55px;
        }

        .header-hero .orange-icon-1 {
            top: 8%;
            left: 5%;
        }

        .header-hero .orange-icon-2 {
            top: auto;
            bottom: 15%;
            right: 5%;
        }

        .hero-content {
            padding: 0 1.5rem;
        }

        .hero-content h1 {
            font-size: 2rem !important;
            line-height: 1.2;
            margin-top: 1.5rem !important;
        }

        .hero-content p {
            font-size: 1rem !important;
            line-height: 1.4;
            margin-bottom: 1rem !important;
        }

        .btn-orange {
            font-size: 13px;
            padding: 8px 16px;
        }
    }

    /* Mobile Medium (480px - 575px) */
    @media (min-width: 480px) and (max-width: 575px) {
        .header-hero {
            min-height: 380px;
        }

        .half-circle {
            top: -135vw;
            height: 180vw;
        }

        .food-image {
            width: 280px;
            height: 260px;
            left: 50%;
            transform: translateX(-50%) translateY(40%);
            bottom: -8%;
        }

        .header-orange-icon {
            width: 50px;
            height: 50px;
        }

        .header-hero .orange-icon-1 {
            top: 5%;
            left: 3%;
        }

        .header-hero .orange-icon-2 {
            top: auto;
            bottom: 12%;
            right: 3%;
        }

        .hero-content {
            padding: 0 1rem;
        }

        .hero-content h1 {
            font-size: 1.75rem !important;
            line-height: 1.2;
            margin-top: 1rem !important;
        }

        .hero-content h1 br {
            display: none;
        }

        .hero-content p {
            font-size: 0.9rem !important;
            line-height: 1.3;
            margin-bottom: 0.75rem !important;
        }

        .hero-content p br {
            display: none;
        }

        .btn-orange {
            font-size: 12px;
            padding: 7px 14px;
        }
    }

    /* Mobile Small (375px - 479px) */
    @media (min-width: 375px) and (max-width: 479px) {
        .header-hero {
            min-height: 350px;
        }

        .half-circle {
            top: -140vw;
            height: 185vw;
        }

        .food-image {
            width: 240px;
            height: 230px;
            left: 50%;
            transform: translateX(-50%) translateY(45%);
            bottom: -10%;
        }

        .header-orange-icon {
            width: 45px;
            height: 45px;
        }

        .header-hero .orange-icon-1 {
            top: 3%;
            left: 2%;
        }

        .header-hero .orange-icon-2 {
            top: auto;
            bottom: 10%;
            right: 2%;
        }

        .hero-content {
            padding: 0 0.75rem;
        }

        .hero-content h1 {
            font-size: 1.5rem !important;
            line-height: 1.2;
            margin-top: 0.75rem !important;
        }

        .hero-content h1 br {
            display: none;
        }

        .hero-content p {
            font-size: 0.8rem !important;
            line-height: 1.3;
            margin-bottom: 0.5rem !important;
        }

        .hero-content p br {
            display: none;
        }

        .btn-orange {
            font-size: 11px;
            padding: 6px 12px;
        }
    }

    /* Mobile Extra Small (below 375px) */
    @media (max-width: 374px) {
        .header-hero {
            min-height: 320px;
        }

        .half-circle {
            top: -145vw;
            height: 190vw;
        }

        .food-image {
            width: 200px;
            height: 190px;
            left: 50%;
            transform: translateX(-50%) translateY(50%);
            bottom: -12%;
        }

        .header-orange-icon {
            width: 40px;
            height: 40px;
        }

        .header-hero .orange-icon-1 {
            top: 2%;
            left: 1%;
        }

        .header-hero .orange-icon-2 {
            top: auto;
            bottom: 8%;
            right: 1%;
        }

        .hero-content {
            padding: 0 0.5rem;
        }

        .hero-content h1 {
            font-size: 1.3rem !important;
            line-height: 1.2;
            margin-top: 0.5rem !important;
        }

        .hero-content h1 br {
            display: none;
        }

        .hero-content p {
            font-size: 0.75rem !important;
            line-height: 1.3;
            margin-bottom: 0.5rem !important;
        }

        .hero-content p br {
            display: none;
        }

        .btn-orange {
            font-size: 10px;
            padding: 5px 10px;
        }
    }

    /* Landscape orientation for mobile devices */
    @media (max-height: 500px) and (orientation: landscape) {
        .header-hero {
            min-height: 280px;
        }

        .half-circle {
            top: -180vw;
            height: 220vw;
        }

        .food-image {
            width: 200px;
            height: 180px;
            bottom: -15%;
        }

        .header-orange-icon {
            width: 35px;
            height: 35px;
        }

        .hero-content h1 {
            font-size: 1.3rem !important;
            margin-top: 0.5rem !important;
        }

        .hero-content p {
            font-size: 0.75rem !important;
            margin-bottom: 0.5rem !important;
        }

        .btn-orange {
            font-size: 10px;
            padding: 5px 10px;
        }
    }

    /* High DPI screens adjustments */
    @media (-webkit-min-device-pixel-ratio: 2),
    (min-resolution: 192dpi) {

        .food-image img,
        .header-orange-icon {
            image-rendering: -webkit-optimize-contrast;
            image-rendering: crisp-edges;
        }
    }
</style>
