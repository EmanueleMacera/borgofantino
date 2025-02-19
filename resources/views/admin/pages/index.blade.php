@extends('layouts.admin')

@section('title', __('general.manage'))

@section('admin-content')
<div class="container mt-4 mb-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
        <h1 class="text-center flex-grow-1">{{ __('general.manage') }}</h1>
        <a href="{{ route('pages.form.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i>{{ __('general.add') }}
        </a>
    </div>

    @if ($pages->isEmpty())
        <div class="alert-info">
            {{ __('general.no_available') }}
            <a href="{{ route('pages.form.create') }}" class="alert-link">{{ __('general.add') }}</a>.
        </div>
    @else
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered responsive">
                        <thead class="thead-light">
                            <tr>
                                <th>{{ __('general.title') }}</th>
                                <th>{{ __('general.status') }}</th>
                                <th>{{ __('general.last_update') }}</th>
                                <th>{{ __('general.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pages as $page)
                            <tr>
                                <td>
                                    <strong>{{ $page->title }}</strong><br>
                                    @if (!$page->homepage)
                                        <a class="small text-muted" href="{{ url($page->slug) }}" target="_blank">
                                            {{ url($page->slug) }}
                                        </a>
                                    @else
                                        <a class="small text-muted" href="{{ url('/') }}" target="_blank">
                                            {{ url('/') }}
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @if($page->status === 'publish')
                                        <span class="badge bg-success">
                                            <i class="fas fa-check-circle"></i>{{ __('general.public') }}
                                        </span>
                                    @else
                                        <span class="badge bg-secondary">
                                            <i class="fas fa-pencil-alt"></i>{{ __('general.draft') }}
                                        </span>
                                    @endif
                                </td>
                                <td>{{ $page->updated_at->format('d/m/Y H:i') }}</td>
                                <td class="d-flex flex-wrap">
                                    <a href="{{ route('pages.form.edit', $page->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i>{{ __('general.edit') }}
                                    </a>
                                    <a href="{{ route('blocks.index', ['page_id' => $page->id]) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-th-large"></i>{{ __('general.manage') }}
                                    </a>
                                    <form action="{{ route('pages.destroy', $page->id) }}" method="POST" class="d-inline" onsubmit="return confirm('{{ __('general.are_you_sure_delete') }}');">
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
            </div>
        </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {

    document.querySelectorAll('table.responsive').forEach(function(table) {
        const headers = [];

        table.querySelectorAll('thead th').forEach(function(th) {
            headers.push(th.textContent.trim());
        });

        table.querySelectorAll('tbody tr').forEach(function(tr) {
            tr.querySelectorAll('td').forEach(function(td, index) {
                td.setAttribute('data-label', headers[index] || '');
            });
        });
    });
});
</script>
@endpush
