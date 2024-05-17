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
                     <h2> Signup </h2>
                     <!-- Breadcrumbs -->
                     <nav id="breadcrumbs">
                        <ul>
                           <li><a href="{{url('home')}}">Home</a></li>
                           <li>signup </li>
                        </ul>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <form action="{{url('seller/sellersignupaction')}}" method="post"  enctype="multipart/form-data">
         @csrf
         <div class="container">
            <div class="row">
            <div class=" col-md-4"> </div>
               <div class=" col-md-5">
                   
               
               <div class="utf-user-profile-item">
                  <div class="utf-submit-page-inner-box">

                     <h3>Signup  as Seller</h3>
                     <div class="content with-padding">

                     <div class="utf-welcome-text-item mt-1">
               <p style="font-size:25px;line-height:0px;"> <b >Create your account </b></p>
               <p>Enter your personal details to create account</p>
            </div>

                        <div class="utf-no-border">
                           <label>Your Name</label>
                           <input  type="text" name="name" required>

                        </div>
                        <div class="utf-no-border">	
                           <label>Email Address</label>
                           <input type="email" name="email"  required/>
                        </div>
                        <div class="utf-no-border">
                  <label>Password:</label>
                  <input type="password" name="password" id="" placeholder="" required/>

               </div>
                 
            
               
               <div class="utf-no-border"  style="padding-left:0px;">
                  <label>Seller Type:</label>
            

                  <select class="from-control" name="usertype"  required="required" id="Select">
                     <option value=""> Select an option</option>
                     <option value="1">Owner</option>
                    
                     <option value="3">Funding Sources</option>
                     <option  value="4">Broker</option>
					</select>
               </div>
               <div class="utf-no-border">
                  <label>Image:</label>
                  <input type="file" name="image" id="" placeholder="" required/>
          
               </div>
               <div class="utf-welcome-text-item">
               <span>Already Have an Account <a href="{{url('seller/login')}}" >Login!</a></span> 
            </div>

               
                     </div>
                  </div>
                  
                  <div class="row">
                     <div class="col-md-12">
                        <button class="utf-centered-button button margin-top-0 margin-bottom-20">Register</button>
                     </div>


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
      
      
      @error('password')
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

   </body>
   <!-- Mirrored from utouchdesign.com/themes/realfun/single-property-page-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Aug 2021 07:06:49 GMT -->
</html>