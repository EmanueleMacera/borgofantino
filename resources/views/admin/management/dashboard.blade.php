@extends('layouts.admin')

@section('title', __('general.admin_dashboard'))

@php
use App\Models\Admin\User;
@endphp

@section('admin-content')
<div class="container mt-4 mb-4">
    <h1 class="mb-4 text-center">{{ __('general.manage') }}</h1>
    <div class="card">
        <div class="card-body">
            <!-- Header con titolo e pulsante add, con wrapping su mobile -->
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                <h5 class="card-title">{{ __('general.user_list') }}</h5>
                @if (auth()->user()->getRoleLevel() >= User::ROLE_LEVELS[User::ROLE_ADMIN])
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUserModal">
                        <i class="fas fa-user-plus"></i>{{ __('general.add') }}
                    </button>
                @endif
            </div>
            <!-- Tabella responsive -->
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>{{ __('general.name') }}</th>
                            <th>{{ __('general.email') }}</th>
                            <th>{{ __('general.role') }}</th>
                            <th>{{ __('general.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            @if (auth()->user()->canManage($user) || $user->isVisibleTo(auth()->user()))
                                <tr>
                                    <td data-label="{{ __('general.name') }}">{{ $user->name }}</td>
                                    <td data-label="{{ __('general.email') }}">{{ $user->email }}</td>
                                    <td data-label="{{ __('general.role') }}">{{ ucwords(str_replace('-', ' ', $user->role)) }}</td>
                                    <td data-label="{{ __('general.actions') }}">
                                        @if (auth()->user()->id !== $user->id)
                                            @if (auth()->user()->canManage($user))
                                                <form action="{{ route('users.update', $user) }}" method="POST" class="d-inline-block">
                                                    @csrf
                                                    @method('PATCH')
                                                    <select name="role" class="form-select" onchange="this.form.submit()">
                                                        @foreach (User::ROLE_LEVELS as $role => $level)
                                                            @if ($level <= auth()->user()->getRoleLevel())
                                                                <option value="{{ $role }}" {{ $user->role == $role ? 'selected' : '' }}>
                                                                    {{ __(ucfirst($role)) }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </form>
                                                <form action="{{ route('users.delete', $user) }}" method="POST" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger ms-2" onclick="return confirm('{{ __('general.are_you_sure_delete') }}')">
                                                        <i class="fas fa-trash-alt"></i>{{ __('general.delete') }}
                                                    </button>
                                                </form>
                                                <form action="{{ route('users.approve', $user) }}" method="POST" class="d-inline-block">
                                                    @csrf
                                                    @method('PATCH')
                                                    @if (!$user->is_approved)
                                                        <button type="submit" class="btn btn-success">
                                                            <i class="fas fa-check"></i>{{ __('general.approve') }}
                                                        </button>
                                                    @endif
                                                </form>
                                            @else
                                                <span>{{ __('general.no_actions_available') }}</span>
                                            @endif
                                        @else
                                            <span>{{ __('general.you_cannot_modify_your_role_or_delete_yourself') }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal per la creazione di un nuovo utente -->
<div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUserModalLabel">{{ __('general.add') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('general.close') }}"></button>
            </div>
            <div class="modal-body">
                <form id="createUserForm" method="POST" action="{{ route('users.create') }}" autocomplete="on">
                    @csrf
                    <div class="mb-3">
                        <label for="create-name">{{ __('general.name') }}</label>
                        <input type="text" id="create-name" name="name" class="form-control" required autocomplete="name">
                    </div>
                    <div class="mb-3">
                        <label for="create-email">{{ __('general.email') }}</label>
                        <input type="email" id="create-email" name="email" class="form-control" required autocomplete="email">
                    </div>
                    <div class="mb-3">
                        <label for="confirm-email">{{ __('general.confirm_email') }}</label>
                        <input type="email" id="confirm-email" name="confirm_email" class="form-control" required autocomplete="email">
                    </div>
                    <div class="mb-3">
                        <label for="create-password">{{ __('general.password') }}</label>
                        <input type="password" id="create-password" name="password" class="form-control" required autocomplete="new-password">
                    </div>
                    <div class="mb-3">
                        <label for="confirm-password">{{ __('general.confirm_password') }}</label>
                        <input type="password" id="confirm-password" name="password_confirmation" class="form-control" required autocomplete="new-password">
                    </div>
                    <div class="mb-3">
                        <label for="role">{{ __('general.role') }}</label>
                        <select id="role" name="role" class="form-select" required>
                            @foreach (User::ROLE_LEVELS as $role => $level)
                                @if ($level <= auth()->user()->getRoleLevel())
                                    <option value="{{ $role }}">{{ __(ucfirst($role)) }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div id="create-user-error" class="text-danger mt-2 text-error"></div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('general.cancel') }}</button>
                <button type="button" class="btn btn-primary" id="confirm-create-user-btn">{{ __('general.add') }}</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const confirmCreateUserBtn = document.getElementById('confirm-create-user-btn');
        const createUserForm = document.getElementById('createUserForm');
        const createEmail = document.getElementById('create-email');
        const confirmEmail = document.getElementById('confirm-email');
        const createPassword = document.getElementById('create-password');
        const confirmPassword = document.getElementById('confirm-password');
        const createUserError = document.getElementById('create-user-error');

        // Validate email fields
        createEmail.addEventListener('input', validateEmail);
        confirmEmail.addEventListener('input', validateEmail);

        // Validate password fields
        createPassword.addEventListener('input', validatePassword);
        confirmPassword.addEventListener('input', validatePassword);

        // Create user button click handler
        confirmCreateUserBtn.addEventListener('click', function () {
            const formData = new FormData(createUserForm);
            fetch(createUserForm.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
                .then(response => response.json())
                .then(response => {
                    location.reload();
                })
                .catch(xhr => {
                    const errors = xhr.responseJSON.errors;
                    let errorMessages = '';
                    Object.keys(errors).forEach(field => {
                        errorMessages += errors[field].join('<br>') + '<br>';
                    });
                    createUserError.innerHTML = errorMessages;
                    createUserError.style.display = 'block';
                });
        });

        function validateEmail() {
            const email = createEmail.value;
            const confirmEmailVal = confirmEmail.value;
            if (!emailRegex.test(email)) {
                createUserError.innerHTML = '{{ __('general.invalid_format') }}';
                createUserError.style.display = 'block';
                confirmCreateUserBtn.disabled = true;
            } else if (email !== confirmEmailVal) {
                createUserError.innerHTML = '{{ __('general.do_not_match') }}';
                createUserError.style.display = 'block';
                confirmCreateUserBtn.disabled = true;
            } else {
                createUserError.style.display = 'none';
                confirmCreateUserBtn.disabled = false;
            }
        }

        function validatePassword() {
            const password = createPassword.value;
            const confirmPasswordVal = confirmPassword.value;
            if (password.length < 8) {
                createUserError.innerHTML = '{{ __('general.password_minimum_length') }}';
                createUserError.style.display = 'block';
                confirmCreateUserBtn.disabled = true;
            } else if (password !== confirmPasswordVal) {
                createUserError.innerHTML = '{{ __('general.do_not_match') }}';
                createUserError.style.display = 'block';
                confirmCreateUserBtn.disabled = true;
            } else {
                createUserError.style.display = 'none';
                confirmCreateUserBtn.disabled = false;
            }
        }
    });
</script>
@endpush
