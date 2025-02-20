<div class="container activities-container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4">Attività & Avventure a Limone Piemonte</h1>
        <div class="separator mx-auto my-3"></div>
        <p class="lead">Un paradiso montano per tutte le stagioni</p>
    </div>

    <!-- Tab Navigation -->
    <div class="season-tabs">
        <button class="season-tab active" data-season="winter">
            <i class="fas fa-snowflake"></i>
            Inverno
        </button>
        <button class="season-tab" data-season="summer">
            <i class="fas fa-sun"></i>
            Estate
        </button>
    </div>

    <!-- Tab Contents -->
    <div class="season-content">
        <!-- Winter Activities -->
        <div class="season-pane active" id="winter">
            <div class="activities-grid">
                <!-- Sci -->
        <div class="activity-card">
            <div class="activity-image">
                <img src="{{ asset('assets/custom/activities/sci.jpg') }}" alt="Sci a Limone Piemonte">
                <div class="activity-badge">
                    <i class="fas fa-skiing"></i>
                </div>
            </div>
            <div class="activity-content">
                <h5>Riserva Bianca</h5>
                <p>80 km di piste sci ai piedi nel comprensorio delle Alpi Marittime, con accesso da Limone Piemonte, Limonetto e Quota 1400.</p>
                <div class="activity-features">
                    <span><i class="fas fa-mountain"></i>80km piste</span>
                    <span><i class="fas fa-star"></i>Alpetta Olimpica</span>
                </div>
                <a href="https://www.riservabianca.it" target="_blank" class="btn btn-primary">
                    <i class="fas fa-external-link-alt"></i>Visita il sito
                </a>
                <a href="tel:+390171926254" class="btn btn-primary">
                    <i class="fas fa-phone-alt"></i>0171-926254
                </a>
            </div>
        </div>

        <!-- Pattinaggio -->
        <div class="activity-card">
            <div class="activity-image">
                <img src="{{ asset('assets/custom/activities/pattinaggio.jpg') }}" alt="Pattinaggio sul ghiaccio">
                <div class="activity-badge">
                    <i class="fas fa-skating"></i>
                </div>
            </div>
            <div class="activity-content">
                <h5>Pattinaggio sul Ghiaccio</h5>
                <p>Pista di pattinaggio a pochi passi dal centro, con corsi per tutti i livelli, noleggio attrezzatura e assistenza professionale.</p>
                <div class="activity-features">
                    <span><i class="fas fa-graduation-cap"></i>Lezioni</span>
                    <span><i class="fas fa-shopping-bag"></i>Noleggio</span>
                </div>
                <a href="tel:+393393822150" class="btn btn-primary">
                    <i class="fas fa-phone-alt"></i>339 382 2150
                </a>
            </div>
        </div>

        <!-- Freeride -->
        <div class="activity-card">
            <div class="activity-image">
                <img src="{{ asset('assets/custom/activities/freeride.jpg') }}" alt="Freeride">
                <div class="activity-badge">
                    <i class="fas fa-mountain"></i>
                </div>
            </div>
            <div class="activity-content">
                <h5>Freeride</h5>
                <p>Esperienza unica con guide alpine UIAGM tra ripidi couloirs, pendii incontaminati e caratteristici boschetti di faggio.</p>
                <div class="activity-features">
                    <span><i class="fas fa-helicopter"></i>Eliski</span>
                    <span><i class="fas fa-user-shield"></i>Guide UIAGM</span>
                </div>
                <a href="http://www.guidealpinepiemonte.it" target="_blank" class="btn btn-primary">
                    <i class="fas fa-external-link-alt"></i>Scopri di più
                </a>
            </div>
        </div>

        <!-- Escursioni sulla neve -->
        <div class="activity-card">
            <div class="activity-image">
                <img src="{{ asset('assets/custom/activities/ciaspole.jpg') }}" alt="Escursioni sulla neve">
                <div class="activity-badge">
                    <i class="fas fa-hiking"></i>
                </div>
            </div>
            <div class="activity-content">
                <h5>Escursioni sulla Neve</h5>
                <p>Passeggiate rilassanti con ciaspole attraverso boschi incontaminati, con viste mozzafiato sul Colle di Tenda.</p>
                <div class="activity-features">
                    <span><i class="fas fa-tree"></i>Percorsi naturalistici</span>
                    <span><i class="fas fa-shoe-prints"></i>Ciaspolate</span>
                </div>
            </div>
        </div>

        <!-- Sci di fondo -->
        <div class="activity-card">
            <div class="activity-image">
                <img src="{{ asset('assets/custom/activities/sci-fondo.jpg') }}" alt="Sci di fondo">
                <div class="activity-badge">
                    <i class="fas fa-skiing-nordic"></i>
                </div>
            </div>
            <div class="activity-content">
                <h5>Sci di Fondo</h5>
                <p>5km di piste per principianti e 8km per esperti, con noleggio attrezzatura e istruttori qualificati.</p>
                <div class="activity-features">
                    <span><i class="fas fa-route"></i>13km totali</span>
                    <span><i class="fas fa-user-graduate"></i>Istruttori</span>
                </div>
                <a href="http://www.alpioccidentali.it/ski_limone.htm" target="_blank" class="btn btn-primary">
                    <i class="fas fa-external-link-alt"></i>Maggiori informazioni
                </a>
            </div>
        </div>

        <!-- Snowboard -->
        <div class="activity-card">
            <div class="activity-image">
                <img src="{{ asset('assets/custom/activities/snowboard.jpg') }}" alt="Snowboard">
                <div class="activity-badge">
                    <i class="fas fa-snowboarding"></i>
                </div>
            </div>
            <div class="activity-content">
                <h5>Snowpark</h5>
                <p>300m x 30m di pura adrenalina con rail, box e jump progettati da Doors Snowpark Structure.</p>
                <div class="activity-features">
                    <span><i class="fas fa-ruler"></i>300m lunghezza</span>
                    <span><i class="fas fa-dice-d6"></i>Rail & Box</span>
                </div>
                <a href="http://www.snowparkdoors.com" target="_blank" class="btn btn-primary">
                    <i class="fas fa-external-link-alt"></i>Visita lo Snowpark
                </a>
            </div>
        </div>

        <!-- Family -->
        <div class="activity-card">
            <div class="activity-image">
                <img src="{{ asset('assets/custom/activities/family.jpg') }}" alt="Attività per famiglie">
                <div class="activity-badge">
                    <i class="fas fa-users"></i>
                </div>
            </div>
            <div class="activity-content">
                <h5>Attività per Famiglie</h5>
                <p>Kinder Park con tapis roulant, corsi specifici per bambini e numerose attività sulla neve per tutta la famiglia.</p>
                <div class="activity-features">
                    <span><i class="fas fa-child"></i>Kinder Park</span>
                    <span><i class="fas fa-sleigh"></i>Slittino</span>
                    <span><i class="fas fa-snowman"></i>Area giochi</span>
                </div>
            </div>
        </div>

        <!-- Eventi -->
        <div class="activity-card">
            <div class="activity-image">
                <img src="{{ asset('assets/custom/activities/eventi.jpg') }}" alt="Eventi">
                <div class="activity-badge">
                    <i class="fas fa-calendar-alt"></i>
                </div>
            </div>
            <div class="activity-content">
                <h5>Eventi</h5>
                <p>Ricco calendario di eventi culturali e sportivi durante tutto l'anno per ogni tipo di interesse.</p>
                <div class="activity-features">
                    <span><i class="fas fa-theater-masks"></i>Cultura</span>
                    <span><i class="fas fa-trophy"></i>Sport</span>
                </div>
            </div>
        </div>
            </div>
        </div>

        <!-- Summer Activities -->
        <div class="season-pane" id="summer">
            <div class="activities-grid">
                <!-- Escursioni -->
                <div class="activity-card">
                    <div class="activity-image">
                        <img src="{{ asset('assets/custom/activities/hiking.jpg') }}" alt="Escursioni">
                        <div class="activity-badge">
                            <i class="fas fa-hiking"></i>
                        </div>
                    </div>
                    <div class="activity-content">
                        <h5>Escursioni</h5>
                        <p>Percorsi di diversa difficoltà attraverso i parchi naturali delle Alpi Marittime, con viste mozzafiato dalla Pianura Padana alle Alpi.</p>
                        <div class="activity-features">
                            <span><i class="fas fa-mountain"></i>Rocca dell'Abisso 2655m</span>
                            <span><i class="fas fa-tree"></i>Parchi Naturali</span>
                            <span><i class="fas fa-map-marked-alt"></i>Sentieri Segnati</span>
                        </div>
                    </div>
                </div>

                <!-- Mountain Bike -->
                <div class="activity-card">
                    <div class="activity-image">
                        <img src="{{ asset('assets/custom/activities/mtb.jpg') }}" alt="Mountain Bike">
                        <div class="activity-badge">
                            <i class="fas fa-bicycle"></i>
                        </div>
                    </div>
                    <div class="activity-content">
                        <h5>Mountain Bike & E-Bike</h5>
                        <p>Chilometri di piste per MTB con deposito sicuro a Borgo Fantino e noleggio e-bike disponibile.</p>
                        <div class="activity-features">
                            <span><i class="fas fa-warehouse"></i>Deposito Sicuro</span>
                            <span><i class="fas fa-charging-station"></i>Noleggio E-bike</span>
                        </div>
                    </div>
                </div>

                <!-- Arrampicata e Rafting -->
                <div class="activity-card">
                    <div class="activity-image">
                        <img src="{{ asset('assets/custom/activities/climbing.jpg') }}" alt="Arrampicata">
                        <div class="activity-badge">
                            <i class="fas fa-mountain-sun"></i>
                        </div>
                    </div>
                    <div class="activity-content">
                        <h5>Arrampicata & Rafting</h5>
                        <p>Falesie e strutture artificiali per l'arrampicata sportiva con guide esperte. Emozionanti discese in rafting.</p>
                        <div class="activity-features">
                            <span><i class="fas fa-mountain"></i>Falesie</span>
                            <span><i class="fas fa-water"></i>Rafting</span>
                        </div>
                        <a href="http://www.globalmountain.it" target="_blank" class="btn btn-primary">
                            <i class="fas fa-external-link-alt"></i>Prenota
                        </a>
                    </div>
                </div>
