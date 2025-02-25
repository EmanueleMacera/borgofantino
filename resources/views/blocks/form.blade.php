{{-- Intro --}}
<div class="block-parallax-servizi"></div>
<div class="row" style="margin: 0;">
    <div class="col-12 col-md-7">
        <div class="servizi-text">
            <h1 style="font-weight: bold">{{ __('custom.servizi.heading') }}</h1>
            <p style="font-weight: bold">{{ __('custom.servizi.description1') }}</p>
            <p style="font-weight: bold">{{ __('custom.servizi.description2') }}</p>
            <p>{!! __('custom.servizi.manage_person') !!}</p>
            <p>{!! __('custom.servizi.discover') !!}</p>
            <p>{!! __('custom.servizi.request') !!}</p>
        </div>
    </div>
    <div class="col-12 col-md-5">
        <div class="servizi-form">
            <h1>{{ __('custom.servizi.form.title') }}</h1>
            <h2>{{ __('custom.servizi.form.subtitle') }}</h2>
            <form action="https://formspree.io/f/mqaknywo" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">
                        <i class="fas fa-user"></i>{{ __('custom.servizi.form.name') }}
                    </label>
                    <input type="text" id="name" name="Nome" class="form-control" placeholder="{{ __('custom.servizi.form.name') }}" required>
                </div>
                
                <div class="form-group">
                    <label for="email">
                        <i class="fas fa-envelope"></i>{{ __('custom.servizi.form.email') }}
                    </label>
                    <input type="email" id="email" name="Email" class="form-control" placeholder="{{ __('custom.servizi.form.email') }}" required>
                </div>

                <div class="form-group">
                    <label for="number">
                        <i class="fas fa-phone"></i>{{ __('custom.servizi.form.phone') }}
                    </label>
                    <input type="phone-number" id="number" name="Numero di Telefono" class="form-control" placeholder="{{ __('custom.servizi.form.phone') }}" required>
                </div>

                <div class="form-group">
                    <label for="info">
                        <i class="fas fa-map"></i>{{ __('custom.servizi.form.location') }}
                    </label>
                    <input type="text" id="info" name="Luogo Immobile" class="form-control" placeholder="{{ __('custom.servizi.form.location') }}" required>
                </div>
                
                <div class="form-group">
                    <label for="message">
                        <i class="fas fa-comment"></i>{{ __('custom.servizi.form.message') }}
                    </label>
                    <textarea id="message" name="Messaggio" class="form-control" rows="5" placeholder="{{ __('custom.servizi.form.message') }}" required></textarea>
                </div>

                <div class="form-group">
                    <label class="form-check-label" for="privacy" style="line-height: 15px; font-weight: 300; display: block">
                        <input type="checkbox" id="privacy" name="Privacy" required style="margin-right: 5px">
                        {!! __('custom.servizi.form.privacy') !!}
                    </label>
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    {!! __('custom.servizi.form.submit') !!}
                </button>
            </form>
        </div>
    </div>
</div>
