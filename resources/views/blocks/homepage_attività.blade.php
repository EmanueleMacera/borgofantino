<div class="container activities-container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4">{{ __('custom.activities_title') }}</h1>
        <div class="separator mx-auto my-3"></div>
        <p class="lead">{{ __('custom.activities_subtitle') }}</p>
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
                @foreach(__('custom.winter_activities') as $activity)
                <div class="activity-card">
                    <div class="activity-image">
                        <img src="{{ asset($activity['image']) }}" alt="{{ $activity['title'] }}">
                        <div class="activity-badge">
                            <i class="{{ $activity['icon'] }}"></i>
                        </div>
                    </div>
                    <div class="activity-content">
                        <h5>{{ $activity['title'] }}</h5>
                        <p>{{ $activity['description'] }}</p>
                        <div class="activity-features">
                            @foreach($activity['features'] as $feature)
                            <span><i class="{{ $feature['icon'] }}"></i>{{ $feature['text'] }}</span>
                            @endforeach
                        </div>
                        @if(isset($activity['link']))
                        <a href="{{ $activity['link'] }}" target="_blank" class="btn btn-primary">
                            <i class="fas fa-external-link-alt"></i>{{ __('custom.visit_site') }}
                        </a>
                        @endif
                        @if(isset($activity['phone']))
                        <a href="tel:{{ $activity['phone'] }}" class="btn btn-primary">
                            <i class="fas fa-phone-alt"></i>{{ $activity['phone'] }}
                        </a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="season-pane" id="summer">
            <div class="activities-grid">
                @foreach(__('custom.summer_activities') as $activity)
                <div class="activity-card">
                    <div class="activity-image">
                        <img src="{{ asset($activity['image']) }}" alt="{{ $activity['title'] }}">
                        <div class="activity-badge">
                            <i class="{{ $activity['icon'] }}"></i>
                        </div>
                    </div>
                    <div class="activity-content">
                        <h5>{{ $activity['title'] }}</h5>
                        <p>{{ $activity['description'] }}</p>
                        <div class="activity-features">
                            @foreach($activity['features'] as $feature)
                            <span><i class="{{ $feature['icon'] }}"></i>{{ $feature['text'] }}</span>
                            @endforeach
                        </div>
                        @if(isset($activity['link']))
                        <a href="{{ $activity['link'] }}" target="_blank" class="btn btn-primary">
                            <i class="fas fa-external-link-alt"></i>{{ __('custom.visit_site') }}
                        </a>
                        @endif
                        @if(isset($activity['phone']))
                        <a href="tel:{{ $activity['phone'] }}" class="btn btn-primary">
                            <i class="fas fa-phone-alt"></i>{{ $activity['phone'] }}
                        </a>
                        @endif
                    </div>
                </div>
                @endforeach
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
                pane.classList.toggle('active', pane === targetPane);
            });
        });
    });
});
</script>
