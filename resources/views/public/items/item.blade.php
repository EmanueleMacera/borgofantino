@extends('layouts.public')

@section('title', $item->name)

@section('public-content')
<div class="container custom-width">
    <div class="card mb-4">
        <div class="row">
            @if($item->itemMedia && $item->itemMedia->isNotEmpty())
                @foreach($item->itemMedia as $index => $photo)
                    <div class="col-md-3 mb-3">
                        <a href="#" data-toggle="modal" data-target="#galleryModal" data-slide-to="{{ $index }}">
                            <img src="{{ asset('storage/' . $photo->path) }}" alt="{{ $item->name }}" class="img-fluid item-gallery">
                        </a>
                    </div>
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
            <!-- Bottone "Condividi" per desktop -->
            <div class="col-12 col-md-2 d-none d-md-block text-end">
                <button id="shareButton" class="btn btn-outline-secondary mt-3" data-toggle="modal" data-target="#shareModal" style="font-size: smaller">
                    <i class="fas fa-share-alt"></i>{{ __('custom.share') }}
                </button>
            </div>

            <!-- Bottone "Condividi" per mobile -->
            <div class="col-12 col-md-2 d-block d-md-none text-end">
                <button id="shareButtonMobile" class="btn btn-outline-secondary mt-3 w-100" data-toggle="modal" data-target="#shareModal" style="font-size: smaller">
                    <i class="fas fa-share-alt"></i>{{ __('custom.share') }}
                </button>
            </div>


            <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="shareModalLabel">{{ __('custom.share') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col text-center mb-3">
                                    <button class="btn btn-light share-button" id="whatsappShare">
                                        <i class="fab fa-whatsapp"></i>
                                        <p class=>{{ __('custom.whatsapp') }}</p>
                                    </button>
                                </div>
                                <div class="col text-center mb-3">
                                    <button class="btn btn-light share-button" id="messengerShare">
                                        <i class="fab fa-facebook-messenger"></i>
                                        <p>{{ __('custom.messenger') }}</p>
                                    </button>
                                </div>
                                <div class="col text-center mb-3">
                                    <button class="btn btn-light share-button" id="facebookShare">
                                        <i class="fab fa-facebook"></i>
                                        <p>{{ __('custom.facebook') }}</p>
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-center mb-3">
                                    <button class="btn btn-light share-button" id="telegramShare">
                                        <i class="fab fa-telegram"></i>
                                        <p>{{ __('custom.telegram') }}</p>
                                    </button>
                                </div>
                                <div class="col text-center mb-3">
                                    <button class="btn btn-light share-button" id="copyLink">
                                        <i class="fas fa-link"></i>
                                        <p>{{ __('custom.copy_link') }}</p>
                                    </button>
                                </div>
                                <div class="col text-center mb-3">
                                    <button class="btn btn-light share-button" id="emailShare">
                                        <i class="fas fa-envelope"></i>
                                        <p>{{ __('custom.email') }}</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
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

    <!-- Map -->
    <div class="row mb-5">
        <div class="col-lg-7">
            <h3 style="margin-bottom: 15px;">{{ __('custom.map_position') }}</h3>
            <div id="map" style="width: 100%; height: 450px;"></div>
        </div>
        <div class="col-lg-1">
        </div>
        <div class="col-lg-4">
            <h3 style="margin-top: 15px; margin-bottom: 15px;">{{ __('custom.find_maps') }}</h3>
            <a href="https://www.google.com/maps?q={{ $item->latitude }},{{ $item->longitude }}" target="_blank" class="btn btn-danger w-100">{{ __('custom.go_maps') }}</a>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $('#galleryModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var slideTo = button.data('slide-to') // Extract info from data-* attributes
        $('#carouselExampleControls').carousel(slideTo);
    })
});
</script>
<script>
    var map;
    
    document.addEventListener('DOMContentLoaded', function() {
        const urlToShare = window.location.href;
    
        const whatsappShare = document.getElementById('whatsappShare');
        if (whatsappShare) {
            whatsappShare.addEventListener('click', function() {
                window.open(`https://api.whatsapp.com/send?text=Controlla questo immobile: ${encodeURIComponent(urlToShare)}`, '_blank');
            });
        }
    
        const messengerShare = document.getElementById('messengerShare');
        if (messengerShare) {
            messengerShare.addEventListener('click', function() {
                window.open(`https://www.messenger.com/share?link=${encodeURIComponent(urlToShare)}`, '_blank');
            });
        }
    
        const facebookShare = document.getElementById('facebookShare');
        if (facebookShare) {
            facebookShare.addEventListener('click', function() {
                window.open(`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(urlToShare)}`, '_blank');
            });
        }
    
        const telegramShare = document.getElementById('telegramShare');
        if (telegramShare) {
            telegramShare.addEventListener('click', function() {
                window.open(`https://telegram.me/share/url?url=${encodeURIComponent(urlToShare)}`, '_blank');
            });
        }
    
        const twitterShare = document.getElementById('twitterShare');
        if (twitterShare) {
            twitterShare.addEventListener('click', function() {
                window.open(`https://twitter.com/intent/tweet?url=${encodeURIComponent(urlToShare)}&text=Controlla questo immobile:`, '_blank');
            });
        }
    
        const copyLink = document.getElementById('copyLink');
        if (copyLink) {
            copyLink.addEventListener('click', function() {
                navigator.clipboard.writeText(urlToShare).then(function() {
                    alert('Link copiato negli appunti: ' + urlToShare);
                }, function(err) {
                    console.error('Errore nella copia del link: ', err);
                });
            });
        }
    
        const emailShare = document.getElementById('emailShare');
        if (emailShare) {
            emailShare.addEventListener('click', function() {
                const subject = 'Controlla questo immobile';
                const body = `Ecco un immobile che potrebbe interessarti: ${urlToShare}`;
                window.location.href = `mailto:?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;
            });
        }

        if (map !== undefined) {
            map.remove();
        }
    
        map = L.map('map').setView([{{ $item->latitude }}, {{ $item->longitude }}], 15);
    
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);
    
        setTimeout(function() {
            map.invalidateSize();
        }, 500);
    
        L.marker([{{ $item->latitude }}, {{ $item->longitude }}]).addTo(map)
            .bindPopup('<b>{{ $item->name }}</b>').openPopup();
    });
</script>
@endpush
@endsection
