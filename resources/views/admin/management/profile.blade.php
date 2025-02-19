@extends('layouts.admin')

@section('title', __('general.profile'))

@section('admin-content')
<div class="container mt-4 mb-4">
    <h1 class="mb-4 text-center">{{ __('general.profile') }}</h1>
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-4">
                    <strong>{{ __('general.name') }}</strong>
                    <p>{{ $user->name }}</p>
                </div>
                <div class="col-12 col-md-4">
                    <strong>{{ __('general.email') }}</strong>
                    <p>{{ $user->email }}</p>
                </div>
                <div class="col-12 col-md-4">
                    <strong>{{ __('general.role') }}</strong>
                    <p>{{ ucwords(str_replace('-', ' ', $user->role)) }}</p>
                </div>
            </div>
            <div class="d-flex flex-wrap justify-content-center gap-3 mt-4">
                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#emailModal">
                    {{ __('general.update_email') }}
                </button>
                <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#passwordModal">
                    {{ __('general.update_password') }}
                </button>
                <button class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#nameModal">
                    {{ __('general.update_name') }}
                </button>
            </div>
        </div>
    </div>
</div>
@include('admin.management.modals')
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        $('#confirm-email-btn').click(function () {
            const form = $('#emailForm');
            const actionUrl = form.attr('action');
            const formData = form.serialize();

            $.post(actionUrl, formData)
                .done(function (response) {
                    showAlert('success', response.success);
                    $('#emailModal').modal('hide');
                })
                .fail(function (xhr) {
                    const errors = xhr.responseJSON?.errors || {};
                    displayErrors(errors, '#email-error');
                });
        });

        $('#new-email, #confirm-email').on('input', function () {
            const newEmail = $('#new-email').val();
            const confirmEmail = $('#confirm-email').val();

            if (!emailRegex.test(newEmail)) {
                $('#email-error').text('{{ __('general.invalid_format') }}').show();
                $('#confirm-email-btn').prop('disabled', true);
            } else if (newEmail !== confirmEmail) {
                $('#email-error').text('{{ __('general.do_not_match') }}').show();
                $('#confirm-email-btn').prop('disabled', true);
            } else {
                $('#email-error').text('').hide();
                $('#confirm-email-btn').prop('disabled', false);
            }
        });

        $('#old-password').on('input', function () {
            const currentPassword = $.trim($(this).val());

            if (currentPassword === '') {
                $('#password-error').text('{{ __('general.current_password_required') }}').show();
                $('#confirm-password-btn').prop('disabled', true);
                return;
            }

            $.post('{{ route('admin.check-password') }}', {
                _token: $('meta[name="csrf-token"]').attr('content'),
                current_password: currentPassword
            })
                .done(function () {
                    $('#password-error').text('').hide();
                    validatePassword();
                })
                .fail(function () {
                    $('#password-error').text('{{ __('general.current_password_incorrect') }}').show();
                    $('#confirm-password-btn').prop('disabled', true);
                });
        });

        $('#new-password, #new-password-confirmation').on('input', function () {
            validatePassword();
        });

        function validatePassword() {
            const newPassword = $.trim($('#new-password').val());
            const confirmPassword = $.trim($('#new-password-confirmation').val());

            if (newPassword !== confirmPassword) {
                $('#password-error').text('{{ __('general.do_not_match') }}').show();
                $('#confirm-password-btn').prop('disabled', true);
            } else {
                $('#password-error').text('').hide();
                $('#confirm-password-btn').prop('disabled', false);
            }
        }

        $('#confirm-password-btn').click(function () {
            const form = $('#passwordForm');
            const actionUrl = form.attr('action');
            const formData = form.serialize();

            $.post(actionUrl, formData)
                .done(function (response) {
                    showAlert('success', response.success);
                    $('#passwordModal').modal('hide');
                })
                .fail(function (xhr) {
                    const errors = xhr.responseJSON?.errors || {};
                    displayErrors(errors, '#password-error');
                });
        });

        $('#confirm-name-btn').click(function () {
            const form = $('#nameForm');
            const actionUrl = form.attr('action');
            const formData = form.serialize();

            $.post(actionUrl, formData)
                .done(function (response) {
                    showAlert('success', response.success);
                    $('#nameModal').modal('hide');
                })
                .fail(function (xhr) {
                    const errors = xhr.responseJSON?.errors || {};
                    displayErrors(errors, '#name-error');
                });
        });

        function showAlert(type, message) {
            const alertHtml = `
                <div class="alert alert-${type} alert-dismissible fade show text-center" role="alert">
                    ${message}
                </div>
            `;
            $('.container').prepend(alertHtml);
            setTimeout(function () {
                $('.alert').fadeOut('slow', function () {
                    $(this).remove();
                });
            }, 5000);
        }

        function displayErrors(errors, errorContainer) {
            let errorMessages = '';
            $.each(errors, function (field, messages) {
                errorMessages += messages.join('<br>') + '<br>';
            });
            $(errorContainer).html(errorMessages).show();
        }
    });
</script>
@endpush
