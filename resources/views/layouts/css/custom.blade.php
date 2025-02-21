{{-- =========================== --}}
{{-- 0. General                 --}}
{{-- =========================== --}}
html {
    letter-spacing: 0.25px;
}

.public-content p {
    font-size: 2rem !important;
}

.public-content h1 {
    font-size: 4rem !important;
}

.public-content a {
    color: white !important;
    text-decoration: none !important;
}

.public-content .btn-primary {
    border-radius: 25px!important;
}

.navbar {
    background-color: rgba(0, 0, 0, 0.1) !important;
    backdrop-filter: blur(1.5px);
    -webkit-backdrop-filter: blur(1.5px);
}

.custom-logo-footer {
    width: 100%;
    max-width: 150px;
}

{{-- =========================== --}}
{{-- 1. Homepage                 --}}
{{-- =========================== --}}
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

{{-- Alloggi --}}
.card-img-top {
    height: 200px;
    object-fit: cover;
    object-position: center;
}

.alloggi-container {
    margin-bottom:50px;
    will-change: transform;
    translate: 0 -10px;
}

.alloggi-container h1 {
    font-weight: bolder;
}

.alloggi-container a {
    border-radius: 25px;
    max-width: 150px !important;
    font-weight: bolder;
    letter-spacing: 0.5px;
}

.dettagli-container p {
font-size:1.2rem!important;
}

.dettagli-container h1 {
    font-weight: bolder;
}

.alloggi-slider-container {
    position: relative;
    overflow: hidden;
}

.alloggi-slider {
    display: flex;
    transition: transform 0.3s ease;
}

.alloggi-slide {
    flex: 0 0 33.333%;
    max-width: 33.333%;
    padding: 0 15px;
}

.alloggi-slider-controls {
    display: none;
    justify-content: space-between;
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    transform: translateY(-50%);
}

.slider-arrow {
    background-color: rgba(255, 255, 255, 0.7);
    border: none;
    border-radius: 50%;
    color: #333;
    cursor: pointer;
    font-size: 24px;
    height: 40px;
    width: 40px;
    transition: background-color 0.3s ease;
}

.slider-arrow:hover {
    background-color: rgba(255, 255, 255, 0.9);
}

{{-- Spa --}}
.spa-image-wrapper {
    overflow: hidden;
    border-radius: 15px;
    max-height: 300px;
}

.floating-badge {
    position: absolute;
    top: 20px;
    right: 20px;
    background: rgba(255,255,255,0.9);
    padding: 10px 20px;
    border-radius: 50px;
    display: flex;
    flex-direction: column;
    align-items: center;
    font-size: 0.9rem;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.services-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(140px, 1fr));
    gap: 15px;
}

.service-item {
    text-align: center;
    padding: 10px;
    background: #f8f9fa;
    border-radius: 10px;
    transition: all 0.3s ease;
    align-content: center;
}

.service-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.service-item i {
    font-size: 20px;
    color: #6c757d;
    margin-bottom: 8px;
}

.alert-custom {
    background: linear-gradient(45deg, #fff1eb, #ace0f9);
    border: none;
    border-radius: 10px;
}

.contact-card {
    background: rgb(255, 255, 255, 0.4);
    padding: 12px;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
}

.contact-links {
    display: flex;
    flex-direction: row;
    gap: 10px;
}

{{-- Activities --}}
.activities-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-top: 40px;
}

.activity-card {
    background: rgb(255, 255, 255, 0.4);
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    transition: transform 0.3s ease;
    max-width: 350px;
    max-height: 550px;
}

.activity-card:hover {
    transform: translateY(-10px);
}

