<!DOCTYPE html>
<html lang="en">
   <!-- Mirrored from utouchdesign.com/themes/realfun/agents-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Aug 2021 07:07:08 GMT -->
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
                        <h2>client Profile</h2>
                        <!-- Breadcrumbs -->
                        <nav id="breadcrumbs">
                           <ul>
                              <li><a href="{{url('home')}}">Home</a></li>
                              <li>client Profile</li>
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
                  <!-- Agency -->
                  <div class="agent agents-profile agency margin-bottom-40">
                  <div class="utf-agent-avatar"> 
							   <a href="{{url('homeclientprofile/'.$client->id)}}"> <img src="{{asset('storage/app/' . $client->image)}}"   style="height:250px"
							   alt=""> <span class="view-profile-btn">View Profile</span> </a> 
							</div>
                            
                     <div class="utf-agent-content">
                        <div class="utf-agent-name">
                           <h4><a href="agency-profile.html">{{$client->name}}</a></h4>
                           <span>{{$client->street}},{{$client->country}},{{$client->state}},{{$client->zip}},{{$client->country}}</span>
                           <ul class="utf-agent-contact-details">
                           @if( !is_null($client->contact))  
                              <li><i class="icon-feather-smartphone"></i>{{$client->contact}}</li>
                              @endif 
                           
                              <li><i class="icon-material-outline-email"></i><a href="#">{{$client->email}}</a></li> 
                           </ul>
                           <ul class="utf-social-icons">
                           @if( !is_null($client->facebook))   
                              <li><a class="facebook" target="blank" href="{{$client->facebook}}"><i class="icon-facebook"></i></a></li>
                          @endif   
                          @if( !is_null($client->instagram))  
                              <li><a class="instagram"  target="blank" href="{{$client->instagram}}"><i class="icon-instagram"></i></a></li>
                              @endif   
                          @if( !is_null($client->twitter))  
                              <li><a class="twitter"  target="blank" href="{{$client->twitter}}"><i class="fab fa-twitter"></i></a></li>
                              @endif   
                          @if( !is_null($client->linkedin))  
                              <li><a class="linkedin"  target="blank" href="{{$client->linkedin}}"><i class="fab fa-linkedin-in"></i></a></li>
                              @endif 
                                      </ul>
                        </div>
                        <div class="clearfix"></div>
                        <p>{{$client->description}}</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>


        

         <div class="container">
            <div class="row sticky-wrapper">
               <div class="col-lg-8 col-md-8">
                  <div class="utf-desc-headline-item margin-top-0">
                     <h3><i class="icon-material-outline-description"></i> {{$client->name}} Blogs</h3>
                  </div>
                  <!-- Listings -->
                  <div class="utf-listings-container-area list-layout">
                  @foreach($blog as $blog)
                  <div class="col-md-6">
                     <div class="blog-post">
                        <a href="{{url('blogdetail')}}" class="post-img"> <img src="{{asset('storage/app/' . $blog->primary_image)}}" height="240px" alt=""> </a> 
                        <div class="utf-post-content-area">
                           <h3><a href="blog_detail_right_sidebar.html">{{$blog->title}}</a></h3>
                           <div class="utf-listing-user-info"><a href="{{url('homeclientprofile/' . $blog->user_id)}}"><i class="icon-line-awesome-user"></i> {{$blog->blog_user->name}}</a> <span>{{ $blog->created_at->format('d/m/Y') }}</span></div>
                        </div>
                     </div>
                  </div>
                  @endforeach
                  </div>
                  <!-- Listings Container / End --> 
                
               </div>
                  <!-- Sidebar -->
                  <div class="col-lg-4 col-md-4">
                  <div class="sidebar">
                     <!-- Widget -->
                     <div class="widget utf-sidebar-widget-item">
                        <div class="agent-widget">
                           <div class="utf-boxed-list-headline-item">
                              <h3>Listed By Agents Details</h3>
                           </div>
                           <div class="agent-title">
                              <div class="agent-photo"><img src="{{asset('storage/app/' . $client->image)}}" alt="" /></div>
                              <div class="agent-details">
                                 <h4><a href="#">{{$client->name}}</a></h4>
                                 <span>{{$client->contact}}</span>
                                 <br>
                                 <span>{{$client->email}}</span>
                              </div>
                              <div class="clearfix"></div>
                           </div>
                           <form action="{{url('messageaction')}}" method="post">
                              @csrf
                              <input type="text" name="name" required placeholder="name">
                              <input type="text" name="email" required placeholder="Email">
                              <input type="text" name="phone" required placeholder="Phone">
                              <input type="text" name="subject" required placeholder="Subject">
                              <input type="date" name="date"  required>
                              <small>Office hours are 9am to 6pm</small>
                              <input type="time" name="time"
                                 min="09:00" max="18:00" required>
                              <textarea  name="description" required placeholder="Description.."></textarea>
                              <button class="button fullwidth margin-top-5" type="submit">Send Message</button>
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