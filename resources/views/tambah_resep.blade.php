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
    <x-layout-admin pageTitle="Tambah Resep Makanan">
        <div class="container-fluid montserrat">
            <!-- Form Card -->
            <div class="form-card">
                <h4 class="montserrat-bold mb-4">Tambah Resep Makanan</h4>

                <form action="{{ route('admin.resep.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Nama Makanan & Foto -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="name" class="form-label montserrat-semibold">Nama Makanan</label>
                            <input type="text" class="form-control montserrat-regular" id="name"
                                name="name" placeholder="Nama Makanan" required
                                value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label montserrat-semibold">Foto</label>
                            <div class="upload-wrapper">
                                <input type="file" class="d-none" id="image" name="image" accept="image/*"
                                    onchange="handleFileUpload(event, 'image')">
                                <label for="image" class="btn-upload montserrat-semibold">
                                    Upload
                                </label>
                                <input type="text" class="form-control file-display montserrat-regular"
                                    id="fotoDisplay" placeholder="" readonly>
                            </div>
                            @error('image')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                            @enderror
                            {{-- preview area --}}
                            <!-- Preview -->
                            <div id="imagePreviewWrapper" class="mt-3" style="display:none;">
                                <p class="small mb-1">Preview Gambar:</p>
                                <img id="imagePreview" src="" alt="preview"
                                    style="max-width:300px; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.08);">
                            </div>
                        </div>
                    </div>

                    <!-- Jumlah Porsi, Energi, Protein -->
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="portion" class="form-label montserrat-semibold">Jumlah Porsi</label>
                            <input type="text" class="form-control montserrat-regular" id="portion"
                                name="portion" placeholder="Jumlah Porsi" required
                                value="{{ old('portion') }}">
                            @error('portion')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="energy" class="form-label montserrat-semibold">Energi</label>
                            <input type="text" class="form-control montserrat-regular" id="energy" name="energy"
                                placeholder="Energi" required value="{{ old('energy') }}">
                            @error('energy')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="protein" class="form-label montserrat-semibold">Protein</label>
                            <input type="text" class="form-control montserrat-regular" id="protein" name="protein"
                                placeholder="Protein" required value="{{ old('protein') }}">
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
                                placeholder="Lemak" required value="{{ old('lemfatak') }}">
                            @error('fat')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="carbs" class="form-label montserrat-semibold">Karbohidrat</label>
                            <input type="text" class="form-control montserrat-regular" id="carbs"
                                name="carbs" placeholder="Karbohidrat" required
                                value="{{ old('carbs') }}">
                            @error('carbs')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Bahan & Alat-Alat -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="ingridients" class="form-label montserrat-semibold">Bahan</label>
                            <textarea class="form-control montserrat-regular rich-editor"
                                    id="ingridients" name="ingridients" rows="6" placeholder="Bahan">{{ old('ingridients', $resep->ingridients ?? '') }}</textarea>
                            @error('ingridients')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="tools" class="form-label montserrat-semibold">Alat-Alat</label>
                            <textarea class="form-control montserrat-regular rich-editor"
                                    id="tools" name="tools" rows="6" placeholder="Alat-alat">{{ old('tools', $resep->tools ?? '') }}</textarea>
                            @error('tools')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Cara Pembuatan -->
                    <div class="mb-4">
                        <label for="how_to" class="form-label montserrat-semibold">Cara Pembuatan</label>
                        <textarea class="form-control montserrat-regular rich-editor"
                                id="how_to" name="how_to" rows="8" placeholder="Cara Pembuatan">{{ old('how_to', $resep->how_to ?? '') }}</textarea>
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
                            Posting Data
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
        <script src="https://cdn.tiny.cloud/1/06j39ntlnntfujthu7flj562820g5pgt5jxd3duhclmj5nuo/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

        <script>
        document.addEventListener('DOMContentLoaded', function () {
        tinymce.init({
            selector: 'textarea.rich-editor',
            height: 300,
            menubar: false,
            plugins: [
            'advlist autolink lists link image charmap preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table help wordcount'
            ],
            toolbar: 'undo redo | formatselect | bold italic underline | \
                    alignleft aligncenter alignright alignjustify | \
                    bullist numlist outdent indent | link image media | removeformat | code',
            content_style: "body { font-family: Montserrat, Arial, sans-serif; font-size:14px }",
            // optional: set relative_urls to false so inserted images/links become absolute
            relative_urls: false,
            convert_urls: true,
            remove_script_host: false,
            // enable paste as text? you can set paste_as_text: true if desired
        });
        });
        </script>

        <script>
            // image upload preview
            function handleFileUpload(event) {
                const input = event.target;
                const file = input.files[0];

                const previewWrapper = document.getElementById('imagePreviewWrapper');
                const previewImg = document.getElementById('imagePreview');
                const fileDisplay = document.getElementById('fotoDisplay');

                if (!file) {
                    // No file selected → hide preview
                    fileDisplay.value = "";
                    previewWrapper.style.display = "none";
                    previewImg.src = "";
                    return;
                }

                // Show file name
                fileDisplay.value = file.name;

                // Preview image
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    previewWrapper.style.display = "block";
                };
                reader.readAsDataURL(file);
            }
            // video preview helper: normalize common links to embed URL
            function normalizeVideoLink(url) {
                if (!url) return null;

                // Google Drive file link -> preview
                const driveFile = url.match(/drive\.google\.com\/file\/d\/([^\/]+)/);
                if (driveFile) {
                    return `https://drive.google.com/file/d/${driveFile[1]}/preview`;
                }

                // Google Drive "open?id=" -> preview
                const driveOpen = url.match(/drive\.google\.com\/open\?id=([^&]+)/);
                if (driveOpen) {
                    return `https://drive.google.com/file/d/${driveOpen[1]}/preview`;
                }

                // YouTube watch?v= or youtu.be -> embed
                const yt = url.match(/(?:youtube\.com\/watch\?v=|youtu\.be\/)([A-Za-z0-9_-]{6,})/);
                if (yt) {
                    return `https://www.youtube.com/embed/${yt[1]}`;
                }

                // If already an embed URL, return as is
                if (url.includes('youtube.com/embed') || url.includes('drive.google.com')) return url;

                return null; // unknown
            }

            const videoLinkInput = document.getElementById('video_link');
            const videoPreviewWrapper = document.getElementById('videoPreviewWrapper');
            const videoEmbed = document.getElementById('videoEmbed');

            function updateVideoPreviewFromValue(value) {
                const embedUrl = normalizeVideoLink(value);
                if (!embedUrl) {
                    videoPreviewWrapper.style.display = 'none';
                    videoEmbed.innerHTML = '';
                    return;
                }

                videoEmbed.innerHTML = `<iframe src="${embedUrl}" allow="autoplay; encrypted-media" allowfullscreen frameborder="0"></iframe>`;
                videoPreviewWrapper.style.display = 'block';
            }

            // initial: if value present from server, show preview
            document.addEventListener('DOMContentLoaded', function() {
                const initialVideo = videoLinkInput.value;
                if (initialVideo) updateVideoPreviewFromValue(initialVideo);
            });

            videoLinkInput.addEventListener('blur', function(e) {
                updateVideoPreviewFromValue(e.target.value.trim());
            });

            videoLinkInput.addEventListener('input', function(e) {
                // live preview while typing -- optional, comment out if noisy
                updateVideoPreviewFromValue(e.target.value.trim());
            });
        </script>
    </x-layout-admin>
</body>

</html>
