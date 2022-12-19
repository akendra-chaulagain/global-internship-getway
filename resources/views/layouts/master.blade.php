@php
    $global_setting = app\Models\GlobalSetting::all()->first();
    $normal_gallary_notice = app\Models\Navigation::query()
        ->where('nav_category', 'Main')
        ->where('page_type', '!=', 'Job')
        ->where('page_type', '!=', 'Photo Gallery')
        ->where('page_type', '!=', 'Notice')
        ->where('parent_page_id', 0)
        ->where('page_status', '1')
        ->orderBy('position', 'ASC')
        ->get();
    if (isset($normal)) {
        $seo = $normal;
    } elseif (isset($job)) {
        $seo = $job;
    }
    
    $about_link = App\Models\Navigation::find(2553)->childs;
    $home_program = App\Models\Navigation::query()
        ->where('page_type', 'Our Program')
        ->orderBy('position', 'ASC')
        ->take(3)
        ->get();
    
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


    <!-----SEO--------->

    <title> @stack('title') | {{ $seo->page_titile ?? $global_setting->page_title }}</title>
    <meta name="title" content="{{ $seo->page_titile ?? $global_setting->page_title }}">
    <meta name="description" content="{{ $seo->page_description ?? $global_setting->page_description }}">
    <meta name="keywords" content="{{ $seo->page_keyword ?? $global_setting->page_keyword }}">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta name="revisit-after" content="1 days">
    <meta name="author" content="{{ $global_setting->site_name ?? '' }}">


    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $global_setting->website_full_address ?? '' }}">
    <meta property="og:title" content="{{ $seo->page_title ?? $global_setting->page_title }}">
    <meta property="og:description" content="{{ $seo->page_description ?? $global_setting->page_description }}">
    <meta property="og:image" content="{{ $seo->banner_image ?? '/uploads/icons/' . $global_setting->site_logo }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ $global_setting->website_full_address ?? '' }}">
    <meta property="twitter:title" content="{{ $seo->page_title ?? $global_setting->page_title }}">
    <meta property="twitter:description" content="{{ $seo->page_description ?? $global_setting->page_description }}">
    <meta property="twitter:image"
        content="{{ $seo->banner_image ?? '/uploads/icons/' . $global_setting->site_logo }}">



    <!--====== Favicon Icon ======-->
    {{-- <link rel="shortcut icon" href="/website/images/favicon.png"> --}}

    <!-- Google Font (font-family: 'Karla', sans-serif;) -->
    <link href="https://fonts.googleapis.com/css?family=Karla:400,400i,700" rel="stylesheet">
    <!-- Google Font (font-family: 'Rubik', sans-serif;) -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,400i,500,700" rel="stylesheet">

    <link rel="stylesheet" href="/website/css/bootstrap.min.css">
    <link rel="stylesheet" href="/website/css/plugins.css">
    <link rel="stylesheet" href="/website/css/style.css">

    <link rel="stylesheet" href="/website/css/custom.css">
</head>

