<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from utouchdesign.com/themes/realfun/single-property-page-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Aug 2021 07:06:49 GMT -->
@include('includes.head')

<body>
<!-- Preloader Start -->
<div class="preloader">
    <div class="utf-preloader">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<!-- Preloader End -->

<!-- Wrapper -->
<div id="wrapper"> 
 
  
  <!-- Header Container -->
  @include('includes.topbar')
  <!-- Header Container / End --> 
  
  <!-- Titlebar -->
  <div class="parallax titlebar" data-background="{{asset('public/assets1/images/listing-02.jpg')}}" data-color="rgba(48, 48, 48, 1)" data-color-opacity="0.8" data-img-width="800" data-img-height="505">
    <div id="titlebar">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2> Contact </h2>
            <!-- Breadcrumbs -->
            <nav id="breadcrumbs">
              <ul>
                <li><a href="{{url('home')}}">Home</a></li>
                <li>Contact </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <form action="{{url('contactaction')}}" method="post">
    @csrf
  <div class="container">
     <div class="row">
         <div class="col-md-5"></div>
    
  <div class="utf-user-profile-item">
            <div class="utf-submit-page-inner-box">
				<h3>Countact Us</h3>

				<div class="content with-padding">
					<div class="col-md-6">
						<label>Your Name</label>
						<input  type="text" required name="name">
					</div>
			
					<div class="col-md-6">
						<label>Phone Number</label>
						<input  type="text" required name="contact">
					</div>
					<div class="col-md-6">	
						<label>Email Address</label>
						<input type="text" required name="email">
					</div>
                    <div class="col-md-6">
						<label>Subject</label>
						<input value="" required type="text" name="subject">
					</div>
					<div class="col-md-12 margin-bottom-0">
						<label>Message</label>
						<textarea name="about" required id="about" cols="20" rows="5" name="description"></textarea>
					</div>
				</div>	
      			
			</div>
		
			<div class="row">
				<div class="col-md-12">
					<button class="utf-centered-button button margin-top-0 margin-bottom-20">Send</button>
				</div>
			</div>
          </div> 
        

          </div>
          </form>
 </div>   
   

		
  
  <!-- Footer -->
  <div class="margin-top-65"></div>
  @include('includes.footer')
  <!-- Footer / End --> 
  
  
<!-- Wrapper / End -->
 
  
<!-- Scripts --> 

<script src="{{asset('public/assets1/scripts/jquery-3.3.1.min.js')}}"></script> 
<script src="{{asset('public/assets1/scripts/bootstrap.min.js')}}"></script>
<script src="{{asset('public/assets1/scripts/chosen.min.js')}}"></script> 
<script src="{{asset('public/assets1/scripts/magnific-popup.min.js')}}"></script> 
<script src="{{asset('public/assets1/scripts/owl.carousel.min.js')}}"></script> 
<script src="{{asset('public/assets1/scripts/rangeSlider.js')}}"></script> 
<script src="{{asset('public/assets1/scripts/sticky-kit.min.js')}}"></script> 
<script src="{{asset('public/assets1/scripts/slick.min.js')}}"></script> 
<script src="{{asset('public/assets1/scripts/masonry.min.js')}}"></script> 
<script src="{{asset('public/assets1/scripts/mmenu.min.js')}}"></script> 
<script src="{{asset('public/assets1/scripts/tooltips.min.js')}}"></script> 
<script src="{{asset('public/assets1/scripts/typed.js')}}"></script>
<script src="{{asset('public/assets1/scripts/custom_jquery.js')}}"></script> 

<!-- Maps --> 
<script src="https://maps.googleapis.com/maps/api/js?key=&amp;libraries=places"></script> 
<script src="scripts/infobox.min.js"></script> 
<script src="scripts/markerclusterer.js"></script> 
<script src="scripts/maps.js"></script>  


@if (session('message88'))
<script>
   Swal.fire({
position: 'top-end',
icon: 'success',
title: 'Successfully Send Message',
showConfirmButton: false,
timer: 5000
})
</script>
@endif

@if (session('message89'))
<script>
   Swal.fire({
position: 'top-end',
icon: 'success',
title: 'Try Again',
showConfirmButton: false,
timer: 5000
})
</script>
@endif

</body>

<!-- Mirrored from utouchdesign.com/themes/realfun/single-property-page-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Aug 2021 07:06:49 GMT -->
</html>