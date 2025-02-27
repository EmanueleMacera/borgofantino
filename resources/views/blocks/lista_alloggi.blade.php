<div class="container mb-4 mt-4">
    <div class="cards-container">
        @foreach ($items as $item)
            <div class="card-2">
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
                    <div class="card-attributes">
                        @foreach($item->attributes as $attribute)
                            <span class="attribute"><i class="{{ $attribute->icon }}"></i>{{ $attribute->name }}</span>
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <span class="card-address">{{ $item->adress }}</span>
                        <a href="{{ route('public.item.show', ['name' => $item->slug]) }}" class="btn btn-primary" target="_blank">{{ __('custom.alloggio_details') }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
