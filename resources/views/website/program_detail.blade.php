@extends('layouts.master')
@push('title')
    {{ $program_details->caption }}
@endpush
@section('content')
    <div class="tm-breadcrumb-area tm-padding-section text-center" data-overlay="1" data-bgimage="/website/images/bg-breadcrumb.jpg">
        <div class="container">
            <div class="tm-breadcrumb">
                <h2 class="tm-breadcrumb-title"> {{ $program_details->caption }}</h2>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="#">Our Program</a></li>
                    <li> {{ $program_details->caption }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!--// Breadcrumb Area -->

    <!-- Main Content -->
    <main class="main-content">

        <!-- Portfolio Details Area -->
        <div class="tm-section portfolio-details-area bg-white tm-padding-section">
            <div class="container">
                <div class="tm-portfoliodetails">
                    <div class="tm-portfoliodetails-content">
                        <div class="row">
                            <div class="col-xl-4 col-lg-5">

                                <div class="tm-portfoliodetails-image mb-15">
                                    <a href=" {{ $program_details->banner_image }}">
                                        <img src=" {{ $program_details->banner_image }}"
                                            alt="International OJT Program : Train & Intern in Malaysian Hospitality">
                                    </a>
                                </div>

                            </div>
                            <div class="col-xl-8 col-lg-7">
                                <div class="tm-portfoliodetails-description">
                                    <h3>Program Detail</h3>
                                    <p> {!! str_limit($program_details->long_content, 950, '...') !!}</p>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12">
                                <div class="tm-portfoliodetails-description">
                                    <p>
                                        {!! substr($program_details->long_content, 950, -1) !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--// Portfolio Details Area -->


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
