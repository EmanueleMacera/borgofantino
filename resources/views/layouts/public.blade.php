@extends('layouts.app')

@section('title', __('general.public_page'))

@section('app-content')
    <main class="flex-grow-1">
            @if (!Request::is('/'))
                @include('layouts.partials.breadcrumb')
            @endif
            @yield('content')
    </main>
    <div id="scroll-indicator" class="scroll-indicator">
        <i class="fa-solid fa-angles-down"></i>
    </div>
    @include('layouts.partials.footer')
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const scrollIndicator = document.getElementById('scroll-indicator');
    const footer = document.getElementById('footer');

    function checkScroll() {
        if (!footer) {
            return;
        }

        const footerPosition = footer.getBoundingClientRect().top;

        if (footerPosition <= window.innerHeight) {
            scrollIndicator.style.display = 'none';
        } else {
            scrollIndicator.style.display = 'block';
        }
    }

    window.addEventListener('scroll', checkScroll);
    checkScroll();
});
</script>
@endpush
