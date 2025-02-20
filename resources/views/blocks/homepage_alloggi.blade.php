<div class="alloggi-container container">
    <div class="row align-items-center">
        <!-- Colonna sinistra: Titolo e pulsanti -->
        <div class="col-md-4 mb-4 mb-md-0">
            <div class="d-flex flex-column justify-content-between h-100">
                <div>
                    <h1 class="mb-2">Alloggi in Affitto</h1>
                    <p class="mb-4">Scegli il tuo spazio ideale</p>
                </div>
                <div class="row gap-md-4" style="--bs-gutter-x: 0">
                    <a href="" class="col-md-6 btn btn-primary">Alloggi</a>
                    <a href="" class="col-md-6 btn btn-primary">Contattaci</a>
                </div>
            </div>
        </div>

        <!-- Colonna destra: Tre alloggi affiancati -->
        <div class="col-md-8">
            <div class="row" id="alloggi-container">
                @for ($i = 0; $i < 3; $i++)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow">
                            <div class="card-body">
                                <h3 class="card-title" id="alloggio-nome-{{ $i }}">Caricamento...</h3>
                                <p class="card-text" id="alloggio-descrizione-{{ $i }}">Caricamento...</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" id="alloggio-capacita-{{ $i }}">Capacità: Caricamento...</li>
                                <li class="list-group-item" id="alloggio-prezzo-{{ $i }}">Prezzo: Caricamento...</li>
                            </ul>
                            <div class="card-footer">
                                <a href="#" class="btn btn-sm btn-primary" id="alloggio-link-{{ $i }}">Dettagli</a>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</div>
