@extends('layouts.public')

@section('title', $item->name)

@section('public-content')
    <div class="container custom-width">
        <div class="card mb-4">
            <div class="row">
                @if($item->itemMedia && $item->itemMedia->isNotEmpty())
                    @php
                        $maxPhotos = 8;
                        $count = 0;
                    @endphp
                    @foreach($item->itemMedia as $index => $photo)
                        @if($count < $maxPhotos)
                            @if ($count >= 4)
                                @if ($count % 2 !== 0)
                                    <div class="col-md-4 mb-3">
                                        <a href="#" data-toggle="modal" data-target="#galleryModal" data-slide-to="{{ $index }}">
                                            <img src="{{ asset('storage/' . $photo->path) }}" alt="{{ $item->name }}" class="img-fluid item-gallery">
                                        </a>
                                    </div>
                                @else
                                    <div class="col-md-2 mb-3">
                                        <a href="#" data-toggle="modal" data-target="#galleryModal" data-slide-to="{{ $index }}">
                                            <img src="{{ asset('storage/' . $photo->path) }}" alt="{{ $item->name }}" class="img-fluid item-gallery">
                                        </a>
                                    </div>
                                @endif
                            @else
                                @if ($count % 2 !== 0)
                                    <div class="col-md-2 mb-3">
                                        <a href="#" data-toggle="modal" data-target="#galleryModal" data-slide-to="{{ $index }}">
                                            <img src="{{ asset('storage/' . $photo->path) }}" alt="{{ $item->name }}" class="img-fluid item-gallery">
                                        </a>
                                    </div>
                                @else
                                    <div class="col-md-4 mb-3">
                                        <a href="#" data-toggle="modal" data-target="#galleryModal" data-slide-to="{{ $index }}">
                                            <img src="{{ asset('storage/' . $photo->path) }}" alt="{{ $item->name }}" class="img-fluid item-gallery">
                                        </a>
                                    </div>
                                @endif
                            @endif
                            @php
                                $count++;
                            @endphp
                        @else
                            @break
                        @endif
                    @endforeach
                @else
                    <div class="col-12">
                        <p>{{ __('custom.no_images') }}</p>
                    </div>
                @endif
            </div>

            <!-- Modale Galleria -->
            <div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="galleryModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="galleryModalLabel">{{ $item->name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @if($item->itemMedia && $item->itemMedia->isNotEmpty())
                                        @foreach($item->itemMedia as $index => $photo)
                                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                <img src="{{ asset('storage/' . $photo->path) }}" class="d-block w-100" alt="{{ $item->name }}">
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">{{ __('custom.prev') }}</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">{{ __('custom.next') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row card-house d-flex align-items-start">
                <div class="col-12 col-md-10">
                    <h1 class="mt-3">{{ $item->name }}</h1>
                    <p class="text-muted">
                        <i class="fas fa-map-marker-alt"></i>{{ $item->adress }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-7">
            @if (!empty($item->description))
                <h2>{{ __('general.description') }}</h2>
                <p>{!! $item->description !!}</p>
                <hr>
            @endif
            @if (!empty($item->nei_dintorni))
                <h2>{{ __('custom.nearby') }}</h2>
                <p>{!! $item->nei_dintorni !!}</p>
                <hr>
            @endif
            @if (!empty($item->attributes))
                <h2>{{ __('custom.services') }}</h2>
                <div class="alloggio-features d-grid">
                    @foreach ($item->attributes as $attributo)
                        <p>
                            <i class="{{ $attributo->icon }}" aria-hidden="true"></i>
                            <span>{{ $attributo->name }}</span>
                        </p>
                    @endforeach
                </div>
                <hr>
            @endif
        </div>
        <div class="col-lg-1">
        </div>
        <div class="col-lg-4">
            @if (!empty($item->link))
                <h3 style="margin-bottom: 15px;">{{ __('custom.info') }}</h3>
                <ul class="list-group mb-4">
                    <li class="list-group-item">
                        <i class="fa-solid fa-people-roof"></i>{{ __('custom.rooms') }}{{ $item->camere }}
                    </li>
                    <li class="list-group-item">
                        <i class="fa-solid fa-bath"></i>{{ __('custom.bathrooms') }}{{ $item->bagni }}
                    </li>
                    <li class="list-group-item">
                        <i class="fa-solid fa-bed"></i>{{ __('custom.beds') }}{{ $item->posti_letto }}
                    </li>
                </ul>
            @endif
            @if (!empty($item->link))
                <h3 style="margin-bottom: 15px;">{{ __('custom.show_price') }}</h3>
                <ul class="list-group mb-4">
                    <li class="list-group-item">
                        <a href="{{ $item->link }}" target="_blank" class="btn btn-primary w-100" rel="noopener noreferrer">
                            {{ __('custom.select_dates') }}
                        </a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#galleryModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var slideTo = button.data('slide-to')
                $('#carouselExampleControls').carousel(slideTo);
            })
        });
    </script>
@endpush
@endsection
