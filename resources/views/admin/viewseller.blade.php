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
            <!-- Page Sidebar Ends-->
            <div class="page-body">
               <div class="container-fluid">
                  <div class="page-title">
                     <div class="row">
                        <div class="col-6">
                           <h3>View Seller</h3>
                        </div>
                        <div class="col-6">
                           <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
                              <li class="breadcrumb-item">Seller</li>
                              <li class="breadcrumb-item active">View Seller</li>
                           </ol>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Container-fluid starts-->
               <div class="container-fluid">
                  <div class="row">
                     <!-- Default ordering (sorting) Starts-->
                     <div class="col-sm-12">
                        <div class="card">
                           <div class="card-body">
                              <div class="table-responsive">
                                 <table class="display dataTable" id="basic-3">
                                    <thead>
                                       <tr>
                                          <th>#</th>
                                          <th>Image</th>
                                          <th>Name</th>
                                      
                                          <th>Role</th>
                                          <th>Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                    @php
$count= 1
@endphp

                                      @foreach($seller as $seller)
                                       <tr>
                                          <td>{{$count++}}</td>
                                          <td><img src="{{url('storage/app/' .$seller->image )}}" style=" height:48px;width:52px; border-radius: 50px" alt=""></td>
                                          <td>{{$seller->name}}</td>
                                         
                                          <td>
                                             <span class="badge badge-success"> 
                                               
                                            
                                   @if($seller->user_type == 1)  Owner @endif
                                  @if($seller->user_type == 2) Landlord @endif
                                 @if($seller->user_type == 3)   Funding Sources @endif
                                   @if($seller->user_type == 4)  Broker @endif
                               
                                            
                                            
                                            </span>
                                          </td>
                                          <td>
                                             <a href="{{url('admin/sellerdelete/' .$seller->id)}}" onClick="return confirm('Are you sure?')"><i class="fa fa-times-circle fa-lg" style="color: red" ></i></a>
                                             &nbsp;
                                             <a href="{{url('admin/userdetail/' . $seller->id)}}"><i class="fa fa-info fa-lg text-info"></i></a>
                                          </td>
                                       </tr>
                                       @endforeach
                                       
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Default ordering (sorting) Ends-->
                  </div>
               </div>
               <!-- Container-fluid Ends-->
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
   </body>
   <!-- Mirrored from admin.pixelstrap.com/cuba/theme/datatable-basic-init.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Apr 2021 09:52:44 GMT -->
</html>