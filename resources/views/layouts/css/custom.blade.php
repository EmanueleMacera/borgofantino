{{-- =========================== --}}
{{-- 1. Homepage                 --}}
{{-- =========================== --}}

{{-- Intro --}}
.parallax-container {
    position: relative;
    height: 100vh;
    overflow: hidden;
}

.parallax-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image:url("{{ asset('assets/custom/homepage/layer_1.WebP') }}");
    background-size: cover;
    background-position: center;
    will-change: transform;
    z-index: 10;
}

.parallax-title {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 20;
}

.parallax-title h1 {
    font-size: 4rem;
    color: white;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    text-align: center;
}

.parallax-table {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 40vh;
    background-image:url("{{ asset('assets/custom/homepage/layer_2.WebP') }}");
    background-size: cover;
    background-position: center top;
    will-change: transform;
    z-index: 30;
}

.parallax-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, transparent, rgba(0,0,0,0.3));
    z-index: 15;
}

.test {
    height: 100vh;
    background: #f1f1f1;
}

{{-- =========================== --}}
{{-- 2. About us                 --}}
{{-- =========================== --}}

{{-- Intro --}}
