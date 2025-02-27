<footer class="section footer" id="footer">
    <div class="container py-4">
        <div class="row">

            <!-- About Section -->
            <div class="col-12 col-md-4 mb-4 mb-md-0">
                <img class="custom-logo-footer" src="{{ asset('assets/logo/logo.WebP') }}" alt="Borgo Fantino" loading="lazy">
                <p class="small">{{ $style->about ?? ''}}</p>
            </div>

            <!-- Resource Links -->
            <div class="col-12 col-md-4 mb-4 mb-md-0">
                <ul class="text-start text-md-center" style="list-style: none;">
                    @if(isset($style->footer_links) && is_array($style->footer_links))
                        @foreach ($style->footer_links as $linkData)
                            <li>
                                <a href="{{ $linkData['link'] }}">{{ $linkData['name'] }}</a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>

            <!-- Contact Information -->
            <div class="col-12 col-md-4 mb-4 mb-md-0">
                <ul class="list-unstyled">
                    @if(!empty($style->footer_email))
                        <li><strong>{{ __('general.email') }}:</strong> <a href="mailto:{{ $style->footer_email }}">{{ $style->footer_email }}</a></li>
                    @endif
                    @if(!empty($style->footer_phone))
                        <li><strong>{{ __('general.phone') }}:</strong> <a href="tel:{{ $style->footer_phone }}">{{ $style->footer_phone }}</a></li>
                    @endif
                    @if(!empty($style->footer_vat))
                        <li><strong>{{ __('general.vat') }}:</strong> {{ $style->footer_vat }}</li>
                    @endif
                    @if(!empty($style->footer_cin))
                        <li><strong>{{ __('general.cin') }}:</strong> {{ $style->footer_cin }}</li>
                    @endif
                    @if(!empty($style->footer_address))
                        <li><strong>{{ __('general.address') }}:</strong> {{ $style->footer_address }}</li>
                    @endif
                </ul>
                <ul class="list-unstyle social-icons d-flex gap-2 mt-3">
                    @php $socials = $style->social ?? []; @endphp
                    @foreach (['facebook', 'x', 'linkedin', 'instagram', 'tiktok'] as $platform)
                        @if($socials[$platform]['enabled'] ?? false)
                            <li>
                                <a href="{{ $socials[$platform]['link'] }}" target="_blank">
                                    <i class="fab fa-{{ $platform }}"></i>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>

        </div>

        <hr class="bg-light">
        <p class="text-center small mb-0">
            &copy; {{ date('Y') }} {{ __('general.company_name') }} | {{ __('general.all_rights_reserved') }}
        </p>
    </div>
</footer>
