@props(['items', 'type' => 'edukasi', 'carouselId' => 'mainCarousel'])

@php
    $colorClass = $type === 'resep' ? 'orange' : 'blue';
    $btnColor = $type === 'resep' ? '#FF821C' : '#287BBF';
    $btnHoverColor = $type === 'resep' ? '#e67419' : '#1f6aa5';
@endphp

<div id="{{ $carouselId }}" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach($items->chunk(3) as $index => $chunk)
        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
            <div class="row g-4">
                @foreach($chunk as $item)
                <div class="col-md-4">
                    @if($type === 'edukasi')
                        <x-card-edukasi 
                            :image="$item['image']"
                            :title="$item['title']"
                            :user="$item['user']"
                            :date="$item['date']"
                            :link="$item['link']"
                        />
                    @else
                        <x-card-resep 
                            :image="$item['image']"
                            :title="$item['title']"
                            :energy="$item['energy']"
                            :protein="$item['protein']"
                            :fat="$item['fat']"
                            :carbs="$item['carbs']"
                            :portion="$item['portion']"
                            :link="$item['link']"
                        />
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
    
    @if($items->count() > 3)
    <div class="carousel-indicators" style="position: absolute; bottom: -40px; margin-bottom: 0;">
        @foreach($items->chunk(3) as $index => $chunk)
        <button type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide-to="{{ $index }}" 
                class="{{ $index === 0 ? 'active' : '' }}" aria-current="true" aria-label="Slide {{ $index + 1 }}">
        </button>
        @endforeach
    </div>
    @endif
</div>

<style>
    .carousel-item {
        padding: 20px 0;
    }

    #{{ $carouselId }} .carousel-indicators button {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        border: none;
        background-color: #D9D9D9;
        opacity: 1;
        margin: 0 4px;
        transition: all 0.3s ease;
    }

    #{{ $carouselId }} .carousel-indicators button.active {
        background-color: #FF821C;
        width: 20px;
        height: 20px;
    }

    #{{ $carouselId }} {
        padding-bottom: 10px;
    }
</style>