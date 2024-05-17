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
                        <h2>Add New Property</h2>
                        <!-- Breadcrumbs -->
                        <nav id="breadcrumbs">
                           <ul>
                              <li><a href="index.html">Home</a></li>
                              <li>Add New Property</li>
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
			   
			   <form action="{{url('seller/addpropertyaction')}}" method="post"  enctype="multipart/form-data">
         @csrf
               <!-- Submit Page -->
               <div class="col-md-9">
                  <div class="submit-page">
                     <!-- Section -->
                     <div class="utf-submit-page-inner-box">
                        <h3>Property Basic Information</h3>
                        <div class="content with-padding">
                           <div class="col-md-6">
                              <h5>Property Title</h5>
                              <input class="search-field" placeholder="Property Title" required name="title" type="text" value=""/>				  
                           </div>
                           <div class="col-md-6">
                              <h5>listing ID</h5>
                              <input class="search-field" placeholder="Listing ID"  name="propertyid" type="text" value=""/>				  
                           </div>
                           <div class="col-md-6">
                              <h5>Tenancy</h5>
                              <select class="utf-chosen-select-single-item" name="tenancy" >
                                 <option  value="0"> Select an Option</option>
                                 <option value="1">Single</option>
                                 <option value="2">Multiple</option>
                                
                              </select>
                           </div>
                           <div class="col-md-6">
                              <h5>Primary Image</h5>
                              <input class="search-field" name="image" required type="file" value=""/>				  
                           </div>
                           <div class="col-md-6">
                              <h5>Categories</h5>
                              <select class="" required name="categories">
                                 <option  value=""> Select an Option</option>
                                 @foreach($categories as $categories)
                                 <option value="{{$categories->id}}">{{$categories->name}}</option>
                                 @endforeach
                              </select>
                           </div>
                           <div class="col-md-6">
                              <h5>Type</h5>
                              <select class="" required name="type" id="my">
                                 <option  value=""> Select an Option</option>
                                 <option value="1">Sale</option>
                                 <option value="2">Leased</option>
                                 <option value="3">Auction</option>
                              </select>
                           </div>
                           <div id="demo1" style="display:none;">
                              <div class="col-md-6">
                                 <h5>Expire date</h5>
                                 <input type="date" name="expiredate">
                              </div>
                              <div class="col-md-6">
                                 <h5>Buyer Fee payable</h5>
                                 <div class="select-input disabled-first-option">
                                    <input type="text" placeholder="00000" name="buyerfee" data-unit="$">
                                 </div>
                              </div>
                           </div>
                           <div id="demo2" style="display:none;">
                              <div class="col-md-6">
                                 <h5>Leased Rate</h5>
                                 <div class="select-input disabled-first-option">
                                    <input type="text" placeholder="00000" name="leasedrate" data-unit="$">
                                 </div>
                                 
                              </div>
                              <div class="col-md-6">
                                 <h5>Available Space</h5>
                                 <div class="select-input disabled-first-option">
                                    <input type="text" placeholder="00000" name="available" data-unit="Sq Ft">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <h5>Cap Rate</h5>
                              <div class="select-input disabled-first-option">
                                 <input type="text" placeholder="00000"  name="cap" data-unit="%">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <h5>Units/Rooms/Beds</h5>
                              <div class="search-field">
                                 <input type="text" placeholder="00000"  name="room" >
                              </div>
                           </div>
                           <div class="col-md-6">
                              <h5>Total Price</h5>
                              <div class="select-input disabled-first-option">
                                 <input type="text" placeholder="00000" required name="price" data-unit="$">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <h5>lot Size</h5>
                              <div class="select-input disabled-first-option">
                                 <input type="text" placeholder="00000" name="area" data-unit="Sq Ft">
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Section / End --> 
                     <!-- Section -->
                     <div class="utf-submit-page-inner-box">
                        <h3>Property Information</h3>
                        <div class="content with-padding">
                           <div class="col-md-12">
                              <h5> Description</h5>
                              <textarea id="editor" rows="5" name="description"></textarea>
                           </div>
                           <div class="col-md-4">
                              <h5>Building Size</h5>
                              <div class="select-input disabled-first-option">
                                    <input type="text" placeholder="00000" name="height" data-unit="Sq Ft">
</div>			  
                           </div>
                           <div class="col-md-4">
                              <h5>Frontage</h5>
                              <div class="select-input disabled-first-option">
                                 <input type="text" placeholder="00000" name="frontage" data-unit="Sq Ft">
                              </div>
                           </div>
                           <div class="col-md-4">
                              <h5>Year Built</h5>
                              <input class="search-field" placeholder="2021" name="yearbluit" type="text" value=""/>				  
                           </div>
                           <div class="col-md-12">
                              <h5 class="margin-top-15">Other Features <span>(optional)</span></h5>
                              <div class="checkboxes in-row margin-bottom-20">
                                 <input id="check-2" type="checkbox" name="newlunch">
                                 <label for="check-2">New Lunch</label>
                                 <input id="check-3" type="checkbox" name="lighting">
                                 <label for="check-3">Lighting</label>
                                 <input id="check-4" type="checkbox" name="gas" >
                                 <label for="check-4">Gas</label>
                                 <input id="check-5" type="checkbox" name="water">
                                 <label for="check-5">Water</label>
                                 <input id="check-6" type="checkbox" name="heating">
                                 <label for="check-6">Heating</label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Section / End --> 
                     <!-- Section -->
                     <div class="utf-submit-page-inner-box">
                        <h3>Property Location</h3>
                        <div class="content with-padding">
                           <div class="col-md-6">
                              <h5>Street</h5>
                              <input type="text" name="street" placeholder="Street">
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
                              <input type="text" name="zip" placeholder="Zip Code">
                           </div>
                           <div class="col-md-4">
                              <h5>Country</h5>
                              <input type="text" name="country" placeholder="Country Name">
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
      <script>
         $('#my').on('change', function() {
         var value = $(this).val();

         var x = document.getElementById("demo1");
         
         if(value == 3){
         x.style.display = "block";
         }
         else {
         x.style.display = "none";
         }
         
         });
      </script>

<script>
         $('#my').on('change', function() {
         var value = $(this).val();
         
         
         
         var x = document.getElementById("demo2");
         
         if(value == 2){
         x.style.display = "block";
         }
         else {
         x.style.display = "none";
         }
         
         });
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
	  @error('price')
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
   <!-- Mirrored from utouchdesign.com/themes/realfun/add-new-property.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Aug 2021 07:06:50 GMT -->
</html>