<!-- Continuazione delle card estive -->

                <!-- Equitazione -->
                <div class="activity-card">
                    <div class="activity-image">
                        <img src="{{ asset('assets/custom/activities/horse.jpg') }}" alt="Equitazione">
                        <div class="activity-badge">
                            <i class="fas fa-horse"></i>
                        </div>
                    </div>
                    <div class="activity-content">
                        <h5>Passeggiate a Cavallo</h5>
                        <p>Maneggio a Limonetto con pony e cavalli per tutti i livelli. Lezioni personalizzate con istruttori qualificati presso l'Associazione Ippica Saluzzese CO' DI PARIS.</p>
                        <div class="activity-features">
                            <span><i class="fas fa-graduation-cap"></i>Lezioni Private</span>
                            <span><i class="fas fa-horse-head"></i>Pony disponibili</span>
                        </div>
                    </div>
                </div>

                <!-- Via del Sale -->
                <div class="activity-card">
                    <div class="activity-image">
                        <img src="{{ asset('assets/custom/activities/via-del-sale.jpg') }}" alt="Via del Sale">
                        <div class="activity-badge">
                            <i class="fas fa-road"></i>
                        </div>
                    </div>
                    <div class="activity-content">
                        <h5>Via del Sale</h5>
                        <p>Storico percorso attraverso le Alpi con tour 4x4 e panorami mozzafiato. Un viaggio attraverso storia e natura.</p>
                        <div class="activity-features">
                            <span><i class="fas fa-car-side"></i>Tour 4x4</span>
                            <span><i class="fas fa-history"></i>Percorso Storico</span>
                        </div>
                    </div>
                </div>

                <!-- Parchi Naturali -->
                <div class="activity-card">
                    <div class="activity-image">
                        <img src="{{ asset('assets/custom/activities/parks.jpg') }}" alt="Parchi Naturali">
                        <div class="activity-badge">
                            <i class="fas fa-tree"></i>
                        </div>
                    </div>
                    <div class="activity-content">
                        <h5>Parchi Naturali</h5>
                        <p>Esplora il Parco delle Alpi Marittime, il Parco dell'Alta Valle Pesio e Tanaro e il Parco Nazionale del Mercantour.</p>
                        <div class="activity-features">
                            <span><i class="fas fa-leaf"></i>Flora Unica</span>
                            <span><i class="fas fa-paw"></i>Fauna Protetta</span>
                        </div>
                    </div>
                </div>

                <!-- Attività Famiglia -->
                <div class="activity-card">
                    <div class="activity-image">
                        <img src="{{ asset('assets/custom/activities/family-summer.jpg') }}" alt="Attività Famiglia Estate">
                        <div class="activity-badge">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="activity-content">
                        <h5>Estate in Famiglia</h5>
                        <p>Summer Camp e attività per tutte le età: MTB, tennis, parco avventura, piscina e arrampicata.</p>
                        <div class="activity-features">
                            <span><i class="fas fa-child"></i>Summer Camp</span>
                            <span><i class="fas fa-swimming-pool"></i>Piscina</span>
                            <span><i class="fas fa-tennis-ball"></i>Sport</span>
                        </div>
                    </div>
                </div>

                <!-- Eventi Estate -->
                <div class="activity-card">
                    <div class="activity-image">
                        <img src="{{ asset('assets/custom/activities/events-summer.jpg') }}" alt="Eventi Estate">
                        <div class="activity-badge">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                    </div>
                    <div class="activity-content">
                        <h5>Eventi Estivi</h5>
                        <p>Ricco calendario di eventi tra cui Sunset Running Race, Granfondo La Via del Sale, Limone Enduro e EADV Adventure Festival.</p>
                        <div class="activity-features">
                            <span><i class="fas fa-running"></i>Gare</span>
                            <span><i class="fas fa-music"></i>Festival</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.season-tab');
    
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const season = this.dataset.season;
            const targetPane = document.getElementById(season);
            
            tabs.forEach(t => t.classList.remove('active'));
            
            this.classList.add('active');

            document.querySelectorAll('.season-pane').forEach(pane => {
                if (pane === targetPane) {
                    pane.classList.add('active');
                } else {
                    pane.classList.remove('active');
                }
            });
        });
    });
});
</script>
