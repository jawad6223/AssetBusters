<!DOCTYPE html>
<html lang="en">
   <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/vendors/datatables.css')}}">
   @include('admin.includes.head')
   <body>
      <div class="loader-wrapper">
         <div class="loader-index"><span></span></div>
         <svg>
            <defs></defs>
            <filter id="goo">
               <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
               <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"> </fecolormatrix>
            </filter>
         </svg>
      </div>
      <div class="page-wrapper compact-wrapper" id="pageWrapper">
         @include('admin.includes.topbar')
         <!-- Page Body Start-->
         <div class="page-body-wrapper">
            @include('admin.includes.sidebar')
            <div class="page-body">
               <div class="container-fluid">  
                   
               
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3> Profile Detail</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                  
                             <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Details</li>
                    <li class="breadcrumb-item active"> Profile Detail</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="user-profile">
              <div class="row">
                <!-- user profile first-style start-->
                <div class="col-sm-12">
                  <div class="card hovercard text-center">
                    <div class="cardheader" style="height:200px;"></div>
                    <div class="user-image">
                      <div class="avatar"><img alt="" src="{{url('storage/app/' . $seller->image)}}"></div>
                    
                    </div>
                    <div class="info">
                      <div class="row">
                        <div class="col-sm-6 col-lg-4 order-sm-1 order-xl-0">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="ttl-info text-start">
                                <h6><i class="fa fa-envelope"></i>   Email</h6><span>{{$seller->email}}</span>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="ttl-info text-start">
                              <h6><i class="fa fa-phone"></i>   Contact Us</h6><span>{{$seller->contact}}</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12 col-lg-4 order-sm-0 order-xl-1">
                          <div class="user-designation">
                            <div class="title"><a target="_blank" href="#">{{$seller->name}}</a></div>
                            <div class="desc">

                            @if($seller->user_role == 2)
                            @if($seller->user_type == 1)  Owner @endif
                                  @if($seller->user_type == 2) Landlord @endif
                                 @if($seller->user_type == 3)   Funding Sources @endif
                                   @if($seller->user_type == 4)  Broker @endif
                                @else
                                @if($seller->user_type == 5)  Buyer    @endif 
                               @if($seller->user_type == 6)  Tenant    @endif 
                                 @if($seller->user_type == 7)  Joint venture   @endif 
                                 @endif
                           </div>
                          </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">
                          <div class="row">
                           
                            <div class="col-md-12">
                              <div class="ttl-info text-start">
                                <h6><i class="fa fa-location-arrow"></i>   Location</h6><span>
                                {{$seller->street}},
                        {{$seller->city}},{{$seller->state}},{{$seller->zip}},{{$seller->country}}
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="social-media">
                        <ul class="list-inline">
                        @if( !is_null($seller->facebook))
                          <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                         @endif
                          @if( !is_null($seller->twitter))
                          <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                          @endif
                          @if( !is_null($seller->instagram))
                          <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li> @endif
                          @if( !is_null($seller->linkedin))
                          <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>  @endif
                        </ul>
                      </div>

                      @if( !is_null($seller->description))
                      <div class="col">
    <p class="mt-3" style="font-size:20px; float:left"> <b> Description  </b></p>
    <textarea id="" class="md-textarea form-control" rows="4"    name="description"></textarea>
    </div>
    @endif
</div>
                     
                    </div>
                  </div>
                </div>
                <!-- user profile first-style end-->
                </div>
                <div>

                </div>
               </div>
              
                  <!-- Individual column searching (text inputs) Ends-->
               </div>
               </div>
         <!-- footer start-->
         @include('admin.includes.footer')
     
      </div>
         </div>
    
      <!-- latest jquery-->
      <script src="{{asset('public/assets/js/jquery-3.5.1.min.js')}}"></script>
      <!-- Bootstrap js-->
      <script src="{{asset('public/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
      <!-- feather icon js-->
      <script src="{{asset('public/assets/js/icons/feather-icon/feather.min.js')}}"></script>
      <script src="{{asset('public/assets/js/icons/feather-icon/feather-icon.js')}}"></script>
      <!-- scrollbar js-->
      <script src="{{asset('public/assets/js/scrollbar/simplebar.js')}}"></script>
      <script src="{{asset('public/assets/js/scrollbar/custom.js')}}"></script>
      <!-- Sidebar jquery-->
      <script src="{{asset('public/assets/js/config.js')}}"></script>
      <!-- Plugins JS start-->
      <script src="{{asset('public/assets/js/sidebar-menu.js')}}"></script>
      <script src="{{asset('public/assets/js/notify/bootstrap-notify.min.js')}}"></script>
      <script src="{{asset('public/assets/js/select2/select2.full.min.js')}}"></script>
      <script src="{{asset('public/assets/js/select2/select2-custom.js')}}"></script>
      <!-- Plugins JS Ends-->
      <!-- Theme js-->
      <script src="https://use.fontawesome.com/43c99054a6.js')}}"></script>
      <script src="{{asset('public/assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('public/assets/js/datatable/datatables/datatable.custom.js')}}"></script>
      <script src="{{asset('public/assets/js/script.js')}}"></script>
      <script>
         $('#hi').delay(2000).slideUp(1200);
      </script>
      <script type="text/javascript">
         $('#datatable_page').dataTable( {
           "pageLength": 25,
            "order": [[ 1, "desc" ]]
         } );
      </script>
   </body>
</html>