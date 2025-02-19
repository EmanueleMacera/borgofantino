@extends('layouts.admin')

@section('title', isset($category) ? __('general.edit') : __('general.add'))

@section('admin-content')
<div class="container mt-4 mb-4">
    
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
        <h1 class="mb-3 mb-md-0">
            <i class="fas {{ isset($category) ? 'fa-edit' : 'fa-plus-circle' }}"></i>
            {{ isset($category) ? __('general.edit') : __('general.add') }}
        </h1>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i>{{ __('general.back') }}
        </a>
    </div>

    <form action="{{ isset($category) ? route('categories.update', $category) : route('categories.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="card p-4 shadow-sm">
        @csrf
        @if (isset($category))
            @method('PUT')
        @endif

        <!-- Name -->
        <div class="form-group mb-3">
            <label for="name">
                <i class="fas fa-search-location"></i>{{ __('general.name') }}
            </label>
            <div class="input-group">
                <input type="text"
                       name="name"
                       id="name"
                       class="form-control"
                       value="{{ old('name', $category->name ?? '') }}"
                       placeholder="{{ __('general.search') }}"
                       required
                       autocomplete="off">
            </div>
        </div>

        <!-- Type -->
        <div class="form-group mb-3">
            <label for="type_id">
                <i class="fas fa-layer-group"></i>{{ __('general.type') }}
            </label>
            <select id="type_id" name="type_id" class="form-control" required>
                <option value="" disabled selected>{{ __('general.select_type') }}</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}"
                        {{ old('type_id', $category->type_id ?? '') == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Status -->
        <div class="form-group mb-3">
            <label for="status">
                <i class="fas fa-toggle-on"></i>{{ __('general.status') }}
            </label>
            <select id="status" name="status" class="form-control" required>
                <option value="public" {{ old('status', $category->status ?? '') == 'public' ? 'selected' : '' }}>
                    {{ __('general.public') }}
                </option>
                <option value="draft" {{ old('status', $category->status ?? '') == 'draft' ? 'selected' : '' }}>
                    {{ __('general.draft') }}
                </option>
            </select>
        </div>

        <!-- Thumbnail -->
        <div class="form-group mb-3">
            <label for="thumbnail">
                <i class="fas fa-image"></i>{{ __('general.thumbnail') }}
            </label>
            <input type="file" id="thumbnail" name="thumbnail" class="form-control">
            @if (isset($category) && $category->thumbnail)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $category->thumbnail) }}" alt="Thumbnail" class="img-thumbnail" width="150">
                </div>
            @endif
        </div>

        <!-- Buttons -->
        <div class="d-flex justify-content-between align-items-center">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>{{ __('general.save') }}
            </button>
        </div>
    </form>
</div>
@endsection
