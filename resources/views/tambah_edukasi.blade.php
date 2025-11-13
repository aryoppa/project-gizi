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
    <x-layout-admin pageTitle="Tambah Edukasi Gizi">
        <div class="container-fluid montserrat">
            <!-- Form Card -->
            <div class="form-card">
                <h4 class="montserrat-bold mb-4">Tambah Edukasi Gizi</h4>

                <form action="{{ route('admin.edukasi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Judul -->
                    <div class="mb-4">
                        <label for="judul" class="form-label montserrat-semibold">Judul</label>
                        <input type="text" class="form-control montserrat-regular" id="judul" name="judul"
                            placeholder="Placeholder" required value="{{ old('judul') }}">
                        @error('judul')
                            <div class="text-danger mt-1 small">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Foto dan Video Row -->
                    <div class="row mb-4">
                        <!-- Foto -->
                        <div class="col-md-6">
                            <label class="form-label montserrat-semibold">Foto</label>
                            <div class="upload-box" id="fotoUploadBox">
                                <input type="file" class="d-none" id="foto" name="foto" accept="image/*"
                                    onchange="handleFileUpload(event, 'foto')">
                                <label for="foto" class="upload-label">
                                    <i class="bi bi-cloud-upload"></i>
                                    <span class="montserrat-medium">Upload</span>
                                </label>
                                <div class="file-name" id="fotoFileName"></div>
                            </div>
                            @error('foto')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Video -->
                        <div class="col-md-6">
                            <label for="video" class="form-label montserrat-semibold">Video</label>
                            <div class="upload-box" id="videoUploadBox">
                                <input type="text" class="form-control montserrat-regular" id="video"
                                    name="video" placeholder="Masukkan link video (YouTube, dll)"
                                    value="{{ old('video') }}">
                            </div>
                            @error('video')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-4">
                        <label for="deskripsi" class="form-label montserrat-semibold">Deskripsi</label>
                        <textarea class="form-control montserrat-regular" id="deskripsi" name="deskripsi" rows="6"
                            placeholder="Placeholder" required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="text-danger mt-1 small">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-end gap-3">
                        <a href="{{ route('admin.edukasi.index') }}" class="btn btn-batal montserrat-semibold">
                            Batal
                        </a>
                        <button type="submit" class="btn btn-submit montserrat-semibold">
                            Posting Edukasi
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

            /* Upload Box */
            .upload-box {
                border: 2px dashed #ddd;
                border-radius: 12px;
                padding: 1.5rem;
                text-align: center;
                transition: all 0.3s ease;
                background-color: #f8f9fa;
            }

            .upload-box:hover {
                border-color: #287BBF;
                background-color: #f0f7ff;
            }

            .upload-label {
                cursor: pointer;
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 0.5rem;
                color: #666;
                margin: 0;
            }

            .upload-label i {
                font-size: 2rem;
                color: #287BBF;
            }

            .file-name {
                margin-top: 0.5rem;
                font-size: 0.85rem;
                color: #287BBF;
                font-weight: 500;
            }

            /* Video Input in Upload Box */
            .upload-box .form-control {
                border: none;
                background: transparent;
                padding: 0.5rem;
                text-align: center;
            }

            .upload-box .form-control:focus {
                box-shadow: none;
            }

            /* Buttons */
            .btn-batal {
                background-color: transparent;
                color: #ff383b;
                border: 1px solid #ff383b;
                border-radius: 20px;
                padding: 0.6rem 1.5rem;
                transition: all 0.3s ease;
            }

            .btn-batal:hover {
                background-color: #ff383b;
                color: #ffffff;
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
                    const fileNameDisplay = document.getElementById(type + 'FileName');
                    fileNameDisplay.textContent = fileName;
                }
            }
        </script>
    </x-layout-admin>
</body>

</html>
