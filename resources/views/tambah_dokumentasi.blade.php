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
    <title>Tambah Dokumentasi - SEMAI</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <x-layout-admin pageTitle="Dashboard">
        <div class="container-fluid montserrat">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <!-- Card Form -->
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h4 class="montserrat-bold mb-4">Tambah Dokumentasi</h4>

                            <form action="{{ route('admin.dokumentasi.store') }}" method="POST"
                                enctype="multipart/form-data" id="dokumentasiForm">
                                @csrf

                                <!-- Upload Area -->
                                <div class="upload-area" id="uploadArea">
                                    <input type="file" id="fileInput" name="image"
                                        accept="image/png,image/jpg,image/jpeg" hidden>

                                    <div class="upload-content" id="uploadContent">
                                        <div class="upload-icon">
                                            <img src="/icons/add_dokum.png" alt="Tambah Dokumentasi Icon"
                                                style="width:75px; height:75px;">
                                        </div>
                                        <p class="montserrat-medium mb-2">
                                            Drop your image here, or <span class="text-primary" style="cursor: pointer;"
                                                onclick="document.getElementById('fileInput').click()">browse</span>
                                        </p>
                                        <p class="text-muted small montserrat-regular">Support PNG, JPG, JPEG</p>
                                    </div>

                                    <!-- Preview Container (hidden by default) -->
                                    <div class="preview-container" id="previewContainer" style="display: none;">
                                        <div class="preview-item">
                                            <img id="previewImage" src="" alt="Preview">
                                            <div class="preview-info">
                                                <p class="montserrat-medium mb-0" id="fileName"></p>
                                                <button type="button" class="btn-remove" onclick="removeImage()">
                                                    <i class="bi bi-x-lg"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @error('image')
                                    <div class="text-danger small mt-2">{{ $message }}</div>
                                @enderror

                                <!-- Action Buttons -->
                                <div class="d-flex justify-content-end gap-2 mt-4">
                                    <a href="{{ route('admin.dokumentasi.index') }}"
                                        class="btn btn-batal montserrat-semibold">
                                        Batal
                                    </a>
                                    <button type="submit" class="btn btn-submit montserrat-semibold">
                                        Upload Dokumentasi
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            /* Card */
            .card {
                border-radius: 15px;
            }

            /* Upload Area */
            .upload-area {
                border: 2px dashed #ddd;
                border-radius: 12px;
                padding: 3rem 2rem;
                text-align: center;
                transition: all 0.3s ease;
                position: relative;
                min-height: 300px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .upload-area.dragover {
                border-color: #287BBF;
                background-color: rgba(40, 123, 191, 0.05);
            }

            .upload-icon {
                font-size: 4rem;
                color: #287BBF;
                margin-bottom: 1rem;
            }

            .upload-content .text-primary {
                color: #287BBF !important;
                font-weight: 600;
            }

            /* Preview Container */
            .preview-container {
                width: 100%;
            }

            .preview-item {
                display: flex;
                align-items: center;
                gap: 1rem;
                padding: 1rem;
                background: #f8f9fa;
                border-radius: 10px;
            }

            .preview-item img {
                width: 120px;
                height: 120px;
                object-fit: cover;
                border-radius: 8px;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            }

            .preview-info {
                flex: 1;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .btn-remove {
                background-color: #dc3545;
                color: white;
                border: none;
                border-radius: 50%;
                width: 36px;
                height: 36px;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .btn-remove:hover {
                background-color: #c82333;
                transform: scale(1.1);
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
                border-radius: 20px;
                padding: 0.6rem 1.5rem;
                transition: all 0.3s ease;
            }

            .btn-submit:hover {
                background-color: #287BBF;
            }

            /* Responsive */
            @media (max-width: 768px) {
                .upload-area {
                    padding: 2rem 1rem;
                }

                .preview-item {
                    flex-direction: column;
                    text-align: center;
                }
            }
        </style>
    </x-layout-admin>

    <script>
        const uploadArea = document.getElementById('uploadArea');
        const fileInput = document.getElementById('fileInput');
        const uploadContent = document.getElementById('uploadContent');
        const previewContainer = document.getElementById('previewContainer');
        const previewImage = document.getElementById('previewImage');
        const fileName = document.getElementById('fileName');

        // Click to upload
        uploadArea.addEventListener('click', function(e) {
            if (e.target.id !== 'fileInput' && !e.target.closest('.btn-remove')) {
                fileInput.click();
            }
        });

        // File input change
        fileInput.addEventListener('change', function(e) {
            handleFile(e.target.files[0]);
        });

        // Drag and drop
        uploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            uploadArea.classList.add('dragover');
        });

        uploadArea.addEventListener('dragleave', function(e) {
            e.preventDefault();
            uploadArea.classList.remove('dragover');
        });

        uploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            uploadArea.classList.remove('dragover');

            const file = e.dataTransfer.files[0];
            if (file && file.type.startsWith('image/')) {
                fileInput.files = e.dataTransfer.files;
                handleFile(file);
            }
        });

        function handleFile(file) {
            if (!file) return;

            // Validate file type
            const validTypes = ['image/png', 'image/jpg', 'image/jpeg'];
            if (!validTypes.includes(file.type)) {
                alert('Please upload PNG, JPG, or JPEG image only');
                return;
            }

            // Show preview
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                fileName.textContent = file.name;
                uploadContent.style.display = 'none';
                previewContainer.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }

        function removeImage() {
            fileInput.value = '';
            previewImage.src = '';
            fileName.textContent = '';
            uploadContent.style.display = 'block';
            previewContainer.style.display = 'none';
        }

        // Form submission
        document.getElementById('dokumentasiForm').addEventListener('submit', function(e) {
            if (!fileInput.files.length) {
                e.preventDefault();
                alert('Please select an image to upload');
            }
        });
    </script>
</body>

</html>
