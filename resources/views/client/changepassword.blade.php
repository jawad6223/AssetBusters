<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from utouchdesign.com/themes/realfun/change-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Aug 2021 07:06:50 GMT -->
<head>
@include('includes.head')
</head>

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
  <div class="clearfix"></div>
  <!-- Header Container / End --> 
  
  <!-- Titlebar -->
  <div class="parallax titlebar" data-background="{{asset('public/assets1/images/listing-02.jpg')}}" data-color="rgba(48, 48, 48, 1)" data-color-opacity="0.8" data-img-width="800" data-img-height="505">
    <div id="titlebar">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2>Change Password</h2>
            <!-- Breadcrumbs -->
            <nav id="breadcrumbs">
              <ul>
                <li><a href="index.html">Home</a></li>
                <li>Change Password</li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Content -->
  <div class="container">
    <div class="row"> 
      <!-- Widget -->
      <div class="col-md-3">
      @include('client.includes.sidebar')
      </div>
      <form action="{{url('client/changepasswordaction')}}" method="post"  enctype="multipart/form-data">
         @csrf
         
      <div class="col-md-9">
        <div class="utf-user-profile-item">
          <div class="utf-submit-page-inner-box">
			<h3>Change Password</h3>
			<div class="content with-padding">
				<div class="col-md-4">
					<label>Current Password</label>
					<input type="password" name="oldpassword" required placeholder="*********">
				</div>
				<div class="col-md-4">
					<label>New Password</label>
					<input type="password" name="newpassword" required placeholder="*********">
				</div>
				<div class="col-md-4">
					<label>Confirm New Password</label>
					<input type="password" name="confirmpassword" required placeholder="*********">
				</div>
			</div>			
		  </div>  
		  <div class="row">
			<div class="col-md-12">
				<button  class="utf-centered-button button">Save Changes</button>
			</div>
		  </div>	
        </div>
      </div>
    </div>
  </div>
  
  <!-- Footer -->
  <div class="margin-top-65"></div>
 @include('includes.footer')
  <!-- Footer / End --> 
  
  <!-- Back To Top Button -->
  <div id="backtotop"><a href="#"></a></div>

</div>
<!-- Wrapper / End -->
  
<!-- Scripts --> 
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

      @if (session('message'))
<script>
   Swal.fire({
position: 'top-end',
icon: 'success',
title: 'Successfully Update Password',
showConfirmButton: false,
timer: 5000
})
</script>
@endif
@if (session('error'))
<script>
Swal.fire(
  'Old Password does not match try again',
  'You clicked the button!',
)
</script>
@endif


@error('confirmpassword')
<script>
Swal.fire(
  '{{$message}}',
  'You clicked the button!',
)
</script>
@enderror

<!-- Mirrored from utouchdesign.com/themes/realfun/change-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Aug 2021 07:06:50 GMT -->
</html>