@extends('layouts.admin')

@section('title', isset($item) ? __('general.edit') : __('general.add'))

@section('admin-content')
<div class="container mt-4 mb-4">
    
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
        <h1 class="mb-3 mb-md-0">
            <i class="fas fa-plus-circle"></i>{{ isset($item) ? __('general.edit') : __('general.add') }}
        </h1>
        <a href="{{ route('items.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i>{{ __('general.back') }}
        </a>
    </div>

    <form action="{{ isset($item) ? route('items.update', $item) : route('items.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="card p-4 shadow-sm"
          autocomplete="on">
        @csrf
        @if(isset($item))
            @method('PUT')
        @endif

        <!-- Status -->
        <div class="form-group mb-3">
            <label for="status">
                <i class="fas fa-toggle-on"></i>{{ __('general.status') }}
            </label>
            <select id="status" name="status" class="form-control" required>
                <option value="draft" {{ old('status', $item->status ?? '') == 'draft' ? 'selected' : '' }}>
                    {{ __('general.draft') }}
                </option>
                <option value="publish" {{ old('status', $item->status ?? '') == 'publish' ? 'selected' : '' }}>
                    {{ __('general.public') }}
                </option>
            </select>
        </div>

        <!-- Item Name -->
        <div class="form-group mb-3">
            <label for="name">
                <i class="fas fa-home"></i>{{ __('general.name') }}
            </label>
            <input type="text"
                   id="name"
                   name="name"
                   class="form-control"
                   value="{{ old('name', $item->name ?? '') }}"
                   placeholder="{{ __('general.enter_name') }}"
                   required
                   autocomplete="name">
        </div>

        <!-- Select Category -->
        <div class="form-group mb-3">
            <label for="category_id">
                <i class="fas fa-map-marker-alt"></i>{{ __('general.category') }}
            </label>
            <select id="category_id" name="category_id" class="form-control" required>
                <option value="" disabled selected>{{ __('general.select_category') }}</option>
                @foreach ($categories as $loc)
                    <option value="{{ $loc->id }}"
                        {{ old('category_id', $item->category_id ?? '') == $loc->id ? 'selected' : '' }}>
                        {{ $loc->name }} - {{ $loc->type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Autocompletamento Indirizzo -->
        <div class="form-group mb-3">
            <label for="adress">
                <i class="fas fa-search-location"></i>{{ __('custom.adress') }}
            </label>
            <input type="text"
                   name="adress"
                   class="form-control"
                   value="{{ old('adress', $item->adress ?? '') }}"
                   placeholder="{{ __('custom.insert_adress') }}" required>
        </div>

        <!-- Latitudine e Longitudine -->
        <div class="row">
            <span style="font-size: 0.8rem; margin-top: 0px;">
                {!! __('custom.lat_lng', ['link' => '<a href="https://www.coordinate-gps.it/" target="_blank">coordinate-gps.it</a>']) !!}
            </span>
            <div class="form-group col-md-6">
                <label for="latitude">
                    <i class="fas fa-location-arrow"></i>{{ __('custom.latitude') }}
                </label>
                <input type="text"
                       id="latitude"
                       name="latitude"
                       class="form-control"
                       value="{{ old('latitude', $item->latitude ?? '') }}"
                       placeholder="{{ __('custom.latitude') }}" required>
            </div>
            <div class="form-group col-md-6">
                <label for="longitude"><i class="fas fa-location-arrow"></i>{{ __('custom.longitude') }}
                </label>
                <input type="text"
                       id="longitude"
                       name="longitude"
                       class="form-control"
                       value="{{ old('longitude', $item->longitude ?? '') }}"
                       placeholder="{{ __('custom.longitude') }}" required>
            </div>
        </div>

        <!-- Camere, bagni e posti letto -->
        <div class="row">
            <div class="form-group col-md-4">
                <label for="camere">
                    <i class="fa-solid fa-people-roof"></i>{{ __('custom.rooms') }}
                </label>
                <input type="number"
                       id="camere"
                       name="camere"
                       class="form-control"
                       value="{{ old('camere', $item->camere ?? '') }}"
                       placeholder="{{ __('custom.rooms') }}">
            </div>
            <div class="form-group col-md-4">
                <label for="bagni">
                    <i class="fa-solid fa-bath"></i>{{__('custom.bathrooms')}}
                </label>
                <input type="number"
                       id="bagni"
                       name="bagni"
                       class="form-control"
                       value="{{ old('bagni', $item->camere ?? '') }}"
                       placeholder="{{ __('custom.bathrooms') }}">
            </div>
            <div class="form-group col-md-4">
                <label for="posti_letto">
                    <i class="fa-solid fa-bed"></i>{{__('custom.beds')}}
                </label>
                <input type="number"
                       id="posti_letto"
                       name="posti_letto"
                       class="form-control"
                       value="{{ old('posti_letto', $item->posti_letto ?? '') }}"
                       placeholder="{{ __('custom.beds') }}">
            </div>
        </div>

        <!-- Description -->
        <div class="form-group mb-3">
            <label for="description">
                <i class="fas fa-info-circle"></i>{{ __('general.description') }}
            </label>
            <textarea id="description"
                      name="description"
                      class="form-control"
                      rows="5"
                      placeholder="{{ __('general.describe_item') }}">{{ old('description', $item->description ?? '') }}</textarea>
        </div>

        <!-- Nei Dintorni -->
        <div class="form-group">
            <label for="nei_dintorni">
                <i class="fas fa-map-signs"></i>{{ __('custom.nearby') }}
            </label>
            <textarea id="nei_dintorni"
                      name="nei_dintorni"
                      class="form-control"
                      rows="3" placeholder="{{__('custom.what_is_nearby')}}">{{ old('nei_dintorni', $item->nei_dintorni ?? '') }}</textarea>
        </div>

        <!-- Link -->
        <div class="form-group">
            <label for="link">
                <i class="fas fa-link"></i>{{ __('custom.link') }}
            </label>
            <input type="url"
                   id="link"
                   name="link"
                   class="form-control"
                   value="{{ old('link', $item->link ?? '') }}"
                   placeholder="{ __('custom.inert_link') }}">
        </div>

        <!-- Thumbnail -->
        <div class="form-group mb-3">
            <label for="thumbnail">
                <i class="fas fa-image"></i>{{ __('general.thumbnail_upload') }}
            </label>
            <input type="file" id="thumbnail" name="thumbnail" class="form-control">
            <div id="thumbnail-preview" class="mt-3 row"></div>
        </div>

        <!-- Photos -->
        <div class="form-group mb-3">
            <label for="photos">
                <i class="fas fa-images"></i>{{ __('general.photo_upload') }}
            </label>
            <input type="file" id="photos" name="photos[]" class="form-control" multiple>
            <div id="photos-preview" class="mt-3 row"></div>
        </div>

        <!-- Attributi -->
        <div class="form-group">
            <label for="attributes"><i class="fas fa-list-ul"></i>{{ __('general.attributes') }}
            </label>
            <div class="row">
                @foreach($attributes as $attributo)
                    <div class="col-md-3 col-sm-6">
                        <div class="form-check mb-2">
                            @php
                                $selectedAttributes = $item->attributes ? $item->attributes->pluck('id')->toArray() : [];
                            @endphp

                            <input type="checkbox" id="attribute_{{ $attributo->id }}" name="attributes[]" value="{{ $attributo->id }}"
                            {{ in_array($attributo->id, $selectedAttributes) ? 'checked' : '' }} class="form-check-input">
                            <label for="attribute_{{ $attributo->id }}" class="form-check-label">{{ $attributo->name }}</label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Save Button -->
        <button type="submit" class="btn btn-primary mt-4">
            <i class="fas fa-save"></i>{{ isset($item) ? __('general.update') : __('general.save') }}
        </button>
    </form>

    @if (!empty($item->thumbnail))
        <hr class="my-5">
        <h3>{{ __('general.thumbnail') }}</h3>
        <div class="row mb-4">
            <div class="col-12 col-md-3 text-center">
                <img src="{{ asset('storage/' . $item->thumbnail->path) }}" class="img-thumbnail mb-2" alt="thumbnail">
                <form action="{{ route('items.thumbnails.destroy', $item->thumbnail->id) }}" method="POST"
                      onsubmit="return confirm('Sei sicuro di voler eliminare questa copertina?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-link text-danger p-0" title="Rimuovi immagine">
                        <i class="fas fa-times-circle"></i>
                    </button>
                </form>
            </div>
        </div>
    @endif

    @if (!empty($item->photo) && $item->photo->count() > 0)
        <hr class="my-5">
        <h3>{{ __('general.photos') }}</h3>
        <div class="row mb-4">
            @foreach ($item->photo as $photo)
                <div class="col-6 col-md-3 text-center">
                    <img src="{{ asset('storage/' . $photo->path) }}" class="img-thumbnail" alt="Item">
                    <form action="{{ route('items.photos.destroy', $photo->id) }}" method="POST"
                          onsubmit="return confirm('Sei sicuro di voler eliminare questa photo?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link text-danger p-0" title="Rimuovi immagine">
                            <i class="fas fa-times-circle"></i>
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {

        document.getElementById('thumbnail').addEventListener('change', function (event) {
            const preview = document.getElementById('thumbnail-preview');
            preview.innerHTML = '';
            const file = event.target.files[0];
            if (file) {
                const img = document.createElement('img');
                img.classList.add('img-thumbnail', 'm-2');
                img.style.height = '100px';
                img.style.width = '100px';
                const reader = new FileReader();
                reader.onload = function (e) {
                    img.src = e.target.result;
                };
                reader.readAsDataURL(file);
                preview.appendChild(img);
            }
        });

        document.getElementById('photos').addEventListener('change', function (event) {
            const preview = document.getElementById('photos-preview');
            preview.innerHTML = '';
            const files = event.target.files;
            if (files) {
                Array.from(files).forEach(file => {
                    const img = document.createElement('img');
                    img.classList.add('img-thumbnail', 'm-2');
                    img.style.height = '100px';
                    img.style.width = '100px';
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        img.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                    preview.appendChild(img);
                });
            }
        });
    });
</script>
@endpush
