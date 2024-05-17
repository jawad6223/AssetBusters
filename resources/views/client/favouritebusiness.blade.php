<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from utouchdesign.com/themes/realfun/my-properties.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Aug 2021 07:06:49 GMT -->
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
            <h2>My Business</h2>
            <!-- Breadcrumbs -->
            <nav id="breadcrumbs">
              <ul>
                <li><a href="index.html">Home</a></li>
                <li>My Business</li>
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
      <!-- Widget -->
      <div class="col-md-3">
	  @include('client.includes.sidebar')
      </div>
      <div class="col-md-9">
        <table class="manage-table responsive-table">
          <tr>
            <th>Business</th>
            <th>Date</th>
            <th style="text-align:right">Action</th>
          </tr>
          @foreach($business as $business)
         
         <tr>
           <td class="utf-title-container"><img src="{{asset('storage/app/'. $business->favourite_business->primaryimage)}}" style="height:100px" alt="">
             <div class="title">
               <h4><a href="#">{{$business->favourite_business->title}}</a></h4>
               <span>{{$business->favourite_business->street}},{{$business->favourite_business->city}},{{$business->favourite_business->state}},{{$business->favourite_business->zip}},{{$business->favourite_business->country}}

               </span> <span class="table-property-price">$ {{$business->favourite_business->total_price}}</span> 
       </div>
     </td>
           <td class="utf-expire-date">{{ date('d-m-Y', strtotime($business->favourite_business->created_at));}}</td>
           <td class="action">


           <a href="{{url('businessdetail/'.$business->favourite_business->id)}}" class="view tooltip left" title="View"><i class="icon-feather-eye"></i></a>
				<a href="{{url('businessfavourite/' . $business->favourite_business->id)}}" class="delete tooltip left" title="Delete"><i class="icon-feather-trash-2"></i></a>

        </td>
         </tr>

         @endforeach
        </table>

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

      @if (session('delete'))

<script>
Swal.fire({
title: " {{session('delete')}}",
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

<!-- Mirrored from utouchdesign.com/themes/realfun/my-properties.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Aug 2021 07:06:49 GMT -->
</html>