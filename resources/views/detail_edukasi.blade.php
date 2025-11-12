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
    
    <section class="detail-artikel py-5" style="background-color: #ffffff;">
        <div class="container montserrat">
        <div class="my-4">
                <a href="/edukasi" class="btn-back d-inline-flex align-items-center text-decoration-none" style="color: #000; font-family: 'Montserrat', sans-serif; font-weight: 500;">
                    <i class="bi bi-arrow-left me-2" style="font-size: 1.2rem;"></i>
                    <span>Kembali</span>
                </a>
            </div>

            <div class="mb-4">
                <div class="montserrat-regular d-flex align-items-center gap-5" style="color: #666666;">
                    <span><i class="bi bi-person me-2"></i>Diposting oleh Admin</span>
                    <span><i class="bi bi-calendar me-2"></i>1 November 2025</span>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="artikel-image mb-4">
                        <img src="/img/food1.png" alt="Gizi Seimbang" class="img-fluid rounded">
                    </div>
                    
                    <div class="d-flex gap-3">
                        <a href="#" class="btn btn-whatsapp flex-fill montserrat-semibold" onclick="shareToWhatsApp()">
                            Bagikan Ke WhatsApp
                        </a>
                        <button class="btn btn-copy-link flex-fill montserrat-semibold" onclick="copyLink()">
                            Salin Link
                        </button>
                    </div>
                </div>

                <div class="col-lg-7">
                    <h1 class="nerko-one-regular mb-4" style="font-size: 2.5rem;">
                        APA ITU GIZI SEIMBANG?
                    </h1>
                    
                    <p class="montserrat-regular mb-4" style="line-height: 1.8; text-align: justify;">
                        Gizi seimbang adalah susunan makanan sehari-hari yang mengandung zat-zat gizi dalam jenis dan jumlah yang sesuai kebutuhan tubuh anak, disertai dengan kebiasaan hidup sehat agar anak tumbuh dan berkembang optimal.
                    </p>

                    <p class="montserrat-regular mb-3" >
                        Contoh makanan
                    </p>
                    
                    <ul class="list-unstyled montserrat-regular" style="line-height: 2;">
                        <li class="mb-2">
                            <strong>Karbohidrat:</strong> nasi, roti, <i>oatmeal</i>
                        </li>
                        <li class="mb-2">
                            <strong>Protein:</strong> telur, ikan, tempe
                        </li>
                        <li class="mb-2">
                            <strong>Sayur dan buah:</strong> wortel, apel, pisang
                        </li>
                        <li class="mb-2">
                            <strong>Susu:</strong> membantu pertumbuhan tulang dan gigi
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- CAROUSEL -->
    <section class="edukasi py-5 position-relative mb-5" style="background-color: #ffffff;">
        <div class="container">
            <div>
                <h2 class="nerko-one-regular mb-0" style=" font-size: 2.5rem; letter-spacing: 0.5px;">
                    EDUKASI GIZI LAINNYA
                </h2>
            </div>

            <x-carousel 
                type="edukasi"
                carouselId="edukasiCarousel"
                :items="collect([
                    [
                        'image' => '/img/food1.png',
                        'title' => 'Apa itu gizi seimbang?',
                        'user' => 'Admin',
                        'date' => '1 Nov 2025',
                        'link' => '/edukasi/1'
                    ],
                    [
                        'image' => '/img/food1.png',
                        'title' => 'Apa itu gizi seimbang?',
                        'user' => 'Admin',
                        'date' => '1 Nov 2025',
                        'link' => '/edukasi/2'
                    ],
                    [
                        'image' => '/img/food1.png',
                        'title' => 'Apa itu gizi seimbang?',
                        'user' => 'Admin',
                        'date' => '1 Nov 2025',
                        'link' => '/edukasi/3'
                    ],
                    [
                        'image' => '/img/food1.png',
                        'title' => 'Apa itu gizi seimbang?',
                        'user' => 'Admin',
                        'date' => '1 Nov 2025',
                        'link' => '/edukasi/4'
                    ],
                    [
                        'image' => '/img/food1.png',
                        'title' => 'Apa itu gizi seimbang?',
                        'user' => 'Admin',
                        'date' => '1 Nov 2025',
                        'link' => '/edukasi/5'
                    ],
                    [
                        'image' => '/img/food1.png',
                        'title' => 'Apa itu gizi seimbang?',
                        'user' => 'Admin',
                        'date' => '1 Nov 2025',
                        'link' => '/edukasi/6'
                    ]
                ])" 
            />
        </div>
    </section>

    <x-footer />

    <style>
        .artikel-image img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 12px;
        }

        .btn-whatsapp {
            background-color: #25D366;
            color: #ffffff;
            border: none;
            border-radius: 25px;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
        }

        .btn-whatsapp:hover {
            background-color: #20BA5A;
            color: #ffffff;
            transform: translateY(-2px);
        }

        .btn-copy-link {
            background-color: #ffffff;
            color: #287BBF;
            border: 2px solid #287BBF;
            border-radius: 25px;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
        }

        .btn-copy-link:hover {
            background-color: #287BBF;
            color: #ffffff;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .detail-artikel h1 {
                font-size: 2rem !important;
            }
        }
    </style>

    <script>
        function shareToWhatsApp() {
            const url = window.location.href;
            const text = encodeURIComponent('Lihat artikel ini: ' + document.title);
            window.open(`https://wa.me/?text=${text}%20${encodeURIComponent(url)}`, '_blank');
        }

        function copyLink() {
            const url = window.location.href;
            navigator.clipboard.writeText(url).then(function() {
                alert('Link berhasil disalin!');
            }, function() {
                // Fallback untuk browser yang tidak support clipboard API
                const textArea = document.createElement('textarea');
                textArea.value = url;
                document.body.appendChild(textArea);
                textArea.select();
                document.execCommand('copy');
                document.body.removeChild(textArea);
                alert('Link berhasil disalin!');
            });
        }
    </script>

</body>

</html>