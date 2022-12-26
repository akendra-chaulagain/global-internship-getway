

<div class="tm-section funfact-area tm-padding-section tm-parallax" data-bgimage="/website/images/bg-image-1.jpeg" data-overlay="9">
    <div class="container">
        <div class="row tm-funfact-wrapper">

            @foreach ($statistics as $statistics_item)
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="tm-funfact wow fadeInUp">
                        <span class="tm-funfact-icon">
                            <i class="{{ $statistics_item->icon_image_caption }}"></i>
                        </span>
                        <div class="tm-funfact-content">
                            <span class="odometer" data-count-to="{{ $statistics_item->caption }}"></span>
                            <h5>{!! $statistics_item->short_content !!}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
