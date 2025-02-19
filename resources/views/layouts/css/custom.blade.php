{{-- =========================== --}}
{{-- 1. Homepage                 --}}
{{-- =========================== --}}

{{-- Intro --}}
.parallax-container {
    position: relative;
    width: 100%;
    height: 100vh;
    overflow: hidden;
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
    object-fit: cover;
    object-position: center;
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

.scroll-indicator {
    position: absolute;
    bottom: 2rem;
    left: 50%;
    transform: translateX(-50%);
    color: white;
    font-size: 0.875rem;
    z-index: 40;
    animation: bounce 2s infinite;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateX(-50%) translateY(0);
    }
    40% {
        transform: translateX(-50%) translateY(-30px);
    }
    60% {
        transform: translateX(-50%) translateY(-15px);
    }
}

@media screen and (max-aspect-ratio: 16/9) {
    .parallax-container {
        height: auto;
        aspect-ratio: 16/9;
    }
}
