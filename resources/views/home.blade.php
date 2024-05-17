<!DOCTYPE html>
<html lang="en">
   <!-- Mirrored from utouchdesign.com/themes/realfun/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Aug 2021 07:00:52 GMT -->
   <head>
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
         <!-- Banner -->
         <div class="parallax" data-background="{{asset('public/assets1/images/listing-02.jpg')}}" data-color="#36383e" data-color-opacity="0.72" data-img-width="2500" data-img-height="1600">
            <div class="utf-parallax-content-area">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="utf-main-search-container-area">
                           <div class="utf-banner-headline-text-part">
                              <h2>Best Place To Find <span class="typed-words"></span></h2>
                              <span>From as low as $10 per day with limited time offer discounts.</span> 
                           </div>
                           <form class="utf-main-search-form-item"  action="homesearch" method="post">
                              @csrf
                              <div class="utf-search-type-block-area">
                                 <div class="search-type"  id="my">
                                    <label class="active">
                                    <input class="first-tab"   value="1"  id="demo4" onclick="myFunction1()" name="tab" checked="checked" type="radio">Property</label>
                                    <label>
                                    <input name="tab" id="demo3" onclick="myFunction()"  value="2" type="radio" >Business</label>
                                    <div class="utf-search-type-arrow"></div>
                                 </div>
                              </div>
                              <div class="utf-main-search-box-area">
                                 <div class="row with-forms">
                                    <div id="demo2">
                                       <div class="col-md-4 col-sm-12">
                                          <select data-placeholder="Select Type"  name="type1" title="Select Area" class="utf-chosen-select-single-item">
                                             <option value="">Select Type </option>
                                             <option value="1">Sale</option>
                                             <option value="2">Lease</option>
                                             <option value="3">Auction</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div id="demo1" style="display:none">
                                       <div class="col-md-4 col-sm-12">
                                          <select data-placeholder="Select Type" name="type"   title="Select Area" class="utf-chosen-select-single-item">
                                             <option value="">Select Categories </option>
                                             @foreach($total_categories as $categories)
                                             <option value="{{$categories->id}}">{{$categories->name}}</option>
                                             @endforeach
                                           
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                       <input type="text" class="ico-01" name="max" placeholder="Maximum Price" value=""/>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                       <input type="text" class="ico-01" name="min" placeholder="Minimum Price" value=""/>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                       <button class="button utf-search-btn-item"><i class="fa fa-search"></i> Search</button>	
                                    </div>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Content -->
         <section class="fullwidth" data-background-color="#ffffff">
            <div class="container">
               <div class="row"  id="move1">
                  <div class="col-md-12">
                     <div class="utf-section-headline-item centered margin-bottom-30 margin-top-0">
                        <h3 class="headline"><span>Most Popular  Properties</span> Popular Properties</h3>
                        <div class="utf-headline-display-inner-item">Most Popular  Properties</div>
                     </div>
                  </div>
                  <!-- Carousel -->
                  <div class="col-md-12" >
                     <div class="carousel">
                        @foreach($property as $property)
                        <div class="utf-carousel-item-area">
                           <div class="utf-listing-item">
                              <a href="{{url('propertydetail/' . $property->id)}}" class="utf-smt-listing-img-container">
                                 <div class="utf-listing-badges-item"> 
                                    @if($property->property_type == 1)
                                    <span class="for-sale">For Sale</span>
                                    @elseif($property->property_type == 2)
                                    <span class="for-rent">For Leased</span>
                                    @else
                                    <span class="for-sale">Auction</span>
                                    @endif
                                 </div>
                                 <div class="utf-listing-img-content-item"> 					
                                    <img class="utf-user-picture" src="{{asset('storage/app/' . $property->property_user->image)}}" alt="user_1" />
                                 </div>
                                 <div class="utf-listing-carousel-item">
                                    <div><img src="{{asset('storage/app/' . $property->primaryimage)}}" style="height:230px;" alt=""></div>
                                    @foreach($property->images as $images)
                                    <div><img src="{{asset('public/images/' .$images->file)}}"  style="height:230px;" alt=""></div>
                                    @endforeach
                                 </div>
                              </a>
                              <div class="utf-listing-content">
                                 <div class="utf-listing-title">
                                    <span class="utf-listing-price"> $ {{$property->price}}</span> 						  	
                                    <h4><a href="#">{{$property->title}}</a></h4>
                                    <span class="utf-listing-address"><i class="icon-material-outline-location-on"></i> 
                                    {{$property->street}},{{$property->country}},{{$property->state}},{{$property->zip}},{{$property->country}}</span>  											  
                                 </div>
                                 <div class="utf-listing-user-info"><a href="{{url('homesellerprofile/ ' .$property->user_id)}}"><i class="icon-line-awesome-user"></i> {{$property->property_user->name}}</a> <span>{{ $property->created_at->format('d/m/Y') }}</span></div>
                              </div>
                           </div>
                        </div>
                        @endforeach       
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="fullwidth" data-background-color="#ffffff">
            <div class="container">
               <div class="row" id="move2">
                  <div class="col-md-12">
                     <div class="utf-section-headline-item centered margin-bottom-30 margin-top-0">
                        <h3 class="headline"><span>Most Popular Business</span> Popular Business</h3>
                        <div class="utf-headline-display-inner-item">Most Popular  Business</div>
                     </div>
                  </div>
                  <!-- Carousel -->
                  <div class="col-md-12">
                     <div class="carousel">
                        @foreach($business as $business)
                        <div class="utf-carousel-item-area">
                           <div class="utf-listing-item">
                              <a href="{{url('businessdetail/' . $business->id)}}" class="utf-smt-listing-img-container">
                                 <div class="utf-listing-badges-item"> 
                                    @if($business->business_type == 1)
                                    <span class="for-sale">For Sale</span>
                                    @else
                                    <span class="for-rent">For Leased</span>
                                    @endif
                                 </div>
                                 <div class="utf-listing-img-content-item"> 					
                                    <img class="utf-user-picture" src="{{asset('storage/app/' . $business->business_user->image)}}" alt="user_1" />
                                 </div>
                                 <div class="utf-listing-carousel-item">
                                    <div><img src="{{asset('storage/app/' . $business->primaryimage)}}" style="height:230px;" alt=""></div>
                                    @foreach($business->images as $images)
                                    <div><img src="{{asset('public/images/' .$images->file)}}"  style="height:230px;" alt=""></div>
                                    @endforeach
                                 </div>
                              </a>
                              <div class="utf-listing-content">
                                 <div class="utf-listing-title">
                                    <span class="utf-listing-price"> $ {{$business->total_price}}</span> 						  	
                                    <h4><a href="#">{{$business->title}}</a></h4>
                                    <span class="utf-listing-address"><i class="icon-material-outline-location-on"></i> 
                                    {{$business->street}},{{$business->country}},{{$business->state}},{{$business->zip}},{{$business->country}}</span>  											  
                                 </div>
                                 <div class="utf-listing-user-info"><a href="{{url('homesellerprofile/ ' .$business->user_id)}}"><i class="icon-line-awesome-user"></i> {{$business->business_user->name}}</a> <span>{{ $business->created_at->format('d/m/Y') }}</span></div>
                              </div>
                           </div>
                        </div>
                        @endforeach
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <div class="jbm-section-callout">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12 callout-bg-1 callout-section-left pos-relative">
                     <div class="callout-bg"></div>
                     <div class="jbm-callout-in jbm-callout-in-padding pull-right">
                        <div class="jbm-section-title margin-top-80 margin-bottom-80">
                           <h2>Find Your Browse Add Property</h2>
                           <span class="section-tit-line"></span>
                           <a href="{{url('homepropertycategory/' . 1 )}}" class="button margin-top-10">View All Property</a>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 callout-bg-2 callout-section-right pos-relative">
                     <div class="callout-bg"></div>
                     <div class="jbm-callout-in jbm-callout-in-padding pull-right">
                        <div class="jbm-section-title margin-top-80 margin-bottom-80">
                           <h2>Find Your Browse Add Business</h2>
                           <span class="section-tit-line"></span>
                           <a href="{{url('homebusinesscategory/' . 1 )}}" class="button margin-top-10">View All Business</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <section class="fullwidth" data-background-color="linear-gradient(to bottom,rgba(0,0,0,0.03) 0%,rgba(255,255,255,0))">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="utf-section-headline-item centered margin-bottom-30 margin-top-0">
                        <h3 class="headline"><span>Our Blog & Articles</span> Latest Blog Post</h3>
                        <div class="utf-headline-display-inner-item">Our Blog & Articles</div>
                     </div>
                  </div>
                  @foreach($blog as $blog)
                  <div class="col-md-4">
                     <div class="blog-post">
                        <a href="{{url('blogdetail')}}" class="post-img"> <img src="{{asset('storage/app/' . $blog->primary_image)}}" height="240px" alt=""> </a> 
                        <div class="utf-post-content-area">
                           <h3><a href="blog_detail_right_sidebar.html">{{$blog->title}}</a></h3>
                           <div class="utf-listing-user-info"><a href="{{url('homesellerprofile/ ' .$blog->user_id)}}"><i class="icon-line-awesome-user"></i> {{$blog->blog_user->name}}</a> <span>{{ $blog->created_at->format('d/m/Y') }}</span></div>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
         </section>
         <!-- Agents Section -->
         <section class="fullwidth">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="utf-section-headline-item centered margin-bottom-30 margin-top-0">
                        <h3 class="headline"><span>Our Sellers</span> Our Sellers</h3>
                        <div class="utf-headline-display-inner-item">Our Sellers</div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="utf-agents-container-area">
                     @foreach($seller as $seller)
                     <div class="grid-item col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="agent">
                           <div class="utf-agent-avatar"> 
                              <a href="{{url('homesellerprofile/'.$seller->id)}}"> <img src="{{asset('storage/app/' . $seller->image)}}"   style="height:250px"
                                 alt=""> <span class="view-profile-btn">View Profile</span> </a> 
                           </div>
                           <div class="utf-agent-content">
                              <div class="utf-agent-name">
                                 <h4><a href="agents-profile.html">{{$seller->name}}</a></h4>
                                 <span>
                                 @if( !is_null($seller->country))
                                 Seller in {{$seller->country}}
                                 @endif
                                 </span> 
                              </div>
                           </div>
                        </div>
                     </div>
                     @endforeach
                  </div>
                  <div class="utf-centered-button margin-top-10">
                     <a href="{{url('sellerlist')}}" class="button">View All Seller</a> 
                  </div>
                  <!-- Agents Container / End --> 
               </div>
            </div>
         </section>
         <!-- Agents Section / End -->
         <!-- Agents Section -->
         <section class="fullwidth">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="utf-section-headline-item centered margin-bottom-30 margin-top-0">
                        <h3 class="headline"><span>Our Clients</span> Our Clients</h3>
                        <div class="utf-headline-display-inner-item">Our Clients</div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="utf-agents-container-area">
                     @foreach($client as $client)
                     <div class="grid-item col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="agent">
                           <div class="utf-agent-avatar"> 
                              <a href="{{url('homeclientprofile/'.$client->id)}}"> <img src="{{asset('storage/app/' . $client->image)}}"   style="height:250px"
                                 alt=""> <span class="view-profile-btn">View Profile</span> </a> 
                           </div>
                           <div class="utf-agent-content">
                              <div class="utf-agent-name">
                                 <h4><a href="agents-profile.html">{{$client->name}}</a></h4>
                                 <span>
                                 @if( !is_null($client->country))
                                 client in {{$client->country}}
                                 @endif
                                 </span> 
                              </div>
                           </div>
                        </div>
                     </div>
                     @endforeach
                  </div>
                  <div class="utf-centered-button margin-top-10">
                     <a href="{{url('clientlist')}}" class="button">View All Client</a> 
                  </div>
                  <!-- Agents Container / End --> 
               </div>
            </div>
         </section>
         <!-- Agents Section / End -->
         <!-- Counters Container -->
         <div class="parallax" data-background="{{asset('public/assets1/images/listing-02.jpg')}}" data-color="#252529" data-color-opacity="0.85" data-img-width="800" data-img-height="505">
            <div id="counters">
               <div class="container">
                  <div class="row">
                     <div class="counter-boxes-inside-parallax">
                        <div class="col-md-3 col-sm-6 col-xs-6">
                           <div class="counter-box">
                              <div class="counter-box-icon">
                                 <i class="icon-feather-home"></i> <span class="counter">{{$totalproperty}}</span>
                                 <p>Total Property  Listing</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                           <div class="counter-box">
                              <div class="counter-box-icon">
                                 <i class="icon-material-outline-business"></i> <span class="counter">{{$totalbusiness}}</span>
                                 <p>Total Business Listing</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                           <div class="counter-box">
                              <div class="counter-box-icon">
                                 <i class="fas fa-users"></i> <span class="counter">{{$totalseller}}</span>
                                 <p>Total clients</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                           <div class="counter-box">
                              <div class="counter-box-icon">
                                 <i class="icon-feather-users"></i> <span class="counter">{{$totalclient}}</span>
                                 <p>Total Clients</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Counters Container / End -->
         <!-- Start Need Any Help -->
         <section class="section padding-top-75 padding-bottom-75">
            <div class="container">
               <div class="col-md-12">
                  <div class="utf-section-headline-item centered margin-bottom-30 margin-top-0">
                     <h3 class="headline"><span>Business Help Service</span> Need Any Help?</h3>
                     <div class="utf-headline-display-inner-item">Business Help Service</div>
                  </div>
               </div>
               <div class="row need-help-area justify-content-center">
                  <div class="col-md-4 col-sm-4 col-xs-12">
                     <div class="info-box-1">
                        <div class="utf-icon-box-circle">
                           <div class="utf-icon-box-circle-inner"> <i class="icon-feather-phone"></i></div>
                        </div>
                        <h4>Our Support Admin</h4>
                        <a href="{{url('contact')}}" class="button margin-top-10">Contact Us</a> 
                     </div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                     <div class="info-box-1">
                        <div class="utf-icon-box-circle">
                           <div class="utf-icon-box-circle-inner">  <i class="icon-feather-home"></i></div>
                        </div>
                        <h4>Search Latest Property Post</h4>
                        <a href="#move1" class="button margin-top-10">Search Latest property </a> 
                     </div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                     <div class="info-box-1">
                        <div class="utf-icon-box-circle">
                           <div class="utf-icon-box-circle-inner"> <i class="icon-brand-bimobject"></i></div>
                        </div>
                        <h4>Search Latest Business</h4>
                        <a href="#move2" class="button margin-top-10"> Search Latest Business </a> 
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- End Need Any Help -->
         <div id="backtotop"><a href="#"></a></div>
      </div>
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
      <script src="{{asset('public/assets1/scripts/custom_jquery.js')}}"></script> 
      <script src="{{asset('public/assets1/scripts/typed.js')}}"></script>
      @include('includes.footer')
      <script>
         var typed = new Typed('.typed-words', {
         	strings: ["Dream Home."," Apartments."," Residential."," Commercial."],
         	typeSpeed: 80,
         	backSpeed: 80,
         	backDelay: 4000,
         	startDelay: 1000,
         	loop: true,
         	showCursor: true
         });
      </script>
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
           title: "Login credentials doesn't match  Try Again",
           showClass: {
         	popup: 'animate__animated animate__fadeInDown'
           },
           hideClass: {
         	popup: 'animate__animated animate__fadeOutUp'
           }
         })
      </script>
      @endif
      @if (session('signupmessage'))
      <script>
         Swal.fire({
           title: "Successfully create account wait Admin approval then login",
           showClass: {
         	popup: 'animate__animated animate__fadeInDown'
           },
           hideClass: {
         	popup: 'animate__animated animate__fadeOutUp'
           }
         })
      </script>
      @endif
      <script>
         function myFunction() {
            var value = document.getElementById("demo3").value;
                  var x = document.getElementById("demo1");
         
                  var x1 = document.getElementById("demo2");
         
                  if(value == 2){
               
                  x.style.display = "block";
                  x1.style.display = "none";
                  }
                  else{
                     x1.style.display = "block";
                  x.style.display = "none";
                  }
                 
         }
      </script>
      <script>
         function myFunction1() {
            var value = document.getElementById("demo4").value;
         
                  var x = document.getElementById("demo2");
                  var x1 = document.getElementById("demo1");
         
                  if(value == 1){
               
                  x.style.display = "block";
                  x1.style.display = "none";
         
                  }
                  else{
         
                  x.style.display = "none";
         
                  x1.style.display = "block";
         
                  }
                 
         }
      </script>
   </body>
   <!-- Mirrored from utouchdesign.com/themes/realfun/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Aug 2021 07:03:23 GMT -->
</html>