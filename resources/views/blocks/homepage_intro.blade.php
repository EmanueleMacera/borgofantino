@extends('layouts.app')

@section('content')
<div class="parallax-container">
    <div class="parallax-background">
        <img src="{{ asset('assets/custom/homepage/layer_1.WebP') }}" alt="Room" class="background-image">
    </div>
    
    <div class="parallax-title">
        <h1>Borgo Fantino</h1>
    </div>
    
    <div class="parallax-table">
        <img src="{{ asset('assets/custom/homepage/layer_2.WebP') }}" alt="Table setting" class="table-image">
    </div>
    
    <div class="parallax-overlay"></div>
    
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

    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const windowHeight = window.innerHeight;
        
        // Calcola il rapporto di scroll rispetto all'altezza della viewport
        const scrollRatio = scrolled / windowHeight;
        
        // Applica le trasformazioni mantenendo le proporzioni
        background.style.transform = `translateY(${scrollRatio * 50}px)`;
        title.style.transform = `translate(-50%, -50%) translateY(${scrollRatio * 30}px)`;
        table.style.transform = `translateY(${scrollRatio * 10}px)`;
    });
});
</script>
@endpush
