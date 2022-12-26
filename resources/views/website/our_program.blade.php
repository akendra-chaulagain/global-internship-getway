@php
    $breed = App\Models\Navigation::find($program_category->parent_page_id);
@endphp




@extends('layouts.master')
@push('title')
    {{ $program_category->caption }}
@endpush
@section('content')
    <div class="tm-breadcrumb-area tm-padding-section text-center" data-overlay="1" data-bgimage="/website/images/bg-breadcrumb.jpg">
        <div class="container">
            <div class="tm-breadcrumb">
                <h2 class="tm-breadcrumb-title"> {{ $program_category->caption }}</h2>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li>{{ $breed->caption }}</li>
                    <li>{{ $program_category->caption }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!--// Breadcrumb Area -->

    <!-- Main Content -->
    <main class="main-content">

        <!-- Our Program -->
        <div class="tm-section portfolios-area bg-grey tm-padding-section">
            <div class="container">

                <div class="row tm-portfolio-wrapper mt-30-reverse">
                    @foreach ($programs as $programs_item)
                        <div class="col-lg-4 col-md-6 col-12 tm-portfolio-item">
                            <div class="tm-portfolio mt-30 wow fadeInUp">
                                <div class="tm-portfolio-image">
                                    <img src="{{ $programs_item->banner_image }}" alt="portfolio image">
                                    <ul class="tm-portfolio-actions">
                                        <li class="link-button">
                                            <a href="/detail/{{ $programs_item->nav_name }}"><i class="fa fa-link"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tm-portfolio-content">
                                    <h5><a href="/detail/{{ $programs_item->nav_name }}">{{ $programs_item->caption }}</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!--// Our Program -->


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
    <!--// Main Content -->
@endsection
