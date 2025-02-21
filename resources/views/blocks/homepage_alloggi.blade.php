<div class="alloggi-container container">
    <div class="row align-items-center">
        <div class="col-md-4 mb-4 mb-md-0">
            <div class="d-flex flex-column justify-content-between h-100">
                <div>
                    <h1 class="mb-2">{{ __('custom.alloggi_title') }}</h1>
                    <p class="mb-4">{{ __('custom.alloggi_description') }}</p>
                </div>
                <div class="row gap-md-4" style="--bs-gutter-x: 0">
                    <a href="#" class="col-md-6 btn btn-primary">{{ __('custom.alloggi_button1') }}</a>
                    <a href="#" class="col-md-6 btn btn-primary">{{ __('custom.alloggi_button2') }}</a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row" id="alloggi-container">
                @foreach ($items as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow">
                            <div class="card-body">
                                <h3 class="card-title" id="alloggio-nome-{{ $i }}">{{ $item->name }}</h3>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" id="alloggio-capacita-{{ $i }}">{{ __('custom.alloggio_capacity') }}:</li>
                            </ul>
                            <div class="card-footer">
                                <a href="#" class="btn btn-sm btn-primary" id="alloggio-link-{{ $i }}">{{ __('custom.alloggio_details') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
