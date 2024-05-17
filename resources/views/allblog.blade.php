<!DOCTYPE html>
<html lang="en">
   <!-- Mirrored from utouchdesign.com/themes/realfun/listings-list-with-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Aug 2021 07:06:49 GMT -->
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
         <!-- Header Container / End --> 
         <!-- Titlebar -->
         <div class="parallax titlebar" data-background="{{asset('public/assets1/images/listing-02.jpg')}}" data-color="rgba(48, 48, 48, 1)" data-color-opacity="0.8" data-img-width="800" data-img-height="505">
            <div id="titlebar">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <h2>All Blogs</h2>
                        <!-- Breadcrumbs -->
                        <nav id="breadcrumbs">
                           <ul>
                              <li><a href="{{url('home')}}">Home</a></li>
                              <li>All Blogs</li>
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
               <div class="col-md-">
                  @foreach($blog as $blog)
                
                  <div class="col-md-4">
                     <div class="blog-post">
                        <a href="{{url('blogdetail/' . $blog->id)}}" class="post-img"> <img src="{{asset('storage/app/' . $blog->primary_image)}}" style="height:230px;" alt=""> </a> 
                        <div class="utf-post-content-area">
                           <h3><a href="{{url('blogdetail/' . $blog->id)}}">{{$blog->title}}</a></h3>
                           <div class="utf-listing-user-info"><a href="{{url('homesellerprofile/ ' .$blog->blog_user->id)}}">
                             <i class="icon-line-awesome-user"></i> {{$blog->blog_user->name}}</a> <span>{{ $blog->created_at->format('d/m/Y') }}</span>
                            </div>

             
                        </div>
                     </div>
                  </div>
                  @endforeach
                  <!-- Pagination -->
                  <!-- <div class="utf-pagination-container margin-top-20">
                     <nav class="pagination">
                       <ul>
                         <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                     <li><a href="#" class="current-page">1</a></li>
                         <li><a href="#">2</a></li>
                         <li><a href="#">3</a></li>
                         <li class="blank">...</li>
                         <li><a href="#">10</a></li>
                     <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                       </ul>
                     </nav>          
                     </div> -->
                  <!-- Pagination / End -->         
               </div>
            </div>
         </div>
         <div class="margin-top-65"></div>
         <!-- Back To Top Button -->
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
   </body>
   <!-- Mirrored from utouchdesign.com/themes/realfun/listings-list-with-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Aug 2021 07:06:49 GMT -->
</html>