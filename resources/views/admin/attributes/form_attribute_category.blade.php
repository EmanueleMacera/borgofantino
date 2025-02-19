@extends('layouts.admin')

@section('title', isset($macroCategory) ? __('general.edit') : __('general.add'))

@section('admin-content')
<div class="container mt-4 mb-4">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
        <h1 class="mb-3 mb-md-0">
            <i class="fas fa-layer-group"></i>
            {{ isset($macroCategory) ? __('general.edit') : __('general.add') }}
        </h1>
        <a href="{{ route('attributes.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i>{{ __('general.back') }}
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ isset($macroCategory)
                    ? route('attributes.updateAttributeCategory', $macroCategory)
                    : route('attributes.storeAttributeCategory') }}"
                  method="POST">
                @csrf
                @isset($macroCategory)
                    @method('PUT')
                @endisset

                <!-- Macro Category Name -->
                <div class="form-group mb-3">
                    <label for="name">
                        <i class="fas fa-tag"></i>{{ __('general.name') }}
                    </label>
                    <div class="input-group">
                        <input type="text"
                               id="name"
                               name="name"
                               class="form-control"
                               placeholder="{{ __('general.enter_name') }}"
                               value="{{ old('name', $macroCategory->name ?? '') }}"
                               autocomplete="off"
                               required>
                    </div>
                </div>

                <!-- Icon -->
                <div class="form-group mb-3">
                    <label for="icon">
                        <i class="fas fa-icons"></i>{{ __('general.icon') }}
                    </label>
                    <div class="input-group">
                        <input type="text"
                               id="icon"
                               name="icon"
                               class="form-control"
                               placeholder="{{ __('general.use_font_awesome') }}"
                               value="{{ old('icon', $macroCategory->icon ?? '') }}">
                    </div>
                    <small class="form-text text-muted">
                        {{ __('general.use_font_awesome') }}
                    </small>
                </div>

                <!-- Save Button -->
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>{{ isset($macroCategory) ? __('general.update') : __('general.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
