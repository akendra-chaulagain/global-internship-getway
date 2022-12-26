 <div class="tm-section testimonial-area tm-padding-section tm-parallax" data-overlay="9"
     data-bgimage="/website/images/bg/bg-image-2.jpg">
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-xl-6 col-lg-7 col-md-10 col-12">
                 <div class="tm-section-title tm-section-title-white text-center">
                     <h2>What they say</h2>
                     <span class="divider"><i class="fa fa-superpowers"></i></span>
                 </div>
             </div>
         </div>
         <div class="row testimonial-slider-active">

             <!-- Testimonial -->
             @foreach ($testimonials as $testimonials_item)
                 <div class="col-lg-6">
                     <div class="tm-testimonial">
                         <div class="tm-testimonial-content">
                             <i class="fa fa-quote-right"></i>
                             <p>{!! $testimonials_item->long_content !!}.</p>
                         </div>
                         <div class="tm-testimonial-bottom">
                             <div class="tm-testimonial-authorimage">
                                 @if ($testimonials_item->banner_image)
                                     <img src="{{ $testimonials_item->banner_image }}" alt="author image">
                                 @else
                                     <img src="/website/images/team-member-1.jpg" alt="author image">
                                 @endif
                             </div>
                             <div class="tm-testimonial-authorcontent">
                                 <h5>{{ $testimonials_item->caption }}</h5>
                                 @if ($testimonials_item->short_content)
                                     <p>{!! $testimonials_item->short_content !!}</p>
                                 @else
                                 @endif

                             </div>
                         </div>
                     </div>
                 </div>
             @endforeach

             <!--// Testimonial -->


         </div>
     </div>
 </div>
