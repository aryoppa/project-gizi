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
    <title>Dokumentasi - SEMAI</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <x-layout-admin pageTitle="Dokumentasi">
        <div class="container-fluid montserrat">
            <!-- Header Section -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="montserrat-bold mb-0">Dokumentasi</h4>
                <a href="{{ route('admin.dokumentasi.create') }}" class="btn btn-add montserrat-semibold">
                    Tambahkan Dokumentasi
                </a>
            </div>

            <!-- Alert Success -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- <div class="row g-4 mb-5">
                @for ($i = 1; $i <= 12; $i++)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="dokumentasi-card">
                            <img src="/img/dokum{{ ($i % 5) + 1 }}.jpg" alt="Dokumentasi {{ $i }}"
                                class="img-fluid">
                            <div class="card-overlay">
                                <button class="btn-delete" onclick="confirmDelete({{ $i }})">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endfor
            </div> -->
            <!-- Dokumentasi Grid -->
            <div class="row g-4 mb-5">
                @forelse ($dokumentasis as $dokumentasi)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="dokumentasi-card">
                            {{-- ✅ Load image dynamically from storage --}}
                            <img src="{{ asset($dokumentasi->image) }}"
                                alt="{{ $dokumentasi->title ?? 'Dokumentasi' }}" class="img-fluid">

                            <div class="card-overlay">
                                {{-- ✅ Delete form --}}
                                <form action="{{ route('admin.dokumentasi.destroy', $dokumentasi->id) }}"
                                    method="POST" onsubmit="return confirmDelete(this)">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="card p-4 text-center">
                            <h5 class="mb-2">Belum ada dokumentasi.</h5>
                            <p class="text-muted mb-0">Klik “Tambahkan Dokumentasi" untuk membuat konten baru.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $dokumentasis->links() }}
            </div>
            <!-- <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center align-items-center">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
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
                        <a class="page-link" href="#">67</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">68</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span class="montserrat-medium">Next</span>
                            <i class="bi bi-chevron-right ms-1"></i>
                        </a>
                    </li>
                </ul>
            </nav> -->
        </div>

        <style>
            /* Button Add */
            .btn-add {
                background-color: #ffffff;
                color: #000000;
                border: 1px solid #287BBF;
                border-radius: 25px;
                padding: 0.6rem 1.5rem;
                transition: all 0.3s ease;
            }

            .btn-add:hover {
                background-color: #287BBF;
                color: #ffffff;
                box-shadow: 0 4px 12px #287bbf;
            }

            /* Dokumentasi Card */
            .dokumentasi-card {
                position: relative;
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                aspect-ratio: 4/3;
            }

            .dokumentasi-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            }

            .dokumentasi-card img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            /* Overlay with Delete Button */
            .card-overlay {
                position: absolute;
                bottom: 0;
                right: 0;
                padding: 0.75rem;
                opacity: 0;
                transition: opacity 0.3s ease;
            }

            .dokumentasi-card:hover .card-overlay {
                opacity: 1;
            }

            .btn-delete {
                background-color: #dc3545;
                color: white;
                border: none;
                border-radius: 8px;
                width: 40px;
                height: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                transition: all 0.3s ease;
                box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
            }

            .btn-delete:hover {
                background-color: #c82333;
                transform: scale(1.1);
            }

            .btn-delete i {
                font-size: 1.2rem;
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

            .pagination .page-link i {
                font-size: 0.85rem;
            }

            /* Alert */
            .alert {
                border-radius: 12px;
                border: none;
            }

            /* Responsive */
            @media (max-width: 768px) {
                .pagination {
                    font-size: 0.85rem;
                }

                .pagination .page-link {
                    padding: 0.4rem 0.6rem;
                }
            }
        </style>
    </x-layout-admin>

    <script>
        function confirmDelete(id) {
            if (confirm('Apakah Anda yakin ingin menghapus dokumentasi ini?')) {
                console.log('Delete dokumentasi:', id);
            }
        }

        setTimeout(function() {
            const alert = document.querySelector('.alert');
            if (alert) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }
        }, 5000);
    </script>
</body>

</html>
