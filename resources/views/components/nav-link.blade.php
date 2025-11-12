@props(['active'])

@php
    $classes =
        $active ?? false ? 'nav-link montserrat-extrabold text-decoration-none' : 'nav-link text-decoration-none';
@endphp

<a {{ $attributes->merge([
    'class' =>
        'nav-link text-decoration-none ' .
        (request()->url() === url($attributes->get('href')) ? 'montserrat-extrabold' : ''),
]) }}
    style="{{ request()->url() === url($attributes->get('href')) ? 'color: #287BBF !important;' : '' }}">
    {{ $slot }}
</a>

<style>
    .nav-link {
        color: #000 !important;
        transition: color 0.2s ease;
    }

    .nav-link:hover {
        color: #287BBF !important;
    }
</style>
