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
            <!-- Header Section -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="montserrat-extrabold mb-0">Edukasi Gizi</h4>
                <div class="d-flex gap-2">
                    <!-- Search Box -->
                    <div class="search-box">
                        <input type="text" class="form-control montserrat-regular" placeholder="Search text">
                        <i class="bi bi-search"></i>
                    </div>
                    <!-- Button Add -->
                    <a href="{{ route('admin.edukasi.create') }}" class="btn btn-add montserrat-semibold">
                        Tambahkan Edukasi
                    </a>
                </div>
            </div>

            <!-- Alert Success -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Grid Edukasi -->
            <div class="row g-4 mb-5">
                @forelse ($edukasis as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        {{-- x-card-edukasi component: adjust props to what your component expects --}}
                        <x-card-edukasi
                            :image="$item->image ? asset('storage/' . $item->image) : asset('/img/placeholder.png')"
                            :title="$item->title"
                            :user="$item->author ?? 'Admin'"
                            :date="$item->published_at ? $item->published_at->format('d M Y') : $item->created_at->format('d M Y')"
                            :showActions="true"
                            :id="$item->id"
                        />
                    </div>
                @empty
                    <div class="col-12">
                        <div class="card p-4 text-center">
                            <h5 class="mb-2">Belum ada edukasi.</h5>
                            <p class="text-muted mb-0">Klik “Tambahkan Edukasi” untuk membuat konten baru.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{-- Preserve query string on pagination links --}}
                {{ $edukasis->appends(request()->query())->links() }}
            </div>
        </div>

        <style>
            /* Search Box */
            .search-box {
                position: relative;
            }

            .search-box input {
                padding-right: 2.5rem;
                border-radius: 20px;
                border: 1px solid #ddd;
                width: 250px;
            }

            .search-box i {
                position: absolute;
                right: 1rem;
                top: 50%;
                transform: translateY(-50%);
                color: #666;
            }

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
                .d-flex.justify-content-between {
                    flex-direction: column;
                    gap: 1rem;
                }

                .search-box input {
                    width: 100%;
                }

                .btn-add {
                    width: 100%;
                }
            }
        </style>
    </x-layout-admin>

    <script>
        function confirmDelete(id) {
            if (confirm('Apakah Anda yakin ingin menghapus edukasi ini?')) {
                // Create form for DELETE request
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/admin/edukasi/${id}`;

                // Add CSRF token
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);

                // Add DELETE method
                const methodField = document.createElement('input');
                methodField.type = 'hidden';
                methodField.name = '_method';
                methodField.value = 'DELETE';
                form.appendChild(methodField);

                document.body.appendChild(form);
                form.submit();
            }
        }

        // Auto dismiss alert
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
