<div class="container activities-container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4">{{ __('custom.activities_title') }}</h1>
        <div class="separator mx-auto my-3"></div>
        <p class="lead">{{ __('custom.activities_description') }}</p>
    </div>
    <div class="season-tabs">
        <button class="season-tab active" data-season="winter">
            <i class="fas fa-snowflake"></i>
            {{ __('custom.winter') }}
        </button>
        <button class="season-tab" data-season="summer">
            <i class="fas fa-sun"></i>
            {{ __('custom.summer') }}
        </button>
    </div>
    <div class="season-content">
        <div class="season-pane active" id="winter">
            <div class="activities-grid">
                <div class="activity-card">
                    <div class="activity-image">
                        <img src="{{ asset('assets/custom/activities/sci.WebP') }}" alt="{{ __('custom.ski_resort') }}">
                        <div class="activity-badge">
                            <i class="fas fa-skiing"></i>
                        </div>
                    </div>
                    <div class="activity-content">
                        <h5>{{ __('custom.ski_resort') }}</h5>
                        <p>{{ __('custom.ski_description') }}</p>
                        <div class="activity-features">
                            <span><i class="fas fa-mountain"></i>{{ __('custom.ski_features.0') }}</span>
                            <span><i class="fas fa-star"></i>{{ __('custom.ski_features.1') }}</span>
                        </div>
                        <a href="https://www.riservabianca.it" target="_blank" class="btn btn-primary">
                            <i class="fas fa-external-link-alt"></i>Visita il sito
                        </a>
                        <a href="tel:+390171926254" class="btn btn-primary">
                            <i class="fas fa-phone-alt"></i>0171-926254
                        </a>
                    </div>
                </div>
                <div class="activity-card">
                    <div class="activity-image">
                        <img src="{{ asset('assets/custom/activities/pattinaggio.WebP') }}" alt="{{ __('custom.ice_skating') }}">
                        <div class="activity-badge">
                            <i class="fas fa-skating"></i>
                        </div>
                    </div>
                    <div class="activity-content">
                        <h5>{{ __('custom.ice_skating') }}</h5>
                        <p>{{ __('custom.ice_skating_description') }}</p>
                        <div class="activity-features">
                            <span><i class="fas fa-graduation-cap"></i>{{ __('custom.ice_skating_features.0') }}</span>
                            <span><i class="fas fa-shopping-bag"></i>{{ __('custom.ice_skating_features.1') }}</span>
                        </div>
                        <a href="tel:+393393822150" class="btn btn-primary">
                            <i class="fas fa-phone-alt"></i>339 382 2150
                        </a>
                    </div>
                </div>
                <div class="activity-card">
                    <div class="activity-image">
                        <img src="{{ asset('assets/custom/activities/freeride.WebP') }}" alt="{{ __('custom.freeride') }}">
                        <div class="activity-badge">
                            <i class="fas fa-mountain"></i>
                        </div>
                    </div>
                    <div class="activity-content">
                        <h5>{{ __('custom.freeride') }}</h5>
                        <p>{{ __('custom.freeride_description') }}</p>
                        <div class="activity-features">
                            <span><i class="fas fa-helicopter"></i>{{ __('custom.freeride_features.0') }}</span>
                            <span><i class="fas fa-user-shield"></i>{{ __('custom.freeride_features.1') }}</span>
                        </div>
                        <a href="http://www.guidealpinepiemonte.it" target="_blank" class="btn btn-primary">
                            <i class="fas fa-external-link-alt"></i>Scopri di più
                        </a>
                    </div>
                </div>
                <div class="activity-card">
                    <div class="activity-image">
                        <img src="{{ asset('assets/custom/activities/ciaspole.WebP') }}" alt="{{ __('custom.snowshoeing') }}">
                        <div class="activity-badge">
                            <i class="fas fa-hiking"></i>
                        </div>
                    </div>
                    <div class="activity-content">
                        <h5>{{ __('custom.snowshoeing') }}</h5>
                        <p>{{ __('custom.snowshoeing_description') }}</p>
                        <div class="activity-features">
                            <span><i class="fas fa-tree"></i>{{ __('custom.snowshoeing_features.0') }}</span>
                            <span><i class="fas fa-shoe-prints"></i>{{ __('custom.snowshoeing_features.1') }}</span>
                        </div>
                    </div>
                </div>
                <div class="activity-card">
                    <div class="activity-image">
                        <img src="{{ asset('assets/custom/activities/sci-fondo.WebP') }}" alt="{{ __('custom.cross_country_skiing') }}">
                        <div class="activity-badge">
                            <i class="fas fa-skiing-nordic"></i>
                        </div>
                    </div>
                    <div class="activity-content">
                        <h5>{{ __('custom.cross_country_skiing') }}</h5>
                        <p>{{ __('custom.cross_country_skiing_description') }}</p>
                        <div class="activity-features">
                            <span><i class="fas fa-route"></i>{{ __('custom.cross_country_skiing_features.0') }}</span>
                            <span><i class="fas fa-user-graduate"></i>{{ __('custom.cross_country_skiing_features.1') }}</span>
                        </div>
                        <a href="http://www.alpioccidentali.it/ski_limone.htm" target="_blank" class="btn btn-primary">
                            <i class="fas fa-external-link-alt"></i>Maggiori informazioni
                        </a>
                    </div>
                </div>
                <div class="activity-card">
                    <div class="activity-image">
                        <img src="{{ asset('assets/custom/activities/snowboard.WebP') }}" alt="{{ __('custom.snowpark') }}">
                        <div class="activity-badge">
                            <i class="fas fa-snowboarding"></i>
                        </div>
                    </div>
                    <div class="activity-content">
                        <h5>{{ __('custom.snowpark') }}</h5>
                        <p>{{ __('custom.snowpark_description') }}</p>
                        <div class="activity-features">
                            <span><i class="fas fa-ruler"></i>{{ __('custom.snowpark_features.0') }}</span>
                            <span><i class="fas fa-dice-d6"></i>{{ __('custom.snowpark_features.1') }}</span>
                        </div>
                        <a href="http://www.snowparkdoors.com" target="_blank" class="btn btn-primary">
                            <i class="fas fa-external-link-alt"></i>Visita lo Snowpark
                        </a>
                    </div>
                </div>
                <div class="activity-card">
                    <div class="activity-image">
                        <img src="{{ asset('assets/custom/activities/family.WebP') }}" alt="{{ __('custom.family_winter') }}">
                        <div class="activity-badge">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="activity-content">
                        <h5>{{ __('custom.family_winter') }}</h5>
                        <p>{{ __('custom.family_winter_description') }}</p>
                        <div class="activity-features">
                            <span><i class="fas fa-child"></i>{{ __('custom.family_winter_features.0') }}</span>
                            <span><i class="fas fa-sleigh"></i>{{ __('custom.family_winter_features.1') }}</span>
                            <span><i class="fas fa-snowman"></i>{{ __('custom.family_winter_features.2') }}</span>
                        </div>
                    </div>
                </div>
                <div class="activity-card">
                    <div class="activity-image">
                        <img src="{{ asset('assets/custom/activities/eventi.WebP') }}" alt="{{ __('custom.winter_events') }}">
                        <div class="activity-badge">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                    </div>
                    <div class="activity-content">
                        <h5>{{ __('custom.winter_events') }}</h5>
                        <p>{{ __('custom.winter_events_description') }}</p>
                        <div class="activity-features">
                            <span><i class="fas fa-theater-masks"></i>{{ __('custom.winter_events_features.0') }}</span>
                            <span><i class="fas fa-trophy"></i>{{ __('custom.winter_events_features.1') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="season-pane" id="summer">
            <div class="activities-grid">
                <div class="activity-card">
                    <div class="activity-image">
                        <img src="{{ asset('assets/custom/activities/hiking.WebP') }}" alt="{{ __('custom.hiking') }}">
                        <div class="activity-badge">
                            <i class="fas fa-hiking"></i>
                        </div>
                    </div>
                    <div class="activity-content">
                        <h5>{{ __('custom.hiking') }}</h5>
                        <p>{{ __('custom.hiking_description') }}</p>
                        <div class="activity-features">
                            <span><i class="fas fa-mountain"></i>{{ __('custom.hiking_features.0') }}</span>
                            <span><i class="fas fa-tree"></i>{{ __('custom.hiking_features.1') }}</span>
                            <span><i class="fas fa-map-marked-alt"></i>{{ __('custom.hiking_features.2') }}</span>
                        </div>
                    </div>
                </div>
                <div class="activity-card">
                    <div class="activity-image">
                        <img src="{{ asset('assets/custom/activities/mtb.WebP') }}" alt="{{ __('custom.mtb') }}">
                        <div class="activity-badge">
                            <i class="fas fa-bicycle"></i>
                        </div>
                    </div>
                    <div class="activity-content">
                        <h5>{{ __('custom.mtb') }}</h5>
                        <p>{{ __('custom.mtb_description') }}</p>
                        <div class="activity-features">
                            <span><i class="fas fa-warehouse"></i>{{ __('custom.mtb_features.0') }}</span>
                            <span><i class="fas fa-charging-station"></i>{{ __('custom.mtb_features.1') }}</span>
                        </div>
                    </div>
                </div>
                <div class="activity-card">
                    <div class="activity-image">
                        <img src="{{ asset('assets/custom/activities/climbing.WebP') }}" alt="{{ __('custom.climbing') }}">
                        <div class="activity-badge">
                            <i class="fas fa-mountain-sun"></i>
                        </div>
                    </div>
                    <div class="activity-content">
                        <h5>{{ __('custom.climbing') }}</h5>
                        <p>{{ __('custom.climbing_description') }}</p>
                        <div class="activity-features">
                            <span><i class="fas fa-mountain"></i>{{ __('custom.climbing_features.0') }}</span>
                            <span><i class="fas fa-water"></i>{{ __('custom.climbing_features.1') }}</span>
                        </div>
                        <a href="http://www.globalmountain.it" target="_blank" class="btn btn-primary">
                            <i class="fas fa-external-link-alt"></i>Prenota
                        </a>
                    </div>
                </div>
                <div class="activity-card">
                    <div class="activity-image">
                        <img src="{{ asset('assets/custom/activities/horse.WebP') }}" alt="{{ __('custom.horse_riding') }}">
                        <div class="activity-badge">
                            <i class="fas fa-horse"></i>
                        </div>
                    </div>
                    <div class="activity-content">
                        <h5>{{ __('custom.horse_riding') }}</h5>
                        <p>{{ __('custom.horse_riding_description') }}</p>
                        <div class="activity-features">
                            <span><i class="fas fa-graduation-cap"></i>{{ __('custom.horse_riding_features.0') }}</span>
                            <span><i class="fas fa-horse-head"></i>{{ __('custom.horse_riding_features.1') }}</span>
                        </div>
                    </div>
                </div>
                <div class="activity-card">
                    <div class="activity-image">
                        <img src="{{ asset('assets/custom/activities/via-del-sale.WebP') }}" alt="{{ __('custom.via_del_sale') }}">
                        <div class="activity-badge">
                            <i class="fas fa-road"></i>
                        </div>
                    </div>
                    <div class="activity-content">
                        <h5>{{ __('custom.via_del_sale') }}</h5>
                        <p>{{ __('custom.via_del_sale_description') }}</p>
                        <div class="activity-features">
                            <span><i class="fas fa-car-side"></i>{{ __('custom.via_del_sale_features.0') }}</span>
                            <span><i class="fas fa-history"></i>{{ __('custom.via_del_sale_features.1') }}</span>
                        </div>
                    </div>
                </div>
                <div class="activity-card">
                    <div class="activity-image">
                        <img src="{{ asset('assets/custom/activities/parks.WebP') }}" alt="{{ __('custom.natural_parks') }}">
                        <div class="activity-badge">
                            <i class="fas fa-tree"></i>
                        </div>
                    </div>
                    <div class="activity-content">
                        <h5>{{ __('custom.natural_parks') }}</h5>
                        <p>{{ __('custom.natural_parks_description') }}</p>
                        <div class="activity-features">
                            <span><i class="fas fa-leaf"></i>{{ __('custom.natural_parks_features.0') }}</span>
                            <span><i class="fas fa-paw"></i>{{ __('custom.natural_parks_features.1') }}</span>
                        </div>
                    </div>
                </div>
                <div class="activity-card">
                    <div class="activity-image">
                        <img src="{{ asset('assets/custom/activities/family-summer.WebP') }}" alt="{{ __('custom.family_summer') }}">
                        <div class="activity-badge">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="activity-content">
                        <h5>{{ __('custom.family_summer') }}</h5>
                        <p>{{ __('custom.family_summer_description') }}</p>
                        <div class="activity-features">
                            <span><i class="fas fa-child"></i>{{ __('custom.family_summer_features.0') }}</span>
                            <span><i class="fas fa-swimming-pool"></i>{{ __('custom.family_summer_features.1') }}</span>
                            <span><i class="fas fa-tennis-ball"></i>{{ __('custom.family_summer_features.2') }}</span>
                        </div>
                    </div>
                </div>
                <div class="activity-card">
                    <div class="activity-image">
                        <img src="{{ asset('assets/custom/activities/events-summer.WebP') }}" alt="{{ __('custom.summer_events') }}">
                        <div class="activity-badge">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                    </div>
                    <div class="activity-content">
                        <h5>{{ __('custom.summer_events') }}</h5>
                        <p>{{ __('custom.summer_events_description') }}</p>
                        <div class="activity-features">
                            <span><i class="fas fa-running"></i>{{ __('custom.summer_events_features.0') }}</span>
                            <span><i class="fas fa-music"></i>{{ __('custom.summer_events_features.1') }}</span>
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
