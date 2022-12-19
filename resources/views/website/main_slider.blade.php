
 <div class="heroslider">
     <div class="heroslider-slider heroslider-animted tm-slider-arrow">

         <!-- Heroslider Item -->
         	@foreach ($sliders as $slider)
         <div class="heroslider-wrapper">
             <div class="heroslider-single" data-bgimage="{{ $slider->banner_image }}" data-black-overlay="8">
                 <div class="container">
                     <div class="row justify-content-center">
                         <div class="col-xl-8 col-lg-10">
                             <div class="heroslider-content text-center">
                                 <div class="heroslider-animatebox">
                                     <h1>
                                         <span>{{ $slider->caption }}</span>
                                     </h1>
                                 </div>
                                 <div class="heroslider-animatebox">
                                     <p>If you’re looking for an internship abroad, you’re in the right place!</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         @endforeach
         <!--// Heroslider Item -->

      


     </div>
 </div>
