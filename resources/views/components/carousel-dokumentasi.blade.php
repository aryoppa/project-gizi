@props(['items'])

<div id="dokumentasiCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach($items->chunk(4) as $index => $chunk)
        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
            <div class="row g-3">
                @foreach($chunk as $item)
                <div class="col-6 col-md-3">
                    <div class="dokumentasi-image-wrapper">
                        <img src="{{ $item['image'] }}" class="img-fluid dokumentasi-img" alt="{{ $item['title'] }}">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>

    <div class="carousel-indicators">
        @foreach($items->chunk(4) as $index => $chunk)
        <button type="button" data-bs-target="#dokumentasiCarousel" data-bs-slide-to="{{ $index }}" 
                class="{{ $index === 0 ? 'active' : '' }}" aria-current="true" aria-label="Slide {{ $index + 1 }}">
        </button>
        @endforeach
    </div>
</div>

<style>
    #dokumentasiCarousel {
        overflow: hidden;
    }

    #dokumentasiCarousel .carousel-inner {
        padding: 1rem 0 3.5rem 0;
    }

    .dokumentasi-image-wrapper {
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        aspect-ratio: 4/3;
        width: 100%;
    }

    .dokumentasi-image-wrapper:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
    }

    .dokumentasi-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    #dokumentasiCarousel .carousel-indicators {
        bottom: 0;
        margin-bottom: 0;
    }

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

    #dokumentasiCarousel .carousel-indicators button.active {
        background-color: #FF821C;
        width: 20px;
        height: 20px;
    }

    #dokumentasiCarousel .carousel-indicators button:hover {
        opacity: 0.8;
    }

    @media (max-width: 768px) {
        .dokumentasi-image-wrapper {
            aspect-ratio: 1/1;
        }
    }
</style>