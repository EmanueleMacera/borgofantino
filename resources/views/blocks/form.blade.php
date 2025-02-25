<div class="block-parallax-contatti"></div>
<div class="container">
    <div class="col-md-12 m-4" style="justify-content: center; display: flex;">
        <div class="servizi-form">
            <div class="text-center">
                <h2>{{ __('custom.contact_title') }}</h2>
                {!! __('custom.servizi') !!}
            </div>
            <form action="https://formspree.io/f/mqaknywo" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">
                        <i class="fas fa-user"></i>{{ __('general.name') }}
                    </label>
                    <input type="text" id="name" name="Nome" class="form-control" placeholder="{{ __('custom.contact_name') }}" required>
                </div>
                
                <div class="form-group">
                    <label for="email">
                        <i class="fas fa-envelope"></i>{{ __('general.email') }}
                    </label>
                    <input type="email" id="email" name="Email" class="form-control" placeholder="{{ __('custom.contact_email') }}" required>
                </div>

                <div class="form-group">
                    <label for="number">
                        <i class="fas fa-phone"></i>{{ __('custom.phone') }}
                    </label>
                    <input type="phone-number" id="number" name="Numero di Telefono" class="form-control" placeholder="{{ __('custom.contact_phone') }}" required>
                </div>
                
                <div class="form-group">
                    <label for="message">
                        <i class="fas fa-comment"></i>{{ __('custom.contact_message') }}
                    </label>
                    <textarea id="message" name="Messaggio" class="form-control" rows="5" placeholder="{{ __('custom.contact_message') }}" required></textarea>
                </div>

                <div class="form-group">
                    <label class="form-check-label" for="privacy" style="line-height: 15px; font-weight: 300; display: block">
                        <input type="checkbox" id="privacy" name="Privacy" required>
                        {!! __('custom.privacy_policy') !!}
                    </label>
                </div>

                <button type="submit" class="btn btn-primary w-100" style="font-weight: bold; color: white;">
                    {!! __('custom.submit') !!}
                </button>
            </form>
        </div>
    </div>
</div>
