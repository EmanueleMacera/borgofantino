@extends('layouts.app')

@section('content')
<div class="parallax-container">
    <div class="parallax-background"></div>
    
    <div class="parallax-title">
        <h1>Borgo Fantino</h1>
    </div>
    
    <div class="parallax-table"></div>
    
    <div class="parallax-overlay"></div>
    
</div>

{{-- Contenuto resto della pagina --}}
<div class="content">
    <div class="test"></div>
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
        
        // Effetto parallax per ogni elemento
        background.style.transform = `translateY(${scrolled * 0.5}px)`;
        title.style.transform = `translate(-50%, -50%) translateY(${scrolled * 0.3}px)`;
        table.style.transform = `translateY(${scrolled * 0.1}px)`;
    });
});
</script>
@endpush
