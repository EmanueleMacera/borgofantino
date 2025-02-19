<div class="parallax">
    <div class="layer" id="layer2"></div>
    <div class="layer" id="layer1"></div>
    <div class="parallax-text">
        <h1>Borgo Fantino</h1>
    </div>
</div>

@push('scripts')
<script>
    const layers = document.querySelectorAll('.layer');

        window.addEventListener('scroll', () => {
        let scroll = window.pageYOffset;

        layers.forEach(layer => {
            let speed = layer.getAttribute('data-speed');
            layer.style.transform = `translateY(${scroll * speed}px)`;
        });
    });
</script>
@endpush
