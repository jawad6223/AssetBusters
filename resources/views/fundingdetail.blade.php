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
                        <h2>Funding Detail</h2>
                        <!-- Breadcrumbs -->
                        <nav id="breadcrumbs">
                           <ul>
                              <li><a href="index.html">Home</a></li>
                              <li>Funding Detail</li>
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
                     <a href="{{asset('storage/app/'.$funding->primary_image)}}" data-background-image="{{asset('storage/app/'.$funding->primaryimage)}}" class="item mfp-gallery"></a> 
                     @foreach($images as $image)
                     <a href="{{asset('public/images/'.$image->file)}}" data-background-image="{{asset('public/images/' .$image->file)}}" class="item mfp-gallery"></a> 
                     @endforeach
                  </div>
                  <!-- Slider Thumbs -->
                  <div class="property-slider-nav">
                     <div class="item"><img src="{{asset('storage/app/'.$funding->primaryimage)}}" style="height:100px;width:100%" alt=""></div>
                     @foreach($images as $image)
                     <div class="item"><img src="{{asset('public/images/'. $image->file)}}" style="height:100px;width:100%" alt=""></div>
                     @endforeach
                  </div>
               </div>
            </div>
         </div>
         <div class="container">
            <div class="row">
               @if( !is_null($funding->description))
               <!-- Property Description -->
               <div class="col-lg-8 col-md-7">

               <div id="titlebar-dtl-item" class="property-titlebar margin-bottom-0">
                     <div class="property-title">
                    
                        <h4> <i class="fas fa-atom-alt"></i> {{$funding->title}}  <i class="fas fa-hashtag" style="padding-left:15px;"></i>
                        @if($funding->funding_type_id == 1)  Factoring / Receivables / Contracts Funding @endif
                        @if($funding->funding_type_id == 2) Loan / Mortgage @endif
                        @if($funding->funding_type_id == 3)  Private Equity / Venture Capital @endif
                        @if($funding->funding_type_id == 4)  Private Offering / Reg A+ / Reg CF @endif
                        @if($funding->funding_type_id == 5)  Public Offering / IPO / SPAC @endif
                        </h4>
                        @if( ! is_null($funding->city) ||  ! is_null($funding->street) )
                        <span class="utf-listing-address"><i class="icon-material-outline-location-on"></i>{{$funding->street}},
                        {{$funding->city}},{{$funding->state}},{{$funding->zip}},{{$funding->country}}</span> @endif
                     </div>
                  </div>

                  <div class="property-description">
                     <!-- Description -->
                     <div class="utf-desc-headline-item">
                        <h3><i class="icon-material-outline-description"></i>  Description</h3>
                     </div>
                     <div class="show-more">
                        <p> {!! htmlspecialchars_decode(nl2br($funding->description)) !!}</p>
                        <a href="#" class="show-more-button">Show More <i class="sl sl-icon-plus"></i></a> 
                     </div>


                     @if(count($videos) > 0)
                     <div class="utf-desc-headline-item">
                        <h3><i class="icon-feather-video"></i> Videos</h3>
                     </div>
                     <div class="row">
                        <div class="margin-top-30"></div>
                        @foreach($videos as $video)
                        <div class="col-md-5 " >
                           <a  href="{{asset('public/images/'.$video->file)}}" target="blank">
                              <video width="300" height="300" controls>
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
               @endif
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
   </body>
   <!-- Mirrored from utouchdesign.com/themes/realfun/single-property-page-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Aug 2021 07:06:49 GMT -->
</html>