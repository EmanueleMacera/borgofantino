@extends('layouts.admin')

@section('title', __('general.manage'))

@section('admin-content')
<div class="container mt-4 mb-4">
    
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
        <h1 class="text-center flex-grow-1 mb-3 mb-md-0">{{ __('general.manage') }}</h1>
        <div class="d-flex flex-column flex-md-row">
            <a href="{{ route('category-types.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i>{{ __('general.macro_category') }}
            </a>
            <a href="{{ route('categories.form.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i>{{ __('general.category') }}
            </a>
        </div>
    </div>
    @foreach ($categoriesByType as $group)
        <div class="card shadow-sm mb-4">
            <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-center">
                <h2 class="mb-3 mb-md-0">{{ $group['type']->name }}</h2>
                <div class="d-flex flex-column flex-md-row">
                    <a href="{{ route('category-types.edit', $group['type']->id) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit"></i>{{ __('general.edit') }}
                    </a>
                    <form action="{{ route('category-types.delete', $group['type']->id) }}" method="POST" class="d-inline" onsubmit="return confirm('{{ __('general.are_you_sure_delete') }}');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash-alt"></i>{{ __('general.delete') }}
                        </button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                @if ($group['categories']->isEmpty())
                    <div class="alert-info">
                        {{ __('general.no_available') }}
                        <a href="{{ route('categories.form.create') }}" class="alert-link">{{ __('general.add') }}</a>.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th>{{ __('general.name') }}</th>
                                    <th>{{ __('general.thumbnail') }}</th>
                                    <th>{{ __('general.status') }}</th>
                                    <th>{{ __('general.last_update') }}</th>
                                    <th>{{ __('general.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($group['categories'] as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            @if ($category->thumbnail)
                                                <img src="{{ asset('storage/' . $category->thumbnail) }}" alt="thumbnail" class="img-thumbnail" width="100">
                                            @else
                                                <i class="fas fa-times-circle"></i>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($category->status === 'public')
                                                <span class="badge badge-success">
                                                    <i class="fas fa-check-circle"></i>{{ __('general.active') }}
                                                </span>
                                            @else
                                                <span class="badge badge-secondary">
                                                    <i class="fas fa-pencil-alt"></i>{{ __('general.draft') }}
                                                </span>
                                            @endif
                                        </td>
                                        <td>{{ $category->updated_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('categories.form.edit', $category->id) }}"
                                               class="btn btn-sm btn-primary me-2"
                                               title="{{ __('general.edit') }}">
                                                <i class="fas fa-edit"></i>{{ __('general.edit') }}
                                            </a>
                                            <form action="{{ route('categories.destroy', $category->id) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('{{ __('general.are_you_sure_delete') }}');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="{{ __('general.delete') }}">
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
        // Automatically hide alerts after 4 seconds
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
