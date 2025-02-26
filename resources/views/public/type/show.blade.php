@extends('layouts.public')

@section('title', $categoryType->name)

@section('content')
<div class="container mt-5">
    <div class="text-center">
        <h1 class="display-5 mb-3">
            {{ 'Affitti' }}: {{ $categoryType->name }}
            <a href="{{ url("/affitti") }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i>{{__('general.back')}}
            </a>
        </h1>
        <p class="lead mb-4"><i class="fa-solid fa-check"></i>{{__('custom.alloggi_subtitle')}}</p>
    </div>
    
    <div class="mb-4 text-center">
        <button class="btn btn-primary filter-btn mx-2" data-id="all">{{__('custom.show_all')}}</button>
        @foreach($uniqueCategories as $localita)
            @php
                $nomeLocalita = explode(',', $localita->name)[0];
            @endphp
            <button class="btn btn-secondary filter-btn mx-2" data-id="{{ $localita->id }}">{{ $nomeLocalita }}</button>
        @endforeach
    </div>
    
    <div class="alloggi-container">
        @foreach($items as $alloggio)
            <div class="alloggio-card mb-4 d-flex flex-row" data-localita-id="{{ $alloggio->category_id }}">
                <a href="{{ route('public.item.show', ['categoryTypeSlug' => $categoryType->slug, 'name' => $alloggio->name]) }}" class="stretched-link">
                    <span class="visually-hidden">{{__('custom.show_details')}}{{ $alloggio->name }}</span>
                </a>
                <div class="alloggio-thumbnail-container col-4 p-0">
                    @php
                        $thumbnail = $alloggio->itemMedia?->firstWhere('type', 'thumbnail');
                        $thumbnailPath = asset('storage/' . $thumbnail->path);
                    @endphp
                    <img src="{{ $thumbnailPath }}" class="alloggio-thumbnail img-fluid w-100 h-100" alt="{{ $alloggio->name }}">
                </div>
                <div class="alloggio-details-container col-8 d-flex flex-column justify-content-between p-3">
                    <div>
                        <h5>{{ $alloggio->name }}</h5>
                        <p>
                            <i class="fas fa-map-marker-alt"></i>{{ $alloggio->adress }}
                        </p>
                    </div>
                    <div class="alloggio-features d-grid">
                        @foreach ($alloggio->attributes as $attribute)
                            <p>
                                <i class="{{ $attribute->icon }}" aria-hidden="true"></i>
                                <span>{{ $attribute->name }}</span>
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let filterButtons = document.querySelectorAll('.filter-btn');
        filterButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                let localitaId = button.getAttribute('data-id');
                filterAlloggi(localitaId);
            });
        });
    });
    function filterAlloggi(localitaId) {
        let alloggi = document.querySelectorAll('.alloggio-card');
        
        alloggi.forEach(function (alloggio) {
            let alloggioLocalitaId = alloggio.getAttribute('data-localita-id');


            if (localitaId === 'all' || Number(localitaId) === Number(alloggioLocalitaId)) {
                alloggio.classList.remove('hidden');
            } else {
                alloggio.classList.add('hidden');
            }
        });

    }
</script>
@endsection
