@extends('layouts.public')

@section('title', $item->name)

@section('public-content')
    <div class="container">
        <div class="card mb-4" style="background: rgb(255, 255, 255, 0.4); box-shadow: rgba(0, 0, 0, 0.05) 0px 5px 20px;">
            <!-- Carousel per dispositivi mobili (nascosto su desktop) -->
            <div id="carouselExampleControlsMobile" class="carousel slide d-md-none" data-ride="carousel" data-interval="3000">
                <div class="carousel-inner">
                    @if($item->itemMedia && $item->itemMedia->isNotEmpty())
                        @foreach($item->itemMedia as $index => $photo)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <img data-src="{{ asset('storage/' . $photo->path) }}" alt="{{ $item->name }}" class="d-block w-100 lozad" loading="lazy">
                            </div>
                        @endforeach
                    @endif
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControlsMobile" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">{{ __('custom.prev') }}</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControlsMobile" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">{{ __('custom.next') }}</span>
                </a>
            </div>
            <!-- Fine Carousel Mobile -->

            <!-- Griglia di Immagini Desktop -->
            <div class="row d-none d-md-flex" style="padding: 10px;">
                @if($item->itemMedia && $item->itemMedia->isNotEmpty())
                    @php
                        $maxPhotos = 8;
                        $count = 0;
                    @endphp
                    @foreach($item->itemMedia as $index => $photo)
                        @if($count < $maxPhotos)
                            @php
                                // Calcola le dimensioni delle colonne in base all'indice
                                $colSize = ($count >= 4 && $count % 2 !== 0) || ($count < 4 && $count % 2 === 0) ? 4 : 2;
                            @endphp
                            <div class="col-md-{{ $colSize }} mb-4">
                                <a href="#" data-toggle="modal" data-target="#galleryModal" data-slide-to="{{ $index }}">
                                    <img data-src="{{ asset('storage/' . $photo->path) }}" alt="{{ $item->name }}" class="img-fluid item-gallery lozad" loading="lazy">
                                </a>
                            </div>
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
            <!-- Fine Griglia di Immagini Desktop -->

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
                                                <img data-src="{{ asset('storage/' . $photo->path) }}" class="d-block w-100 lozad" alt="{{ $item->name }}" loading="lazy">
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
            <!-- Fine Modale Galleria -->
            <div class="row card-house d-flex align-items-start">
                <div class="col-12 col-md-10">
                    <h1>{{ $item->name }}</h1>
                    <p class="text-muted">
                        <i class="fas fa-map-marker-alt"></i>{{ $item->adress }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-4">
        <div class="row" style="--bs-gutter-x: 0;">
            <div class="col-lg-8 content-main">
                @if (!empty($item->description))
                    <section class="content-section">
                        <h2 class="section-title">{{ __('general.description') }}</h2>
                        <p class="section-text">{!! $item->description !!}</p>
                    </section>
                @endif

                @if (!empty($item->nei_dintorni))
                    <section class="content-section">
                        <h2 class="section-title">{{ __('custom.nearby') }}</h2>
                        <p class="section-text">{!! $item->nei_dintorni !!}</p>
                    </section>
                @endif

                @if (!empty($item->attributes))
                    <section class="content-section">
                        <h2 class="section-title">{{ __('custom.services') }}</h2>
                        <div class="services-grid">
                            @foreach ($item->attributes as $attributo)
                                <div class="service-item">
                                    <i class="{{ $attributo->icon }}" aria-hidden="true"></i>
                                    <span>{{ $attributo->name }}</span>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endif
            </div>

            <div class="col-lg-4 sidebar">
                @if (!empty($item->link))
                    <div class="info-card">
                        <h3 class="card-title">{{ __('custom.info') }}</h3>
                        <ul class="info-list">
                            <li><i class="fa-solid fa-people-roof"></i> {{ __('custom.rooms') }} {{ $item->camere }}</li>
                            <li><i class="fa-solid fa-bath"></i> {{ __('custom.bathrooms') }} {{ $item->bagni }}</li>
                            <li><i class="fa-solid fa-bed"></i> {{ __('custom.beds') }} {{ $item->posti_letto }}</li>
                        </ul>
                    </div>
                @endif

                @if (!empty($item->link))
                    <div class="price-card">
                        <h3 class="card-title">{{ __('custom.show_price') }}</h3>
                        <a href="{{ $item->link }}" target="_blank" class="btn btn-primary btn-block" rel="noopener noreferrer">
                            {{ __('custom.select_dates') }}
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
    <script>
        const observer = lozad();
        observer.observe();
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#galleryModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var slideTo = button.data('slide-to');
                $('#carouselExampleControls').carousel(slideTo);
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const observer = lozad();
            observer.observe();
        });
    </script>
@endpush
