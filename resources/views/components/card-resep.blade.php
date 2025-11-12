@props(['image', 'title', 'energy', 'protein', 'fat', 'carbs', 'portion', 'link' => null])

<div class="card card-resep h-100 border-0 shadow-sm">
    <div class="image-resep">
        <img src="{{ $image }}" alt="{{ $title }}" class="img-fluid">
    </div>
    <div class="card-body montserrat">
        <div class="d-flex justify-content-between align-items-start mb-2">
            <h5 class="card-title montserrat-bold mb-0">{{ $title }}</h5>
            <span class="text-dark montserrat-semibold text-muted">{{ $portion }}</span>
        </div>

        <ul class="list-unstyled mb-3 mt-3">
            <li class="montserrat-regular mb-1">Energi: {{ $energy }}</li>
            <li class="montserrat-regular mb-1">Protein: {{ $protein }}</li>
            <li class="montserrat-regular mb-1">Lemak: {{ $fat }}</li>
            <li class="montserrat-regular mb-1">Karbohidrat: {{ $carbs }}</li>
        </ul>

        @if ($link)
            <a href="{{ $link }}" class="btn btn-sm btn-primary montserrat-semibold w-40">
                Lihat Detail <i class="bi bi-chevron-right"></i>
            </a>
        @endif
    </div>
</div>

<style>
    .card-resep {
        border-radius: 12px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background: white;
    }

    .card-resep:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12) !important;
    }

    .image-resep {
        margin: 1rem 1rem 0 1rem;
    }

    .image-resep img {
        height: 200px;
        width: 100%;
        object-fit: cover;
        border-radius: 12px;
    }

    .card-resep .card-body {
        padding: 1rem;
    }

    .card-resep .card-title {
        font-size: 1.5rem;
        color: #000000;
        line-height: 1.3;
    }

    .card-resep span {
        font-size: 1rem;
        padding: 0.4rem 0.6rem;
    }

    .card-resep ul li {
        font-size: 1rem;
    }

    .card-resep ul li strong {
        color: #000000;
    }

    .card-resep .btn-primary {
        background-color: #287BBF;
        border: none;
        border-radius: 18px;
        padding: 0.5rem 1rem;
        font-size: 0.85rem;
        transition: all 0.3s ease;
    }

    .card-resep .btn-primary:hover {
        background-color: #1f6aa5;
        transform: translateY(-2px);
    }

    .card-resep .btn-primary i {
        font-size: 0.7rem;
        transition: transform 0.3s ease;
    }

    .card-resep .btn-primary:hover i {
        transform: translateX(3px);
    }
</style>
