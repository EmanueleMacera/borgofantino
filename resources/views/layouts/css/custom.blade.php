{{-- =========================== --}}
{{-- 1. Homepage                 --}}
{{-- =========================== --}}

{{-- Intro --}}
.parallax {
    perspective: 1px;
    height: 100vh;
    overflow-x: hidden;
    overflow-y: auto;
    position: relative;
}

.layer {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center center;
    will-change: transform;
}

#layer1 {
    background-image: url("{{ asset('assets/custom/homepage/layer_1.WebP') }}");
    z-index: -3;
}

#layer2 {
    background-image: url("{{ asset('assets/custom/homepage/layer_2.WebP') }}");
    z-index: -2;
}

#layer3 {
    background-image: url("{{ asset('assets/custom/homepage/layer_3.WebP') }}");
    z-index: -1;
}

.parallax-text {
    position: absolute;
    bottom: 20%;
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
    width: 100%;
    z-index: 0;
}

.parallax-text h1 {
    font-size: 3rem;
    color: #fff;
}