.activity-image {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.activity-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.activity-badge {
    position: absolute;
    top: 20px;
    right: 20px;
    background: rgba(255,255,255,0.9);
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.activity-badge i {
    font-size: 20px;
    margin:0;
}

.activity-content {
    padding: 20px;
}

.activities-container h1 {
    font-weight: bolder;
}

.activity-content h3 {
    margin-bottom: 15px;
    color: #2c3e50;
}

.activity-features {
    display: flex;
    gap: 15px;
    margin: 15px 0;
    flex-wrap: wrap;
}

.activity-features span {
    background: #f8f9fa;
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 0.75em;
    display: flex;
    align-items: center;
    gap: 5px;
}

.activity-features i {
    color: #0056b3;
}

.activities-container p {
    font-size: 0.9rem !important;
}

.activities-container {
    padding: 50px 0;
}

.season-tabs {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-bottom: 40px;
}

.season-tab {
    padding: 15px 30px;
    border: none;
    border-radius: 50px;
    background: #f8f9fa;
    color: #666;
    font-size: 1.1rem;
    display: flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.season-tab i {
    font-size: 1.2rem;
}

.season-tab.active {
    background: #0056b3;
    color: white;
}

.season-tab[data-season="summer"].active {
    background: #ff6b6b;
}

.season-tab[data-season="winter"].active {
    background: #4dabf7;
}

.season-pane {
    position: absolute;
    width: 100%;
    visibility: visible;
    opacity: 0;
    justify-items: center;
    transform: translateY(0px);
    transition: all 0.5s ease;
    pointer-events: none;
}

.season-pane.active {
    position: relative;
    visibility: visible;
    opacity: 1;
    justify-items: center;
    transform: translateY(0);
    pointer-events: all;
}

.season-content {
    position: relative;
    overflow: hidden;
}

#summer .activity-badge i {
    color: #ff6b6b;
}

#winter .activity-badge i {
    color: #4dabf7;
}

#summer .btn-primary {
    color: #ff6b6b;
    border-color: #ff6b6b;
}

#summer .btn-primary:hover {
    background: #ff6b6b;
    color: white;
}

#winter .btn-primary {
    color: #4dabf7;
    border-color: #4dabf7;
}

#winter .btn-primary:hover {
    background: #4dabf7;
    color: white;
}

{{-- Maps  --}}
.reach-us-container h1 {
    font-weight: bolder;
}

.reach-us-container p {
    font-size: 1.2rem!important;
}

.separator {
    width: 80px;
    height: 3px;
    background: linear-gradient(45deg, #fff1eb, #ace0f9);
}

.transport-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    margin-top: 30px;
}

.transport-card {
    background: rgb(255, 255, 255, 0.4);
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    transition: transform 0.3s ease;
}

.transport-card:hover {
    transform: translateY(-5px);
}

.transport-icon {
    font-size: 2rem;
    margin-bottom: 20px;
    text-align: center;
    margin-right:0;
}

.transport-content h5 {
    color: #2c3e50;
    margin-bottom: 15px;
    text-align: center;
}

.airport-list {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.airport-item {
    display: flex;
    align-items: center;
    gap: 15px;
}

.airport-item .time {
    background: #f8f9fa;
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 0.9em;
}

.train-routes, .highway-info {
    line-height: 1.6;
    font-size: 1rem!important;
}

{{-- ========================= --}}
{{-- 20. Media Queries         --}}
{{-- ========================= --}}
@media (max-width: 992px) {
    .activities-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    .transport-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    {{-- General --}}
    h1 {
        font-size: 2.5rem !important;
    }

    p {
        font-size: 1.5rem !important;
    }

    a {
        font-size: 0.94rem !important;
    }

    {{-- Intro --}}
    .parallax-container {
        translate: 0 -80px;
    }

    {{-- Alloggi --}}
    .alloggi-container {
        translate: 0 -50px;
        margin-bottom: 0;
    }

    .alloggi-slide {
        flex: 0 0 100%;
        max-width: 100%;
    }

    .alloggi-slider {
        display: block;
    }
    .alloggi-slide {
        max-width: 100%;
        margin-bottom: 20px;
    }
    .alloggi-slider-controls {
        display: none !important;
    }

    {{-- Spa --}}
    .dettagli-container {
        translate: 0 -50px;
    }

    .services-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(140px, 1fr));
        gap: 15px;
    }

    {{-- Activities --}}
    .activities-grid {
        grid-template-columns: 1fr;
    }

    .season-tabs {
        flex-direction: column;
        align-items: center;
    }
    
    .season-tab {
        width: 100%;
        max-width: 300px;
        justify-content: center;
    }
    
    {{-- Maps --}}
    .transport-grid {
        grid-template-columns: 1fr;
    }

    .reach-us-container {
        translate: 0 -50px;
    }
}
