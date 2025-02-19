@extends('layouts.app')

@section('title', __('general.admin_dashboard'))

@section('content')
<div class="admin-container d-flex flex-column flex-md-row">
    @include('layouts.partials.admin-sidebar')
    <main class="flex-grow-1 p-3">
        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif

        @yield('admin-content')
    </main>
</div>
@endsection
