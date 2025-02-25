<div class="alloggi-container container">
    <div class="row align-items-center">
        <div class="col-md-4 mb-4 mb-md-0">
            <div class="d-flex flex-column justify-content-between h-100">
                <div>
                    <h1 class="mb-2">{{ __('custom.alloggi_title') }}</h1>
                    <p class="mb-4">{{ __('custom.alloggi_description') }}</p>
                </div>
                <div>
                    <a href="{{ url('/contatti') }}" class="col-md-6 btn alloggi-b btn-primary">{{ __('custom.alloggi_button2') }}</a>
                    <a href="{{ url('/alloggi') }}" class="col-md-6 btn alloggi-b btn-primary">{{ __('custom.alloggi_button1') }}</a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="alloggi-slider-container">
                <div class="alloggi-slider" id="alloggi-slider">
                    @foreach ($items as $item)
                        <div class="alloggi-slide">
                            <div class="card-image">
                                @php
                                    $thumbnail = $item->itemMedia?->firstWhere('type', 'thumbnail');
                                    $thumbnailPath = asset('storage/' . $thumbnail->path);
                                @endphp
                                <img src="{{ $thumbnailPath }}" alt="{{ $item->name }}">
                                <span class="card-badge"><i class="fa-solid fa-bed"></i>{{ $item->posti_letto }} {{ __('custom.alloggio_capacity') }}</span>
                            </div>
                            <div class="card-content">
                                <h2 class="card-title">{{ $item->name }}</h2>
                                <div class="card-features">
                                    <span class="feature"><i class="fa-solid fa-people-roof"></i>{{ __('custom.rooms') }}: {{ $item->camere }}</span>
                                    <span class="feature"><i class="fa-solid fa-bath"></i>{{ __('custom.bathrooms') }}: {{ $item->bagni }}</span>
                                </div>
                                <div class="card-footer">
                                    <span class="card-address">{{ $item->adress }}</span>
                                    <a href="{{ route('public.item.show', ['name' => $item->slug]) }}" class="btn btn-primary"><i class="fas fa-info-circle"></i>{{ __('custom.alloggio_details') }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="alloggi-slider-controls">
                    <button class="slider-arrow prev" id="prev-arrow">&lt;</button>
                    <button class="slider-arrow next" id="next-arrow">&gt;</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const slider = document.getElementById('alloggi-slider');
        const slides = slider.children;
        const prevArrow = document.getElementById('prev-arrow');
        const nextArrow = document.getElementById('next-arrow');
        const controls = document.querySelector('.alloggi-slider-controls');
        
        let currentIndex = 0;
        const slidesToShow = window.innerWidth > 768 ? 3 : 1;
    
        function updateSliderPosition() {
            slider.style.transform = `translateX(-${currentIndex * (100 / slidesToShow)}%)`;
        }
    
        function showControls() {
            if (slides.length > slidesToShow) {
                controls.style.display = 'flex';
            }
        }
    
        function updateArrowState() {
            prevArrow.disabled = currentIndex === 0;
            nextArrow.disabled = currentIndex >= slides.length - slidesToShow;
        }
    
        prevArrow.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                updateSliderPosition();
                updateArrowState();
            }
        });
    
        nextArrow.addEventListener('click', () => {
            if (currentIndex < slides.length - slidesToShow) {
                currentIndex++;
                updateSliderPosition();
                updateArrowState();
            }
        });
    
        window.addEventListener('resize', () => {
            currentIndex = 0;
            updateSliderPosition();
            updateArrowState();
        });
    
        showControls();
        updateArrowState();
    });
</script>
