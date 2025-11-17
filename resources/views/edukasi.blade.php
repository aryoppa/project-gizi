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

<body style="background-color: #FFF; overflow-x: hidden; padding-top: 70px;">
    <x-navbar class="montserrat" />
    
    <x-header 
        title="EDUKASI GIZI!"
        subtitle="BELAJAR GIZI JADI LEBIH MUDAH DAN MENYENANGKAN — <br>TEMUKAN TIPS SEHAT YANG BISA KAMU TERAPKAN SETIAP<br> HARI."
        foodImage="/img/header2.png"
    />

    <section class="edukasi-list py-5">
        <div class="container">
            <div class="row mb-4 align-items-center">
                <div class="col-md-6">
                    <h2 class="nerko-one-regular mb-0" style="color: #000000; font-size: 2.5rem; letter-spacing: 0.5px;">
                        EDUKASI GIZI
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
                @forelse($edukasis as $edukasi)
                    <div class="col-lg-4 col-md-6">
                        <x-card-edukasi 
                            :image=" $edukasi->image ? asset('storage/' . $edukasi->image) : '/img/placeholder.png' "
                            :title="$edukasi->title"
                            user="Admin"
                            :date=" optional($edukasi->published_at ?? $edukasi->created_at)->format('d M Y') "
                            :link=" route('edukasi.show', $edukasi->id) "
                        />
                    </div>
                @empty
                    <p class="text-center text-muted">Belum ada edukasi.</p>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{-- Preserve query string on pagination links --}}
                {{ $edukasis->appends(request()->query())->links() }}
            </div>

            <!-- <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center align-items-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                            <i class="bi bi-chevron-left"></i>
                        </a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <span class="page-link">...</span>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">20</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">30</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <span class="montserrat-medium">Next</span>
                            <i class="bi bi-chevron-right ms-1"></i>
                        </a>
                    </li>
                </ul>
            </nav> -->
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