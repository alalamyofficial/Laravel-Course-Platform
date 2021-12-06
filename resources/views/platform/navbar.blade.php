  <!-- ================ Start Header Area ================= -->
  <header class="default-header">
    <nav class="navbar navbar-expand-lg  navbar-light">
      <div class="container">
        <a class="navbar-brand" href="/">
          <!-- <img src="{{asset('site_assets/img/logo.png')}}" alt="" /> -->
              @if($settings == null)
                <h2>Temp</h2>
              @else
              <b style="color:white">
                  {{$settings->site_name}}
              </b>
              @endif    
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="lnr lnr-menu"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li><a href="/">Home</a></li>
            <li><a href="{{route('about')}}">About</a></li>
            <li><a href="{{route('courses')}}">Courses</a></li>
            <!-- Dropdown -->
            <li class="dropdown">
              <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                Categories
              </a>
              <div class="dropdown-menu">
                @foreach($categories as $category)
                  <a class="dropdown-item" href="{{route('category_series',$category->name)}}">
                    {{$category->name}}
                  </a>
                @endforeach	
              </div>
            </li>

              @include('auth')

            <li><a href="{{route('contact')}}">Contacts</a></li>

            
            <li>
              <small>
                @include('search')
              </small>
            </li>

          </ul>
        </div>
      </div>
    </nav>

  </header>
  <!-- ================ End Header Area ================= -->