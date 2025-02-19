@php
    $breadcrumbs = \App\Helpers\BreadcrumbHelper::generate();
@endphp

<nav aria-label="breadcrumb" class="container my-3 mb-3">
    <ol class="breadcrumb small flex-wrap">
        @foreach ($breadcrumbs as $breadcrumb)
            @if (!$loop->last)
                <li class="breadcrumb-item">
                    <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a>
                </li>
            @else
                <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb['label'] }}</li>
            @endif
        @endforeach
    </ol>
</nav>
