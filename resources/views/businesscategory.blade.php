<!DOCTYPE html>
<html lang="en">
   <!-- Mirrored from utouchdesign.com/themes/realfun/agents-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Aug 2021 07:07:08 GMT -->
   @include('includes.head')
   <head>
      <style>
         .w-5{
         display:none;
         }
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
         <!-- Header Container / End --> 
         <!-- Titlebar -->
         <div class="parallax titlebar" data-background="{{asset('public/assets1/images/listing-02.jpg')}}" data-color="rgba(48, 48, 48, 1)" data-color-opacity="0.8" data-img-width="800" data-img-height="505">
            <div id="titlebar">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <h2>Business</h2>
                        <!-- Breadcrumbs -->
                        <nav id="breadcrumbs">
                           <ul>
                              <li><a href="{{url('home')}}">Home</a></li>
                              <li>Business</li>
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Content -->
         <div class="container">
            <div class="row sticky-wrapper">
               <div class="col-lg-8 col-md-8">
                  @if($businesss->count() == 0)
                  <h3>No records found</h3>
                  @endif
                  <!-- Listings -->
                  <div class="utf-listings-container-area list-layout">
                     <!-- Listing Item -->
                     @foreach($businesss as $business)
                     <div class="utf-listing-item">
                        <a href="{{url('businessdetail/' . $business->id)}}" class="utf-smt-listing-img-container">
                           <div class="utf-listing-badges-item">
                              @if($business->business_type == 1)
                              <span class="for-sale">
                              For Sale</span> 
                              @elseif($business->business_type == 2)
                              <span class="for-rent">
                              For Leased</span>
                              @endif    
                           </div>
                           <div class="utf-listing-img-content-item">
                           </div>
                           <div class="utf-listing-carousel-item">
                              <div><img src="{{asset('storage/app/' . $business->primaryimage)}}" style="height:350px;400px" alt=""></div>
                              @foreach($business->images as $images)
                              <div><img src="{{asset('public/images/' .$images->file)}}"  style="width:403px;height:280px;" alt=""></div>
                              @endforeach
                           </div>
                        </a>
                        <div class="utf-listing-content">
                           <div class="utf-listing-title">
                              <span class="utf-listing-price">$ {{$business->total_price}}</span>
                              <h4><a href="#">{{$business->title}}</a></h4>
                              <span class="utf-listing-address"><i class="icon-material-outline-location-on"></i> 
                              {{$business->street}},{{$business->city}},{{$business->state}},{{$business->zip}},{{$business->country}}											  
                              </span>
                           </div>
                           <div class="utf-listing-user-info"><a href="{{url('homesellerprofile/' . $business->user_id)}}"><i class="icon-line-awesome-user"></i> {{$business->business_user->name}}</a> <span>{{ $business->created_at->format('d/m/Y') }}</span></div>
                        </div>
                     </div>
                     @endforeach
                     <!-- Listing Item / End --> 
                  </div>
                  <!-- Listings Container / End --> 
                  <!-- Pagination -->
                  <nav class="pagination">
                     {{ $businesss->links() }}
                  </nav>
                  <!-- Pagination / End -->         
               </div>
                <!-- Sidebar -->
                <div class="col-lg-4 col-md-4">
                  <div class="sidebar">
                     <!-- Widget -->
                     <form class=""  action="{{url('businesssearch')}}" method="post">
                        @csrf
                        <div class="widget utf-sidebar-widget-item">
                           <div class="utf-boxed-list-headline-item">
                              <h3>Find New Business</h3>
                           </div>
                           <div class="row with-forms">
                              <div class="col-md-12 ">
                                 <input type="text" class="ico-01" name="listingid" placeholder="Listing Id" value=""/>
                              </div>
                           </div>
                        
                           <!-- Row / End --> 
                           <div class="row with-forms">
                              <div class="col-md-12">
                                 <select data-placeholder="Any Type" name="category" class="utf-chosen-select-single-item">
                                    <option value="">Select Categories</option>
                                    @foreach($category as $category)
                                    <option value="{{$category->id}}"> {{$category->name}}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                           <!-- Row / End --> 
                           <!-- Row -->
                           <div class="row with-forms">
                              <div class="col-md-12">
                                 <select data-placeholder="All Cities" name="state" class="chosen-select">
                                    <option value="">All States</option>
                                    @foreach($state as $state)
                                    <option value="{{$state->state}}" >{{$state->state}}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                           <!-- Row -->
                           <div class="row with-forms">
                              <div class="col-md-12">
                                 <select data-placeholder="All Cities" name="city" class="chosen-select">
                                    <option value="">All Cities</option>
                                    @foreach($city as $city)
                                    <option value="{{$city->city}}" >{{$city->city}}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                           <!-- Row / End --> 
                           <!-- Price Range -->
                           <div class="row with-forms">
                              <div class="col-md-12 ">
                                 <input type="text" class="ico-01" name="zip" placeholder="Zip Code" value=""/>
                              </div>
                           </div>
                           <div class="row with-forms">
                              <div class="col-md-12 ">
                                 <input type="text" class="ico-01" name="country" placeholder="Country" value=""/>
                              </div>
                           </div>
                           <div class="row with-forms">
                              <div class="col-md-12">
                                 <select data-placeholder="All Cities" name="real_estate" class="chosen-select">
                                    <option value="" > Select Real Estate</option>
                                    <option value="1" > Owned</option>
                                    <option value="2" > Leased</option>
                                 </select>
                              </div>
                           </div>
                           <div class="">
                              <label> <b> Price Range </b> </label>
                           </div>
                           <div class="row with-forms">
                              <div class="col-md-5 ">
                                 <input type="text" class="ico-01" name="pricemax" placeholder="Max $" value=""/>
                              </div>
                              <div class="col-md-1">
                                 <p style="margin-top:9px;"> to </p>
                              </div>
                              <div class="col-md-5 ">
                                 <input type="text" class="ico-01" name="pricemin" placeholder="Min $" value=""/>
                              </div>
                              <div class="clearfix"></div>
                           </div>
                        
                     
                           <div class="">
                              <label> <b> Year Built </b> </label>
                           </div>

                           <div class="row with-forms">
                              <div class="col-md-5 ">
                                 <input type="text" class="ico-01" name="yearmax" placeholder="Max " value=""/>
                              </div>
                              <div class="col-md-1">
                                 <p style="margin-top:9px;"> to </p>
                              </div>
                              <div class="col-md-5 ">
                                 <input type="text" class="ico-01" name="yearmin" placeholder="Min " value=""/>
                              </div>
                              <div class="clearfix"></div>
                           </div>
                           <button class="button fullwidth margin-top-10">Search</button>
                        </div>
                        <!-- Widget / End -->
                     </form>
                  </div>
               </div>
             
            </div>
         </div>
        
         <div class="margin-top-65"></div>
         @include('includes.footer')
         <!-- Footer / End --> 
         <!-- Back To Top Button -->
         <div id="backtotop"><a href="#"></a></div>
      </div>
      <!-- Wrapper / End -->
      <!-- Sign In Popup -->
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
   </body>
   <!-- Mirrored from utouchdesign.com/themes/realfun/agents-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Aug 2021 07:07:09 GMT -->
</html>