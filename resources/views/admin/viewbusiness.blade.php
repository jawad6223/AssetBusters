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
                           <h3>View Business</h3>
                        </div>
                        <div class="col-6">
                           <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="index.html">                    
                                 <i data-feather="home"></i></a>
                              </li>
                              <li class="breadcrumb-item">Business</li>
                              <li class="breadcrumb-item active">View Business</li>
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
                              @if (session('delete'))
                                    <div class="alert alert-success mb-2" id="hi">
                                       {{session('delete')}}
                                    </div>
                                    @endif
                                 <table class="display dataTable" id="basic-3">
                                    <thead>
                                       @php
                                       $count= 1
                                       @endphp
                                       <tr>
                                          <th>#</th>
                                          <th>Title</th>
                                          <th>Business Categories</th>
                                          <th> Business Type </th>
                                          <th>Total Price</th>
                                          <th>Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($business as $business)
                                       <tr>
                                          <td>{{$count++}}</td>
                                          <td>{{$business->title}}</td>
                                          <td><span class="badge badge-danger">  {{$business->businesscategories->name}}</span></td>
                                          <td>
                                             <span class="badge badge-success"> 
                                             @if($business->business_type == 1)
                          For Sale
                           @else
                           For Leased
                       
                           @endif
                                             </span>
                                          </td>
                                          <td>$ {{$business->total_price}}</td>
                                          <td>
                                             <a href="{{url('admin/adminbusinessdelete/'.$business->id)}}" onClick="return confirm('Are you sure?')"><i class="fa fa-times-circle fa-lg" style="color: red" ></i></a>
                                             &nbsp;
                                             <a href="" data-bs-toggle="modal" data-bs-target="#test{{$business->id}}"><i class="fa fa-info fa-lg text-info"></i></a>
                                          </td>
                                            <!-- Large modal-->
                                 <div class="modal fade"  id="test{{$business->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <h4 class="modal-title" id="myLargeModalLabel">{{$business->title}}</h4>
                                             <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                             <div class="user-profile">
                                                <div class="row">
                                                   <!-- user profile first-style start-->
                                                   <div class="col-sm-12">
                                                      <div class="card hovercard text-center">
                                                         <div class="cardheader" style="height:150px;"></div>
                                                         <div class="user-image">
                                                            <div class="avatar"><img alt="" src="{{url('public/assets/images/user/7.jpg')}}"></div>
                                                         </div>
                                                         <div class="info">
                                                            <div class="row">
                                                               <div class="col-sm-6 col-lg-4 order-sm-1 order-xl-0">
                                                                  <div class="row">
                                                                     <div class="col-md-6">
                                                                        <div class="ttl-info text-start">
                                                                           <h6><i class="fa fa-envelope"></i> Category</h6>
                                                                           <span>{{$business->businesscategories->name}}</span>
                                                                        </div>
                                                                     </div>
                                                                     <div class="col-md-6">
                                                                        <div class="ttl-info text-start">
                                                                           <h6><i class="fa fa-calendar"></i>   Type</h6>
                                                                           <span>                 @if($business->business_type == 1)
                          For Sale
                           @else
                           For Leased
                       
                           @endif</span>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="col-sm-12 col-lg-4 order-sm-0 order-xl-1">
                                                                  <div class="user-designation">
                                                                     <div class="title"><a target="_blank" href="#">{{$business->business_user->name}}</a></div>
                                                                     <div class="desc">
                                                                                                                                          
                            @if($business->business_user->user_type == 1)  Owner @endif
                                  @if($business->business_user->user_type == 2) Landlord @endif
                                 @if($business->business_user->user_type == 3)   Funding Sources @endif
                                   @if($business->business_user->user_type == 4)  Broker @endif
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">
                                                                  <div class="row">
                                                                     <div class="col-md-12">
                                                                        <div class="ttl-info text-start">
                                                                           <h6><i class="fa fa-location-arrow"></i>   Location</h6>
                                                                           <span>{{$business->street}},{{$business->city}},{{$business->state}},{{$business->zip}},{{$business->country}}</span>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                            @if( !is_null($business->total_price))
                                                               <div class="col-md-3">
                                                                  <div class="ttl-info text-start">
                                                                     <h6> Total  Price</h6>
                                                                     <span>$ {{$business->total_price}}</span>
                                                                  </div>
                                                               </div>
                                                               @endif
                                                               @if( !is_null($business->business_id))
                                                               <div class="col-md-3">
                                                                  <div class="ttl-info text-start">
                                                                     <h6> {{$business->business_id}}</h6>
                                                                     <span>34</span>
                                                                  </div>
                                                               </div>

                                                               @endif
                                                               @if( !is_null($business->gross_revenue))
                                                               <div class="col-md-3">
                                                                  <div class="ttl-info text-start">
                                                                     <h6>  Gross Revenue</h6>
                                                                     <span> $ {{$business->gross_revenue}}</span>
                                                                  </div>
                                                               </div>
                                                               @endif
                                                               @if( !is_null($business->cash_flow))
                                                               <div class="col-md-3">
                                                                  <div class="ttl-info text-start">
                                                                     <h6>  Cash flow</h6>
                                                                     <span>$ {{$business->cash_flow}}</span>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            @endif

                                                            <div class="row mt-4">
                                                     
                                                               @if( !is_null($business->real_estate))
                                                               <div class="col-md-3">
                                                                  <div class="ttl-info text-start">
                                                                     <h6> Real Estate</h6>
                                                                     <span>

                                                                     @if($business->real_estate == 1)  Owned @endif
                                  @if($business->real_estate == 2) Leased @endif
                                                                     </span>
                                                                  </div>
                                                               </div>
                                                               @endif
                                                               @if( !is_null($business->employees))
                                                               <div class="col-md-3">
                                                                  <div class="ttl-info text-start">
                                                                     <h6>Employess</h6>
                                                                     <span>{{$business->employees}}</span>
                                                                  </div>
                                                               </div>
                                                               @endif
                                                               @if( !is_null($business->asking_price))
                                                               <div class="col-md-3">
                                                                  <div class="ttl-info text-start">
                                                                     <h6>Asking  Price</h6>
                                                                     <span>$ {{$business->asking_price}}</span>
                                                                  </div>
                                                               </div>
                                                               @endif
                                                               @if( !is_null($business->year_built))
                                                               <div class="col-md-3">
                                                                  <div class="ttl-info text-start">
                                                                     <h6>Year Bluit </h6>
                                                                     <span>{{$business->year_built}}</span>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            @endif
                                                          
                                                           
                                                            <div class="row mt-3">
                                                         
                                                               @if( !is_null($business->reason_for_saling))
                                                               <div class="col-md-4">
                                                                  <p class="" style="font-size:15px; float:left"> <b> Reason of selling  </b></p>
                                                                  <textarea id="" class="md-textarea form-control" rows="4"    > {{$business->reason_for_saling}} </textarea>
                                                               </div>
                                                               @endif
                                                               @if( !is_null($business->inventory))
                                                               <div class="col-md-4">
                                                                  <p class="" style="font-size:15px; float:left"> <b> Inventory  </b></p>
                                                                  <textarea id="" class="md-textarea form-control" rows="4"    >{{$business->inventory}}</textarea>
                                                               </div>
                                                               @endif
                                                               @if( !is_null($business->support_and_training))
                                                               <div class="col-md-4">
                                                                  <p class="" style="font-size:15px; float:left"> <b> Support and Training  </b></p>
                                                                  <textarea id="" class="md-textarea form-control" rows="4"   >{{$business->support_and_training}}</textarea>
                                                               </div>
                                                            </div>
                                                            @endif
                                                               @if( !is_null($business->description))
                                                            <div class="row">
                                                               <div class="col">
                                                                  <p class="mt-3" style="font-size:20px; float:left"> <b> Description  </b></p>
                                                                  <textarea id="" class="md-textarea form-control" rows="4"    name="description">
                                                                  {!! htmlspecialchars_decode(nl2br($business->description)) !!}
                                                                  </textarea>
                                                               </div>
                                                            </div>
                                                            @endif
                                                               
                                                            <div class="row">
                                                               <div class="col">
                                                                  <p class="my-3" style="font-size:20px; float:left"> <b> Images  </b></p>
                                                               </div>
                                                            </div>
                                                            
                                                            <div class="row">
                                                               
                                                               <figure class="col-md-4 col-6 img-hover hover-1" itemprop="associatedMedia" itemscope="">
                                                                           <a href="{{asset('storage/app/' . $business->primaryimage)}}" itemprop="contentUrl" data-size="1600x950">
                                                                              <div><img src="{{asset('storage/app/' . $business->primaryimage)}}" style="width:200px;height:120px;" itemprop="thumbnail" alt="Image description"></div>
                                                                           </a>
                                                                        </figure>
                                                                 
                                                                        @foreach($business->images  as $image)    

                                                                       
                                                                                                                                               
                                                                        <figure class=" col-md-4 col-6 img-hover hover-1" itemprop="associatedMedia" itemscope="">
                                                                           <a href="{{asset('public/images/'.$image->file)}}" itemprop="contentUrl" data-size="1600x950">
                                                                              <div><img src="{{asset('public/images/'. $image->file)}}" style="width:200px;height:120px;" itemprop="thumbnail" alt="Image description"></div>
                                                                           </a>
                                                                        </figure>
                                                                        @endforeach
                                                                     </div>

                                                                     @if( count($business->videos ) > 0)
                                                                     <div class="row">
                                                               <div class="col">
                                                                  <p class="my-3" style="font-size:20px; float:left"> <b> Videos  </b></p>
                                                               </div>
                                                            </div>
                                                         

                                                                     <div class="row">
                                                                        
                                                                        @foreach($business->videos  as $video)    
                                                                        <div class="col-md-4">
                                                                           <a href="{{asset('public/images/'. $video->file)}}" itemprop="contentUrl" data-size="1600x950">
                                                                              <video width="105%" height="115" controls itemprop="thumbnail">
                                                                                 <source src="{{asset('public/images/'. $video->file)}}"  >
                                                                              </video>
                                                                           </a>
                                                                        </div>
                                                                        @endforeach
</div>
                                                            
@endif                      
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <!-- user profile first-style end-->
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                       </tr>
                                       @endforeach
                                    </tbody>
                                 </table>
                               
                              </div>
                           </div>
                           <!-- Default ordering (sorting) Ends-->
                        </div>
                     </div>
                  </div>
                  <div></div>
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