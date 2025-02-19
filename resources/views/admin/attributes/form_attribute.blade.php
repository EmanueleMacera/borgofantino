@extends('layouts.admin')

@section('title', isset($attribute) ? __('general.edit') : __('general.add'))

@section('admin-content')
<div class="container mt-4 mb-4">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
        <h1 class="mb-3 mb-md-0">
            <i class="fas {{ isset($attribute) ? 'fa-edit' : 'fa-plus-circle' }}"></i>
            {{ isset($attribute) ? __('general.edit') : __('general.add') }}
        </h1>
        <a href="{{ route('attributes.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i>{{ __('general.back') }}
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ isset($attribute) ? route('attributes.update', $attribute) : route('attributes.store') }}"
                  method="POST">
                @csrf
                @if(isset($attribute))
                    @method('PUT')
                @endif

                <!-- Attribute Name -->
                <div class="form-group mb-3">
                    <label for="name">
                        <i class="fas fa-tag"></i>{{ __('general.name') }}
                    </label>
                    <div class="input-group">
                        <input type="text"
                               id="name"
                               name="name"
                               class="form-control"
                               value="{{ old('name', $attribute->name ?? '') }}"
                               placeholder="{{ __('general.enter_name') }}"
                               required
                               autocomplete="off">
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
                               value="{{ old('icon', $attribute->icon ?? '') }}"
                               placeholder="{{ __('general.use_font_awesome') }}">
                    </div>
                    <small class="form-text text-muted">
                        {{ __('general.use_font_awesome') }}
                    </small>
                </div>

                <!-- Macro Category -->
                <div class="form-group mb-3">
                    <label for="attribute_category_id">
                        <i class="fas fa-layer-group"></i>{{ __('general.category') }}
                    </label>
                    <div class="input-group">
                        <select id="attribute_category_id"
                                name="attribute_category_id"
                                class="form-control"
                                required>
                            <option value="" disabled {{ !isset($attribute) ? 'selected' : '' }}>
                                {{ __('general.select_category') }}
                            </option>
                            @foreach ($attributeCategories as $macroCategory)
                                <option value="{{ $macroCategory->id }}"
                                    {{ old('attribute_category_id', $attribute->attribute_category_id ?? '') == $macroCategory->id ? 'selected' : '' }}>
                                    {{ $macroCategory->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Save Button -->
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>{{ isset($attribute) ? __('general.save') : __('general.add') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
