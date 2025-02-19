{{-- Intro --}}
<div class="homepage-container">
    <div class="block-parallax-home"></div>
    <div class="homepage-wrapper">
        <div class="homepage-content">
            <img class="custom-logo" src="{{ asset('assets/logo/logo.WebP') }}" alt="Borgo Fantino" loading="lazy">
            <div class="logo-container">
                <h1 id="page-logo">{{ __('custom.intro') }}</h1>
            </div>
        </div>

        <div class="carousel-container">
            <div class="carousel" style="transition: transform 0.5s ease; will-change: transform;">
                <div class="carousel-item-home">
                    <i class="fa-solid fa-chart-line"></i>
                    <strong>{{ __('custom.carousel_title_1') }}</strong>
                    <div>
                        <p>{{ __('custom.carousel_text_1') }}</p>
                    </div>
                </div>
                <div class="carousel-item-home">
                    <i class="fa-solid fa-handshake"></i>
                    <strong>{{ __('custom.carousel_title_2') }}</strong>
                    <div>
                        <p>{{ __('custom.carousel_text_2') }}</p>
                    </div>
                </div>
                <div class="carousel-item-home">
                    <i class="fa-solid fa-file-contract"></i>
                    <strong>{{ __('custom.carousel_title_3') }}</strong>
                    <div>
                        <p>{{ __('custom.carousel_text_3') }}</p>
                    </div>
                </div>
                <div class="carousel-item-home">
                    <i class="fa-solid fa-shield"></i>
                    <strong>{{ __('custom.carousel_title_4') }}</strong>
                    <div>
                        <p>{{ __('custom.carousel_text_4') }}</p>
                    </div>
                </div>
                <div class="carousel-item-home">
                    <i class="fa-solid fa-concierge-bell"></i>
                    <strong>{{ __('custom.carousel_title_5') }}</strong>
                    <div>
                        <p>{{ __('custom.carousel_text_5') }}</p>
                    </div>
                </div>
                <div class="carousel-item-home">
                    <i class="fa-solid fa-chart-bar"></i>
                    <strong>{{ __('custom.carousel_title_6') }}</strong>
                    <div>
                        <p>{{ __('custom.carousel_text_6') }}</p>
                    </div>
                </div>
                <div class="carousel-item-home">
                    <i class="fa-solid fa-chart-line"></i>
                    <strong>{{ __('custom.carousel_title_1') }}</strong>
                    <div>
                        <p>{{ __('custom.carousel_text_1') }}</p>
                    </div>
                </div>
                <div class="carousel-item-home">
                    <i class="fa-solid fa-handshake"></i>
                    <strong>{{ __('custom.carousel_title_2') }}</strong>
                    <div>
                        <p>{{ __('custom.carousel_text_2') }}</p>
                    </div>
                </div>
                <div class="carousel-item-home">
                    <i class="fa-solid fa-file-contract"></i>
                    <strong>{{ __('custom.carousel_title_3') }}</strong>
                    <div>
                        <p>{{ __('custom.carousel_text_3') }}</p>
                    </div>
                </div>
                <div class="carousel-item-home">
                    <i class="fa-solid fa-shield"></i>
                    <strong>{{ __('custom.carousel_title_4') }}</strong>
                    <div>
                        <p>{{ __('custom.carousel_text_4') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
window.addEventListener('load', function () {
    let currentIndex = 0;
    const carousel = document.querySelector('.carousel');
    const carouselItems = document.querySelectorAll('.carousel-item-home');
    
    function isMobile() {
        return window.innerWidth <= 768;
    }

    const totalItems = isMobile() ? carouselItems.length - 4 : carouselItems.length - 5;

    function moveCarousel(index) {
        if (index < 0) {
            currentIndex = totalItems;
        } else if (index >= totalItems) {
            currentIndex = 0;
        } else {
            currentIndex = index;
        }
        
        const shift = isMobile() ? 75 : 30;
        carousel.style.transform = `translateX(-${currentIndex * shift}%)`;
    }

    function autoSlide() {
        moveCarousel(currentIndex + 1);
    }

    window.addEventListener('resize', function() {
        moveCarousel(currentIndex);
    });

    setInterval(autoSlide, 5000);
});
</script>
@endpush
