<!DOCTYPE html>
<html lang="zxx" class="no-js">


@include('platform.header')


<body>

  @include('platform.navbar')

  @include('platform.start_section')

  <div id="">
    <!-- ================ Start Feature Area ================= -->
    <section class="feature-area">
      <div class="container-fluid">
        <div class="feature-inner row">
          <div class="col-lg-2 col-md-6">
            <div class="feature-item d-flex">
              <i class="ti-book"></i>
              <div class="ml-20">
                <h4>New Classes</h4>
                <p>
                  In the history of modern astronomy, there is probably no one greater leap forward.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-6">
            <div class="feature-item d-flex">
              <i class="ti-cup"></i>
              <div class="ml-20">
                <h4>Top Courses</h4>
                <p>
                  In the history of modern astronomy, there is probably no one greater leap forward.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-6">
            <div class="feature-item d-flex border-right-0">
              <i class="ti-desktop"></i>
              <div class="ml-20">
                <h4>Full E-Books</h4>
                <p>
                  In the history of modern astronomy, there is probably no one greater leap forward.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ================ End Feature Area ================= -->

    <!-- ================ Start Popular Course Area ================= -->
    <section class="popular-course-area section-gap">
      <div class="container-fluid">
        <div class="row justify-content-center section-title">
          <div class="col-lg-12">
            <h2>
              Popular Courses <br />
              Available Right Now
            </h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
              eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
          </div>
        </div>
        <div class="owl-carousel popuar-course-carusel">
        @foreach($series as $ser)
          <div class="single-popular-course" style="width:250px">
            <div class="thumb">
              <img class="f-img img-fluid mx-auto" src="{{asset($ser->image)}}" alt="" />
            </div>
            <div class="details">
              <div class="d-flex justify-content-between mb-20">
                <p class="name">{{$ser->category->name}}</p>
                <p class="value ml-3">{{$ser->plan}}</p>
              </div>
              <a href="{{route('one_series',$ser->slug)}}">
                <h4><small>{{$ser->title}}</small></h4>
                <p><small>By {{$ser->user->name}}</small></p>
              </a>
              <div class="bottom d-flex mt-15">
                <ul class="list">
                  <li>
                    <a href="#"><i class="fa fa-star"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-star"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-star"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-star"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-star"></i></a>
                  </li>
                </ul>
                <p class="ml-20">{{$series_ratings_count}} Reviews</p>
              </div>
            </div>
          </div>
        @endforeach
        </div>
      </div>
    </section>
    <!-- ================ End Popular Course Area ================= -->

    <!-- ================ Start Video Area ================= -->
    <section class="video-area section-gap-bottom">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5">
            <div class="section-title text-white">
              <h2 class="text-white">
                Watch Our Trainers <br>
                in Live Action
              </h2>
              <p>
                In the history of modern astronomy, there is probably no one greater leap forward than the building and
                launch of the space telescope known as the Hubble.
              </p>
            </div>
          </div>
          <div class="offset-lg-1 col-md-6 video-left">
            <div class="owl-carousel video-carousel">
              <div class="single-video">
                <div class="video-part">
                  <img class="img-fluid" src="{{asset('site_assets/img/video-img.jpg')}}" alt="">
                  <div class="overlay"></div>
                  <a class="popup-youtube play-btn" href="https://www.youtube.com/watch?v=VufDd-QL1c0">
                    <img class="play-icon" src="{{asset('site_assets/img/play-btn.png')}}" alt="">
                  </a>
                </div>
                <h4 class="text-white mb-20 mt-30">Learn Angular js Course for Legendary Persons</h4>
                <p class="text-white mb-20">
                  In the history of modern astronomy, there is probably no one greater leap forward than the building and
                  launch of the space telescope known as the Hubble.
                </p>
              </div>

              <div class="single-video">
                <div class="video-part">
                  <img class="img-fluid" src="{{asset('site_assets/img/video-img.jpg')}}" alt="">
                  <div class="overlay"></div>
                  <a class="popup-youtube play-btn" href="https://www.youtube.com/watch?v=VufDd-QL1c0">
                    <img class="play-icon" src="{{asset('site_assets/img/play-btn.png')}}" alt="">
                  </a>
                </div>
                <h4 class="text-white mb-20 mt-30">Learn Angular js Course for Legendary Persons</h4>
                <p class="text-white mb-20">
                  In the history of modern astronomy, there is probably no one greater leap forward than the building and
                  launch of the space telescope known as the Hubble.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ================ End Video Area ================= -->

    <!-- ================ Start Feature Area ================= -->
    <section class="other-feature-area">
      <div class="container">
        <div class="feature-inner row">
          <div class="col-lg-12">
            <div class="section-title text-left">
              <h2>
                Features That <br />
                Can Avail By Everyone
              </h2>
              <p>
                If you are looking at blank cassettes on the web, you may be
                very confused at the difference in price. You may see some for
                as low as $.17 each.
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="other-feature-item">
              <i class="ti-key"></i>
              <h4>Lifetime Access</h4>
              <div>
                <p>
                  Lorem ipsum dolor sit amet consec tetur adipisicing elit, sed
                  do eiusmod tempor incididunt labore. Lorem ipsum dolor sit
                  amet consec tetur adipisicing elit, sed do eiusmod tempor
                  incididunt labore.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt--160">
            <div class="other-feature-item">
              <i class="ti-files"></i>
              <h4>Source File Included</h4>
              <div>
                <p>
                  Lorem ipsum dolor sit amet consec tetur adipisicing elit, sed
                  do eiusmod tempor incididunt labore. Lorem ipsum dolor sit
                  amet consec tetur adipisicing elit, sed do eiusmod tempor
                  incididunt labore.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt--260">
            <div class="other-feature-item">
              <i class="ti-medall-alt"></i>
              <h4>Student Membership</h4>
              <div>
                <p>
                  Lorem ipsum dolor sit amet consec tetur adipisicing elit, sed
                  do eiusmod tempor incididunt labore. Lorem ipsum dolor sit
                  amet consec tetur adipisicing elit, sed do eiusmod tempor
                  incididunt labore.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="other-feature-item">
              <i class="ti-briefcase"></i>
              <h4>35000+ Courses</h4>
              <div>
                <p>
                  Lorem ipsum dolor sit amet consec tetur adipisicing elit, sed
                  do eiusmod tempor incididunt labore. Lorem ipsum dolor sit
                  amet consec tetur adipisicing elit, sed do eiusmod tempor
                  incididunt labore.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt--160">
            <div class="other-feature-item">
              <i class="ti-crown"></i>
              <h4>Expert Mentors</h4>
              <div>
                <p>
                  Lorem ipsum dolor sit amet consec tetur adipisicing elit, sed
                  do eiusmod tempor incididunt labore. Lorem ipsum dolor sit
                  amet consec tetur adipisicing elit, sed do eiusmod tempor
                  incididunt labore.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt--260">
            <div class="other-feature-item">
              <i class="ti-headphone-alt"></i>
              <h4>Live Supports</h4>
              <div>
                <p>
                  Lorem ipsum dolor sit amet consec tetur adipisicing elit, sed
                  do eiusmod tempor incididunt labore. Lorem ipsum dolor sit
                  amet consec tetur adipisicing elit, sed do eiusmod tempor
                  incididunt labore.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ================ End Feature Area ================= -->

    <!-- ================ Start Testimonials Area ================= -->
    <section class="testimonials-area section-gap">
      <div class="container">
        <div class="testi-slider owl-carousel" data-slider-id="1">
          <div class="row align-items-center">
            <div class="col-lg-5">
              <div class="item">
                <div class="testi-item">
                  <img src="{{asset('site_assets/img/quote.png')}}" alt="" />
                  <div class="mt-40 text">
                    <p>
                      As conscious traveling Paup ers we must always be oncerned
                      about our dear Mother Earth. If you think about it, you
                      travel across her face and She is the host to your
                      journey.
                    </p>
                  </div>
                  <h4>Fanny Spencer</h4>
                  <p>Chief Executive, Amazon</p>
                </div>
              </div>
            </div>

            <div class="offset-lg-1 col-lg-6">
              <img src="{{asset('site_assets/img/testimonial/t1.jpg')}}" alt="" />
            </div>
          </div>

          <div class="row align-items-center">
            <div class="col-lg-5">
              <div class="item">
                <div class="testi-item">
                  <img src="{{asset('site_assets/img/quote.png')}}" alt="" />
                  <div class="mt-40 text">
                    <p>
                      As conscious traveling Paup ers we must always be oncerned
                      about our dear Mother Earth. If you think about it, you
                      travel across her face <br />
                      and She is the host to your journey.
                    </p>
                  </div>
                  <h4>Fanny Spencer</h4>
                  <p>Chief Executive, Amazon</p>
                </div>
              </div>
            </div>

            <div class="offset-lg-1 col-lg-6">
              <img src="{{asset('site_assets/img/testimonial/t1.jpg')}}" alt="" />
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ================ End Testimonials Area ================= -->

    <!-- ================ Start Registration Area ================= -->
    <section class="registration-area">
      <div class="container">
        <div class="row align-items-end">
          <div class="col-lg-5">
            <div class="section-title text-left text-white">
              <h2 class="text-white">
                Watch Our Trainers <br>
                in Live Action
              </h2>
              <p>
                If you are looking at blank cassettes on the web, you may be
                very confused at the difference in price. You may see some for
                as low as $.17 each.
              </p>
            </div>
          </div>
          <div class="offset-lg-3 col-lg-4 col-md-6">
            <div class="course-form-section">
              <h3 class="text-white">Courses for Free</h3>
              <p class="text-white">It is high time for learning</p>
              <form class="course-form-area contact-page-form course-form text-right" id="myForm" action="mail.html" method="post">
                <div class="form-group col-md-12">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" onfocus="this.placeholder = ''"
                  onblur="this.placeholder = 'Name'">
                </div>
                <div class="form-group col-md-12">
                  <input type="text" class="form-control" id="subject" name="subject" placeholder="Phone Number" onfocus="this.placeholder = ''"
                  onblur="this.placeholder = 'Phone Number'">
                </div>
                <div class="form-group col-md-12">
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" onfocus="this.placeholder = ''"
                  onblur="this.placeholder = 'Email Address'">
                </div>
                <div class="col-lg-12 text-center">
                  <button class="btn text-uppercase">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ================ End Registration Area ================= -->

    <div id="app">
    
      <section class="blog-post-area section-gap">
        <div class="container-fluid">
          <div class="feature-inner row">
            <div class="col-lg-12">
              <div class="section-title text-left">
                <h2>
                  SUBSCRIBE TO <br> 
                  GET MORE COURSES
                </h2>
                  <a href="{{route('plans')}}" class="genric-btn primary circle arrow text-uppercase">GO</a>
              </div>
            </div>
          </div>
        </div>
      </section>

    </div>

    <!-- ================ End Blog Post Area ================= -->
  </div>


  @include('platform.footer')



</body>

</html>