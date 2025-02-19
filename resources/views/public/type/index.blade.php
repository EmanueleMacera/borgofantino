@extends('layouts.public')

@section('title', __('custom.localita_title'))

@section('public-content')
<div class="block-parallax-home" style="height: 30vh; width: 100%;"></div>
<div class="localita-container" style="padding: 50px 0">
    <div class="text-center mb-4 my-8">
        <h1 class="display-5"><i class="fa-solid fa-map-location-dot"></i>{{ __('custom.localita_title') }}</h1>
    </div>
    <div class="tipologie-container">
        <div class="gap-3 justify-content-center">
            @foreach($types as $tipologia)
                <div class="tipologia-card-container">
                    <a href="{{ route('type.show', ['categoryTypeSlug' => $tipologia->slug]) }}" class="tipologia-card-link">
                        <div class="tipologia-card mb-4 position-relative">
                            @if($tipologia->thumbnail)
                                <img src="{{ asset('storage/' . $tipologia->thumbnail) }}" class="tipologia-thumbnail img-fluid" alt="{{ __('custom.tipologia_card_alt', ['nome' => $tipologia->name]) }}">
                            @endif
                            <div class="tipologia-card-title-overlay">
                                <h5 class="tipologia-card-title">{{ $tipologia->name }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
