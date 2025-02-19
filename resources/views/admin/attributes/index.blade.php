@extends('layouts.admin')

@section('title', __('general.manage'))

@section('admin-content')
<div class="container mt-4 mb-4">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
        <h1 class="text-center flex-grow-1 mb-3 mb-md-0">{{ __('general.manage') }}</h1>
        <div class="d-flex flex-column flex-md-row">
            <a href="{{ route('attributes.createAttributeCategory') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i>{{ __('general.category') }}
            </a>
            <a href="{{ route('attributes.form.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i>{{ __('general.attributes') }}
            </a>
        </div>
    </div>

    <!-- Display Macro Categories -->
    @foreach ($attributeCategories as $macroCategory)
        <div class="card shadow-sm mb-4">
            <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-center">
                <h2 class="mb-3 mb-md-0">
                    <i class="{{ $macroCategory->icon }}"></i>{{ $macroCategory->name }}
                </h2>
                <div class="d-flex flex-column flex-md-row">
                    <a href="{{ route('attributes.editAttributeCategory', $macroCategory) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit"></i>{{ __('general.edit') }}
                    </a>
                    <form action="{{ route('attributes.deleteAttributeCategory', $macroCategory->id) }}"
                          method="POST"
                          class="d-inline"
                          onsubmit="return confirm('{{ __('general.are_you_sure_delete') }}');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash-alt"></i>{{ __('general.delete') }}
                        </button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                @if ($macroCategory->attributes->isEmpty())
                    <div class="alert-info">
                        {{ __('general.no_available') }}
                        <a href="{{ route('attributes.form.create') }}" class="alert-link">{{ __('general.add') }}</a>.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th>{{ __('general.name') }}</th>
                                    <th>{{ __('general.icon') }}</th>
                                    <th>{{ __('general.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($macroCategory->attributes as $attribute)
                                    <tr>
                                        <td>{{ $attribute->name }}</td>
                                        <td><i class="{{ $attribute->icon }}"></i></td>
                                        <td>
                                            <a href="{{ route('attributes.form.edit', $attribute) }}" class="btn btn-sm btn-primary me-2">
                                                <i class="fas fa-edit"></i>{{ __('general.edit') }}
                                            </a>
                                            <form action="{{ route('attributes.delete', $attribute->id) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('{{ __('general.are_you_sure_delete') }}');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash-alt"></i>{{ __('general.delete') }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    @endforeach
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Automatically hide success alerts after 4 seconds
        const alertElement = document.querySelector('.alert');
        if (alertElement) {
            setTimeout(() => {
                alertElement.style.transition = 'opacity 0.3s';
                alertElement.style.opacity = '0';
                setTimeout(() => alertElement.remove(), 300);
            }, 4000);
        }
    });
</script>
@endpush
