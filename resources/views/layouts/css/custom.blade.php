{{-- =========================== --}}
{{-- 1. Homepage                 --}}
{{-- =========================== --}}

{{-- Intro --}}
.parallax-wrapper {
    width: 100%;
    overflow: hidden;
}

.parallax-container {
    position: relative;
    width: 100%;
    aspect-ratio: 1920/1080;
}

.parallax-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 10;
}

.background-image {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.parallax-title {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 20;
}

.parallax-title h1 {
    font-size: clamp(2rem, 8vw, 4rem);
    color: white;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    text-align: center;
    white-space: nowrap;
}

.parallax-table {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    z-index: 30;
}

.table-image {
    width: 100%;
    height: auto;
    display: block;
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
