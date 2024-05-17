<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from utouchdesign.com/themes/realfun/add-new-Blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Aug 2021 07:06:49 GMT -->
<head>
@include('includes.head')
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
<script>
        var dropzone = new Dropzone('#file-upload', {
            previewTemplate: document.querySelector('#preview-template').innerHTML,
            parallelUploads: 3,
            thumbnailHeight: 150,
            thumbnailWidth: 150,
            maxFilesize: 5,
            filesizeBase: 1500,
            thumbnail: function (file, dataUrl) {
                if (file.previewElement) {
                    file.previewElement.classList.remove("dz-file-preview");
                    var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
                    for (var i = 0; i < images.length; i++) {
                        var thumbnailElement = images[i];
                        thumbnailElement.alt = file.name;
                        thumbnailElement.src = dataUrl;
                    }
                    setTimeout(function () {
                        file.previewElement.classList.add("dz-image-preview");
                    }, 1);
                }
            }
        });
        
        var minSteps = 6,
            maxSteps = 60,
            timeBetweenSteps = 100,
            bytesPerStep = 100000;

        dropzone.uploadFiles = function (files) {
            var self = this;

            for (var i = 0; i < files.length; i++) {

                var file = files[i];
                totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));

                for (var step = 0; step < totalSteps; step++) {
                    var duration = timeBetweenSteps * (step + 1);
                    setTimeout(function (file, totalSteps, step) {
                        return function () { 
                            file.upload = {
                                progress: 100 * (step + 1) / totalSteps,
                                total: file.size,
                                bytesSent: (step + 1) * file.size / totalSteps
                            };

                            self.emit('uploadprogress', file, file.upload.progress, file.upload
                                .bytesSent);
                            if (file.upload.progress == 100) {
                                file.status = Dropzone.SUCCESS;
                                self.emit("success", file, 'success', null);
                                self.emit("complete", file);
                                self.processQueue();
                            }
                        };
                    }(file, totalSteps, step), duration);
                }
            }
        }

    </script>
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
            <h2>Blog Gallery</h2>
            <!-- Breadcrumbs -->
            <nav id="breadcrumbs">
              <ul>
                <li><a href="{{url('home')}}">Home</a></li>
                <li>Blog Gallery</li>
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
      <!-- Submit Page -->
      <div class="col-md-9">
        <div class="submit-page">
         
          
          <!-- Section -->
          <h3>Blog Gallery</h3>
		  <div class="utf-submit-page-inner-box">
			
              <div class="margin-top-65"></div>
				

                  <div id="dropzone">
        <form action="{{ route('dropzoneFileUpload4') }}" class="dropzone"  id="file-upload" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="blog_id" id="post_id" value="{{$id1}}">
            <div class="dz-message">
            <i class='sl sl-icon-cloud-upload'></i>  Drag and Drop Single/Multiple Files Here<br>
            </div>
        </form>
    
			  </div>
		  </div>
          <!-- Section / End --> 
    
          
       
          
          <!-- Section -->
			
		  </div>
		</div>
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

 

<script src="{{asset('public/assets/js/dropzone/dropzone-script.js')}}"></script>


</body>

</html>