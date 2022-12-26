@php
    $breed = App\Models\Navigation::find($normal->parent_page_id);
   
@endphp


@extends('layouts.master')
@push('title')
    {{ $normal->caption }}
@endpush
@section('content')
    <div class="tm-breadcrumb-area tm-padding-section text-center" data-overlay="1" data-bgimage="/website/images/bg-breadcrumb.jpg">
        <div class="container">
            <div class="tm-breadcrumb">
                <h2 class="tm-breadcrumb-title">  {{ $normal->caption }}</h2>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li>{{ $breed->caption }}</li>
                    <li> {{ $normal->caption }}</li>
                </ul>
            </div>
        </div>
    </div>

    <main class="main-content">


        <div class="tm-section about-us-area bg-white tm-padding-section">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-5">
                        <div class="tm-about-image">
                            <img class="wow fadeInLeft" src="{{ $normal->banner_image }}" alt="Global Internship Gateway">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7">
                        <div class="tm-about-content">
                            <h2> {!! $normal->short_content !!}</h2>
                            <span class="divider"><i class="fa fa-superpowers"></i></span>
                            <p>
                                {!! str_limit($normal->long_content, 600, '...') !!}

                            </p>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <p>
                            {!! substr($normal->long_content, 600, -1) !!}

                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!--// About Us Area -->


        <!-- Call To Action Area -->
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
        <!--// Call To Action Area -->

    </main>
@endsection
