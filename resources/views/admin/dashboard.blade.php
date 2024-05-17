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
                  <!-- Container-fluid starts-->
                  <div class="container-fluid">
                  <h4>Sellers</h4>
                     <div class="row mt-2" >
                     <div class="col-sm-12  col-md-4">
                           <div class="card o-hidden">
                              <div class="bg-primary b-r-4 card-body">
                                 <div class="media static-top-widget">
                                    
                                 <div class="align-self-center text-center"><i class="fa fa-users" style="font-size:30px;"></i></div>
                                    <div class="media-body">
                                       <span class="m-0">Total Sellers</span>
                                       <h4 class="mb-0 counter">{{$totalseller}}</h4>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="col-sm-12  col-md-4">
                           <div class="card o-hidden">
                              <div class="bg-success b-r-4 card-body">
                                 <div class="media static-top-widget">
                                    <div class="align-self-center text-center"><i class="fa fa-thumbs-up" style="font-size:30px;"> </i></div>
                                    <div class="media-body">
                                       <span class="m-0">Approval Seller</span>
                                       <h4 class="mb-0 counter">{{$approvalseller}}</h4>
                                       
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="col-sm-12  col-md-4">
                           <div class="card o-hidden">
                              <div class="bg-danger b-r-4 card-body">
                                 <div class="media static-top-widget">
                                    <div class="align-self-center text-center"><i class="fa fa-ellipsis-h" style="font-size:30px;"></i></div>
                                    <div class="media-body">
                                       <span class="m-0">Pending Seller</span>
                                       <h4 class="mb-0 counter">{{$pendingseller}}</h4>
                                      
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  
                     <h4>Clients</h4>
                     <div class="row mt-2" >
                     <div class="col-sm-12  col-md-4">
                           <div class="card o-hidden">
                              <div class="bg-primary b-r-4 card-body">
                                 <div class="media static-top-widget">
                                    
                                 <div class="align-self-center text-center"><i class="fas fa-user" style="padding-right:8px; font-size:30px"></i></div>
                                    <div class="media-body">
                                       <span class="m-0">Total Client</span>
                                       <h4 class="mb-0 counter">{{$totalclient}}</h4>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="col-sm-12  col-md-4">
                           <div class="card o-hidden">
                              <div class="bg-success b-r-4 card-body">
                                 <div class="media static-top-widget">
                                    <div class="align-self-center text-center"><i class="fa fa-thumbs-up" style="font-size:30px;"> </i></div>
                                    <div class="media-body">
                                       <span class="m-0">Approval Client</span>
                                       <h4 class="mb-0 counter">{{$approvalclient}}</h4>
                                       
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="col-sm-12  col-md-4">
                           <div class="card o-hidden">
                              <div class="bg-danger b-r-4 card-body">
                                 <div class="media static-top-widget">
                                    <div class="align-self-center text-center"><i class="fa fa-ellipsis-h" style="font-size:30px;"></i></div>
                                    <div class="media-body">
                                       <span class="m-0">Pending Client</span>
                                       <h4 class="mb-0 counter">{{$pendingclient}}</h4>
                                      
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                 
                     <h4>Properties</h4>
                     <div class="row mt-2" >
                     <div class="col-sm-12  col-md-4">
                           <div class="card o-hidden">
                              <div class="bg-primary b-r-4 card-body">
                                 <div class="media static-top-widget">
                                    
                                 <div class="align-self-center text-center"><i class="fas fa-igloo" style=" font-size:30px"></i></div>
                                    <div class="media-body">
                                       <span class="m-0">Total Properties</span>
                                       <h4 class="mb-0 counter">{{$totalproperty}}</h4>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="col-sm-12  col-md-4">
                           <div class="card o-hidden">
                              <div class="bg-success b-r-4 card-body">
                                 <div class="media static-top-widget">
                                    <div class="align-self-center text-center"><i class="fa fa-thumbs-up" style="font-size:30px;"> </i></div>
                                    <div class="media-body">
                                       <span class="m-0">Approval Properties</span>
                                       <h4 class="mb-0 counter">{{$approvalproperty}}</h4>
                                       
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="col-sm-12  col-md-4">
                           <div class="card o-hidden">
                              <div class="bg-danger b-r-4 card-body">
                                 <div class="media static-top-widget">
                                    <div class="align-self-center text-center"><i class="fa fa-ellipsis-h" style="font-size:30px;"></i></div>
                                    <div class="media-body">
                                       <span class="m-0">Pending Properties</span>
                                       <h4 class="mb-0 counter">{{$pendingproperty}}</h4>
                                      
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>


                     <h4>Business</h4>
                     <div class="row mt-2" >
                     <div class="col-sm-12  col-md-4">
                           <div class="card o-hidden">
                              <div class="bg-primary b-r-4 card-body">
                                 <div class="media static-top-widget">
                                    
                                 <div class="align-self-center text-center"><i class="fas fa-landmark" style="padding-right:8px; font-size:30px;"></i> </div>
                                    <div class="media-body">
                                       <span class="m-0">Total Business</span>
                                       <h4 class="mb-0 counter">{{$totalbusiness}}</h4>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="col-sm-12  col-md-4">
                           <div class="card o-hidden">
                              <div class="bg-success b-r-4 card-body">
                                 <div class="media static-top-widget">
                                    <div class="align-self-center text-center"><i class="fa fa-thumbs-up" style="font-size:30px;"> </i></div>
                                    <div class="media-body">
                                       <span class="m-0">Approval Business</span>
                                       <h4 class="mb-0 counter">{{$approvalbusiness}}</h4>
                                       
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="col-sm-12  col-md-4">
                           <div class="card o-hidden">
                              <div class="bg-danger b-r-4 card-body">
                                 <div class="media static-top-widget">
                                    <div class="align-self-center text-center"><i class="fa fa-ellipsis-h" style="font-size:30px;"></i></div>
                                    <div class="media-body">
                                       <span class="m-0">Pending Business</span>
                                       <h4 class="mb-0 counter">{{$pendingbusiness}}</h4>
                                      
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>

                     <h4>Blogs</h4>
                     <div class="row mt-2" >
                     <div class="col-sm-12  col-md-4">
                           <div class="card o-hidden">
                              <div class="bg-primary b-r-4 card-body">
                                 <div class="media static-top-widget">
                                    
                                 <div class="align-self-center text-center"><i class="fas fa-blog" style="padding-right:8px; font-size:30px"></i></div>
                                    <div class="media-body">
                                       <span class="m-0">Total Blogs</span>
                                       <h4 class="mb-0 counter">{{$totalblog}}</h4>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="col-sm-12  col-md-4">
                           <div class="card o-hidden">
                              <div class="bg-success b-r-4 card-body">
                                 <div class="media static-top-widget">
                                    <div class="align-self-center text-center"><i class="fa fa-thumbs-up" style="font-size:30px;"> </i></div>
                                    <div class="media-body">
                                       <span class="m-0">Approval Blogs</span>
                                       <h4 class="mb-0 counter">{{$approvalblog}}</h4>
                                       
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="col-sm-12  col-md-4">
                           <div class="card o-hidden">
                              <div class="bg-danger b-r-4 card-body">
                                 <div class="media static-top-widget">
                                    <div class="align-self-center text-center"><i class="fa fa-ellipsis-h" style="font-size:30px;"></i></div>
                                    <div class="media-body">
                                       <span class="m-0">Pending Properties</span>
                                       <h4 class="mb-0 counter">{{$pendingblog}}</h4>
                                      
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
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