{{-- =========================== --}}
{{-- 1. Homepage                 --}}
{{-- =========================== --}}
html {
    letter-spacing: 0.25px;
}

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
    color: white;
    text-decoration: none;
    font-weight: bolder;
    letter-spacing: 0.5px;
}

.dettagli-container p {
font-size:1.2rem!important;
}

.dettagli-container h1 {
    font-weight: bolder;
}

.custom-logo-footer {
    width: 100%;
    max-width: 150px;
}

.separator {
    width: 80px;
    height: 3px;
    background: linear-gradient(to right, #a8edea, #fed6e3);
}

.spa-image-wrapper {
    overflow: hidden;
    border-radius: 15px;
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
    background: #fff;
    padding: 12px;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
}

.contact-card a{
    color: white;
}

.contact-links {
    display: flex;
    flex-direction: row;
    gap: 10px;
}

.activities-container {
    background: linear-gradient(to bottom, #ffffff, #f8f9fa);
}

.activities-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    margin-top: 40px;
}

.activity-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 20px rgba(0,0,0,0.05);
    transition: transform 0.3s ease;
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
    font-size: 24px;
    color: #0056b3;
}

.activity-content {
    padding: 20px;
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
    font-size: 0.9em;
    display: flex;
    align-items: center;
    gap: 5px;
}

.activity-features i {
    color: #0056b3;
}

.btn-outline-primary {
    width: 100%;
    border-radius: 25px;
    margin-top: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}




{{-- ========================= --}}
{{-- 20. Media Queries         --}}
{{-- ========================= --}}
@media (max-width: 992px) {
    .activities-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .parallax-container {
        translate: 0 -80px;
    }

    .alloggi-container {
        translate: 0 -50px;
        margin-bottom: 0;
    }

    h1 {
        font-size: 2.5rem !important;
    }

    p {
        font-size: 1.5rem !important;
    }

    a {
        font-size: 0.94rem !important;
    }


    .dettagli-container {
        translate: 0 -50px;
    }

    .services-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(140px, 1fr));
        gap: 15px;
    }

    .activities-grid {
        grid-template-columns: 1fr;
    }
    

}
