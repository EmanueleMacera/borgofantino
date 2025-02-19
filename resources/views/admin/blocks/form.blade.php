@extends('layouts.admin')

@section('title', isset($block->id) ? __('general.edit') : __('general.add'))

@section('admin-content')
<div class="container mt-4 mb-4">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
        <h1 class="mb-3 mb-md-0">
            <i class="fas {{ isset($block->id) ? 'fa-edit' : 'fa-plus-circle' }}"></i>
            {{ isset($block->id) ? __('general.edit') : __('general.add') }}
        </h1>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>{{ __('general.back') }}
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ isset($block->id) ? route('blocks.update', $block->id) : route('blocks.store') }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @if(isset($block->id))
                    @method('PUT')
                @endif

                <input type="hidden" name="page_id" value="{{ isset($page) ? $page->id : '' }}">

                <div class="form-group mb-4">
                    <label for="type">
                        <i class="fas fa-layer-group"></i>
                        {{ __('general.type') }}
                    </label>
                    <select id="type" name="type" class="form-control" required>
                        <option value="">{{ __('general.select') }}</option>
                        @foreach ($blockTypes as $blockType)
                            <option
                                value="{{ strtolower(str_replace(' ', '_', $blockType)) }}"
                                {{ old('type', $block->type ?? '') === strtolower(str_replace(' ', '_', $blockType)) ? 'selected' : '' }}>
                                {{ $blockType }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="title">
                        <i class="fas fa-heading me-2"></i>{{ __('general.name') }}
                    </label>
                    <input type="text"
                           id="title"
                           name="title"
                           class="form-control"
                           value="{{ old('title', $block->title ?? '') }}"
                           placeholder="{{ __('general.enter_name') }}">
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        {{ isset($block->id) ? __('general.update') : __('general.save') }}
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
        const typeSelect = document.getElementById('type');
        const blockContents = document.querySelectorAll('[id$="-content"]');

        function updateBlockVisibility() {
            const selectedType = typeSelect.value;

            blockContents.forEach(content => content.classList.add('d-none'));

            if (selectedType) {
                const contentToShow = document.getElementById(selectedType + '-content');
                if (contentToShow) {
                    contentToShow.classList.remove('d-none');
                }
            }
        }

        updateBlockVisibility();

        typeSelect.addEventListener('change', updateBlockVisibility);
    });
</script>
@endpush
