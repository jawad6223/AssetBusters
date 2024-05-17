<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from utouchdesign.com/themes/realfun/agents-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Aug 2021 07:06:50 GMT -->
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
            <h2>Sellers</h2>
            <!-- Breadcrumbs -->
            <nav id="breadcrumbs">
              <ul>
                <li><a href="{{url('home')}}">Home</a></li>
                <li>Sellers Listings</li>
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
      <div class="col-md-12">

      @if($sellers->count() == 0)
                  <h3>No records found</h3>
                  @endif

        <div class="row"> 
          <div class="utf-agents-container-area"> 
            @foreach($sellers as $seller)
            <!-- Agent -->
            <div class="grid-item col-lg-3 col-md-4 col-sm-6 col-xs-12">
              <div class="agent">
              <div class="utf-agent-avatar"> 
							   <a href="{{url('homesellerprofile/' . $seller->id)}}"> <img src="{{asset('storage/app/' . $seller->image)}}"   style="height:250px"
							   alt=""> <span class="view-profile-btn">View Profile</span> </a> 
							</div>

                            
                <div class="utf-agent-content">
                  <div class="utf-agent-name">
                    <h4><a href="agents-profile.html">{{$seller->name}}</a></h4>
                    <span>	@if( !is_null($seller->country))
Seller in {{$seller->country}}
					@endif</span> 
				  </div>                  
                </div>
              </div>
            </div>
            <!-- Agent / End --> 
            @endforeach
         
            
           
            
          
          <!-- Agents Container / End -->           
        </div>
      </div>
      <div class="col-md-12">
        <div class="clearfix"></div>
        <!-- Pagination -->
        <nav class="pagination">
            {{ $sellers->links() }}
          </nav> 
        <!-- Pagination / End --> 
      </div>
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

<!-- Mirrored from utouchdesign.com/themes/realfun/agents-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Aug 2021 07:07:08 GMT -->
</html>