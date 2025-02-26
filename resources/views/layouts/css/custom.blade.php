{{-- =========================== --}}
{{-- 0. General                 --}}
{{-- =========================== --}}
html {
    letter-spacing: 0.25px;
}

.home-content p {
    font-size: 2rem !important;
}

.home-content h1 {
    font-size: 4rem !important;
}

.home-content a {
    color: white !important;
    text-decoration: none !important;
}

.home-content .btn-primary {
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
.block-parallax-alloggi {
    background-image: url("{{ asset('assets/custom/parallax/alloggi.WebP') }}");
    background-size: cover;
    background-position: bottom center;
    position: relative;
    background-repeat: no-repeat;
    background-attachment: fixed;
    height: 50vh;
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
    padding: 10px;
}

.alloggi-slider {
    display: flex;
    transition: transform 0.3s ease;
    gap: 0.5rem;
}

.alloggi-slide {
    flex: 0 0 33.333%;
    max-width: 32.5%;
    background-color: #ffffff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.alloggi-slide:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    transform: scale(1.05);
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
    border-radius: 10px;
    transition: all 0.3s ease;
    align-content: center;
    background: rgb(255, 255, 255, 0.4);
    box-shadow: rgba(0, 0, 0, 0.05) 0px 5px 20px;
}

.service-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.service-item i {
    font-size: 20px;
    color: rgb(0, 0, 0, 0.75);
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

#summer .activity-features i {
    color: #ff6b6b;
}

#winter .activity-badge i {
    color: #4dabf7;
}

#winter .activity-features i {
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
{{-- 10. Alloggi               --}}
{{-- ========================= --}}
.item-gallery {
    border-radius: 0.5rem;
    height: 100%;
    object-fit: cover;
}

.content-section {
    padding: 1rem;
    border-bottom: 0.1px solid var(--tertiary-color);
}

.section-title {
    font-size: 1.8rem;
    color: #333;
    margin-bottom: 1rem;
}

.section-text {
    font-size: 1rem;
    line-height: 1.6;
    color: #555;
}

.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
    gap: 1rem;
}

.sidebar {
    padding: 1.5rem;
    border-radius: 8px;
}

.info-card, .price-card {
    background: rgb(255, 255, 255, 0.4);
    border-radius: 8px;
    padding: 1.5rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.card-title {
    font-size: 1.4rem;
    color: #333;
    margin-bottom: 1rem;
}

.info-list {
    list-style-type: none;
    padding: 0;
}

.info-list li {
    display: flex;
    align-items: center;
    margin-bottom: 0.5rem;
}

.info-list i {
    color: rgb(0, 0, 0, 0.75);
}

.btn-block {
    display: block;
    width: 100%;
    padding: 0.75rem;
    font-size: 1rem;
    text-align: center;
    background-color: var(--btn-bg-color);
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-block:hover {
    background-color: var(--btn-hover-bg-color:);
}

{{-- ========================= --}}
{{-- 15. Lista alloggi         --}}
{{-- ========================= --}}
.cards-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 2rem;
    max-width: 1200px;
    margin: 0 auto;
}

.card-2 {
    background-color: #ffffff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card-2:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}

.card-image {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.card-2:hover .card-image img {
    transform: scale(1.05);
}

.card-badge {
    position: absolute;
    top: 10px;
    right: 10px;
    background-color: rgba(255, 255, 255, 0.9);
    color: #333;
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: bold;
}

.card-content {
    padding: 1.5rem;
}

.card-title {
    font-size: 1.5rem;
    font-weight: bold;
    color: #333;
    margin-bottom: 0.5rem;
}

.card-description {
    color: #666;
    font-size: 0.9rem;
    margin-bottom: 1rem;
}

.card-features {
    display: flex;
    gap: 1rem;
    margin-bottom: 1rem;
}

.feature {
    background-color: #e9ecef;
    color: #495057;
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 0.8rem;
}

.card-attributes {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    margin-bottom: 1rem;
}

.attribute {
    background-color: #f1f3f5;
    color: #495057;
    padding: 3px 8px;
    border-radius: 15px;
    font-size: 0.75rem;
}

.card-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-address {
    font-size: 0.8rem;
    color: #6c757d;
}

{{-- ========================= --}}
{{-- 5. Form Contatti         --}}
{{-- ========================= --}}
.block-parallax-contatti {
    background-image: url("{{ asset('assets/custom/parallax/contatti.WebP') }}");
    background-size: cover;
    background-position: bottom center;
    position: relative;
    background-repeat: no-repeat;
    background-attachment: fixed;
    height: 50vh;
}

.servizi-form {
    width: 100vh;
    padding: 1rem;
    background: rgb(255, 255, 255, 0.4);
    border-radius: 8px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    display: flex;
    flex-direction: column;
}

.servizi-form form{
    width: 100%;
}

.servizi-form h2 {
    font-size: 28px;
    font-weight: bold;
    margin-bottom: 15px;
}

.servizi-form .form-group label {
    font-size: 14px;
    font-weight: 600;
    color: var(--tertiary-color);
    margin-bottom: 8px;
    display: flex;
    align-items: center;
}

.servizi-form .form-group textarea {
    font-size: 16px;
    border: 1px solid var(--primary-color);
    border-radius: 6px;
    width: 100%;
    transition: border-color 0.3s, box-shadow 0.3s ease-in-out;
    background-color: #f8f9fa;
    margin-bottom: 20px;
}

.servizi-form .form-group input:focus,
.servizi-form .form-group textarea:focus {
    border-color: var(--tertiary-color);
    box-shadow: 0 0 10px rgba(0, 123, 255, 0.2);
    outline: none;
}

.servizi-form div[style="display:none;"] {
    display: none;
}

{{-- ========================= --}}
{{-- 10. Galleria              --}}
{{-- ========================= --}}
.tz-gallery .row > div {
    padding: 2px;
}

.tz-gallery .lightbox img {
    width: 100%;
    border-radius: 10px;
    position: relative;
    display: block;
}

.tz-gallery .lightbox:after {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    background-color: rgb(235, 227, 216, 0.4);
    content: '';
    transition: 0.4s;
    pointer-events: none;
}

.tz-gallery .lightbox {
    display: inline-block;
    position: relative;
    overflow: hidden;
}

.tz-gallery .lightbox:hover:after,
.tz-gallery .lightbox:hover:before {
    opacity: 1;
}

.baguetteBox-button {
    background-color: transparent !important;
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
    .alloggi-b {
        justify-content: center;
        display: flex;
        justify-self: center;
        width: 100%;
    }

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
    .activities-container {
        translate: 0 -50px;
    }

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
    .reach-us-container {
        translate: 0 -50px;
    }

    .transport-grid {
        grid-template-columns: 1fr;
    }

    .reach-us-container {
        translate: 0 -50px;
    }

    {{-- Lista alloggi --}}
    .cards-container {
        grid-template-columns: 1fr;
    }

    {{-- Form Contatti --}}
    .servizi-form {
        translate: 0;
        margin-right: 0;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        margin-bottom: 20px;
    }
}
