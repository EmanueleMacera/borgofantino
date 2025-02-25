<div class="alloggi-container container">
    <div class="row align-items-center">
        <div class="col-md-4 mb-4 mb-md-0">
            <div class="d-flex flex-column justify-content-between h-100">
                <div>
                    <h1 class="mb-2">{{ __('custom.alloggi_title') }}</h1>
                    <p class="mb-4">{{ __('custom.alloggi_description') }}</p>
                </div>
                <div>
                    <a href="#" class="col-md-6 btn alloggi-b btn-primary">{{ __('custom.alloggi_button2') }}</a>
                    <a href="#" class="col-md-6 btn alloggi-b btn-primary">{{ __('custom.alloggi_button1') }}</a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="alloggi-slider-container">
                <div class="alloggi-slider" id="alloggi-slider">
                    @foreach ($items as $item)
                        <div class="alloggi-slide">
                            <div class="card h-100 shadow">
                                @php
                                    $thumbnail = $item->itemMedia?->firstWhere('type', 'thumbnail');
                                    $thumbnailPath = asset('storage/' . $thumbnail->path);
                                @endphp
                                @if ($item->thumbnail)
                                    <img src="{{ $thumbnailPath }}" class="card-img-top rounded-top" alt="{{ $item->name }}">
                                @endif
                                <div style="padding-top: 1rem; padding-left: 1rem;">
                                    <h3 class="card-title text-bold" id="name">{{ $item->name }}</h3>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item" id="item-capacity"><i class="fa-solid fa-people-roof"></i>{{ __('custom.rooms') }}: {{ $item->camere }}</li>
                                    <li class="list-group-item" id="item-capacity"><i class="fa-solid fa-bed"></i>{{ __('custom.alloggio_capacity') }}: {{ $item->posti_letto }}</li>
                                    <li class="list-group-item" id="item-capacity"><i class="fa-solid fa-bath"></i>{{ __('custom.bathrooms') }}: {{ $item->bagni }}</li>
                                </ul>
                                <div class="card-footer" style="text-align: center">
                                    <a href="{{ route('public.item.show', ['name' => $item->slug]) }}" class="btn btn-sm w-100 btn-primary" id="item-link"><i class="fas fa-info-circle"></i>{{ __('custom.alloggio_details') }}</a>
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
