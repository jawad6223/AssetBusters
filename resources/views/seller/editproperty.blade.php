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
                        <h2>Edit Property</h2>
                        <!-- Breadcrumbs -->
                        <nav id="breadcrumbs">
                           <ul>
                              <li><a href="index.html">Home</a></li>
                              <li>Edit Property</li>
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
               <form action="{{url('seller/editpropertyaction')}}" method="post"  enctype="multipart/form-data">
               @csrf
               <div class="col-md-9">
                  <div class="submit-page">
                     <!-- Section -->
                     <div class="utf-submit-page-inner-box">
                        <h3>Property Basic Information</h3>
                        <div class="content with-padding">
                           <div class="col-md-6">
                              <h5>Property Title</h5>
							  <input   name="id" value="{{$property->id}}" type="hidden" />				  

                              <input class="search-field" placeholder="Property Title" name="title" value="{{$property->title}}" type="text" />				  
                           </div>
                           <div class="col-md-6">
                              <h5>Property ID</h5>
                              <input class="search-field" placeholder="Property ID"  name="propertyid" value="{{$property->property_id}}" type="text" />				  
                           </div>
                           <div class="col-md-6">
                              <h5>Tenancy</h5>
                              <select class="utf-chosen-select-single-item" name="tenancy" >
                                 <option  value="0"> Select an Option</option>
                                 <option value="1" @if($property->tenancy== 1)   {{'selected="selected"'}} @endif>Single</option>
                              <option value="2" @if($property->tenancy== 2)   {{'selected="selected"'}} @endif>Multiple </option>
                             

                             
                                
                              </select>
                           </div>
                           <div class="col-md-6">
                              <h5>Primary Image</h5>
                              <input class="search-field" name="image" type="file" value=""/>				  
                           </div>
                           <div class="col-md-6">
                              <h5>Categories</h5>
                              <select class="utf-chosen-select-single-item" name="categories">
                              @foreach($categories as $categories)
                              <option @if($property->property_categories== $categories->id)   {{'selected="selected"'}} @endif  value="{{$categories->id}}">{{$categories->name}}</option>
                              @endforeach
                              </select>
                           </div>
                           <div class="col-md-6">
                              <h5>Type</h5>
                              <select class="utf-chosen-select-single-item"  name="type" id="my">

                              <option value="1" @if($property->property_type== 1)   {{'selected="selected"'}} @endif>Sale</option>
                              <option value="2" @if($property->property_type== 2)   {{'selected="selected"'}} @endif>Leased</option>
                              <option value="3" @if($property->property_type== 3)   {{'selected="selected"'}} @endif>Auction</option>
                              </select>
                           </div>
                           <div id="demo1"  
						 @if($property->property_type == 3 )  
						   style="display:block;"
						   @endif
						   style="display:none;"  >
                              <div class="col-md-6">
                                 <h5>Expire date</h5>
                                 <input type="date" name="expiridate" value="{{$property->expire_date}}">
                              </div>
                              <div class="col-md-6">
                                 <h5>Buyer Fee payable</h5>
                                 <div class="select-input disabled-first-option">
                                    <input type="text" placeholder="00000" name="buyerfee" value="{{$property->buyer_fee}}" data-unit="$">
                                 </div>
                              </div>
                           </div>

                           <div id="demo2"   @if($property->property_type == 2 )  
						   style="display:block;"
						   @endif
						   style="display:none;" >
                              <div class="col-md-6">
                                 <h5>Leased Rate</h5>
                                 <div class="select-input disabled-first-option">
                                    <input type="text" placeholder="00000"  value="{{$property->leased_rate}}"
                                    name="leasedrate" data-unit="$">
                                 </div>
                                 
                              </div>
                              <div class="col-md-6">
                                 <h5>Available Space</h5>
                                 <div class="select-input disabled-first-option">
                                    <input type="text" placeholder="00000" name="available" value="{{$property->available_space}}" data-unit="Sq Ft">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <h5>Cap Rate</h5>
                              <div class="select-input disabled-first-option">
                                 <input type="number" placeholder="00000"  name="cap" value="{{$property->cap_rate}}" data-unit="%">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <h5>Units/Rooms/Beds</h5>
                              <div class="search-field">
                                 <input type="text" placeholder="00000"  value="{{$property->room}}" name="room" >
                              </div>
                           </div>

                           <div class="col-md-6">
                              <h5>Total Price</h5>
                              <div class="select-input disabled-first-option">
                                 <input type="text"name="price" value="{{$property->price}}" placeholder="00000" data-unit="$">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <h5>Lot Size</h5>
                              <div class="select-input disabled-first-option">
                                 <input type="text" name="area" value="{{$property->area}}" placeholder="00000" data-unit="Sq Ft">
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
                              <textarea id="editor" name="description" rows="5" >{{$property->description}}</textarea>
                           </div>
                           <div class="col-md-4">
                              <h5>Bluiding Height</h5>
                              <input class="search-field" name="height" value="{{$property->bluilding_height}}" type="text" value=""/>				  
                           </div>
                           <div class="col-md-4">
                              <h5>Frontage</h5>
                              <div class="select-input disabled-first-option">
                                 <input type="text" placeholder="00000" name="frontage" value="{{$property->frontage}}" data-unit="Sq Ft">
                              </div>
                           </div>
                           <div class="col-md-4">
                              <h5>Year Bluit</h5>
                              <input class="search-field" name="yearbluit" value="{{$property->year_built}}" type="text" value=""/>				  
                           </div>
                           <div class="col-md-12">
                              <h5 class="margin-top-15">Other Features <span>(optional)</span></h5>
                              <div class="checkboxes in-row margin-bottom-20">
                                 <input id="check-2" type="checkbox" name="new_lunch" @if($property->new_lunch == 1) checked @endif>
                                 <label for="check-2">New Lunch</label>
                                 <input id="check-3" type="checkbox" name="lighting" @if($property->lighting == 1) checked @endif>
                                 <label for="check-3">Lighting</label>
                                 <input id="check-4" type="checkbox" name="gas"  @if($property->gas == 1) checked @endif>
                                 <label for="check-4">Gas</label>
                                 <input id="check-5" type="checkbox" name="water" @if($property->water == 1) checked @endif>
                                 <label for="check-5">Water</label>
                                 <input id="check-6" type="checkbox" name="heating" @if($property->heating == 1) checked @endif>
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
                              <input type="text" name="street" value="{{$property->street}}" placeholder="Street">
                           </div>
                           <div class="col-md-6">
                              <h5>City </h5>
                              <input type="text" name="city" value="{{$property->city}}" placeholder="City Name">
                           </div>
                           <div class="col-md-4">
                              <h5>State</h5>
                              <input type="text" name="state" value="{{$property->state}}" placeholder="State">
                           </div>
                           <div class="col-md-4">
                              <h5>Zip-Code</h5>
                              <input type="text"  name="zip" value="{{$property->zip}}" placeholder="000000">
                           </div>
                           <div class="col-md-4">
                              <h5>Country</h5>
                              <input type="text" name="country" value="{{$property->country}}" placeholder="000000">
                           </div>
                        </div>
                     </div>
                     <!-- Section / End --> 
                     <div class="row">
                        <div class="col-md-12">
                           <button class="utf-centered-button button" >Upload Gallery</btton>
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
   </body>
   <!-- Mirrored from utouchdesign.com/themes/realfun/add-new-property.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Aug 2021 07:06:50 GMT -->
</html>