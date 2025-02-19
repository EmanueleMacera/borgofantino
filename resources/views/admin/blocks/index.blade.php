@extends('layouts.admin')

@section('title', __('general.manage') . ' ' . $page->title)

@section('admin-content')
<div class="container mt-4 mb-4">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
        <h1 class="text-center flex-grow-1 mb-3 mb-md-0">
            {{ __('general.manage') . ' "' . $page->title . '"' }}
        </h1>
        <div class="d-flex flex-column flex-md-row">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i>{{ __('general.back') }}
            </a>
            <a href="{{ route('blocks.form.create', ['page_id' => $page->id]) }}" class="btn btn-success">
                <i class="fas fa-plus"></i>{{ __('general.add') }}
            </a>
        </div>
    </div>

    @if ($blocks->isEmpty())
        <div class="alert-info">
            {{ __('general.no_available') }}
            <a href="{{ route('blocks.form.create', ['page_id' => $page->id]) }}" class="alert-link">{{ __('general.add') }}</a>.
        </div>
    @else
        <ul id="blocks-list" class="list-group">
            @foreach($blocks as $block)
                <li data-id="{{ $block->id }}"
                    class="list-group-item mb-2 shadow-sm rounded d-flex flex-wrap justify-content-between align-items-center bg-white">

                    <div class="handle d-flex align-items-center mb-2 mb-md-0">
                        <span class="me-3 text-muted">
                            <i class="fas fa-grip-vertical"></i>
                        </span>
                        <div>
                            <strong>{{ $block->title ?? __('general.untitled_block') }}</strong>
                            <span class="text-muted"> ({{ ucfirst($block->type) }})</span>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap">
                        <a href="{{ route('blocks.form.edit', ['block' => $block->id, 'page_id' => $page->id]) }}"
                           class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i>{{ __('general.edit') }}
                        </a>
                        <form action="{{ route('blocks.destroy', ['block' => $block->id, 'page_id' => $page->id]) }}"
                              method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('{{ __('general.are_you_sure_delete') }}')">
                                <i class="fas fa-trash-alt"></i>{{ __('general.delete') }}
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const blocksList = document.getElementById('blocks-list');
        if (!blocksList) {
            return;
        }
        const sortable = new Sortable(blocksList, {
            animation: 150,
            handle: '.handle',
            ghostClass: 'sortable-ghost',
            onEnd: function (evt) {
                const order = [];
                document.querySelectorAll('#blocks-list li').forEach(item => {
                    order.push(item.dataset.id);
                });

                fetch('{{ route("blocks.updateOrder") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        blocks: order,
                        page_id: {{ $page->id }}
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('{{ __('general.updated_successfully') }}');
                    } else {
                        alert('{{ __('general.error_updating') }}');
                    }
                })
                .catch(err => console.error('Errore durante la richiesta:', err));
            }
        });
    });
</script>
@endpush
