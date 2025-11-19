@props([
    'name',
    'image',
    'title',
    'energy',
    'protein',
    'fat',
    'carbs',
    'portion',
    'link' => null,
    'showActions' => false,
    'id' => null,
])

@php
    $raw = trim((string) ($image ?? ''));

    // default
    $imageUrl = asset('images/placeholder.png');

    // if it's an absolute URL that contains '/storage/', strip domain+storage and use asset()
    if ($raw !== '' && (str_starts_with($raw, 'http://') || str_starts_with($raw, 'https://') || str_starts_with($raw, '//'))) {
        // try to find '/storage/' in the URL and take the part after it
        $pos = strpos($raw, '/storage/');
        if ($pos !== false) {
            $after = substr($raw, $pos + strlen('/storage/'));
            $imageUrl = asset(ltrim($after, '/'));
        } else {
            // external full URL (no /storage/) — keep as is
            $imageUrl = $raw;
        }
    }
    // if starts with "storage/..." (relative)
    elseif ($raw !== '' && str_starts_with($raw, 'storage/')) {
        $imageUrl = asset(substr($raw, strlen('storage/')));
    }
    // if contains project_gizi/public/...
    elseif ($raw !== '' && strpos($raw, 'project_gizi/public') !== false) {
        $clean = substr($raw, strpos($raw, 'project_gizi/public/') + strlen('project_gizi/public/'));
        $imageUrl = asset(ltrim($clean, '/'));
    }
    // plain relative path like 'img/edukasi/..'
    elseif ($raw !== '') {
        $imageUrl = asset(ltrim($raw, '/'));
    }

    // debug: to logs (remove later)
    logger("IMAGE NORMALIZER raw=[$raw] final=[$imageUrl]");
@endphp

<div class="card card-resep h-100 border-0 shadow-sm">
    <div class="image-resep">
        <!--{{ $imageUrl }}-->
        <img src="{{ $imageUrl }}" alt="{{ $title }}" class="img-fluid">
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

        @if ($showActions)
            <div class="card-actions mt-3">
                <button class="btn-icon" title="Detail"
                    onclick="window.location.href='{{ route('admin.resep.show', $id ?? 1) }}'">
                    <i class="bi bi-info-circle"></i>
                </button>
                <button class="btn-icon" title="Edit"
                    onclick="window.location.href='{{ route('admin.resep.edit', $id ?? 1) }}'">
                    <i class="bi bi-pencil"></i>
                </button>
                <button class="btn-icon text-danger" onclick="confirmDelete({{ $id ?? 1 }})" title="Hapus">
                    <i class="bi bi-trash"></i>
                </button>
            </div>
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

    .card-actions {
        display: flex;
        gap: 0.5rem;
        justify-content: flex-end;
    }

    .btn-icon {
        background: transparent;
        border: none;
        color: #287BBF;
        font-size: 1.1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        padding: 0.25rem;
    }

    .btn-icon:hover {
        transform: scale(1.2);
    }

    .btn-icon.text-danger {
        color: #dc3545 !important;
    }

    .btn-icon.text-danger:hover {
        color: #bb2d3b !important;
    }
</style>
