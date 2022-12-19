  <div class="tm-section services-area bg-grey tm-padding-section">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-xl-6 col-lg-7 col-md-10 col-12">
                  <div class="tm-section-title text-center">
                      <h2>3 Easy Steps</h2>
                      <span class="divider"><i class="fa fa-superpowers"></i></span>
                  </div>
              </div>
          </div>
          <div class="row mt-30-reverse">
              @foreach ($steps as $steps_item)
                  <div class="col-lg-4 col-md-6 col-12 mt-30">
                      <div class="tm-service text-center wow fadeInUp">
                          <span class="tm-service-bgicon">
                              <i class="{{ $steps_item->icon_image_caption }}"></i>
                          </span>
                          <span class="tm-service-icon">
                              <i class="{{ $steps_item->icon_image_caption }}"></i>
                          </span>
                          <div class="tm-service-content">
                              <h5>{{ $steps_item->caption }}</h5>
                              <p>{!! $steps_item->short_content !!}</p>
                          </div>
                      </div>
                  </div>
              @endforeach



          </div>
      </div>
  </div>
