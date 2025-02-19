@extends('layouts.admin')

@section('title', isset($type) ? __('general.edit') : __('general.add'))

@section('admin-content')
<div class="container mt-4 mb-4">
    
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
        <h1 class="mb-3 mb-md-0">
            <i class="fas fa-plus-circle"></i>
            {{ isset($type) ? __('general.edit') : __('general.add') }}
        </h1>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i>{{ __('general.back') }}
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ isset($type) ? route('category-types.update', $type->id) : route('category-types.store') }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @if(isset($type))
                    @method('PUT')
                @endif

                <!-- Type Name -->
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
                               value="{{ old('name', $type->name ?? '') }}"
                               required
                               autocomplete="off">
                    </div>
                </div>

                <!-- Thumbnail -->
                <div class="form-group mb-3">
                    <label for="thumbnail">
                        <i class="fas fa-image"></i>{{ __('general.thumbnail') }}
                    </label>
                    <input type="file" id="thumbnail" name="thumbnail" class="form-control">
                    <small class="form-text text-muted">{{ __('general.thumbnail_upload') }}</small>

                    @if(isset($type) && $type->thumbnail)
                        <div class="mt-3">
                            <img src="{{ asset('storage/' . $type->thumbnail) }}" alt="{{ __('general.thumbnail') }}" class="img-thumbnail">
                        </div>
                    @endif

                    <div id="thumbnail-preview" class="mt-3"></div>
                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>{{ __('general.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Thumbnail Preview
        document.getElementById('thumbnail').addEventListener('change', function (event) {
            const preview = document.getElementById('thumbnail-preview');
            preview.innerHTML = ''; // Clear previous previews

            const file = event.target.files[0];

            if (file) {
                const img = document.createElement('img');
                img.classList.add('img-thumbnail', 'm-2');
                img.style.height = '100px';
                img.style.width = '100px';

                const reader = new FileReader();
                reader.onload = function (e) {
                    img.src = e.target.result;
                }
                reader.readAsDataURL(file);
                preview.appendChild(img);
            }
        });
    });
</script>
@endpush
