@extends('layouts.admin')

@section('title', __('general.system_logs'))

@section('admin-content')
<div class="container mt-4 mb-4">
    <h1 class="mb-4 text-center">{{ __('general.system_logs') }}</h1>
    <div class="row mb-4">
        <div class="col-12 col-md-6 mb-3 mb-md-0">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ __('general.select_date') }}</h5>
                    <input type="date" id="date" name="date" class="form-control" value="{{ $date }}">
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ __('general.filter_by_log_type') }}</h5>
                    <div class="form-group">
                        @foreach (['error' => 'danger', 'warning' => 'warning', 'info' => 'info'] as $type => $class)
                            <div class="form-check form-switch">
                                <input class="form-check-input log-type" type="checkbox" id="{{ $type }}" name="log_type[]" value="{{ $type }}"
                                    {{ in_array($type, $logType) ? 'checked' : '' }}>
                                <label class="form-check-label" for="{{ $type }}">
                                    <i class="fas fa-{{ $type === 'error' ? 'exclamation-circle' : ($type === 'warning' ? 'exclamation-triangle' : 'info-circle') }} text-{{ $class }}"></i>
                                    {{ ucfirst(__($type)) }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group mt-3">
                        <label for="order">{{ __('general.order_by') }}:</label>
                        <select id="order" name="order" class="form-control">
                            <option value="desc" {{ request('order') == 'desc' ? 'selected' : '' }}>{{ __('general.newest_first') }}</option>
                            <option value="asc" {{ request('order') == 'asc' ? 'selected' : '' }}>{{ __('general.oldest_first') }}</option>
                        </select>
                    </div>
                    <button id="update-logs-button" class="btn btn-primary mt-3">{{ __('general.update') }}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="logs-list row mb-4">
        @if ($logsPaginated->count() > 0)
            @foreach ($logsPaginated as $log)
                <div class="col-12 mb-3">
                    <div class="log-item alert-{{ $log['type'] }} shadow-sm p-3">
                        <div class="d-flex justify-content-between flex-wrap">
                            <span>{{ $log['message'] }}</span>
                            <small class="text-muted">{{ $log['date'] }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-12">
                {{ $logsPaginated->appends(request()->query())->links() }}
            </div>
        @else
            <div class="col-12">
                <p class="text-center">{{ __('general.no_available') }}</p>
            </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        function updateLogs() {
            const date = document.querySelector('#date').value;
            const logTypes = Array.from(document.querySelectorAll('.log-type:checked')).map(el => el.value);
            const order = document.querySelector('#order').value;

            if (!date) {
                alert('{{ __("management.please_select_a_valid_date") }}');
                return;
            }

            let url = `{{ route('logs') }}?date=${encodeURIComponent(date)}&order=${encodeURIComponent(order)}`;
            logTypes.forEach(type => {
                url += `&log_type[]=${encodeURIComponent(type)}`;
            });

            window.location.href = url;
        }

        const button = document.getElementById('update-logs-button');
        if (button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                updateLogs();
            });
        }
    });
</script>
@endpush
