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
                <h4 class="montserrat-bold mb-4">Edit Resep Makanan</h4>

                <form action="{{ route('admin.resep.update', $resep->id) }}" method="POST" 
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Nama Makanan & Foto -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="name" class="form-label montserrat-semibold">Nama Makanan</label>
                            <input type="text" class="form-control montserrat-regular" id="name"
                                name="name" placeholder="Nama Makanan" required
                                value="{{ old('name', $resep->name) }}">
                            @error('name')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="image" class="form-label montserrat-semibold">Gambar (opsional)</label>
                            <input id="image" name="image" type="file" class="form-control" accept="image/*">
                            <small class="text-muted">Support PNG, JPG, JPEG. Maks 4MB.</small>

                            {{-- preview area --}}
                            <div id="imagePreviewWrapper" class="mt-3" style="display: {{ $resep->image ? 'block' : 'none' }};">
                                <p class="small mb-1">Preview Gambar:</p>
                                <img id="imagePreview" src="{{ $resep->image ? asset('storage/' . $resep->image) : '' }}" alt="preview" style="max-width:300px; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.08);">
                            </div>
                        </div>
                    </div>

                    <!-- Jumlah Porsi, Energi, Protein -->
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="portion" class="form-label montserrat-semibold">Jumlah Porsi</label>
                            <input type="text" class="form-control montserrat-regular" id="portion"
                                name="portion" placeholder="Jumlah Porsi" required
                                value="{{ old('portion', $resep->portion) }}">
                            @error('portion')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="energy" class="form-label montserrat-semibold">Energi</label>
                            <input type="text" class="form-control montserrat-regular" id="energy" name="energy"
                                placeholder="Energi" required value="{{ old('energy', $resep->energy) }}">
                            @error('energy')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="protein" class="form-label montserrat-semibold">Protein</label>
                            <input type="text" class="form-control montserrat-regular" id="protein" name="protein"
                                placeholder="Protein" required value="{{ old('protein', $resep->protein) }}">
                            @error('protein')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Lemak & Karbohidrat -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="fat" class="form-label montserrat-semibold">Lemak</label>
                            <input type="text" class="form-control montserrat-regular" id="fat" name="fat"
                                placeholder="Lemak" required value="{{ old('fat', $resep->fat) }}">
                            @error('fat')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="carbs" class="form-label montserrat-semibold">Karbohidrat</label>
                            <input type="text" class="form-control montserrat-regular" id="carbs"
                                name="carbs" placeholder="Karbohidrat" required
                                value="{{ old('carbs', $resep->carbs) }}">
                            @error('carbs')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Bahan & Alat-Alat -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="ingridients" class="form-label montserrat-semibold">Bahan</label>
                            <textarea class="form-control montserrat-regular" id="ingridients" name="ingridients" rows="6" placeholder="Bahan"
                                required>{{ old(
                                    'ingridients', $resep->ingridients
                                ) }}</textarea>
                            @error('ingridients')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="tools" class="form-label montserrat-semibold">Alat-Alat</label>
                            <textarea class="form-control montserrat-regular" id="tools" name="tools" rows="6"
                                placeholder="Alat-alat" required>{{ old(
                                    'tools',
                                    $resep->tools
                                ) }}</textarea>
                            @error('tools')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Cara Pembuatan -->
                    <div class="mb-4">
                        <label for="how_to" class="form-label montserrat-semibold">Cara Pembuatan</label>
                        <textarea class="form-control montserrat-regular" id="how_to" name="how_to" rows="8"
                            placeholder="Cara Pembuatan" required>{{ old(
                                'how_to',
                                $resep->how_to
                            ) }}</textarea>
                        @error('how_to')
                            <div class="text-danger mt-1 small">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-end gap-3">
                        <a href="{{ route('admin.resep.index') }}" class="btn btn-batal montserrat-semibold">
                            Batal
                        </a>
                        <button type="submit" class="btn btn-submit montserrat-semibold">
                            Update Data
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
                max-width: 1100px;
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
                min-height: 120px;
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

                .btn-batal,
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
