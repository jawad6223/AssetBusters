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
                           <h3>Pending Property</h3>
                        </div>
                        <div class="col-6">
                           <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="index.html">                    
                                 <i data-feather="home"></i></a>
                              </li>
                              <li class="breadcrumb-item">Property</li>
                              <li class="breadcrumb-item active">pending Property</li>
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
                                 @if (session('approve'))
                                 <div class="alert alert-success mb-2" id="hi">
                                    {{session('approve')}}
                                 </div>
                                 @endif
                                 <table class="display dataTable" id="basic-3">
                                    <thead>
                                       <tr>
                                          <th>#</th>
                                          <th>Title</th>
                                          <th>Property Categories</th>
                                          <th> Property Type </th>
                                          <th>Price</th>
                                          <th>Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       @php
                                       $count= 1
                                       @endphp
                                       @foreach($property as $property)
                                       <tr>
                                          <td>{{$count++}}</td>
                                          <td>{{$property->title}}</td>
                                          <td><span class="badge badge-danger">
                                             {{$property->propertycategories->name}}</span>
                                          </td>
                                          <td>
                                             <span class="badge badge-success"> Sale</span>
                                          </td>
                                          <td>346$</td>
                                          <td>
                                             <a href="{{url('admin/adminpropertydelete/'.$property->id)}}" onClick="return confirm('Are you sure?')"><i class="fa fa-times-circle fa-lg" style="color: red" ></i></a>
                                             &nbsp;
                                             <a href="{{url('admin/adminpropertyapprove/'.$property->id)}}" ><i class="fas fa-check" style="color: green" ></i></a>
                                             &nbsp;
                                             <a href="" data-bs-toggle="modal" data-bs-target="#test{{$property->id}}"><i class="fa fa-info fa-lg text-info"></i></a>
                                          </td>
                                          <!-- Large modal-->
                                          <div class="modal fade" tabindex="-1" role="dialog"  id="test{{$property->id}}" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                             <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                   <div class="modal-header">
                                                      <h4 class="modal-title" id="myLargeModalLabel">{{$property->title}}</h4>
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
                                                                                    <span>{{$property->propertycategories->name}}</span>
                                                                                 </div>
                                                                              </div>
                                                                              <div class="col-md-6">
                                                                                 <div class="ttl-info text-start">
                                                                                    <h6><i class="fa fa-calendar"></i>   Type</h6>
                                                                                    <span>
                                                                                    @if($property->property_type == 1)
                                                                                    For Sale
                                                                                    @elseif($property->property_type == 2)
                                                                                    For Leased
                                                                                    @else
                                                                                    Auction
                                                                                    @endif
                                                                                    </span>
                                                                                 </div>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-lg-4 order-sm-0 order-xl-1">
                                                                           <div class="user-designation">
                                                                              <div class="title"><a target="_blank" href="#">{{$property->property_user->name}}</a></div>
                                                                              <div class="desc">
                                                                                 @if($property->property_user->user_role == 2)
                                                                                 @if($property->property_user->user_type == 1)  Owner @endif
                                                                                 @if($property->property_user->user_type == 2) Landlord @endif
                                                                                 @if($property->property_user->user_type == 3)   Funding Sources @endif
                                                                                 @if($property->property_user->user_type == 4)  Broker @endif
                                                                                 @else
                                                                                 @if($property->property_user->user_type == 5)  Buyer    @endif 
                                                                                 @if($property->property_user->user_type == 6)  Tenant    @endif 
                                                                                 @if($property->property_user->user_type == 7)  Joint venture   @endif 
                                                                                 @endif
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                        <div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">
                                                                           <div class="row">
                                                                              <div class="col-md-12">
                                                                                 <div class="ttl-info text-start">
                                                                                    <h6><i class="fa fa-location-arrow"></i>   Location</h6>
                                                                                    <span>  {{$property->street}},
                                                                                    {{$property->city}},{{$property->state}},{{$property->zip}},{{$property->country}}</span>
                                                                                 </div>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <hr>
                                                                     <div class="row">
                                                                        @if( !is_null($property->price))
                                                                        <div class="col-md-3">
                                                                           <div class="ttl-info text-start">
                                                                              <h6><i class="fas fa-hand-holding-usd"></i>  Price</h6>
                                                                              <span>$ {{$property->price}}</span>
                                                                           </div>
                                                                        </div>
                                                                        @endif
                                                                        @if( !is_null($property->property_id))
                                                                        <div class="col-md-3">
                                                                           <div class="ttl-info text-start">
                                                                              <h6><i class="fa fa-location-arrow"></i>  Property Id</h6>
                                                                              <span>{{$property->property_id}}</span>
                                                                           </div>
                                                                        </div>
                                                                        @endif
                                                                        @if( !is_null($property->area))
                                                                        <div class="col-md-3">
                                                                           <div class="ttl-info text-start">
                                                                              <h6><i class="fas fa-dungeon"></i>  Area</h6>
                                                                              <span>{{$property->area}} Sq Ft</span>
                                                                           </div>
                                                                        </div>
                                                                        @endif
                                                                        @if( !is_null($property->bluilding_height))
                                                                        <div class="col-md-3">
                                                                           <div class="ttl-info text-start">
                                                                              <h6><i class="fas fa-igloo"></i>  Bluilding Height</h6>
                                                                              <span>{{$property->bluilding_height}}</span>
                                                                           </div>
                                                                        </div>
                                                                        @endif
                                                                     </div>
                                                                     <div class="row mt-4">
                                                                        @if( !is_null($property->frontage))
                                                                        <div class="col-md-3">
                                                                           <div class="ttl-info text-start">
                                                                              <h6><i class="fas fa-landmark"></i>  Frontage</h6>
                                                                              <span>{{$property->frontage}}</span>
                                                                           </div>
                                                                        </div>
                                                                        @endif
                                                                        @if( !is_null($property->year_built))
                                                                        <div class="col-md-3">
                                                                           <div class="ttl-info text-start">
                                                                              <h6><i class="fa fa-location-arrow"></i> Year bluit</h6>
                                                                              <span>{{$property->year_built}}</span>
                                                                           </div>
                                                                        </div>
                                                                        @endif
                                                                        @if( !is_null($property->expire_date))
                                                                        <div class="col-md-3">
                                                                           <div class="ttl-info text-start">
                                                                              <h6><i class="fa fa-location-arrow"></i> Expire Date</h6>
                                                                              <span>{{$property->expire_date}}</span>
                                                                           </div>
                                                                        </div>
                                                                        @endif
                                                                        @if( !is_null($property->buyer_fee))
                                                                        <div class="col-md-3">
                                                                           <div class="ttl-info text-start">
                                                                              <h6><i class="fa fa-location-arrow"></i> Buyer Fee</h6>
                                                                              <span> $ {{$property->buyer_fee}}</span>
                                                                           </div>
                                                                        </div>
                                                                        @endif
                                                                     </div>
                                                                     <div class="row mt-4">
                                                                        @if( !is_null($property->room))
                                                                        <div class="col-md-3">
                                                                           <div class="ttl-info text-start">
                                                                              <h6><i class="fas fa-warehouse"></i> Room/Units</h6>
                                                                              <span>  {{$property->room}}</span>
                                                                           </div>
                                                                        </div>
                                                                        @endif
                                                                        @if( !is_null($property->cap_rate))
                                                                        <div class="col-md-3">
                                                                           <div class="ttl-info text-start">
                                                                              <h6><i class="fas fa-percent"></i> Cap Rate</h6>
                                                                              <span> {{$property->cap_rate}} %</span>
                                                                           </div>
                                                                        </div>
                                                                        @endif
                                                                        @if( !is_null($property->leasedrate))
                                                                        <div class="col-md-3">
                                                                           <div class="ttl-info text-start">
                                                                              <h6><i class="fa fa-location-arrow"></i> Leased Rate</h6>
                                                                              <span> {{$property->leased_rate}}</span>
                                                                           </div>
                                                                        </div>
                                                                        @endif
                                                                        @if( !is_null($property->available_space))
                                                                        <div class="col-md-3">
                                                                           <div class="ttl-info text-start">
                                                                              <h6><i class="fa fa-location-arrow"></i> Available Space</h6>
                                                                              <span>  {{$property->available_space}} Sq Ft</span>
                                                                           </div>
                                                                        </div>
                                                                        @endif
                                                                        @if( $property->tenancy != 0)
                                                                        <div class="col-md-3">
                                                                           <div class="ttl-info text-start">
                                                                              <h6><i class="fa fa-location-arrow"></i> Tenancy</h6>
                                                                              @if( $property->tenancy == 1)  <span>  Single </span>  @endif
                                                                              @if( $property->tenancy == 2 ) <span> Multiple </span> @endif
                                                                           </div>
                                                                        </div>
                                                                        @endif
                                                                     </div>
                                                                     <div class="row">
                                                                        <div class="col">
                                                                           <p class="mt-3" style="font-size:20px; float:left"> <b> Amenities </b></p>
                                                                        </div>
                                                                     </div>
                                                                     <div class="row mt-4">
                                                                        @if($property->new_lunch == 1)
                                                                        <div class="col-md-2">
                                                                           <div class="ttl-info text-start">
                                                                              <h6>  New Lunch <i class="fas fa-check" style="color:green;padding-left:2px;"></i></h6>
                                                                           </div>
                                                                        </div>
                                                                        @endif
                                                                        @if($property->lighting == 1)
                                                                        <div class="col-md-2">
                                                                           <div class="ttl-info text-start">
                                                                              <h6> Lighting <i class="fas fa-check" style="color:green;padding-left:2px;"></i></h6>
                                                                           </div>
                                                                        </div>
                                                                        @endif
                                                                        @if($property->gas == 1)
                                                                        <div class="col-md-2">
                                                                           <div class="ttl-info text-start">
                                                                              <h6> Gas <i class="fas fa-check" style="color:green;padding-left:2px;"></i></h6>
                                                                           </div>
                                                                        </div>
                                                                        @endif
                                                                        @if($property->water == 1)
                                                                        <div class="col-md-2">
                                                                           <div class="ttl-info text-start">
                                                                              <h6> Water<i class="fas fa-check" style="color:green;padding-left:2px;"></i></h6>
                                                                           </div>
                                                                        </div>
                                                                        @endif
                                                                        @if($property->heating == 1)
                                                                        <div class="col-md-2">
                                                                           <div class="ttl-info text-start">
                                                                              <h6> Heating <i class="fas fa-check" style="color:green;padding-left:2px;"></i></h6>
                                                                           </div>
                                                                        </div>
                                                                        @endif
                                                                     </div>
                                                                     @if( !is_null($property->description))
                                                                     <div class="row">
                                                                        <div class="col">
                                                                           <p class="mt-3" style="font-size:20px; float:left"> <b> Description  </b></p>
                                                                           <textarea id="" class="md-textarea form-control" rows="4"    name="description"> {{$property->description}}</textarea>
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
                                                                           <a href="{{asset('storage/app/' . $property->primaryimage)}}" itemprop="contentUrl" data-size="1600x950">
                                                                              <div><img src="{{asset('storage/app/' . $property->primaryimage)}}" style="width:200px;height:120px;" itemprop="thumbnail" alt="Image description"></div>
                                                                           </a>
                                                                        </figure>
                                                                        @foreach($property->images  as $image)    
                                                                        <figure class=" col-md-4 col-6 img-hover hover-1" itemprop="associatedMedia" itemscope="">
                                                                           <a href="{{asset('public/images/'.$image->file)}}" itemprop="contentUrl" data-size="1600x950">
                                                                              <div><img src="{{asset('public/images/'. $image->file)}}" style="width:200px;height:120px;" itemprop="thumbnail" alt="Image description"></div>
                                                                           </a>
                                                                        </figure>
                                                                        @endforeach
                                                                     </div>
                                                                     @if( count($property->videos ) > 1)
                                                                     <div class="row">
                                                                        <div class="col">
                                                                           <p class="my-3" style="font-size:20px; float:left"> <b> Videos  </b></p>
                                                                        </div>
                                                                     </div>
                                                                     @endif  
                                                                     <div class="row">
                                                                        @foreach($property->videos  as $video)    
                                                                        <div class="col-md-4">
                                                                           <a href="{{asset('public/images/'. $video->file)}}" itemprop="contentUrl" data-size="1600x950">
                                                                              <video width="105%" height="115" controls itemprop="thumbnail">
                                                                                 <source src="{{asset('public/images/'. $video->file)}}"  >
                                                                              </video>
                                                                           </a>
                                                                        </div>
                                                                        @endforeach
                                                                     </div>
                                                                  </div>
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