  <!-- ================ start footer Area ================= -->
  <footer class="footer-area section-gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-md-6 single-footer-widget">
					<h4>Top Products</h4>
					<ul>
						<li><a href="#">Managed Website</a></li>
						<li><a href="#">Manage Reputation</a></li>
						<li><a href="#">Power Tools</a></li>
						<li><a href="#">Marketing Service</a></li>
					</ul>
				</div>
				<div class="col-lg-2 col-md-6 single-footer-widget">
					<h4>Quick Links</h4>
					<ul>
						<li><a href="#">Jobs</a></li>
						<li><a href="#">Brand Assets</a></li>
						<li><a href="#">Investor Relations</a></li>
						<li><a href="#">Terms of Service</a></li>
					</ul>
				</div>
				<div class="col-lg-2 col-md-6 single-footer-widget">
					<h4>Features</h4>
					<ul>
						<li><a href="#">Jobs</a></li>
						<li><a href="#">Brand Assets</a></li>
						<li><a href="#">Investor Relations</a></li>
						<li><a href="#">Terms of Service</a></li>
					</ul>
				</div>
				<div class="col-lg-2 col-md-6 single-footer-widget">
					<h4>Categories</h4>
					<ul>
  						@foreach($categories as $category)
							<li><a>{{$category->name}}</a></li>
						@endforeach	
					</ul>
				</div>
				<div class="col-lg-4 col-md-6 single-footer-widget">
					<h4>Newsletter</h4>
					<p>You can trust us. we only send promo offers,</p>
					<div class="form-wrap" id="mc_embed_signup">
						<form action="{{route('newsLetter')}}" method="post" class="form-inline">
						@csrf
							<input class="form-control" name="email" placeholder="Your Email Address" 
							 onfocus="this.placeholder = ''" 
							 onblur="this.placeholder = 'Your Email Address '"
							 required="" type="email">
							<button type="submit" class="click-btn btn btn-default text-uppercase">subscribe</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</footer>
  <!-- ================ End footer Area ================= -->

  <script src="{{asset('site_assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
    crossorigin="anonymous"></script>
  <script src="{{asset('site_assets/js/vendor/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  <!-- <script src="{{asset('site_assets/js/jquery.ajaxchimp.min.js')}}"></script> -->
  <script src="{{asset('site_assets/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('site_assets/js/parallax.min.js')}}"></script>
  <script src="{{asset('site_assets/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('site_assets/js/jquery.sticky.js')}}"></script>
  <script src="{{asset('site_assets/js/hexagons.min.js')}}"></script>
  <script src="{{asset('site_assets/js/jquery.counterup.min.js')}}"></script>
  <script src="{{asset('site_assets/js/waypoints.min.js')}}"></script>
  <script src="{{asset('site_assets/js/jquery.nice-select.min.js')}}"></script>
  <script src="{{asset('site_assets/js/main.js')}}"></script>
  <script src="https://vjs.zencdn.net/7.15.4/video.min.js"></script>



   <!-- <script src='plugins/js/videojs.thumbnails.js'></script> -->


