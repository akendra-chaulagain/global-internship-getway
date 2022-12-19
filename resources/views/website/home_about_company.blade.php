@php
    $about_breed = App\Models\Navigation::find(2554);
@endphp
<main class="page-content">
    <div class="tm-section about-us-area bg-white tm-padding-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-5">
                    <div class="tm-about-image">
                        <img class="wow fadeInLeft" src="{{ $about->banner_image }}" alt="Global Internship Gateway">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <div class="tm-about-content">
                        <h2>{{ $about->caption }}</h2>
                        <span class="divider"><i class="fa fa-superpowers"></i></span>
                        <p>{!! $about->short_content !!}</p>
                        <a href="/about-us/{{ $about_breed->nav_name }}" class="tm-button">Read More <b></b></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
