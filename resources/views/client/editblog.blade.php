<!DOCTYPE html>
<html lang="en">
   <!-- Mirrored from utouchdesign.com/themes/realfun/add-new-Blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Aug 2021 07:06:49 GMT -->
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
                        <h2>Edit Blog</h2>
                        <!-- Breadcrumbs -->
                        <nav id="breadcrumbs">
                           <ul>
                              <li><a href="index.html">Home</a></li>
                              <li>Edit Blog</li>
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
                  @include('client.includes.sidebar')
               </div>
               <form action="{{url('client/editblogaction')}}" method="post"  enctype="multipart/form-data">
               @csrf
              
               <input class="search-field" name="id"  type="hidden" value="{{$blog->id}}"/>	
               <!-- Submit Page -->
               <div class="col-md-9">
                  <div class="submit-page">
                     <!-- Section -->
                     <div class="utf-submit-page-inner-box">
                        <h3>Blog Basic Information</h3>
                        <div class="content with-padding">
                           <div class="col-md-12">
                              <h5>Blog Title</h5>
                              	
                              <input class="search-field" name="title" value="{{$blog->title}}" required placeholder="Blog Title" type="text" value=""/>				  
                           </div>
                           <div class="col-md-12">
                              <h5>Primary Image</h5>
                              <input class="search-field" name="image"  type="file" value=""/>				  
                           </div>
                           <div class="col-md-12">
                              <h5> Description</h5>
                              <textarea id="editor" name="description"  rows="5" >{{$blog->description}}</textarea>
                           </div>
                        </div>
                     </div>
                     <!-- Section / End --> 
                     <div class="row">
                        <div class="col-md-12">
                           <button href="{{url('seller/gallery')}}" class="utf-centered-button button">Upload Gallery</button>
                        </div>
                     </div>
                  </div>
               </div>
</form>
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
      <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
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
   </body>
   <!-- Mirrored from utouchdesign.com/themes/realfun/add-new-Blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Aug 2021 07:06:50 GMT -->
</html>