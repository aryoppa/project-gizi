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
    <x-layout-admin pageTitle="Detail Edukasi Gizi">
        <div class="container-fluid montserrat">
            <!-- Back Button -->
            <div class="mb-4">
                <a href="{{ route('admin.edukasi.index') }}" class="btn-back montserrat-semibold">
                    <i class="bi bi-arrow-left me-2"></i>Kembali
                </a>
            </div>

            <!-- Detail Card -->
            <div class="detail-card">
                <h4 class="montserrat-bold mb-4">Detail Edukasi Gizi</h4>

                <!-- Featured Image Section -->
                <div class="featured-image mb-4">
                    <img src="/img/detail_edu1.png" alt="Perencanaan Menu">
                </div>

                <!-- Title Section -->
                <div class="title-section mb-4">
                    <h3 class="montserrat-bold">Perencanaan Menu</h3>
                    <div class="meta-info d-flex gap-4 mt-3">
                        <div class="meta-item">
                            <i class="bi bi-person-circle text-primary"></i>
                            <span class="montserrat-medium ms-2">Diposting oleh Admin</span>
                        </div>
                        <div class="meta-item">
                            <i class="bi bi-calendar-event text-primary"></i>
                            <span class="montserrat-medium ms-2">1 November 2025</span>
                        </div>
                    </div>
                </div>

                <!-- Description Section -->
                <div class="description-section mb-4">
                    <h5 class="montserrat-bold mb-3">Deskripsi</h5>
                    <div class="description-content montserrat-regular">
                        Perencanaan menu merupakan kegiatan menyusun hidangan dalam variasi yang serisai untuk manajemen
                        penyelenggaraan makanan di rumah tangga atau institusi.
                    </div>
                </div>

                <!-- Function/Content List Section -->
                <div class="function-section mb-4">
                    <h5 class="montserrat-bold mb-3">Fungsi perencanaan menu:</h5>
                    <ul class="function-list montserrat-regular">
                        <li>Memudahkan pelaksanaan tugas sehari-hari</li>
                        <li>Menyusun hidangan yang memenuhi kebutuhan zat gizi tubuh</li>
                        <li>Mengatur variasi dan kombinasi makanan</li>
                        <li>Menghindari kekurangan biaya/pengeluaran harga makanan</li>
                        <li>Penghemat waktu dan tenaga tersedia</li>
                        <li>Sebagai alat pemulihan gizi</li>
                    </ul>
                </div>

                <!-- Video Section -->
                <div class="video-section mb-4">
                    <h5 class="montserrat-bold mb-3">Video</h5>
                    <div class="video-container">
                        {{-- Video thumbnail or embed --}}
                        <div class="video-thumbnail">
                            {{-- Masukkan video/embed disini --}}
                            <img src="/img/thumbnail_vid.png" alt="Video Thumbnail">
                        </div>
                        <div class="video-info mt-2">
                            <p class="montserrat-medium mb-0">Senam Gizi Seimbang</p>
                            <small class="text-muted montserrat-regular">Youtube</small>
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
                max-width: 1000px;
            }

            /* Featured Image */
            .featured-image {
                overflow: hidden;
                display: flex;
                align-items: center;
                justify-content: center
            }

            .featured-image img {
                width: 250px;
                height: 250px;
                object-fit: cover;
            }

            /* Title Section */
            .title-section h3 {
                color: #333;
                font-size: 1.8rem;
                margin-bottom: 1rem;
                display: flex;
                align-items: center;
                justify-content: center
            }

            .meta-info {
                color: #666;
                font-size: 0.9rem;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .meta-item i {
                font-size: 1.2rem;
            }

            /* Description Section */
            .description-section h5,
            .function-section h5,
            .video-section h5 {
                color: #333;
                font-size: 1.2rem;
                border-bottom: 2px solid #287BBF;
                padding-bottom: 0.5rem;
            }

            .description-content {
                color: #555;
                line-height: 1.8;
                font-size: 1rem;
                text-align: justify;
            }

            /* Function List */
            .function-list {
                list-style: none;
                padding-left: 0;
            }

            .function-list li {
                padding-left: 1.5rem;
                position: relative;
                margin-bottom: 0.8rem;
                color: #555;
                line-height: 1.6;
            }

            .function-list li:before {
                content: "•";
                color: #287BBF;
                font-weight: bold;
                font-size: 1.5rem;
                position: absolute;
                left: 0;
                top: -5px;
            }

            /* Video Section */
            .video-container {
                background: #f8f9fa;
                border-radius: 15px;
                padding: 1.5rem;
            }

            .video-thumbnail {
                border-radius: 12px;
                overflow: hidden;
                background: #e9ecef;
                min-height: 300px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .video-thumbnail img {
                width: 300px;
                height: 250px;
                object-fit: cover;
            }

            .video-thumbnail iframe {
                border-radius: 12px;
                width: 100%;
                height: 400px;
            }

            .btn-video {
                background-color: #287BBF;
                color: white;
                border: none;
                border-radius: 25px;
                padding: 0.8rem 2rem;
                font-size: 1.1rem;
                transition: all 0.3s ease;
            }

            .btn-video:hover {
                background-color: #1f6aa5;
                transform: scale(1.05);
                color: white;
            }

            .video-info {
                padding: 0.5rem 0;
            }

            /* Responsive */
            @media (max-width: 768px) {
                .detail-card {
                    padding: 1.5rem;
                }

                .title-section h3 {
                    font-size: 1.5rem;
                }

                .meta-info {
                    flex-direction: column;
                    gap: 0.8rem !important;
                }

                .action-buttons {
                    flex-direction: column;
                }

                .btn-edit,
                .btn-delete {
                    width: 100%;
                    justify-content: center;
                }
            }
        </style>

    </x-layout-admin>
</body>

</html>
