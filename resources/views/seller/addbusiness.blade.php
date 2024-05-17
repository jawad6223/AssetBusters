<!DOCTYPE html>
<html lang="en">
   <!-- Mirrored from utouchdesign.com/themes/realfun/add-new-Business.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Aug 2021 07:06:49 GMT -->
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
                        <h2>Add New Business</h2>
                        <!-- Breadcrumbs -->
                        <nav id="breadcrumbs">
                           <ul>
                              <li><a href="index.html">Home</a></li>
                              <li>Add New Business</li>
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
               <form action="{{url('seller/addbusinessaction')}}" method="post"  enctype="multipart/form-data">
               @csrf
               <div class="col-md-9">
                  <div class="submit-page">
                     <!-- Section -->
                     <div class="utf-submit-page-inner-box">
                        <h3>Business Basic Information</h3>
                        <div class="content with-padding">
                           <div class="col-md-6">
                              <h5>Business Title</h5>
                              <input class="search-field" placeholder="Business Title" required name="title" type="text" value=""/>				  
                           </div>
                           <div class="col-md-6">
                              <h5>Business ID</h5>
                              <input class="search-field" placeholder="Business ID"   name="businessid" type="text" value=""/>				  
                           </div>
                           <div class="col-md-6">
                              <h5>Primary Image</h5>
                              <input class="search-field" name="image" required type="file" value=""/>				  
                           </div>
						   <div class="col-md-6">
                              <h5>Total Price</h5>
                              <div class="select-input disabled-first-option">
                                 <input type="text" placeholder="00000" required name="totalprice"  data-unit="$" >
                              </div>
                           </div>
                           <div class="col-md-6">
                              <h5>Categories</h5>
                              <select class="utf-chosen-select-single-item" name="categories" >
                                 <option label="blank" value=""></option>
                                 @foreach($categories as $categories)
                                 <option value="{{$categories->id}}">{{$categories->name}}</option>
                                 @endforeach
                              </select>
                           </div>
						   
                           <div class="col-md-6">
                              <h5>Type</h5>
                              <select class="utf-chosen-select-single-item" name="type">
                                 <option label="blank" value=""></option>
                                 <option value="1">For Sale </option>
                               
                              </select>
                           </div>
						 
                           <div class="col-md-6">
                              <h5>Asking Price</h5>
                              <div class="select-input disabled-first-option">
                                 <input type="text" placeholder="00000" name="askingprice"  data-unit="$" >
                              </div>
                           </div>
                           <div class="col-md-6">
                              <h5>Gross Revenue</h5>
                              <div class="select-input disabled-first-option">
                                 <input type="text" placeholder="00000"  name="grossrevenue" data-unit="$">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <h5>Cash Flow</h5>
                              <div class="select-input disabled-first-option">
                                 <input type="text" placeholder="00000" name="cashflow"  data-unit="$">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <h5>Real Estate</h5>
                              <select class="utf-chosen-select-single-item" name="realestate">
                                 <option label="blank"></option>
                                 <option value="1">Owned</option>
                                 <option value="2">Leased</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <!-- Section / End --> 
                     <!-- Section -->
                     <div class="utf-submit-page-inner-box">
                        <h3>Business Information</h3>
                        <div class="content with-padding">
                           <div class="col-md-12">
                              <h5>Description</h5>
                              <textarea id="editor" name="description" rows="5" ></textarea>
                           </div>
                           <div class="col-md-12 ">
                              <h5>Reason of Saling</h5>
                              <textarea cols="20" rows="2" id="summary"  name="reason"> </textarea>
                           </div>
                           <div class="col-md-6">
                              <h5>Support And Traning</h5>
                              <textarea cols="20" rows="2" id="summary"  name="support"> </textarea>
                           </div>
                           <div class="col-md-6">
                              <h5>Inventory</h5>
                              <textarea cols="20" rows="2" id="summary"  name="inventory"> </textarea>
                           </div>
                           <div class="col-md-6">
                              <h5>Employees</h5>
                              <input class="search-field"  type="number" name="employees" value=""/>				  
                           </div>
                           <div class="col-md-6">
                              <h5>Year Bluit</h5>
                              <input class="search-field" name="yearbluit"  type="text" value=""/>				  
                           </div>
                        </div>
                     </div>
                     <!-- Section / End --> 
                     <!-- Section -->
                     <div class="utf-submit-page-inner-box">
                        <h3>Business Location</h3>
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
                           <button  class="utf-centered-button button" type="submit">Upload Gallery</button>
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
      <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
      <script>
         ClassicEditor.create( document.querySelector( '#editor' ) )
                  .catch( error => {
              console.error( error );
           } );
           
      </script>

	  
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
	  @error('totalprice')
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
	  @error('title')
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
   </body>
   <!-- Mirrored from utouchdesign.com/themes/realfun/add-new-Business.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Aug 2021 07:06:50 GMT -->
</html>