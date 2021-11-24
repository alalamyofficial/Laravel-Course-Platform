<!DOCTYPE html>
<html lang="zxx" class="no-js">


@include('platform.header')


<body>

@include('platform.navbar')

<section class="banner-area">
    <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-12 banner-right">
            <h1 class="text-white">
              Courses
            </h1>
            <p class="mx-auto text-white  mt-20 mb-40">
              In the history of modern astronomy, there is probably no one greater leap forward than the building.
            </p>
            <div class="link-nav">
              <span class="box">
                <a href="index.html">Home </a>
                <i class="lnr lnr-arrow-right"></i>
                <a href="courses.html">Courses</a>
              </span>
            </div>
          </div>
        </div>
    </div>
 </section>

<br><br><hr><br>

<div class="container">
    <div class="row" style="margin-left:50px">
          @foreach($category_series as $ser)
              <div class="col-lg-4 col-md-6 col-sm-12">
                  <div class="mt-3">
                      <div class="owl-item active" 
                          style="width: 250px;"><div class="single-popular-course">
                          <div class="thumb">
                                  <img class="f-img img-fluid mx-auto" 
                                      src="{{asset($ser->image)}}" alt="">
                              </div>
                              <div class="details">
                                  <div class="d-flex justify-content-between mb-20">
                                  <p class="name">{{$ser->category->name}}</p>
                                  <p class="value" style="background-color: aliceblue;">{{$ser->plan}}</p>
                                  </div>
                                  <a href="{{route('one_series',$ser->slug)}}">
                                  <h4>{{$ser->title}}</h4>
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
                                          <small class="ml-20">25 Reviews</small>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          @endforeach

    </div>
</div>

<br><br><hr><br>






  @include('platform.footer')

</body>

</html>