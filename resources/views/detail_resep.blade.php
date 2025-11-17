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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nerko+One&display=swap" rel="stylesheet">
    <title>SEMAI</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="montserrat" style="background-color: #FFF; overflow-x: hidden; padding-top: 70px;">
    <x-navbar class="montserrat" />
    
    <section class="recipe-detail py-4">
        <div class="container">
            <!-- Back Button -->
            <div class="mb-4">
                <a href="/resep" class="btn-back d-inline-flex align-items-center text-decoration-none" style="color: #000; font-family: 'Montserrat', sans-serif; font-weight: 500;">
                    <i class="bi bi-arrow-left me-2" style="font-size: 1.2rem;"></i>
                    <span>Kembali</span>
                </a>
            </div>

            <!-- GAMBAAAAR -->
            <div class="recipe-image mb-4">
                <img src="{{$resep->image ? asset('storage/' . $resep->image) : '/img/placeholder.png'}}" alt="Resep Tahu Walik" class="w-100" style="border-radius: 20px; max-height: 400px; object-fit: cover;">
            </div>

            <!-- RESEP DAN PORSI -->
            <div class="text-center mb-4">
                <h1 class="nerko-one-regular mb-2" style="font-size: 2.5rem; color: #000;">RESEP {{$resep->name}}</h1>
                <p class="montserrat-regular" style="font-size: 1.1rem; color: #666;">{{$resep->portion}} Porsi</p>
            </div>

            <!-- NUTRITION INFO -->
            <div class="row g-3 mb-5 justify-content-center">
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="nutrition-card text-center p-3" style="background-color: #FBC02D; border-radius: 15px;">
                        <p class="montserrat-medium mb-1" style="color: #000; font-size: 1.5rem;">Energy / Porsi</p>
                        <h3 class="montserrat-bold mb-0" style="color: #fff; font-size: 2rem;">{{$resep->energy}}</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="nutrition-card text-center p-3" style="background-color: #81C784; border-radius: 15px;">
                        <p class="montserrat-medium mb-1" style="color: #000; font-size: 1.5rem;">Protein / Porsi</p>
                        <h3 class="montserrat-bold mb-0" style="color: #fff; font-size: 2rem;">{{$resep->protein}}</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="nutrition-card text-center p-3" style="background-color: #F48FB1; border-radius: 15px;">
                        <p class="montserrat-medium mb-1" style="color: #000; font-size: 1.5rem;">Lemak / Porsi</p>
                        <h3 class="montserrat-bold mb-0" style="color: #fff; font-size: 2rem;">{{$resep->fat}}</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="nutrition-card text-center p-3" style="background-color: #64B5F6; border-radius: 15px;">
                        <p class="montserrat-medium mb-1" style="color: #000; font-size: 1.5rem;">Karbohidrat / Porsi</p>
                        <h3 class="montserrat-bold mb-0" style="color: #fff; font-size: 2rem;">{{$resep->carbs}}</h3>
                    </div>
                </div>
            </div>

            <!-- ACCORDION -->
            <div class="row montserrat">
                <!-- Bahan-Bahan -->
                <div class="col-lg-6 mb-4">
                    <span class="badge montserrat-semibold mb-3 px-4 py-3 d-inline-block" style="background-color: #FFDABB; color: #FF821C; font-size: 1.2rem; border-radius: 10px;">
                        Bahan-Bahan
                    </span>
                    
                    <div class="accordion-item" style="border: none; border-radius: 15px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                        <h2 class="accordion-header">
                            <button class="accordion-button montserrat-semibold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bahan" aria-expanded="false" aria-controls="bahan" style="padding: 1rem 1.5rem">
                                <i class="bi bi-chevron-down ms-auto"></i>
                            </button>
                        </h2>
                        <div id="bahan" class="accordion-collapse collapse show">
                            <div class="accordion-body montserrat-regular" style="background-color: #fff; padding: 0.5rem 1.5rem;">
                                <ol style="padding-left: 1.2rem; line-height: 2;">
                                    {!! $resep->ingridients !!}
                                </ol>
                            </div>
                        </div>
                    </div>

                    <!-- Alat-Alat -->
                    <div class="mt-4">
                        <span class="badge montserrat-semibold mb-3 px-4 py-3 d-inline-block" style="background-color: #FFDABB; color: #FF821C; font-size: 1.2rem; border-radius: 10px;">
                            Alat-Alat
                        </span>
                        
                        <div class="accordion-item" style="border: none; border-radius: 15px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                            <h2 class="accordion-header">
                                <button class="accordion-button montserrat-semibold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bahan" aria-expanded="false" aria-controls="bahan" style="padding: 1rem 1.5rem">
                                    <i class="bi bi-chevron-down ms-auto"></i>
                                </button>
                            </h2>
                            <div id="bahan" class="accordion-collapse collapse show">
                                <div class="accordion-body montserrat-regular" style="background-color: #fff; padding: 0.5rem 1.5rem;">
                                    <ol style="padding-left: 1.2rem; line-height: 2;">
                                    {!! $resep->tools !!}
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cara Pembuatan -->
                <div class="col-lg-6 mb-4">
                    <span class="badge montserrat-semibold mb-3 px-4 py-3 d-inline-block" style="background-color: #FFDABB; color: #FF821C; font-size: 1.2rem; border-radius: 10px;">
                        Cara Pembuatan
                    </span>
                    
                    <div class="accordion-item" style="border: none; border-radius: 15px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                        <h2 class="accordion-header">
                            <button class="accordion-button montserrat-semibold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bahan" aria-expanded="false" aria-controls="bahan" style="padding: 1rem 1.5rem">
                                <i class="bi bi-chevron-down ms-auto"></i>
                            </button>
                        </h2>
                        <div id="bahan" class="accordion-collapse collapse show">
                            <div class="accordion-body montserrat-regular" style="background-color: #fff; padding: 0.5rem 1.5rem;">
                                <ol style="padding-left: 1.2rem; line-height: 2;">
                                    {!! $resep->how_to !!}
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- CAROUSEL -->
    <section class="edukasi py-5 position-relative mb-5" style="background-color: #ffffff;">
        <div class="container">
            <div>
                <h2 class="nerko-one-regular mb-0" style="color: #000000; font-size: 2.5rem; letter-spacing: 0.5px;">
                    RESEP MAKANAN SEHAT LAINNYA
                </h2>
            </div>

            <x-carousel 
                type="resep"
                carouselId="resepCarousel"
                :items="$reseps" 
            />
        </div>
    </section>

    <style>
        /* Back Button */
        .btn-back {
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            transform: translateX(-5px);
            color: #287BBF !important;
        }

        /* Nutrition Cards */
        .nutrition-card {
            transition: transform 0.3s ease;
        }

        .nutrition-card:hover {
            transform: translateY(-5px);
        }

        /* Badge */
        .badge {
            font-weight: 600;
        }

        /* Accordion */
        .accordion-button::after {
            display: none;
        }

        .accordion-button:not(.collapsed) i {
            transform: rotate(180deg);
        }

        .accordion-button i {
            transition: transform 0.3s ease;
        }


        /* Responsive */
        @media (max-width: 768px) {
            .recipe-detail h1 {
                font-size: 2rem !important;
            }

            .nutrition-card h3 {
                font-size: 1.2rem !important;
            }

            .nutrition-card p {
                font-size: 0.8rem !important;
            }

            .badge {
                font-size: 1rem !important;
                padding: 0.6rem 1.2rem !important;
            }

            .accordion-button {
                height: 40px !important;
                padding-right: 1rem !important;
            }

            .accordion-body {
                padding: 1rem !important;
                font-size: 0.9rem;
            }
        }
    </style>

    <x-footer />

</body>

</html>