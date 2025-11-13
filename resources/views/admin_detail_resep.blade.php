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
    <x-layout-admin pageTitle="Detail Resep">
        <div class="container-fluid montserrat">
            <!-- Back Button -->
            <div class="mb-4">
                <a href="{{ route('admin.resep.index') }}" class="btn-back montserrat-semibold">
                    <i class="bi bi-arrow-left me-2"></i>Kembali
                </a>
            </div>

            <!-- Detail Card -->
            <div class="detail-card">
                <h4 class="montserrat-bold mb-4">Detail Resep</h4>

                <!-- Featured Image Section -->
                <div class="featured-image-wrapper text-center mb-4">
                    <div class="featured-image">
                        {{-- Masukkan gambar disini --}}
                        <img src="/img/food2.jpg" alt="Odeng Ayam" class="img-fluid rounded">
                    </div>
                    <h3 class="montserrat-bold mt-3 mb-1">Odeng Ayam</h3>
                    <p class="text-muted montserrat-regular">10 Porsi</p>
                </div>

                <!-- Nutrition Info Grid -->
                <div class="nutrition-grid mb-5">
                    <div class="nutrition-item">
                        <div class="nutrition-label montserrat-semibold">Energi / Porsi</div>
                        <div class="nutrition-value montserrat-bold">121,35 kkal</div>
                    </div>
                    <div class="nutrition-item">
                        <div class="nutrition-label montserrat-semibold">Protein / Porsi</div>
                        <div class="nutrition-value montserrat-bold">7,62 g</div>
                    </div>
                    <div class="nutrition-item">
                        <div class="nutrition-label montserrat-semibold">Lemak / Porsi</div>
                        <div class="nutrition-value montserrat-bold">8,01 g</div>
                    </div>
                    <div class="nutrition-item">
                        <div class="nutrition-label montserrat-semibold">Karbohidrat / Porsi</div>
                        <div class="nutrition-value montserrat-bold">5,23 g</div>
                    </div>
                </div>

                <!-- Content Sections -->
                <div class="row">
                    <!-- Bahan-Bahan -->
                    <div class="col-md-4 mb-4">
                        <div class="content-section">
                            <h5 class="section-title montserrat-bold">Bahan-Bahan</h5>
                            <ul class="content-list montserrat-regular">
                                <li>250 g ayam fillet,sebanyak beku</li>
                                <li>1 batang bawang daun halus</li>
                                <li>1/2 bawang bombay,cincang</li>
                                <li>1 batang seledri,rajang putih/ga</li>
                                <li>1 putih telur</li>
                                <li>1/2 sdt bubuk penyedap</li>
                                <li>1/2 sdt garam-halus</li>
                                <li>2 sdt satu ayam</li>
                                <li>3 sdm tapioka</li>
                                <li>3 sdm minyak ayam</li>
                                <li>1 buah wortel</li>
                                <li>4 lembar kembang tahu</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Alat-Alat -->
                    <div class="col-md-4 mb-4">
                        <div class="content-section">
                            <h5 class="section-title montserrat-bold">Alat-Alat</h5>
                            <ul class="content-list montserrat-regular">
                                <li>Chopper/ blender</li>
                                <li>Mangkuk besar/ baskom</li>
                                <li>Spatula/ sendok</li>
                                <li>Talenan dan pisau</li>
                                <li>Tusuk sate</li>
                                <li>Panci kukus</li>
                                <li>Panci penggorengan</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Cara Pembuatan -->
                    <div class="col-md-4 mb-4">
                        <div class="content-section">
                            <h5 class="section-title montserrat-bold">Cara Pembuatan</h5>
                            <ul class="content-list montserrat-regular">
                                <li>Haluskan daging masukkan daging ayam, ae balok putih telur, bawang putih, garam,
                                    gula, dan bubuk ke dalam chopper atau blender</li>
                                <li>Masukkan tapioca, parutan wortel, dan irisan daun bawang rasa menggunakan spatula
                                    hingga tercampur sempurna</li>
                                <li>Siapkan kembang tahu, ambil adonan ayam dan wortel, oleskan secara tipis dan merata
                                    di atas buah kembang tahu</li>
                                <li>Lipat-memanjang kemudan tusuk dengan pin bergantungan mengikuti untuk bergantungan
                                </li>
                                <li>Kemudian kulusi odeng selama 20 hingga 30 menit</li>
                                <li>Siapkan odeng yang telah dikukus ke dalam minyak panas dengan api sedang, dan goreng
                                    hingga kuning keemasan</li>
                                <li>Angkat odeng dan tiriskan.</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <style>
            /* Back Button */
            .btn-back {
                display: inline-flex;
                align-items: center;
                color: #287BBF;
                text-decoration: none;
                font-size: 1rem;
                transition: all 0.3s ease;
            }

            .btn-back:hover {
                color: #1f6aa5;
                transform: translateX(-5px);
            }

            /* Detail Card */
            .detail-card {
                background: white;
                border-radius: 20px;
                padding: 2.5rem;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
                max-width: 1200px;
            }

            /* Featured Image */
            .featured-image {
                display: inline-block;
                border-radius: 15px;
                overflow: hidden;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                max-width: 400px;
            }

            .featured-image img {
                width: 100%;
                height: auto;
                max-height: 350px;
                object-fit: cover;
            }

            .featured-image-wrapper h3 {
                color: #333;
                font-size: 1.8rem;
            }

            .featured-image-wrapper p {
                font-size: 1rem;
            }

            /* Nutrition Grid */
            .nutrition-grid {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 1.5rem;
                padding: 2rem 0;
                border-top: 2px solid #f0f0f0;
                border-bottom: 2px solid #f0f0f0;
            }

            .nutrition-item {
                text-align: center;
            }

            .nutrition-label {
                color: #666;
                font-size: 0.9rem;
                margin-bottom: 0.5rem;
            }

            .nutrition-value {
                color: #333;
                font-size: 1.1rem;
            }

            /* Content Sections */
            .content-section {
                background: #f8f9fa;
                border-radius: 15px;
                padding: 1.5rem;
                height: 100%;
            }

            .section-title {
                color: #333;
                font-size: 1.1rem;
                margin-bottom: 1rem;
                padding-bottom: 0.5rem;
                border-bottom: 2px solid #287BBF;
            }

            .content-list {
                list-style: none;
                padding-left: 0;
                margin: 0;
            }

            .content-list li {
                padding-left: 1.2rem;
                position: relative;
                margin-bottom: 0.7rem;
                color: #555;
                line-height: 1.6;
                font-size: 0.95rem;
            }

            .content-list li:before {
                content: "•";
                color: #287BBF;
                font-weight: bold;
                font-size: 1.3rem;
                position: absolute;
                left: 0;
                top: -3px;
            }

            /* Responsive */
            @media (max-width: 992px) {
                .nutrition-grid {
                    grid-template-columns: repeat(2, 1fr);
                }
            }

            @media (max-width: 768px) {
                .detail-card {
                    padding: 1.5rem;
                }

                .nutrition-grid {
                    grid-template-columns: 1fr;
                    gap: 1rem;
                }

            }
        </style>
    </x-layout-admin>
</body>

</html>
