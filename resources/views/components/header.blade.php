@props(['title' , 'subtitle', 'foodImage', 'showDownloadButton' => false ])

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
        @if($showDownloadButton)
        <a href="#" class="btn btn-orange"><i>Download Booklet</i></a>
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

    /* responsive tweaks */
    @media (max-width: 768px) {
        .header-hero .ornament {
            width: 10vw;
            max-width: 70px;
        }

        .header-hero .ornament.left {
            left: 4%;
            top: 16%;
        }

        .header-hero .ornament.right {
            right: 4%;
            top: 28%;
        }

        .header-orange-icon {
            width: 60px;
            height: 60px;
        }

        .header-hero .orange-icon-1 {
            top: 3%;
            left: 1%;
        }

        .header-hero .orange-icon-2 {
            bottom: 8%;
            right: 2%;
        }
    }
</style>
