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
    <title>SEMAI Dashboard</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <x-layout-admin pageTitle="Dashboard">
        <div class="container-fluid">
            <!-- Stats Cards -->
            <div class="row g-4 mb-4">
                <!-- Dokumentasi Card -->
                <div class="col-lg-3 col-md-6">
                    <div class="card stats-card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <div>
                                <p class="text-muted mb-1 montserrat-medium">Dokumentasi</p>
                                <div class="d-flex align-items-center justify-content-start gap-2">
                                    <img src="/icons/stat_dokum.png" alt="Resep Icon"
                                        style="width: 60px; height: 60px;">
                                    <h3 class="montserrat-bold mb-0">100</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edukasi Card -->
                <div class="col-lg-3 col-md-6">
                    <div class="card stats-card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <div>
                                <p class="text-muted mb-1 montserrat-medium">Edukasi</p>
                                <div class="d-flex align-items-center justify-content-start gap-2">
                                    <img src="/icons/stat_edukasi.png" alt="Resep Icon"
                                        style="width: 60px; height: 60px;">
                                    <h3 class="montserrat-bold mb-0">100</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Resep Card -->
                <div class="col-lg-3 col-md-6">
                    <div class="card stats-card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <div>
                                <p class="text-muted mb-1 montserrat-medium">Resep</p>
                                <div class="d-flex align-items-center justify-content-start gap-2">
                                    <img src="/icons/stat_resep.png" alt="Resep Icon"
                                        style="width: 60px; height: 60px;">
                                    <h3 class="montserrat-bold mb-0">100</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dokumentasi Section -->
            <div class="container-fluid mb-4">
                <div class="d-flex justify-content-between align-items-center py-3">
                    <h5 class="mb-0 montserrat-bold">Dokumentasi</h5>
                    <a href="{{ route('admin.dokumentasi.index') }}"
                        class="btn btn-link text-primary montserrat-semibold ">
                        Lihat Semuanya
                    </a>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        @for ($i = 1; $i <= 4; $i++)
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="documentation-item">
                                    <img src="/img/dokum{{ $i }}.jpg" alt="Dokumentasi {{ $i }}"
                                        class="img-fluid rounded">
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>

            <!-- Edukasi Gizi Section -->
            <div class="container-fluid mb-4">
                <div class="d-flex justify-content-between align-items-center py-3">
                    <h5 class="mb-0 montserrat-bold">Edukasi Gizi</h5>
                    <a href="{{ route('admin.edukasi.index') }}" class="btn btn-link text-primary montserrat-semibold ">
                        Lihat Semuanya
                    </a>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        @for ($i = 1; $i <= 4; $i++)
                            <div class="col-lg-3 col-md-6">
                                <x-card-edukasi image="/img/food1.png" title="Apa itu gizi seimbang?" user="Admin"
                                    date="1 Nov 2025" />
                            </div>
                        @endfor
                    </div>
                </div>
            </div>

            <!-- Resep Makanan Section -->
            <div class="container-fluid mb-4">
                <div class="d-flex justify-content-between align-items-center py-3">
                    <h5 class="mb-0 montserrat-bold">Resep Makanan</h5>
                    <a href="{{ route('admin.resep.index') }}" class="btn btn-link text-primary montserrat-semibold ">
                        Lihat Semuanya
                    </a>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        @for ($i = 1; $i <= 4; $i++)
                            <div class="col-lg-3 col-md-6">
                                <x-card-resep image="/img/food2.jpg" title="Odeng Ayam" energy="121,35 kkal"
                                    protein="7,62 g" fat="8,01 g" carbs="5,23 g" portion="10 Porsi" />
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>

        <style>
            /* Stats Cards */
            .stats-card {
                border-radius: 12px;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .stats-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15) !important;
            }

            .stats-icon {
                width: 60px;
                height: 60px;
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .stats-icon i {
                font-size: 1.8rem;
            }

            .bg-primary-light {
                background-color: rgba(40, 123, 191, 0.1);
            }

            .bg-danger-light {
                background-color: rgba(220, 53, 69, 0.1);
            }

            .bg-info-light {
                background-color: rgba(13, 202, 240, 0.1);
            }

            /* Documentation Item */
            .documentation-item {
                position: relative;
                overflow: hidden;
                border-radius: 12px;
                transition: transform 0.3s ease;
            }

            .documentation-item:hover {
                transform: scale(1.05);
            }

            .documentation-item img {
                width: 100%;
                height: 200px;
                object-fit: cover;
            }

            /* Card Sections */
            .card {
                border-radius: 12px;
            }

            .card-header h5 {
                color: #000;
            }
        </style>
    </x-layout-admin>
</body>

</html>
