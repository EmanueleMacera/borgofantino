@extends('layouts.app')

@section('content')
    <div class="parallax-container">
        <div class="parallax-background"></div>
        
        <div class="parallax-title">
            <h1>{{ __('custom.title') }}</h1>
            <p>{{ __('custom.subtitle') }}</p>
        </div>
        
        <div class="parallax-table"></div>
        
        <div class="parallax-overlay"></div>

        <button class="btn btn-primary">{{ __('custom.see') }}</button>
        
    </div>

{{-- Contenuto resto della pagina --}}
<div class="content">
    <div style="height:100vh"></div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const background = document.querySelector('.parallax-background');
    const title = document.querySelector('.parallax-title');
    const table = document.querySelector('.parallax-table');
    const container = document.querySelector('.parallax-container');

    window.addEventListener('scroll', function() {
        const rect = container.getBoundingClientRect();
        const containerHeight = rect.height;
        const scrollPosition = -rect.top;
        
        const scrollRatio = scrollPosition / containerHeight;
        
        background.style.transform = `translateY(${scrollRatio * 50}px)`;
        title.style.transform = `translate(-50%, -50%) translateY(${scrollRatio * 150}px)`;
        table.style.transform = `translateY(${scrollRatio * 10}px)`;
    });
});
</script>
@endpush
