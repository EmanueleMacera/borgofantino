<div class="container dettagli-container">
    <div class="text-center mb-4">
        <h1 class="display-4">{{ __('custom.spa_title') }}</h1>
        <div class="separator mx-auto my-3"></div>
    </div>

    <div class="row align-items-center g-4">
        <div class="col-lg-6">
            <div class="position-relative spa-image-wrapper mb-3">
                <img src="{{ asset('assets/custom/homepage/spa.WebP') }}"
                     alt="Spa"
                     class="img-fluid rounded-3 shadow-lg w-100">
                <div class="floating-badge">
                    <span>Luxury</span>
                    <span>Wellness</span>
                </div>
            </div>

            <div class="contact-card">
                <h4 class="mb-3"><i class="fas fa-phone-alt"></i>{{ __('custom.spa_contact_title') }}</h4>
                <div class="contact-links">
                    <a href="tel:+393534570629" class="btn btn-primary">
                        +39 353 457 0629
                    </a>
                    <a href="tel:+390171926669" class="btn btn-primary">
                        +39 0171 926669 (int. 2)
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="spa-content ps-lg-4">
                <p class="lead mb-4">{{ __('custom.spa_description') }}</p>

                <div class="services-grid mb-4">
                    <div class="service-item">
                        <i class="fas fa-hot-tub"></i>
                        <span>{{ __('custom.spa_sauna') }}</span>
                    </div>
                    <div class="service-item">
                        <i class="fas fa-spa"></i>
                        <span>{{ __('custom.spa_hamman') }}</span>
                    </div>
                    <div class="service-item">
                        <i class="fas fa-water"></i>
                        <span>{{ __('custom.spa_idromassaggio') }}</span>
                    </div>
                    <div class="service-item">
                        <i class="fas fa-shower"></i>
                        <span>{{ __('custom.spa_docce_emozionali') }}</span>
                    </div>
                    <div class="service-item">
                        <i class="fas fa-coffee"></i>
                        <span>{{ __('custom.spa_tisaneria') }}</span>
                    </div>
                    <div class="service-item">
                        <i class="fas fa-couch"></i>
                        <span>{{ __('custom.spa_corner_relax') }}</span>
                    </div>
                </div>

                <p class="mb-4">{{ __('custom.spa_operators_description') }}</p>

                <div class="booking-notice mb-4">
                    <div class="alert alert-custom">
                        <i class="fas fa-info-circle"></i>
                        <strong>{{ __('custom.spa_booking_notice_strong') }}:</strong> {{ __('custom.spa_booking_notice') }}!
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
