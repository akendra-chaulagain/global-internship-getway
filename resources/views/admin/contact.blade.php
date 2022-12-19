@php
    $global_setting = app\Models\GlobalSetting::all()->first();
    
@endphp


@extends('layouts.master')

@push('title')
    Contact
@endpush

@section('content')
    <div class="tm-breadcrumb-area tm-padding-section text-center" data-overlay="1" data-bgimage="images/bg-breadcrumb.jpg">
        <div class="container">
            <div class="tm-breadcrumb">
                <h2 class="tm-breadcrumb-title">Contact Us</h2>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </div>
    <!--// Breadcrumb Area -->

    <!-- Main Content -->
    <main class="main-content">

        <!-- Contact Us -->
        <div class="tm-section contact-us-area tm-padding-section bg-white">
            <div class="container">
                <div class="row justify-content-center mt-30-reverse">

                    <div class="col-lg-4 col-md-6 col-12 mt-30">
                        <div class="tm-contact-block text-center">
                            <span class="tm-contact-icon">
                                <i class="flaticon-pin"></i>
                            </span>
                            <h5>Address</h5>
                            <p>{{ $global_setting->website_full_address }}
                                {{ $global_setting->address_ne }}</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12 mt-30">
                        <div class="tm-contact-block text-center">
                            <span class="tm-contact-icon">
                                <i class="flaticon-phone"></i>
                            </span>
                            <h5>Phone</h5>
                            <p><a href="#">{{ $global_setting->phone }} {{ $global_setting->phone_ne }}</a></p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12 mt-30">
                        <div class="tm-contact-block text-center">
                            <span class="tm-contact-icon">
                                <i class="flaticon-mail"></i>
                            </span>
                            <h5>Email</h5>
                            <p><a href="mailto:globalinternship.np@gmail.com">{{ $global_setting->site_email }}</a></p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="container tm-padding-section-top">
                <div class="row no-gutters">
                    <div class="col-lg-7">
                        <div class="tm-contact-formwrapper">
                            <h5>Let’s get in touch</h5>
                            <form action="{{ route('contactstore') }}" method="POST" id="tm-contactform" class="tm-form"
                                enctype='multipart/form-data'>
                                @csrf
                                <div class="tm-form-inner">
                                    <div class="tm-form-field">
                                        <input type="text" name="name" placeholder="Name*">
                                    </div>
                                    <div class="tm-form-field">
                                        <input type="email" name="email" placeholder="Email*">
                                    </div>
                                    <div class="tm-form-field">
                                        <input type="number" name="number" placeholder="Number*">
                                    </div>
                                    <div class="tm-form-field">
                                        <textarea name="message" cols="30" rows="5" placeholder="Message*"></textarea>
                                    </div>
                                    <div class="tm-form-field">
                                        <button type="submit" class="tm-button">Send Message <b></b></button>
                                    </div>
                                </div>
                            </form>
                            <p class="form-messages"></p>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="tm-contact-map">
                            

                                {!! $global_setting->page_keyword !!}
                               
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--// Contact Us -->



    </main>
@endsection
