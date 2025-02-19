<!-- Email Modal -->
<div class="modal fade" id="emailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header primary-bg text-white">
                <h5 class="modal-title">{{ __('general.update_email') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="emailForm" method="POST" action="{{ route('admin.update-email') }}" autocomplete="on">
                    @csrf
                    <div class="mb-3">
                        <label for="old-email">{{ __('general.email') }}</label>
                        <input type="email" id="old-email" name="old_email" class="form-control" value="{{ $user->email }}" readonly autocomplete="email">
                    </div>
                    <div class="mb-3">
                        <label for="new-email">{{ __('general.new_email') }}</label>
                        <input type="email" id="new-email" name="new_email" class="form-control" required autocomplete="email">
                    </div>
                    <div class="mb-3">
                        <label for="confirm-email">{{ __('general.confirm_email') }}</label>
                        <input type="email" id="confirm-email" name="confirm_new_email" class="form-control" required autocomplete="email">
                    </div>
                    <div id="email-error" class="text-danger mt-2 text-error"></div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('general.cancel') }}</button>
                <button type="button" class="btn btn-primary" id="confirm-email-btn" disabled>
                    {{ __('general.confirm') }}
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Password Modal -->
<div class="modal fade" id="passwordModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header primary-bg text-white">
                <h5 class="modal-title">{{ __('general.update_password') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="passwordForm" method="POST" action="{{ route('admin.update-password') }}" autocomplete="on">
                    @csrf
                    <div class="mb-3">
                        <label for="old-password">{{ __('general.old_password') }}</label>
                        <input type="password" id="old-password" name="current_password" class="form-control" required autocomplete="current-password">
                    </div>
                    <div class="mb-3">
                        <label for="new-password">{{ __('general.new_password') }}</label>
                        <input type="password" id="new-password" name="new_password" class="form-control" required autocomplete="new-password">
                    </div>
                    <div class="mb-3">
                        <label for="new-password-confirmation">{{ __('general.confirm_password') }}</label>
                        <input type="password" id="new-password-confirmation" name="new_password_confirmation" class="form-control" required autocomplete="new-password">
                    </div>
                    <div id="password-error" class="text-danger mt-2 text-error"></div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('general.cancel') }}</button>
                <button type="button" class="btn btn-primary" id="confirm-password-btn" disabled>
                    {{ __('general.confirm') }}
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Name Modal -->
<div class="modal fade" id="nameModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header primary-bg text-white">
                <h5 class="modal-title">{{ __('general.update_name') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="nameForm" method="POST" action="{{ route('admin.update-name') }}" autocomplete="on">
                    @csrf
                    <div class="mb-3">
                        <label for="name">{{ __('general.name') }}</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}" required autocomplete="name">
                    </div>
                    <div id="name-error" class="text-danger mt-2 text-error"></div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('general.cancel') }}</button>
                <button type="button" class="btn btn-primary" id="confirm-name-btn">
                    {{ __('general.confirm') }}
                </button>
            </div>
        </div>
    </div>
</div>
