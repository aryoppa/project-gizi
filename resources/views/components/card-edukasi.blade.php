@props(['image', 'title', 'user', 'date', 'link' => null])

<div class="card card-edukasi h-100 border-0 shadow-sm">
    <div class="image-edukasi">
        <img src="{{ $image }}" alt="{{ $title }}" class="img-fluid">
    </div>
    <div class="card-body montserrat">
        <h5 class="card-title montserrat-bold mb-2">{{ $title }}</h5>
        <div class="d-flex justify-content-between align-items-center">
            <p class="card-text montserrat-regular text-muted small mb-3">{{ $user }}</p>
            <p class="card-text montserrat-regular text-muted small mb-3">{{ $date }}</p>
        </div>

        @if ($link)
            <a href="{{ $link }}" class="btn btn-sm btn-primary montserrat-semibold w-40">
                Lihat Detail <i class="bi bi-chevron-right"></i>
            </a>
        @endif
    </div>
</div>

<style>
    .card-edukasi {
        border-radius: 12px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background: white;
    }

    .card-edukasi:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12) !important;
    }

    .image-edukasi {
        margin: 1rem 1rem 0 1rem;
    }

    .image-edukasi img {
        height: 200px;
        width: 100%;
        object-fit: cover;
        border-radius: 12px;
    }

    .card-edukasi .card-body {
        padding: 1rem;
    }

    .card-edukasi .card-title {
        font-size: 1.5rem;
        color: #000000;
        line-height: 1.4;
    }

    .card-edukasi .card-text {
        font-size: 1rem;
        color: #999999;
    }

    .card-edukasi .btn-primary {
        background-color: #287BBF;
        border: none;
        border-radius: 18px;
        padding: 0.5rem 1rem;
        font-size: 0.85rem;
        transition: all 0.3s ease;
    }

    .card-edukasi .btn-primary:hover {
        background-color: #1f6aa5;
        transform: translateY(-2px);
    }

    .card-edukasi .btn-primary i {
        font-size: 0.7rem;
        transition: transform 0.3s ease;
    }

    .card-edukasi .btn-primary:hover i {
        transform: translateX(3px);
    }
</style>
