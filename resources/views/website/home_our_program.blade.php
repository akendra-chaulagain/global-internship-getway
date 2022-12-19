 @php
     $home_program = App\Models\Navigation::query()
         ->where('page_type', 'Our Program')
         ->orderBy('position', 'ASC')
         ->take(3)
         ->get();
 @endphp

 <div class="tm-section portfolios-area bg-grey tm-padding-section">
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-xl-6 col-lg-7 col-md-10 col-12">
                 <div class="tm-section-title text-center">
                     <h2>Latest Program</h2>
                     <span class="divider"><i class="fa fa-superpowers"></i></span>
                 </div>
             </div>
         </div>

         <div class="row tm-portfolio-wrapper mt-30-reverse">

             <!-- Portfolio Single -->
             @foreach ($home_program as $item)
                 <div class="col-lg-4 col-md-6 col-12 tm-portfolio-item">
                     <div class="tm-portfolio mt-30 wow fadeInUp">
                         <div class="tm-portfolio-image">
                             <img src="{{ $item->banner_image }}" alt="portfolio image">
                             <ul class="tm-portfolio-actions">
                                 <li class="link-button">
                                     <a href="/detail/{{ $item->nav_name }}"><i class="fa fa-link"></i></a>
                                 </li>
                             </ul>
                         </div>
                         <div class="tm-portfolio-content">
                             <h5><a href="/detail/{{ $item->nav_name }}">
                                
                                  {{ Str::limit($item->caption, 35) }}
                            
                            
                            </a></h5>
                         </div>
                     </div>
                 </div>
             @endforeach

             <!--// Portfolio Single -->



         </div>
         {{-- <div class="row">
             <div class="col-lg-12">
                 <div class="tm-portfolio-loadmore text-center mt-50">
                     <a href="program-list.html" class="tm-button">View All<b></b></a>
                 </div>
             </div>
         </div> --}}
     </div>
 </div>
