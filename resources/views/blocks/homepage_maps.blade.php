<div class="container reach-us-container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4">{{ __('custom.reach_us_title') }}</h1>
        <div class="separator mx-auto my-3"></div>
        <p>{{ __('custom.reach_us_description') }}</p>
    </div>
    <div class="transport-card">
        <div class="transport-icon">
            <i class="fas fa-map"></i>
            <p>{{ __('custom.address') }}</p>
        </div>
    </div>
    <div class="transport-grid">
        <div class="transport-card">
            <div class="transport-icon">
                <i class="fas fa-plane-departure"></i>
            </div>
            <div class="transport-content">
                <h5>{{ __('custom.airports_title') }}</h5>
                <div class="airport-list">
                    <div class="airport-item">
                        <span class="time">{{ __('custom.time') }}</span>
                        <span class="name">{{ __('custom.airport_cuneo') }}</span>
                    </div>
                    <div class="airport-item">
                        <span class="time">{{ __('custom.time_2') }}</span>
                        <span class="name">{{ __('custom.airport_torino') }}</span>
                    </div>
                    <div class="airport-item">
                        <span class="time">{{ __('custom.time_2') }}</span>
                        <span class="name">{{ __('custom.airport_genova') }}</span>
                    </div>
                    <div class="airport-item">
                        <span class="time">{{ __('custom.time_2') }}</span>
                        <span class="name">{{ __('custom.airport_nizza') }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="transport-card">
            <div class="transport-icon">
                <i class="fas fa-car"></i>
            </div>
            <div class="transport-content">
                <h5>{{ __('custom.car_title') }}</h5>
                <div class="highway-info">
                    <p><strong>{{ __('custom.highway') }}</strong></p>
                    <p>{{ __('custom.highway_exit') }}</p>
                </div>
            </div>
        </div>
        <div class="transport-card">
            <div class="transport-icon">
                <i class="fas fa-train"></i>
            </div>
            <div class="transport-content">
                <h5>{{ __('custom.train_title') }}</h5>
                <div class="train-routes">
                    <p>{{ __('custom.train_line') }}</p>
                    <p>{{ __('custom.train_from_nice') }}</p>
                    <div class="airport-list">
                        <div class="airport-item">
                            <span class="time">{{ __('custom.train_direct') }}</span>
                            <span class="name">{{ __('custom.train_ventimiglia_limone') }}</span>
                        </div>
                        <div class="airport-item">
                            <span class="time">{{ __('custom.train_line_2') }}</span>
                            <span class="name">{{ __('custom.train_tende_limone') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
