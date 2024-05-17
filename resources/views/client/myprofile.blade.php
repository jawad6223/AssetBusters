<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from utouchdesign.com/themes/realfun/my-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Aug 2021 07:06:49 GMT -->
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
@include('includes.topbar')
  <div class="clearfix"></div>
  <!-- Header Container / End --> 
  
  <!-- Titlebar -->
  <div class="parallax titlebar" data-background="{{asset('public/assets1/images/listing-02.jpg')}}" data-color="rgba(48, 48, 48, 1)" data-color-opacity="0.8" data-img-width="800" data-img-height="505">
    <div id="titlebar">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2>My Profile</h2>
            <!-- Breadcrumbs -->
            <nav id="breadcrumbs">
              <ul>
                <li><a href="index.html">Home</a></li>
                <li>My Profile</li>
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
      <form action="{{url('client/clientmyprofileaction')}}" method="post"  enctype="multipart/form-data">
                  @csrf
                  <div class="col-md-9">
                     <div class="utf-user-profile-item">
                        <div class="utf-submit-page-inner-box">
                           <h3>My Account</h3>
                           <div class="content with-padding">
                              <div class="col-md-6">
                                 <label>Your Name</label>
                                 <input value="{{$client->name}}" name="name" required type="text">
                              </div>
                              <div class="col-md-6">	
                                 <label>Email Address</label>
                                 <input value="{{$client->email}}" name="email" required type="email">
                              </div>
                              <div class="col-md-6">	
                                 <label>Image</label>
                                 <input  name="image"  type="file">
                              </div>
                              <div class="col-md-6">
                                 <label>Contact</label>
                                 <input value="{{$client->contact}}" name="contact"  type="text">
                              </div>
                              <div class="col-md-6">
                                 <label>Type</label>
                                 <select class="utf-chosen-select-single-item"  name="usertype" id="Select">
                                 <option value="1" @if($client->user_type == 5)   {{'selected="selected"'}} @endif  >Buyer</option>
                                 <option  value="2"  @if($client->user_type == 6)   {{'selected="selected"'}} @endif >Tenant</option>
                                 <option value="3"    @if($client->user_type == 7)   {{'selected="selected"'}} @endif  >Joint venture</option>
                                 </select>
                              </div>
                              <div class="col-md-6">
                                 <label>Street</label>
                                 <input value="{{$client->street}}" name="street"  type="text">
                              </div>
                              <div class="col-md-6">
                                 <label>City</label>
                                 <input value="{{$client->city}}" name="city"type="text">
                              </div>
                              <div class="col-md-6">
                                 <label>State</label>
                                 <input value="{{$client->state}}" name="state"  type="text">
                              </div>
                              <div class="col-md-6">
                                 <label>Zip</label>
                                 <input value="{{$client->zip}}" name="zip"  type="text">
                              </div>
                              <div class="col-md-6">
                                 <label>Country</label>
                                 <input value="{{$client->country}}" required name="country" type="text">
                              </div>
                              <div class="col-md-12 margin-bottom-0">
                                 <label>Description</label>
                                 <textarea name="description" id="about" cols="20" rows="5"> {{$client->description}}</textarea>
                              </div>
                           </div>
                        </div>
                        <div class="utf-submit-page-inner-box">
                           <h3>Social Accounts</h3>
                           <div class="content with-padding">
                              <div class="col-md-6">
                                 <label><i class="icon-brand-facebook"></i> Facebook</label>
                                 <input value="{{$client->facebook}}" name="facebook" type="url">
                              </div>
                              <div class="col-md-6">
                                 <label><i class="icon-brand-twitter"></i> Twitter</label>
                                 <input value="{{$client->twitter}}" name="twitter" type="url">
                              </div>
                              <div class="col-md-6">
                                 <label><i class="icon-brand-linkedin"></i> Linkedin</label>
                                 <input value="{{$client->linkedin}}" name="linkedin" type="url">
                              </div>
                              <div class="col-md-6">
                                 <label><i class="icon-feather-instagram"></i> Instagram</label>
                                 <input value="{{$client->instagram}}" name="instagram" type="url">	
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <button class="utf-centered-button button margin-top-0 margin-bottom-20">Save Changes</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
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

      @error('image')
      <script>
         Swal.fire({
           title: ' {{$message}}',
           showClass: {
             popup: 'animate__animated animate__fadeInDown'
           },
           hideClass: {
             popup: 'animate__animated animate__fadeOutUp'
           }
         })
      </script>
      @enderror
      @error('email')
      <script>
         Swal.fire({
           title: ' {{$message}}',
           showClass: {
             popup: 'animate__animated animate__fadeInDown'
           },
           hideClass: {
             popup: 'animate__animated animate__fadeOutUp'
           }
         })
      </script>
      @enderror
      @if (session('message'))
      <script>
         Swal.fire({
           title: " {{session('message')}}",
           showClass: {
             popup: 'animate__animated animate__fadeInDown'
           },
           hideClass: {
             popup: 'animate__animated animate__fadeOutUp'
           }
         })
      </script>
      @endif
      @if (session('message1'))
      <script>
         Swal.fire({
         title: " {{session('message')}}",
         showClass: {
         popup: 'animate__animated animate__fadeInDown'
         },
         hideClass: {
         popup: 'animate__animated animate__fadeOutUp'
         }
         })
      </script>
      @endif
</body>

<!-- Mirrored from utouchdesign.com/themes/realfun/my-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Aug 2021 07:06:49 GMT -->
</html>