<body>

    <div id="wrapper" class="wrapper">

        {{-- header --}}
        <div class="header sticky-header">

            <!-- Header Top Area -->
            <div class="header-toparea">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 col-12">
                            <div class="header-topinfo">
                                <ul>
                                    <li><a href="#"><i class="fa fa-phone"></i>
                                            {{ $global_setting->phone }}</a></li>
                                    <li><a href="mailto:{{ $global_setting->site_email }}"><i
                                                class="fa fa-envelope-o"></i>
                                            {{ $global_setting->site_email }}</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-5 col-12">
                            <div class="footer-copyrightsocial">
                                <ul>
                                    <li><a href="{{ $global_setting->twitter }}" data-toggle="tooltip" title="Twitter"
                                            target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="{{ $global_setting->facebook }}" data-toggle="tooltip"
                                            title="Facebook" target="_blank"><i class="fa fa-facebook-f"></i></a></li>

                                    <li><a href="{{ $global_setting->linkedin }}" data-toggle="tooltip" title="Youtube"
                                            target="_blank"><i class="fa fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--// Header Top Area -->

            <!-- Header Bottom Area -->
            <div class="header-bottomarea">
                <div class="container">
                    <div class="header-bottominner">
                        <div class="header-logo">
                            <a href="/">
                                <img src="{{ '/uploads/icons/' . $global_setting->site_logo }}"
                                    alt="Global Internship Gateway">
                            </a>
                        </div>
                        <nav class="tm-navigation">


                            <ul>
                                <li><a href="/">Home</a></li>

                                @foreach ($menus as $menu)
                                    @php $submenus = $menu->childs; @endphp
                                    <li class="tm-navigation-dropdown" @if (isset($slug_detail) && $slug_detail->nav_name == $menu->nav_name)  @endif><a
                                            @if ($submenus->count() > 0) href="#" @else href="  
                                    {{ route('category', $menu->nav_name) }}" @endif>{{ $menu->caption }}</a>
                                        @if ($submenus->count() > 0)
                                            <ul>
                                                @foreach ($submenus as $sub)
                                                    <li>

                                                        <a
                                                            href="{{ route('subcategory', [$menu->nav_name, $sub->nav_name]) }}">{{ $sub->caption }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                                <li><a href="/contact">Contact</a></li>




                            </ul>




                        </nav>

                    </div>
                    <div class="header-mobilemenu clearfix">
                        <div class="tm-mobilenav"></div>
                    </div>
                </div>
            </div>


        </div>



        @yield('content')



        <div class="footer fixed-footer">

            <!-- Footer Widgets Area -->
            <div class="footer-toparea tm-padding-section" data-bgimage="/website/images/bg/footer-bg.jpg"
                data-overlay="2">
                <div class="container">
                    <div class="row widgets footer-widgets">

                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget (Widget Info) -->
                            <div class="single-widget widget-info">
                                <a href="/" class="widget-info-logo">
                                    <img src="{{ '/uploads/icons/' . $global_setting->site_logo_nepali }}"
                                        alt="footer logo">
                                </a>
                                <p> {!! $global_setting->page_description !!}</p>
                            </div>
                            <!--// Single Widget (Widget Info) -->
                        </div>

                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget (Widget Contact) -->
                            <div class="single-widget widget-quicklinks">
                                <h5 class="widget-title">Quick Links</h5>
                                <ul>
                                    @foreach ($about_link as $item)
                                        <li><a href="/about-us/{{ $item->nav_name }}">{{ $item->caption }}</a></li>
                                    @endforeach
                                    <li><a href="/contact/">Contact</a></li>

                                </ul>
                            </div>
                            <!--// Single Widget (Widget Contact) -->
                        </div>

                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget (Widget Blog) -->
                            <div class="single-widget widget-quicklinks">
                                <h5 class="widget-title">Our Program</h5>
                                <ul>
                                    @foreach ($home_program as $item)
                                        <li><a href="/detail/{{ $item->nav_name }}">{{ $item->caption }}</a></li>
                                    @endforeach


                                </ul>
                            </div>
                            <!--// Single Widget (Widget Blog) -->
                        </div>

                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget (Widget Newsletter) -->
                            <div class="single-widget widget-contact">
                                <h5 class="widget-title">Get In Touch</h5>
                                <ul>
                                    <li><i class="flaticon-mail"></i><a
                                            href="mailto:{{ $global_setting->site_email }}">{{ $global_setting->site_email }}</a>
                                    </li>
                                    <li><i class="flaticon-phone"></i><a
                                            href="tel:{{ $global_setting->phone }}">+{{ $global_setting->phone }}</a>
                                    </li>
                                    <li><i class="flaticon-pin"></i><a href="#">
                                            {{ $global_setting->website_full_address }}
                                            {{ $global_setting->address_ne }}</a> </li>
                                </ul>
                            </div>
                            <!--// Single Widget (Widget Newsletter) -->
                        </div>

                    </div>
                </div>
            </div>
            <!--// Footer Widgets Area -->

            <!-- Footer Copyright Area -->
            <div class="footer-copyrightarea">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-8 col-12">
                            <p class="footer-copyright">Copyright ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Global Internship Gateway All Rights Reserved. Developed By <a
                                    href="http://radiantnepal.com/" target="_blank">Radiant Infotech Nepal</a>
                            </p>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="footer-copyrightsocial">
                                <ul>
                                    <li><a href="{{ $global_setting->twitter }}" data-toggle="tooltip"
                                            title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="{{ $global_setting->facebook }}" data-toggle="tooltip"
                                            title="Facebook" target="_blank"><i class="fa fa-facebook-f"></i></a>
                                    </li>

                                    <li><a href="{{ $global_setting->linkedin }}" data-toggle="tooltip"
                                            title="Youtube" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--// Footer Copyright Area -->

        </div>


    </div>






    <script src="/website/js/modernizr-3.6.0.min.js"></script>
    <script src="/website/js/jquery.min.js"></script>
    <script src="/website/js/popper.min.js"></script>
    <script src="/website/js/bootstrap.min.js"></script>
    <script src="/website/js/plugins.js"></script>
    <script src="/website/js/main.js"></script>

    <script>
        lightGallery(document.getElementById('lightgallery'));

        $(function() {
            var selectedClass = "";
            $(".filter").click(function() {
                selectedClass = $(this).attr("data-rel");
                $("#lightgallery").fadeTo(100, 0.1);
                $("#lightgallery div").not("." + selectedClass).fadeOut().removeClass('animation');
                setTimeout(function() {
                    $("." + selectedClass).fadeIn().addClass('animation');
                    $("#lightgallery").fadeTo(300, 1);
                }, 300);
            });
        });
    </script>















    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @if (Session::has('contact'))
        <script>
            Swal.fire(
                'Thanks!',
                "Form submitted sucessfully!!!",
                'success'
            )
        </script>
    @endif
</body>

</html>
