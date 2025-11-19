@props(['items'])

@php
    // ensure we have a collection so ->chunk() works
    $items = collect($items ?? []);
@endphp

@if($items->isEmpty())
    <p class="text-muted">Belum ada dokumentasi.</p>
@else
<div id="dokumentasiCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach($items->chunk(4) as $index => $chunk)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                <div class="row g-3">
                    @foreach($chunk as $item)
                        <div class="col-6 col-md-3">
                            <div class="dokumentasi-image-wrapper">
                                <a href="{{ $item['link'] ?? '#' }}" class="d-block">
                                    <img src="{{ $item['image'] }}" class="img-fluid dokumentasi-img" alt="{{ $item['title'] ?? 'Dokumentasi' }}">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    {{-- indicators --}}
    <div class="carousel-indicators">
        @foreach($items->chunk(4) as $index => $chunk)
            <button type="button"
                    data-bs-target="#dokumentasiCarousel"
                    data-bs-slide-to="{{ $index }}"
                    class="{{ $index === 0 ? 'active' : '' }}"
                    {{ $index === 0 ? 'aria-current="true"' : '' }}
                    aria-label="Slide {{ $index + 1 }}">
            </button>
        @endforeach
    </div>

    {{-- controls (optional) --}}
    <button class="carousel-control-prev" type="button" data-bs-target="#dokumentasiCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#dokumentasiCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
@endif

<style>
    #dokumentasiCarousel { overflow: hidden; }
    #dokumentasiCarousel .carousel-inner { padding: 1rem 0 3.5rem 0; }

    .dokumentasi-image-wrapper {
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        aspect-ratio: 4/3;
        width: 100%;
        border-radius: 8px;
    }
    .dokumentasi-image-wrapper:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.25);
    }
    .dokumentasi-img {
        width: 100%;
        height: 100%;
        object-fit: cover !important;
        display: block;
    }

    #dokumentasiCarousel .carousel-indicators { bottom: 0; margin-bottom: 0; }
    #dokumentasiCarousel .carousel-indicators button {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        border: none;
        background-color: #D9D9D9;
        opacity: 1;
        margin: 0 4px;
        transition: all 0.3s ease;
    }
    #dokumentasiCarousel .carousel-indicators button.active { background-color: #FF821C; width: 20px; height: 20px; }
    #dokumentasiCarousel .carousel-indicators button:hover { opacity: 0.8; }

    @media (max-width: 768px) {
        .dokumentasi-image-wrapper { aspect-ratio: 1/1; }
    }
</style>
