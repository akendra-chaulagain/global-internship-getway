@php
    $breed = App\Models\Navigation::find($Client_category->parent_page_id);
    
@endphp

@extends('layouts.master')

@push('title')
    {{ $Client_category->caption }}
@endpush


@section('content')
    <div class="tm-breadcrumb-area tm-padding-section text-center" data-overlay="1" data-bgimage="images/bg-breadcrumb.jpg">
        <div class="container">
            <div class="tm-breadcrumb">
                <h2 class="tm-breadcrumb-title"> {{ $Client_category->caption }}</h2>
                <ul>
                    <li><a href="/">Home</a></li>

                    <li>{{ $breed->caption }}</li>
                    <li> {{ $Client_category->caption }}</li>
                </ul>
            </div>
        </div>
    </div>

    <main class="main-content">

        {{-- client page --}}
        <div class="container">
            <div class="row">
                @foreach ($Clients as $item)
                    <div class="col-md-3">
                        <img src="{{ $item->banner_image }}" alt="">
                    </div>
                @endforeach


            </div>
        </div>






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
