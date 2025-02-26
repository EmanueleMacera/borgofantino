<div class="container gallery-container">
    
    <div class="tz-gallery row" style="--bs-gutter-x: 0.5rem;">

            <div class="col-sm-12 col-md-4">
                <a class="lightbox" href="{{ asset('assets/custom/gallery/gallery_1.WebP') }}">
                    <img src="{{ asset('assets/custom/gallery/gallery_1.WebP') }}" alt="Gallery 1">
                </a>
            </div>
            <div class="col-sm-6 col-md-4">
                <a class="lightbox" href="{{ asset('assets/custom/gallery/gallery_2.WebP') }}">
                    <img src="{{ asset('assets/custom/gallery/gallery_2.WebP') }}" alt="Gallery 2">
                </a>
            </div>
            <div class="col-sm-6 col-md-4">
                <a class="lightbox" href="{{ asset('assets/custom/gallery/gallery_3.WebP') }}">
                    <img src="{{ asset('assets/custom/gallery/gallery_3.WebP') }}" alt="Gallery 3">
                </a>
            </div>

            <div class="col-sm-12 col-md-8">
                <a class="lightbox" href="{{ asset('assets/custom/gallery/gallery_4.WebP') }}">
                    <img src="{{ asset('assets/custom/gallery/gallery_4.WebP') }}" alt="Gallery 4">
                </a>
            </div>
            <div class="col-sm-4 col-md-4">
                <a class="lightbox" href="{{ asset('assets/custom/gallery/gallery_5.WebP') }}">
                    <img src="{{ asset('assets/custom/gallery/gallery_5.WebP') }}" alt="Gallery 5">
                </a>
                <a class="lightbox" href="{{ asset('assets/custom/gallery/gallery_6.WebP') }}">
                    <img src="{{ asset('assets/custom/gallery/gallery_6.WebP') }}" alt="Gallery 6">
                </a>
            </div>

            <div class="col-sm-4 col-md-4">
                <a class="lightbox" href="{{ asset('assets/custom/gallery/gallery_7.WebP') }}">
                    <img src="{{ asset('assets/custom/gallery/gallery_7.WebP') }}" alt="Gallery 7">
                </a>
                <a class="lightbox" href="{{ asset('assets/custom/gallery/gallery_8.WebP') }}">
                    <img src="{{ asset('assets/custom/gallery/gallery_8.WebP') }}" alt="Gallery 8">
                </a>
            </div>
            <div class="col-sm-12 col-md-8">
                <a class="lightbox" href="{{ asset('assets/custom/gallery/gallery_9.WebP') }}">
                    <img src="{{ asset('assets/custom/gallery/gallery_9.WebP') }}" alt="Gallery 9">
                </a>
            </div>

            <div class="col-sm-12 col-md-4">
                <a class="lightbox" href="{{ asset('assets/custom/gallery/gallery_10.WebP') }}">
                    <img src="{{ asset('assets/custom/gallery/gallery_10.WebP') }}" alt="Gallery 10">
                </a>
            </div>
            <div class="col-sm-6 col-md-4">
                <a class="lightbox" href="{{ asset('assets/custom/gallery/gallery_11.WebP') }}">
                    <img src="{{ asset('assets/custom/gallery/gallery_11.WebP') }}" alt="Gallery 11">
                </a>
            </div>
            <div class="col-sm-6 col-md-4">
                <a class="lightbox" href="{{ asset('assets/custom/gallery/gallery_12.WebP') }}">
                    <img src="{{ asset('assets/custom/gallery/gallery_12.WebP') }}" alt="Gallery 12">
                </a>
            </div>

            <div class="col-sm-12 col-md-8">
                <a class="lightbox" href="{{ asset('assets/custom/gallery/gallery_13.WebP') }}">
                    <img src="{{ asset('assets/custom/gallery/gallery_13.WebP') }}" alt="Gallery 13">
                </a>
            </div>
            <div class="col-sm-4 col-md-4">
                <a class="lightbox" href="{{ asset('assets/custom/gallery/gallery_14.WebP') }}">
                    <img src="{{ asset('assets/custom/gallery/gallery_14.WebP') }}" alt="Gallery 14">
                </a>
                <a class="lightbox" href="{{ asset('assets/custom/gallery/gallery_15.WebP') }}">
                    <img src="{{ asset('assets/custom/gallery/gallery_15.WebP') }}" alt="Gallery 15">
                </a>
            </div>
    </div>

</div>

@push ('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>
@endpush
