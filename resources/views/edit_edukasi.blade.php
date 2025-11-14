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
        <div class="container-fluid montserrat">
            <!-- Form Card -->
            <div class="form-card">
                <h4 class="montserrat-bold mb-4">Edit Edukasi Gizi</h4>

                <form action="{{ route('admin.edukasi.update', $id ?? 1) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Judul -->
                    <div class="mb-4">
                        <label for="judul" class="form-label montserrat-semibold">Judul</label>
                        <input type="text" class="form-control montserrat-regular" id="judul" name="judul"
                            placeholder="Masukkan judul di sini" required
                            value="{{ old('judul', 'Perencanaan Menu') }}">
                        @error('judul')
                            <div class="text-danger mt-1 small">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Foto dan Video Row -->
                    <div class="row mb-4">
                        <!-- Foto -->
                        <div class="col-md-6">
                            <label class="form-label montserrat-semibold">Foto</label>
                            <div class="upload-wrapper">
                                <input type="file" class="d-none" id="foto" name="foto" accept="image/*"
                                    onchange="handleFileUpload(event, 'foto')">
                                <label for="foto" class="btn-upload montserrat-semibold">
                                    Upload
                                </label>
                                <input type="text" class="form-control file-display montserrat-regular"
                                    id="fotoDisplay" placeholder="detail_edu1.png" readonly>
                            </div>
                            <small class="text-muted montserrat-regular">Biarkan kosong jika tidak ingin mengubah
                                foto</small>
                            @error('foto')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Video -->
                        <div class="col-md-6">
                            <label for="video_link" class="form-label montserrat-semibold">Video Link</label>
                            <input type="url" class="form-control montserrat-regular" id="video_link"
                                name="video_link" placeholder="https://youtube.com/watch?v=..."
                                value="{{ old('video_link', 'https://youtube.com/watch?v=example') }}">
                            <small class="text-muted montserrat-regular">Masukkan link YouTube atau video
                                lainnya</small>
                            @error('video_link')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-4">
                        <label for="deskripsi" class="form-label montserrat-semibold">Deskripsi</label>
                        <textarea class="form-control montserrat-regular" id="deskripsi" name="deskripsi" rows="6"
                            placeholder="Masukkan deskripsi di sini" required>{{ old(
                                'deskripsi',
                                'Perencanaan menu merupakan kegiatan menyusun hidangan dalam variasi yang serisai untuk manajemen penyelenggaraan makanan di rumah tangga atau institusi.
                                                        
                                                        Fungsi perencanaan menu:
                                                        • Memudahkan pelaksanaan tugas sehari-hari
                                                        • Menyusun hidangan yang memenuhi kebutuhan zat gizi tubuh
                                                        • Mengatur variasi dan kombinasi makanan
                                                        • Menghindari kekurangan biaya/pengeluaran harga makanan
                                                        • Penghemat waktu dan tenaga tersedia
                                                        • Sebagai alat pemulihan gizi',
                            ) }}</textarea>
                        @error('deskripsi')
                            <div class="text-danger mt-1 small">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-end gap-3">
                        <a href="{{ route('admin.edukasi.index') }}" class="btn btn-cancel montserrat-semibold">
                            Batal
                        </a>
                        <button type="submit" class="btn btn-submit montserrat-semibold">
                            Update Edukasi
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <style>
            /* Form Card */
            .form-card {
                background: white;
                border-radius: 20px;
                padding: 2.5rem;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
                max-width: 900px;
            }

            /* Form Elements */
            .form-label {
                color: #333;
                margin-bottom: 0.5rem;
                font-size: 0.95rem;
            }

            .form-control {
                border: 1px solid #ddd;
                border-radius: 12px;
                padding: 0.75rem 1rem;
                font-size: 0.95rem;
                transition: all 0.3s ease;
            }

            .form-control:focus {
                border-color: #287BBF;
                box-shadow: 0 0 0 0.2rem rgba(40, 123, 191, 0.15);
            }

            textarea.form-control {
                resize: vertical;
                min-height: 150px;
            }

            /* Upload Wrapper */
            .upload-wrapper {
                position: relative;
                width: 100%;
            }

            .btn-upload {
                position: absolute;
                left: 0;
                top: 0;
                z-index: 10;
                background-color: #d1d5db;
                color: #000;
                border: none;
                border-radius: 12px 0 0 12px;
                padding: 0.75rem 1.5rem;
                cursor: pointer;
                transition: all 0.3s ease;
                white-space: nowrap;
                margin: 0;
                height: 47px;
                display: flex;
                align-items: center;
                font-size: 0.95rem;
            }

            .btn-upload:hover {
                background-color: #b8bcc4;
            }

            .file-display {
                width: 100%;
                padding-left: 110px !important;
                border-radius: 12px !important;
                border: 1px solid #ddd !important;
                background-color: #fff;
            }

            .file-display:focus {
                border-color: #ddd !important;
                box-shadow: none !important;
            }

            /* Buttons */
            .btn-cancel {
                background-color: white;
                color: #666;
                border: 1px solid #ddd;
                border-radius: 25px;
                padding: 0.6rem 2rem;
                transition: all 0.3s ease;
            }

            .btn-cancel:hover {
                background-color: #f8f9fa;
                border-color: #999;
                color: #333;
            }

            .btn-submit {
                background-color: #287BBF;
                color: white;
                border: none;
                border-radius: 25px;
                padding: 0.6rem 2rem;
                transition: all 0.3s ease;
            }

            .btn-submit:hover {
                background-color: #1f6aa5;
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(40, 123, 191, 0.3);
            }

            /* Responsive */
            @media (max-width: 768px) {
                .form-card {
                    padding: 1.5rem;
                }

                .d-flex.gap-3 {
                    flex-direction: column;
                }

                .btn-cancel,
                .btn-submit {
                    width: 100%;
                }
            }
        </style>

        <script>
            function handleFileUpload(event, type) {
                const file = event.target.files[0];
                if (file) {
                    const fileName = file.name;
                    const fileDisplay = document.getElementById(type + 'Display');
                    fileDisplay.value = fileName;
                }
            }
        </script>
    </x-layout-admin>
</body>

</html>
