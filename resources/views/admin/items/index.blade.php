@extends('layouts.admin')

@section('title', __('general.manage'))

@section('admin-content')
<div class="container mt-4 mb-4">
    
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
        <h1 class="text-center flex-grow-1 mb-3 mb-md-0">{{ __('general.manage') }}</h1>
        <a href="{{ route('items.form.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i>{{ __('general.add') }}
        </a>
    </div>

    @if ($items->isEmpty())
        <div class="alert-info">
            {{ __('general.no_available') }}
            <a href="{{ route('items.form.create') }}" class="alert-link">{{ __('general.add') }}</a>.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>{{ __('general.name') }}</th>
                        <th>{{ __('general.category') }}</th>
                        <th>{{ __('general.status') }}</th>
                        <th>{{ __('general.last_update') }}</th>
                        <th>{{ __('general.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>
                                @if($item->status === 'publish')
                                    <span class="badge badge-success">
                                        <i class="fas fa-check-circle"></i>{{ __('general.public') }}
                                    </span>
                                @else
                                    <span class="badge badge-secondary">
                                        <i class="fas fa-pencil-alt"></i>{{ __('general.draft') }}
                                    </span>
                                @endif
                            </td>
                            <td>{{ $item->updated_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('items.form.edit', $item->id) }}"
                                   class="btn btn-sm btn-primary me-2"
                                   title="{{ __('general.edit') }}">
                                    <i class="fas fa-edit"></i>{{ __('general.edit') }}
                                </a>
                                <form action="{{ route('items.destroy', $item->id) }}"
                                      method="POST"
                                      class="d-inline-block"
                                      onsubmit="return confirm('{{ __('general.are_you_sure_delete') }}')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            title="{{ __('general.delete') }}">
                                        <i class="fas fa-trash-alt"></i>{{ __('general.delete') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $items->links() }}
        </div>
    @endif
</div>
@endsection
