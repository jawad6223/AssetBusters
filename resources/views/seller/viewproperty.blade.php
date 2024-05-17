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
            <h2>My Property</h2>
            <!-- Breadcrumbs -->
            <nav id="breadcrumbs">
              <ul>
                <li><a href="index.html">Home</a></li>
                <li>My Property</li>
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
	  @include('seller.includes.sidebar')
      </div>
      <div class="col-md-9">
        <table class="manage-table responsive-table">
          <tr>
            <th>Property</th>
            <th>Date</th>
            <th style="text-align:right">Action</th>
          </tr>
         
          <!-- Item #4 -->
          @foreach($property as $property)
         
          <tr>
            <td class="utf-title-container"><img src="{{asset('storage/app/'. $property->primaryimage)}}" style="height:100px" alt="">
              <div class="title">
                <h4><a href="#">{{$property->title}}</a></h4>
                <span>{{$property->street}},{{$property->city}},{{$property->state}},{{$property->zip}},{{$property->country}}

                </span> <span class="table-property-price">$ {{$property->price}}</span> 
			  </div>
			</td>
            <td class="utf-expire-date">{{ date('d-m-Y', strtotime($property->created_at));}}</td>
            <td class="action">
				<a href="{{url('seller/readproperty/'.$property->id)}}" class="view tooltip left" title="View"><i class="icon-feather-eye"></i></a>
				<a href="{{url('seller/editproperty/' .$property->id)}}" class="edit tooltip left" title="Edit"><i class="icon-feather-edit"></i></a> 
				<a href="{{url('seller/deleteproperty/' .$property->id)}}" class="delete tooltip left" title="Delete"><i class="icon-feather-trash-2"></i></a>
			</td>
          </tr>

          @endforeach
        </table>
        <a href="{{url('seller/addproperty')}}" class="utf-centered-button margin-top-30 button">Add New Property</a> 
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