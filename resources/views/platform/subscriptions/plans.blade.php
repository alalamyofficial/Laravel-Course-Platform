
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
              Plans
            </h1>
            <p class="mx-auto text-white  mt-20 mb-40">
              In the history of modern astronomy, there is probably no one greater leap forward than the building.
            </p>
          </div>
        </div>
    </div>
 </section>

<br><br><br>




    <div class="container mb-5 mt-5">
        <div class="pricing card-deck flex-column flex-md-row mb-3">
            @foreach($plans as $plan)
            <div class="card card-pricing text-center px-3 mb-4"> 
                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">
                    {{$plan->title}}
                </span>
            <div class="bg-transparent card-header pt-4 border-0">
                <h1 class="h1 font-weight-normal text-primary text-center mb-0" data-pricing-value="15">
                <span class="price">
                    @if($plan->title == 'Basic')
                        <b>10 $</b>
                    @elseif($plan->title == 'Premium')
                        <b>50 $</b>    
                    @elseif($plan->title == 'Gold')
                        <b>100 $</b>
                    @else
                        <b>No Price Yet</b>   
                    @endif         
                </span>
                <span class="h6 text-muted ml-2">/ per month</span></h1>
            </div><hr>
            <div class="card-body pt-0">
                <ul class="list-unstyled mb-4">
                    <li>Unlimited Courses</li>
                    <li>Basic support</li>
                    <li>Monthly updates</li>
                    <li>Free cancelation</li>
                    <li>Live Sections</li>
                </ul> 
                <a href="{{ route('payments', ['plan' => $plan->identifier]) }}" class="btn btn-outline-secondary mb-3 hvr">Order now</a>
            </div>
            </div>
            @endforeach
        </div>
    </div>



<br><br><br>






@include('platform.footer')

</body>

</html>



