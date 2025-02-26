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
    document.addEventListener('DOMContentLoaded', function () {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        // Gestione della conferma email
        document.getElementById('confirm-email-btn').addEventListener('click', function () {
            const form = document.getElementById('emailForm');
            const actionUrl = form.action;
            const formData = new FormData(form);

            fetch(actionUrl, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(response => {
                showAlert('success', response.success);
                let emailModal = new bootstrap.Modal(document.getElementById('emailModal'));
                emailModal.hide();
            })
            .catch(error => {
                displayErrors(error.errors, '#email-error');
            });
        });

        // Controllo dell'input email
        document.querySelectorAll('#new-email, #confirm-email').forEach(input => {
            input.addEventListener('input', function () {
                const newEmail = document.getElementById('new-email').value;
                const confirmEmail = document.getElementById('confirm-email').value;

                if (!emailRegex.test(newEmail)) {
                    document.getElementById('email-error').textContent = '{{ __('general.invalid_format') }}';
                    document.getElementById('email-error').style.display = 'block';
                    document.getElementById('confirm-email-btn').disabled = true;
                } else if (newEmail !== confirmEmail) {
                    document.getElementById('email-error').textContent = '{{ __('general.do_not_match') }}';
                    document.getElementById('email-error').style.display = 'block';
                    document.getElementById('confirm-email-btn').disabled = true;
                } else {
                    document.getElementById('email-error').textContent = '';
                    document.getElementById('email-error').style.display = 'none';
                    document.getElementById('confirm-email-btn').disabled = false;
                }
            });
        });

        // Gestione della conferma password
        document.getElementById('old-password').addEventListener('input', function () {
            const currentPassword = this.value.trim();

            if (currentPassword === '') {
                document.getElementById('password-error').textContent = '{{ __('general.current_password_required') }}';
                document.getElementById('password-error').style.display = 'block';
                document.getElementById('confirm-password-btn').disabled = true;
                return;
            }

            fetch('{{ route('admin.check-password') }}', {
                method: 'POST',
                body: JSON.stringify({ current_password: currentPassword }),
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(() => {
                document.getElementById('password-error').style.display = 'none';
                validatePassword();
            })
            .catch(() => {
                document.getElementById('password-error').textContent = '{{ __('general.current_password_incorrect') }}';
                document.getElementById('password-error').style.display = 'block';
                document.getElementById('confirm-password-btn').disabled = true;
            });
        });

        document.querySelectorAll('#new-password, #new-password-confirmation').forEach(input => {
            input.addEventListener('input', validatePassword);
        });

        function validatePassword() {
            const newPassword = document.getElementById('new-password').value.trim();
            const confirmPassword = document.getElementById('new-password-confirmation').value.trim();

            if (newPassword !== confirmPassword) {
                document.getElementById('password-error').textContent = '{{ __('general.do_not_match') }}';
                document.getElementById('password-error').style.display = 'block';
                document.getElementById('confirm-password-btn').disabled = true;
            } else {
                document.getElementById('password-error').style.display = 'none';
                document.getElementById('confirm-password-btn').disabled = false;
            }
        }

        // Gestione della conferma cambio password
        document.getElementById('confirm-password-btn').addEventListener('click', function () {
            const form = document.getElementById('passwordForm');
            const actionUrl = form.action;
            const formData = new FormData(form);

            fetch(actionUrl, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(response => {
                showAlert('success', response.success);
                let passwordModal = new bootstrap.Modal(document.getElementById('passwordModal'));
                passwordModal.hide();
            })
            .catch(error => {
                displayErrors(error.errors, '#password-error');
            });
        });

        // Gestione della conferma cambio nome
        document.getElementById('confirm-name-btn').addEventListener('click', function () {
            const form = document.getElementById('nameForm');
            const actionUrl = form.action;
            const formData = new FormData(form);

            fetch(actionUrl, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(response => {
                showAlert('success', response.success);
                let nameModal = new bootstrap.Modal(document.getElementById('nameModal'));
                nameModal.hide();
            })
            .catch(error => {
                displayErrors(error.errors, '#name-error');
            });
        });

        // Funzione per mostrare gli alert
        function showAlert(type, message) {
            const alertHtml = `
                <div class="alert alert-${type} alert-dismissible fade show text-center" role="alert">
                    ${message}
                </div>
            `;
            document.querySelector('.container').insertAdjacentHTML('afterbegin', alertHtml);
            setTimeout(function () {
                document.querySelector('.alert').classList.add('fade');
                setTimeout(() => document.querySelector('.alert').remove(), 500);
            }, 5000);
        }

        // Funzione per visualizzare gli errori
        function displayErrors(errors, errorContainer) {
            let errorMessages = '';
            Object.keys(errors).forEach(field => {
                errorMessages += errors[field].join('<br>') + '<br>';
            });
            document.querySelector(errorContainer).innerHTML = errorMessages;
            document.querySelector(errorContainer).style.display = 'block';
        }
    });
</script>
@endpush
