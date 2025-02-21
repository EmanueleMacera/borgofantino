<div class="alloggi-container container">
    <div class="text-center mb-5">
        <div class="d-flex flex-column justify-content-between h-100">
            <div>
                <h1 class="mb-2">{{ __('custom.alloggi_title') }}</h1>
                <p class="mb-4">{{ __('custom.alloggi_description') }}</p>
            </div>
            <div>
                <a href="#" class="col-md-6 btn btn-primary">{{ __('custom.alloggi_button2') }}</a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4 justify-content-center">
            @foreach ($items as $item)
                <div class="col">
                    <div class="card h-100 shadow">
                        @php
                            $thumbnail = $item->itemMedia?->firstWhere('type', 'thumbnail');
                            $thumbnailPath = $thumbnail ? asset('storage/' . $thumbnail->path) : asset('path/to/default/image.jpg');
                        @endphp
                        <img src="{{ $thumbnailPath }}" class="card-img-top rounded-top" alt="{{ $item->name }}">
                        <div class="card-body">
                            <h5 class="card-title fw-bold" id="name">{{ $item->name }}</h5>
                            <p class="card-text" id="item-capacity">{{ __('custom.alloggio_capacity') }}: {{ $item->posti_letto }}</p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('public.item.show', ['name' => $item->slug]) }}" class="btn btn-primary w-100" id="item-link">
                                <i class="fas fa-info-circle me-2"></i>{{ __('custom.alloggio_details') }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
