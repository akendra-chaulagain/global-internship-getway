@php
      $breed = App\Models\Navigation::find($Team_category->parent_page_id);
   
@endphp


@extends('layouts.master')
@push('title')
    {{ $Team_category->caption }}
@endpush
@section('content')
    <!-- Breadcrumb Area -->
    <div class="tm-breadcrumb-area tm-padding-section text-center" data-overlay="1" data-bgimage="/website/images/bg-breadcrumb.jpg">
        <div class="container">
            <div class="tm-breadcrumb">
                <h2 class="tm-breadcrumb-title">{{ $Team_category->caption }}</h2>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li>{{ $breed->caption }}</li>
                    <li>{{ $Team_category->caption }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!--// Breadcrumb Area -->

    <!-- Main Content -->
    <main class="main-content">

        <!-- Team Area -->
        <div class="tm-section team-members-area bg-grey tm-padding-section">
            <div class="container">
                <div class="row mt-30-reverse">

                    @foreach ($Teams as $item)
                        <div class="col-lg-3 col-md-6 col-12 mt-30">
                            <div class="tm-member wow fadeInUp">
                                <div class="tm-member-top">
                                    @if ($item->banner_image)
                                        <img src="{{ $item->banner_image }}" alt="team member">
                                    @else
                                        <img src="/website/images/team-member-1.jpg" alt="author image">
                                    @endif

                                    <div class="tm-member-social">
                                        <ul>
                                            <li><a href="{{ $item->extra_two }}" target="_blank"><i
                                                        class="fa fa-twitter"></i></a></li>
                                            <li><a href="{{ $item->extra_one }}" target="_blank"><i
                                                        class="fa fa-facebook-f"></i></a></li>
                                            <li><a href="{{ $item->extra_three }}" target="_blank"><i
                                                        class="fa fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tm-member-bottom">
                                    <h5>{{ $item->caption }}</h5>
                                    <p>{!! $item->short_content !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach






                </div>
            </div>
        </div>
        <!--// Team Area -->


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
