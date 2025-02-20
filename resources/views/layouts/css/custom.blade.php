{{-- =========================== --}}
{{-- 1. Homepage                 --}}
{{-- =========================== --}}

p {
    font-size: 2rem !important;
}

h1 {
    font-size: 4.1rem !important;
}

{{-- Intro --}}
.parallax-container {
    position: relative;
    height: 100vh;
    translate: 0 -70px;
    overflow: hidden;
}

.parallax-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    background-image: url('{{ asset('assets/custom/homepage/layer_1.WebP') }}');
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
    text-align: center;
}

.parallax-title h1 {
    color: white;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    font-weight: bolder;
}

.parallax-title p {
    color: white;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    font-weight: bolder;
}

.parallax-table {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 40vh;
    background-image: url('{{ asset('assets/custom/homepage/layer_2.WebP') }}');
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
    height: 100vh;
    background: linear-gradient(to bottom, transparent, rgba(0,0,0,0.3));
    z-index: 15;
}


.navbar {
    background-color: rgba(0, 0, 0, 0.1) !important;
    backdrop-filter: blur(1.5px);
    -webkit-backdrop-filter: blur(1.5px);
}

.alloggi-container {
    min-height: 100vh;
    will-change: transform;
    translate: 0 -10px;
}

.alloggi-container h1 {
    font-weight: bolder;
}

.alloggi-container a {
    border-radius: 25px;
    max-width: 150px !important;
    color: white;
    text-decoration: none;
    font-weight: bolder;
    letter-spacing: 0.5px;
}

.custom-logo-footer {
    width: 100%;
    max-width: 150px;
}


{{-- ========================= --}}
{{-- 20. Media Queries         --}}
{{-- ========================= --}}

@media (max-width: 768px) {
    .parallax-container {
        translate: 0 -80px;
    }

    .alloggi-container {
        translate: 0 -50px;
    }

    h1 {
        font-size: 2.5rem !important;
    }

    p {
        font-size: 1.5rem !important;
    }

    a {
        font-size: 1rem !important;
    }

}
