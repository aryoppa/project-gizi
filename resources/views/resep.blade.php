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

<body style="background-color: #F8F9FA; overflow-x: hidden; padding-top: 70px;">
    <x-navbar class="montserrat" />
    
    <x-header 
        title="KREASIKAN HIDANGAN<br> SEHAT SETIAP HARI"
        subtitle="PELAJARI CARA MENGOLAH BAHAN BERGIZI MENJADI<br> MENU LEZAT YANG MENDUKUNG GAYA HIDUP SEHAT DAN<br> AKTIF."
        foodImage="/img/header3.png"
    />

    <section class="edukasi-list py-5">
        <div class="container">
            <div class="row mb-4 align-items-center">
                <div class="col-md-6">
                    <h2 class="nerko-one-regular mb-0" style="color: #000000; font-size: 2.5rem; letter-spacing: 0.5px;">
                        RESEP MAKANAN SEHAT
                    </h2>
                </div>
                <!-- <div class="col-md-6">
                    <div class="search-box">
                        <div class="input-group">
                            <input type="text" class="form-control montserrat-regular" placeholder="search text" 
                                   style="border-radius: 25px 0 0 25px; border: 1px solid #ddd; padding: 0.6rem 1.2rem;">
                            <button class="btn btn-search" type="button" style="border-radius: 0 25px 25px 0; background-color: #287BBF; border: 1px solid #287BBF; padding: 0.6rem 1.2rem;">
                                <i class="bi bi-search text-white"></i>
                            </button>
                        </div>
                    </div>
                </div> -->
            </div>

            <div class="row g-4 mb-5">
                @forelse($reseps as $resep)
                <div class="col-lg-4 col-md-6">
                    <x-card-resep 
                        image=" {{$resep->image ? asset('storage/' . $resep->image) : '/img/placeholder.png'}} "
                        title=" {{$resep->name}} "
                        energy="{{  $resep->energy }}"
                        protein="{{  $resep->protein }}"
                        fat="{{  $resep->fat }}"
                        carbs="{{  $resep->carbs }}"
                        portion="{{  $resep->portion }}"
                        link=" {{ route('resep.show', $resep->id) }} "
                    />
                </div>
                @empty
                    <p class="text-center text-muted">Belum ada resep.</p> 
                @endforelse
            </div>


            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{-- Preserve query string on pagination links --}}
                {{ $reseps->appends(request()->query())->links() }}
            </div>
        </div>
    </section>

    <x-footer />

    <style>
        /* Search Box */
        .search-box .input-group {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            border-radius: 25px;
        }

        .search-box .form-control:focus {
            box-shadow: none;
            border-color: #287BBF;
        }

        .btn-search {
            transition: all 0.3s ease;
        }

        .btn-search:hover {
            background-color: #1f6aa5 !important;
            transform: scale(1.05);
        }

        /* Pagination */
        .pagination {
            gap: 0.5rem;
        }

        .pagination .page-link {
            border: none;
            color: #666666;
            background-color: transparent;
            padding: 0.5rem 0.75rem;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            font-family: 'Montserrat', sans-serif;
            font-weight: 500;
        }

        .pagination .page-link:hover {
            background-color: #f0f0f0;
            color: #287BBF;
        }

        .pagination .page-item.active .page-link {
            background-color: #287BBF;
            color: white;
            border-radius: 8px;
        }

        .pagination .page-item.disabled .page-link {
            color: #cccccc;
        }

        .pagination .page-link i {
            font-size: 0.85rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .edukasi-list .row.mb-4 {
                flex-direction: column;
            }

            .search-box {
                margin-top: 1rem;
            }

            .pagination {
                font-size: 0.85rem;
            }

            .pagination .page-link {
                padding: 0.4rem 0.6rem;
            }
        }
    </style>
</body>

</html>