<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from utouchdesign.com/themes/realfun/forgot_password.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Aug 2021 07:07:46 GMT -->
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
            <h2>Forgot Password</h2>
            <!-- Breadcrumbs -->
            <nav id="breadcrumbs">
              <ul>
                <li><a href="index.html">Home</a></li>
                <li>Forgot Password</li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Contact --> 
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="my-account">
          <div class="tabs-container"> 
            <!-- Login -->
			  <div class="utf-welcome-text-item">
				<h3>Forgot Your Password?</h3>
				<span>Enter your email address below and we'll send you email with password</span> 
			  </div>
              <form method="post" action="{{url('seller/sellerforgetaction')}}"  class="login">
                 @csrf
                <div class="form-row form-row-wide">
                    <input type="email" required class="input-text" name="email" id="email" placeholder="Email Address" value="" />
                </div>
                <input type="submit" class="button full-width border margin-top-10" name="Send Recovery Email" value="Send Recovery Email" />				
				<div class="forget-text margin-top-15">
				
				</div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Container / End --> 
  
  <!-- Footer -->
  <div class="margin-top-65"></div>
  @include('includes.footer')
  <!-- Footer / End --> 
  
<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>

</div>
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
      <script src="{{asset('public/assets1/scripts/dropzone.js')}}"></script> 
            @if (session('message'))

<script>
   Swal.fire({
position: 'top-end',
icon: 'success',
title: 'Email does not Exist',
showConfirmButton: false,
timer: 4000
})
</script>
@endif

         @if (session('message1'))

<script>

   Swal.fire({
position: 'top-end',
icon: 'success',
title: 'Successfully Send Recevory Email',
showConfirmButton: false,
timer: 4000
})
</script>
@endif

   @if (session('message2'))

<script>
   Swal.fire({
position: 'top-end',
icon: 'success',
title: 'Error',
showConfirmButton: false,
timer: 4000
})
</script>
@endif
</body>

<!-- Mirrored from utouchdesign.com/themes/realfun/forgot_password.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Aug 2021 07:07:46 GMT -->
</html>