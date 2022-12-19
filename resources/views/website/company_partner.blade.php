<!-- Brandlogo Area -->
<div class="tm-section brand-logo-area bg-grey tm-padding-section">
    <div class="container">
        <div class="brandlogo-slider tm-slider-arrow tm-slider-arrow-hovervisible">
            @foreach ($partners as $item)
                <div class="brandlogo">
                    <a href="#">
                        <img src="{{ $item->banner_image }}" alt="brand-logo">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="tm-section call-to-action-area bg-theme">
    <div class="container">
        <div class="row align-items-center tm-cta">
            <div class="col-lg-9 col-md-8 col-12">
                <div class="tm-cta-content">
                    <h3>Are you worried about abroad internship?</h3>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-12">
                <div class="tm-cta-button">
                    <a href="/contact" class="tm-button tm-button-white">Contact Us <b></b></a>
                </div>
            </div>
        </div>
    </div>
</div>
