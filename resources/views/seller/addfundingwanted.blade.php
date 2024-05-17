<!DOCTYPE html>
<html lang="en">
   <!-- Mirrored from utouchdesign.com/themes/realfun/add-new-property.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Aug 2021 07:06:49 GMT -->
   <head>
      @include('includes.head')
      <style>
      </style>
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
                        <h2>Add New Industries</h2>
                        <!-- Breadcrumbs -->
                        <nav id="breadcrumbs">
                           <ul>
                              <li><a href="index.html">Home</a></li>
                              <li>Industries</li>
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
               <div class="col-md-3">
                  @include('seller.includes.sidebar')
               </div>
               <!-- Submit Page -->
               <form action="{{url('seller/addfundingwantedaction')}}" method="post"  enctype="multipart/form-data">
               @csrf
               <div class="col-md-9">
                  <div class="submit-page">
                     <!-- Section -->
                     <div class="utf-submit-page-inner-box">
                        <h3>Basic Information</h3>
                        <div class="content with-padding">
                           <div class="col-md-6">
                              <h5>Title</h5>
                              <input class="search-field" name="title"  required type="text" value=""/>				  
                           </div>
                           <div class="col-md-6">
                              <h5>Primary Image </h5>
                              <input class="search-field" required name="image" type="file" value=""/>				  
                           </div>
                           <div class="col-md-6">
                              <h5>Industries</h5>
                              <select class="utf-chosen-select-single-item" required name="funding_type_id" >
                                 <option label="blank" value=""> Select an option</option>
                                
                                 <option value="1">Agriculture / Cannabis</option>
                                 <option value="2"> Crypto / Blockchain</option>
                                 <option value="3"> Entertainment / Film / TV</option>
                                 <option value="4"> Green Energy / Solar / Renewables</option>
                                 <option value="5"> Hotels / Restaurants / Bars</option>

                                 
                                 <option value="6">Internet / Online / Tech</option>
                                 <option value="7"> Medical / Pharma / Biotech</option>
                                 <option value="8"> Mining / Metals</option>
                                 <option value="9"> Oil & Gas</option>
                                 <option value="10"> Real Estate</option>
                              
                              </select>
                           </div>

                           <div class="col-md-12">
                              <h5> Description</h5>
                              <textarea id="editor" name="description" rows="5" ></textarea>
                           </div>
                        </div>
                     </div>
                     <!-- Section / End --> 
                     <!-- Section -->
                     <div class="utf-submit-page-inner-box">
                        <h3> Location</h3>
                        <div class="content with-padding">
                           <div class="col-md-6">
                              <h5>Street</h5>
                              <input type="text" name="street" placeholder="Address">
                           </div>
                           <div class="col-md-6">
                              <h5>City </h5>
                              <input type="text" name="city" placeholder="City Name">
                           </div>
                           <div class="col-md-4">
                              <h5>State</h5>
                              <input type="text" name="state" placeholder="State">
                           </div>
                           <div class="col-md-4">
                              <h5>Zip-Code</h5>
                              <input type="text" name="zip" placeholder="000000">
                           </div>
                           <div class="col-md-4">
                              <h5>Country</h5>
                              <input type="text" name="country" placeholder="000000">
                           </div>
                        </div>
                     </div>
                     <!-- Section / End --> 
                     <div class="row">
                        <div class="col-md-12">
                           <button class="utf-centered-button button">Upload Gallery</button>
                        </div>
                     </div>
                  </div>
               </div>
</form>
            </div>
         </div>
         <!-- Footer -->
         <div class="margin-top-65"></div>
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
         <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
         @include('includes.footer')
         <!-- Footer / End --> 
         <!-- Back To Top Button -->
         <div id="backtotop"><a href="#"></a></div>
      </div>
      <script>
         ClassicEditor.create( document.querySelector( '#editor' ) )
                  .catch( error => {
              console.error( error );
           } );
           
      </script>
  
   </body>
   <!-- Mirrored from utouchdesign.com/themes/realfun/add-new-property.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Aug 2021 07:06:50 GMT -->
</html>