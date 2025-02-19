@extends('layouts.admin')

@section('title', __('general.style_title'))

@section('admin-content')
<div class="container mt-4 mb-4">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <h1 class="text-center flex-grow-1">{{ __('general.style_customization') }}</h1>
    </div>

    <form action="{{ route('style.update') }}" method="POST" id="style-form" class="shadow p-4 rounded bg-light">
        @csrf

        <!-- Font Section -->
        <h3><i class="fas fa-font fa-sm"></i>{{ __('general.font_section') }}</h3>
        <div class="form-group mb-3 col-12 col-md-4">
            <label for="font">{{ __('general.select_font') }}</label>
            <select id="font" name="font" class="form-control" onchange="updateFont()">
                <option value="Nunito" {{ $style->font == 'Nunito' ? 'selected' : '' }}>Nunito</option>
                <option value="Roboto" {{ $style->font == 'Roboto' ? 'selected' : '' }}>Roboto</option>
                <option value="Arial" {{ $style->font == 'Arial' ? 'selected' : '' }}>Arial</option>
            </select>
        </div>

        <!-- Colors Section -->
        <h3 class="mt-4"><i class="fas fa-palette fa-sm"></i>{{ __('general.colors_section') }}</h3>
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="form-group mb-3">
                    <label for="primary_color">{{ __('general.primary_color') }}</label>
                    <input type="color" id="primary_color" name="primary_color" value="{{ $style->primary_color ?? '#3498db' }}" class="form-control form-control-color">
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group mb-3">
                    <label for="secondary_color">{{ __('general.secondary_color') }}</label>
                    <input type="color" id="secondary_color" name="secondary_color" value="{{ $style->secondary_color ?? '#2ecc71' }}" class="form-control form-control-color">
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group mb-3">
                    <label for="tertiary_color">{{ __('general.tertiary_color') }}</label>
                    <input type="color" id="tertiary_color" name="tertiary_color" value="{{ $style->tertiary_color ?? '#e74c3c' }}" class="form-control form-control-color">
                </div>
            </div>
        </div>

        <!-- Buttons Section -->
        <h3 class="mt-4"><i class="fas fa-hand-pointer fa-sm"></i>{{ __('general.buttons_section') }}</h3>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group mb-3">
                    <label for="btn_bg_color">{{ __('general.btn_bg_color') }}</label>
                    <input type="color" id="btn_bg_color" name="btn_bg_color" value="{{ $style->btn_bg_color ?? '#007bff' }}" class="form-control form-control-color">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-3">
                    <label for="btn_hover_bg_color">{{ __('general.btn_hover_bg_color') }}</label>
                    <input type="color" id="btn_hover_bg_color" name="btn_hover_bg_color" value="{{ $style->btn_hover_bg_color ?? '#0056b3' }}" class="form-control form-control-color">
                </div>
            </div>
        </div>

        <!-- Footer Section -->
        <h3 class="mt-4"><i class="fas fa-columns fa-sm"></i>{{ __('general.footer_section') }}</h3>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group mb-3">
                    <label for="footer_bg">{{ __('general.footer_bg') }}</label>
                    <input type="color" id="footer_bg" name="footer_bg" value="{{ $style->footer_bg ?? '#2c3e50' }}" class="form-control form-control-color">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-3">
                    <label for="footer_color">{{ __('general.footer_color') }}</label>
                    <input type="color" id="footer_color" name="footer_color" value="{{ $style->footer_color ?? '#ecf0f1' }}" class="form-control form-control-color">
                </div>
            </div>
        </div>

        <!-- Navbar Section -->
        <h3 class="mt-4"><i class="fas fa-ellipsis-h fa-sm"></i>{{ __('general.navbar_section') }}</h3>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group mb-3">
                    <label for="navbar_bg">{{ __('general.navbar_bg') }}</label>
                    <input type="color" id="navbar_bg" name="navbar_bg" value="{{ $style->navbar_bg ?? 'rgba(244, 241, 236, 0.6)' }}" class="form-control form-control-color">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-3">
                    <label for="navbar_link_color">{{ __('general.navbar_link_color') }}</label>
                    <input type="color" id="navbar_link_color" name="navbar_link_color" value="{{ $style->navbar_link_color ?? '#5c4e43' }}" class="form-control form-control-color">
                </div>
            </div>
        </div>

        <!-- Admin Sidebar Section -->
        <h3 class="mt-4"><i class="fas fa-th fa-sm"></i>{{ __('general.admin_sidebar_section') }}</h3>
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="form-group mb-3">
                    <label for="admin_sidebar_bg">{{ __('general.admin_sidebar_bg') }}</label>
                    <input type="color" id="admin_sidebar_bg" name="admin_sidebar_bg" value="{{ $style->admin_sidebar_bg ?? '#2c3e50' }}" class="form-control form-control-color">
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group mb-3">
                    <label for="admin_sidebar_hover_bg">{{ __('general.admin_sidebar_hover_bg') }}</label>
                    <input type="color" id="admin_sidebar_hover_bg" name="admin_sidebar_hover_bg" value="{{ $style->admin_sidebar_hover_bg ?? '#34495e' }}" class="form-control form-control-color">
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group mb-3">
                    <label for="admin_sidebar_color">{{ __('general.admin_sidebar_color') }}</label>
                    <input type="color" id="admin_sidebar_color" name="admin_sidebar_color" value="{{ $style->admin_sidebar_color ?? '#ecf0f1' }}" class="form-control form-control-color">
                </div>
            </div>
        </div>

        <!-- Social Section -->
        <h3 class="mt-4"><i class="fab fa-facebook fa-sm"></i>{{ __('general.social_section') }}</h3>
        <div id="socials-container">
            @php $socials = $style->social ?? []; @endphp
            @foreach(['facebook', 'instagram', 'tiktok', 'x', 'linkedin'] as $social)
            <div class="form-check form-switch row mb-3">
                <div class="col-12 col-md-2">
                    <input type="checkbox" id="{{ $social }}" name="social[{{ $social }}][enabled]" value="1" class="form-check-input" {{ $socials[$social]['enabled'] ?? false ? 'checked' : '' }}>
                </div>
                <div class="col-12 col-md-4">
                    <label class="form-check-label" for="{{ $social }}">{{ ucfirst($social) }}</label>
                </div>
                <div class="col-12 col-md-6">
                    <input type="url" name="social[{{ $social }}][link]" value="{{ $socials[$social]['link'] ?? '' }}" class="form-control mt-2" placeholder="{{ __('general.footer_socials_placeholder') }}" style="display: {{ $socials[$social]['enabled'] ?? false ? 'block' : 'none' }}">
                </div>
            </div>
            @endforeach
        </div>

        <!-- Navbar Links Section -->
        <h3 class="mt-4"><i class="fas fa-link fa-sm"></i>{{ __('general.add_button') }}</h3>
        <div id="navbar-links-container">
            @if(isset($style->navbar_links) && is_array($style->navbar_links))
                @foreach ($style->navbar_links as $index => $linkData)
                    <div class="row mb-3 navbar-link-row">
                        <div class="col-12 col-md-5">
                            <input type="text" name="navbar_links[{{ $index }}][name]" class="form-control" value="{{ $linkData['name'] ?? '' }}" placeholder="{{ __('general.add_button') }}">
                        </div>
                        <div class="col-12 col-md-5">
                            <input type="url" name="navbar_links[{{ $index }}][link]" class="form-control" value="{{ $linkData['link'] ?? '' }}" placeholder="{{ __('general.add_button') }}">
                        </div>
                        <div class="col-12 col-md-2">
                            <button type="button" class="btn btn-danger remove-link">{{ __('general.remove_button') }}</button>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <button type="button" class="btn btn-secondary mb-3" id="add-navbar-link">{{ __('general.add_navbar_link') }}</button>

        <!-- Footer Links Section -->
        <h3 class="mt-4"><i class="fas fa-link fa-sm"></i>{{ __('general.add_footer_link') }}</h3>
        <div id="footer-links-container">
            @if(isset($style->footer_links) && is_array($style->footer_links))
                @foreach ($style->footer_links as $index => $linkData)
                    <div class="row mb-3 footer-link-row">
                        <div class="col-12 col-md-5">
                            <input type="text" name="footer_links[{{ $index }}][name]" class="form-control" value="{{ $linkData['name'] ?? '' }}" placeholder="{{ __('general.add_button') }}">
                        </div>
                        <div class="col-12 col-md-5">
                            <input type="url" name="footer_links[{{ $index }}][link]" class="form-control" value="{{ $linkData['link'] ?? '' }}" placeholder="{{ __('general.add_button') }}">
                        </div>
                        <div class="col-12 col-md-2">
                            <button type="button" class="btn btn-danger remove-link">{{ __('general.remove_button') }}</button>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <button type="button" class="btn btn-secondary mb-3" id="add-footer-link">{{ __('general.add_footer_link') }}</button>

        <!-- Info Section -->
        <h3 class="mt-4"><i class="fas fa-map fa-sm"></i>{{ __('general.info_section') }}</h3>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group mb-3">
                    <label for="footer_email">{{ __('general.footer_email_placeholder') }}:</label>
                    <input type="email" id="footer_email" name="footer_email" class="form-control" value="{{ $style->footer_email ?? '' }}" placeholder="{{ __('general.footer_email_placeholder') }}">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-3">
                    <label for="footer_phone">{{ __('general.phone') }}:</label>
                    <input type="text" id="footer_phone" name="footer_phone" class="form-control" value="{{ $style->footer_phone ?? '' }}" placeholder="{{ __('general.phone') }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group mb-3">
                    <label for="footer_vat">{{ __('general.vat') }}:</label>
                    <input type="text" id="footer_vat" name="footer_vat" class="form-control" value="{{ $style->footer_vat ?? '' }}" placeholder="{{ __('general.vat') }}">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mb-3">
                    <label for="footer_address">{{ __('general.address') }}:</label>
                    <input type="text" id="footer_address" name="footer_address" class="form-control" value="{{ $style->footer_address ?? '' }}" placeholder="{{ __('general.address') }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group mb-3">
                    <label for="about">{{ __('general.about_us') }}:</label>
                    <textarea id="about" name="about" class="form-control" rows="5" placeholder="{{ __('general.about_us') }}">{{ $style->about ?? '' }}</textarea>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary btn-lg">{{ __('general.save') }}</button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        function updateIndices(container, rowSelector, inputPrefix) {
            const rows = container.querySelectorAll(rowSelector);
            rows.forEach((row, index) => {
                const nameInput = row.querySelector(`input[name^="${inputPrefix}"][name$="[name]"]`);
                const linkInput = row.querySelector(`input[name^="${inputPrefix}"][name$="[link]"]`);
                if (nameInput) {
                    nameInput.name = `${inputPrefix}[${index}][name]`;
                }
                if (linkInput) {
                    linkInput.name = `${inputPrefix}[${index}][link]`;
                }
            });
        }

        function addLinkRow(container, rowSelector, inputPrefix) {
            const index = container.querySelectorAll(rowSelector).length;
            const newLinkRow = `
                <div class="row mb-3 ${rowSelector.replace('.', '')}">
                    <div class="col-12 col-md-5 mb-2">
                        <input type="text" name="${inputPrefix}[${index}][name]" class="form-control" placeholder="{{ __('general.name_link_placeholder') }}" required>
                    </div>
                    <div class="col-12 col-md-5 mb-2">
                        <input type="url" name="${inputPrefix}[${index}][link]" class="form-control" placeholder="{{ __('general.link_placeholder') }}" required>
                    </div>
                    <div class="col-12 col-md-2 mb-2">
                        <button type="button" class="btn btn-danger remove-link">{{ __('general.remove_button') }}</button>
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', newLinkRow);
        }

        document.getElementById('add-navbar-link').addEventListener('click', function () {
            const container = document.getElementById('navbar-links-container');
            addLinkRow(container, '.navbar-link-row', 'navbar_links');
        });

        document.getElementById('add-footer-link').addEventListener('click', function () {
            const container = document.getElementById('footer-links-container');
            addLinkRow(container, '.footer-link-row', 'footer_links');
        });

        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-link')) {
                const container = e.target.closest('.container');
                e.target.closest('.row').remove();
                if (container.id === 'navbar-links-container') {
                    updateIndices(container, '.navbar-link-row', 'navbar_links');
                } else if (container.id === 'footer-links-container') {
                    updateIndices(container, '.footer-link-row', 'footer_links');
                }
            }
        });

        document.addEventListener('submit', function () {
            const navbarContainer = document.getElementById('navbar-links-container');
            const footerContainer = document.getElementById('footer-links-container');
            updateIndices(navbarContainer, '.navbar-link-row', 'navbar_links');
            updateIndices(footerContainer, '.footer-link-row', 'footer_links');
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        function toggleSocialInput(checkbox) {
            const input = checkbox.closest('.form-check').querySelector('input[type="url"]');
            input.style.display = checkbox.checked ? 'block' : 'none';
        }

        document.querySelectorAll('#socials-container .form-check-input').forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                toggleSocialInput(this);
            });
            toggleSocialInput(checkbox);
        });
    });

    function updateFont() {
        const selectElement = document.getElementById('font');
        const selectedFont = selectElement.value;
        selectElement.style.fontFamily = selectedFont;
    }

    window.onload = function () {
        updateFont();
    };
</script>
@endpush
