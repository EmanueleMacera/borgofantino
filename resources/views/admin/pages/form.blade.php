@extends('layouts.admin')

@section('title', isset($page) ? __('general.edit') : __('general.save'))

@section('admin-content')
    <div class="container mt-4 mb-4">
        
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
            <h1 class="mb-3 mb-md-0">
                <i class="fas {{ isset($page) ? 'fa-edit' : 'fa-plus-circle' }}"></i>
                {{ isset($page) ? __('general.edit') : __('general.add') }}
            </h1>
            <a href="{{ route('pages.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i>{{ __('general.back') }}
            </a>
        </div>
        
        <!-- Form Responsive -->
        <form action="{{ isset($page) ? route('pages.update', $page->id) : route('pages.store') }}"
              method="POST"
              class="shadow p-4 rounded bg-light">
            @csrf
            @if (isset($page))
                @method('PUT')
            @endif

            <div class="form-group mb-3">
                <label for="title">{{ __('general.title') }}</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    class="form-control"
                    value="{{ old('title', $page->title ?? '') }}"
                    required>
            </div>

            <!-- Checkbox for Homepage -->
            <div class="form-group mb-3">
                <div class="form-check">
                    <input
                        type="checkbox"
                        id="homepage"
                        name="homepage"
                        class="form-check-input"
                        {{ old('homepage', $page->homepage ?? false) ? 'checked' : '' }}>
                    <label for="homepage" class="form-check-label">{{ __('general.set_as_homepage') }}</label>
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="status">{{ __('general.status') }}</label>
                <select id="status" name="status" class="form-control">
                    <option value="draft" {{ old('status', $page->status ?? '') == 'draft' ? 'selected' : '' }}>
                        {{ __('general.draft') }}
                    </option>
                    <option value="publish" {{ old('status', $page->status ?? '') == 'publish' ? 'selected' : '' }}>
                        {{ __('general.public') }}
                    </option>
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary mt-4">
                    <i class="fas fa-save"></i>{{ isset($page) ? __('general.save') : __('general.save') }}
                </button>
            </div>
        </form>
    </div>
@endsection
