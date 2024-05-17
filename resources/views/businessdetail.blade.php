<!DOCTYPE html>
<html lang="en">
   <!-- Mirrored from utouchdesign.com/themes/realfun/single-property-page-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Aug 2021 07:06:49 GMT -->
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
                        <h2>Business Listing Detail</h2>
                        <!-- Breadcrumbs -->
                        <nav id="breadcrumbs">
                           <ul>
                              <li><a href="index.html">Home</a></li>
                              <li>Business Listing Detail</li>
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Content -->
         <div class="container">
            <div class="row margin-bottom-50">
               <div class="col-md-12">
                  <!-- Slider -->
                  <div class="property-slider default"> 
                     <a href="{{asset('storage/app/'.$business->primaryimage)}}" data-background-image="{{asset('storage/app/'.$business->primaryimage)}}" class="item mfp-gallery"></a> 
                     @foreach($images as $image)
                     <a href="{{asset('public/images/'.$image->file)}}" data-background-image="{{asset('public/images/' .$image->file)}}" class="item mfp-gallery"></a> 
                     @endforeach
                  </div>
                  <!-- Slider Thumbs -->
                  <div class="property-slider-nav">
                     <div class="item"><img src="{{asset('storage/app/'.$business->primaryimage)}}" style="height:100px;width:100%" alt=""></div>
                     @foreach($images as $image)
                     <div class="item"><img src="{{asset('public/images/'. $image->file)}}" style="height:100px;width:100%" alt=""></div>
                     @endforeach
                  </div>
               </div>
            </div>
         </div>
         <div class="container">
            <div class="row">
               <!-- Property Description -->
               <div class="col-lg-8 col-md-7">
             
                  <!-- Titlebar -->
                  <div id="titlebar-dtl-item" class="property-titlebar margin-bottom-0">
                     <div class="property-title">
                        <div class="property-pricing">$ {{$business->total_price}}</div>
                        <h2>{{$business->title}} 
                           @if($business->business_type == 1)
                           <span class="property-badge-sale">For Sale</span>
                           @else
                           <span class="property-badge-rent">For Leased</span>
                           @endif
                        </h2>
                        @if( ! is_null($business->city) ||  ! is_null($business->street) )
                        <span class="utf-listing-address"><i class="icon-material-outline-location-on"></i>{{$business->street}},
                        {{$business->city}},{{$business->state}},{{$business->zip}},{{$business->country}}</span> @endif
                     </div>
                  </div>
                  <div class="property-description">
                     <!-- Description -->
                     @if( !is_null($business->description))
                     <div class="utf-desc-headline-item">
                        <h3><i class="icon-material-outline-description"></i> Business Description</h3>
                     </div>
                     <div class="show-more">
                        <p> {!! htmlspecialchars_decode(nl2br($business->description)) !!} </p>
                        <a href="#" class="show-more-button">Show More <i class="sl sl-icon-plus"></i></a> 
                     </div>
                     @endif
                     <!-- Details -->
                     <div class="utf-desc-headline-item">
                        <h3><i class="sl sl-icon-briefcase" ></i> Business Details</h3>
                     </div>
                     <ul class="property-features margin-top-0">
                        @if( !is_null($business->business_categories))           
                        <li>Business Category: <span> {{$business->businesscategories->name}}</span></li>
                        @endif
                        @if( !is_null($business->business_id))            
                        <li>Property ID: <span>  {{$business->id}}</span></li>
                        @endif
                        @if( !is_null($business->real_estate))       
                        <li> Real Estate: <span> 

                        @if($business->real_estate == 1) Owned
                        @else
                        Leased
                        @endif

                        </span></li>
                        @endif
                        @if( !is_null($business->year_built))      
                        <li>Year Bluit: <span> {{$business->year_built}}</span></li>
                        @endif
                        @if( !is_null($business->cash_flow))     
                        <li> Cash Flow: <span>{{$business->cash_flow}}</span></li>
                        @endif
                        @if( !is_null($business->employees))     
                        <li> Employees: <span>{{$business->employees}}</span></li>
                        @endif
                        @if( !is_null($business->asking_price))    
                        <li> Asking Price: <span>{{$business->asking_price}}</span></li>
                        @endif
                        @if( !is_null($business->gross_revenue))    
                        <li> Gross Revenue: <span>{{$business->gross_revenue}}</span></li>
                        @endif
                     </ul>
                     <div class="utf-desc-headline-item">
                        <h3><i class="icon-material-outline-description"></i> Additional Details</h3>
                     </div>
                     <!-- Section -->
                     <div class="utf-submit-page-inner-box">
                        <div class="content with-padding">
                           @if( !is_null($business->reason_for_saling))
                           <div class="col-md-12 ">
                              <h4> <b> Reason for Saling  <b></h4>
                              <textarea cols="20" rows="2" id="summary"  name="description"> {{$business->reason_for_saling}}</textarea>
                           </div>
                           @endif
                           @if( !is_null($business->support_and_training))
                           <div class="col-md-6">
                              <h4> <b> Support And Traning  <b> </h4>
                              <textarea cols="20" rows="2" id="summary"  name="description"> {{$business->support_and_training}}</textarea>
                           </div>
                           @endif
                           @if( !is_null($business->inventory))
                           <div class="col-md-6">
                              <h4> <b> Inventory  <b></h4>
                              <textarea cols="20" rows="2" id="summary"  name="description">{{$business->inventory}} </textarea>
                           </div>
                           @endif
                        </div>
                     </div>
                     <!-- Section / End --> 
                     <!-- Video -->
                     @if(count($videos) > 0)
                     <div class="utf-desc-headline-item">
                        <h3><i class="icon-feather-video"></i> Business Video</h3>
                     </div>
                     <div class="row">
                        <div class="margin-top-30"></div>
                        @foreach($videos as $video)
                        <div class="col-md-10 " >
                           <a  href="{{asset('public/images/'.$video->file)}}" target="blank">
                              <video width="500" height="300" controls>
                                 <source src="{{asset('public/images/'.$video->file)}}">
                              </video>
                           </a>
                           <div class="offset-md-1"></div>
                        </div>
                        @endforeach
                     </div>
                     @endif
                  </div>
               </div>
            
            <!-- Property Description / End --> 
            <!-- Sidebar -->
            <div class="col-lg-4 col-md-5">
               <div class="sidebar">
                  <!-- Widget -->
                  <div class="widget utf-sidebar-widget-item">
                     <div class="utf-boxed-list-headline-item">
                        <h3>Business Details</h3>
                     </div>
                     <a href="#"   onclick="navigator.clipboard.writeText('localhost/business/businessdetail/{{$business->id}}');" class="button"  ><i class="fas fa-copy"></i></a>
                        @if (Auth::check() && auth::user()->user_role == 3)
                        @if( is_null($fav))
                        <a href="{{url('businessfavourite/' . $business->id)}}"  class="button"   data-tip-content="Bookmark business"><i class="fas fa-heart"></i></a>
                        @endif
                        @endif
                        @if( !is_null($business->business_user->facebook))
                        <a href="{{$business->business_user->facebook}}"  target="blank" class="button with-tip"  ><i class="fab fa-facebook-square"></i></a>
                        @endif
                        @if( !is_null($business->business_user->instagram))
                        <a href="{{$business->business_user->instagram}}"  target="blank" class="button with-tip"  > <i class="fab fa-instagram"> </i></a>
                        @endif
                        @if( !is_null($business->business_user->twitter))
                        <a href="{{$business->business_user->twitter}}"  target="blank" class="button with-tip"  > <i class="fab fa-twitter"></i></a>
                        @endif
                        @if( !is_null($business->business_user->linkedin))
                        <a href="{{$business->business_user->linkedin}}"  target="blank" class="button with-tip"  > <i class="fab fa-linkedin-in"></i> </a>
                        @endif

                     <div class="clearfix"></div>
                  </div>
                  <!-- Widget / End --> 
                  <!-- Widget -->
                  <div class="widget utf-sidebar-widget-item">
                     <div class="agent-widget">
                        <div class="utf-boxed-list-headline-item">
                           <h3>Listed By Agents Details</h3>
                        </div>
                        <div class="agent-title">
                             <div class="agent-photo"><img src="{{asset('storage/app/'.$business->business_user->image)}}" alt="" /></div>
                              <div class="agent-details">
                                 <h4><a href="#">{{$business->business_user->name}}</a></h4>
                                 <span>{{$business->business_user->contact}}</span> <br>
                                 <span>{{$business->business_user->email}}</span>
                                 <span><a href="{{url('homesellerprofile/' . $business->user_id)}}">View My Listing</a></span>
                              </div>
                          
                           <div class="clearfix"></div>
                        </div>
                              <form class=""  action="{{url('propertydetailsidebar')}}"  method="post">
                        @csrf 
                         <input type="hidden" name="id" value="{{$business->business_user->id}}">
                         
                           <input type="text" name="name" required placeholder="Name">
                           <input type="text" name="email" required placeholder="Email">
                           <input type="text" name="phone" placeholder="Phone">
                           <input type="text" name="subject"  required placeholder="Subject">
                           <input  name="date" type="date" >
                           <textarea name="description">I'm interest in  Listing </textarea>
                           <button class="button fullwidth margin-top-5">Send Message</button>
</form>
                     </div>
                  </div>
                  <!-- Widget / End --> 
                 
               
               </div>
            </div>
            <!-- Sidebar / End -->       
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

      @if (session('fav'))
      <script>
         Swal.fire({
         title: " {{session('fav')}}",
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
position: 'top-end',
icon: 'success',
title: 'Successfully Send Message',
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
   <!-- Mirrored from utouchdesign.com/themes/realfun/single-business-page-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Aug 2021 07:06:49 GMT -->
</html>