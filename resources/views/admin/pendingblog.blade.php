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
                           <h3>Pending Blog</h3>
                        </div>
                        <div class="col-6">
                           <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="index.html">                    
                                 <i data-feather="home"></i></a>
                              </li>
                              <li class="breadcrumb-item">Blog</li>
                              <li class="breadcrumb-item active">Pending Blog</li>
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
                                          <th>Image</th>
                                          <th>Title</th>
                                          <th>Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       @php
                                       $count= 1
                                       @endphp
                                       @foreach($blog as $blog)
                                       <tr>
                                          <td>{{$count++}}</td>
                                          <td><img src="{{url('storage/app/' .$blog->primary_image)}}" style=" height:48px;width:52px; border-radius: 50px" alt=""></td>
                                          <td>{{$blog->title}}</td>
                                          <td>
                                             <a href="{{url('admin/adminblogdelete/'.$blog->id)}}" onClick="return confirm('Are you sure?')"><i class="fa fa-times-circle fa-lg" style="color: red" ></i></a>
                                             &nbsp;
                                            
                                             
                                             <a href="{{url('admin/adminblogapprove/'.$blog->id)}}" ><i class="fas fa-check" style="color: green" ></i></a>
                                             &nbsp;
                                             <a href="{{url('admin/sellerdetail')}}" data-bs-toggle="modal" data-bs-target="#test{{$blog->id}}"><i class="fa fa-info fa-lg text-info"></i></a>
                                          </td>

                                           <!-- Large modal-->
                                 <div class="modal fade" tabindex="-1" id="test{{$blog->id}}"role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <h4 class="modal-title" id="myLargeModalLabel">{{$blog->blog_user->name}}</h4>
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
                                                            <div class="avatar"><img alt="" src="{{url('storage/app/' .$blog->blog_user->image)}}"></div>
                                                         </div>
                                                         <div class="info">
                                                         @if( !is_null($blog->description))
                                                            <div class="row">
                                                               <div class="col">
                                                                  <p class="mt-3" style="font-size:20px; float:left"> <b> Description  </b></p>
                                                                  <textarea id="" class="md-textarea form-control" rows="4"    name="description">{{$blog->description}}</textarea>
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
                                                                           <a href="{{asset('storage/app/' . $blog->primary_image)}}" itemprop="contentUrl" data-size="1600x950">
                                                                              <div><img src="{{asset('storage/app/' . $blog->primary_image)}}" style="width:200px;height:120px;" itemprop="thumbnail" alt="Image description"></div>
                                                                           </a>
                                                                        </figure>
                                                                 
                                                                        @foreach($blog->images  as $image)    

                                                                       
                                                                                                                                               
                                                                        <figure class=" col-md-4 col-6 img-hover hover-1" itemprop="associatedMedia" itemscope="">
                                                                           <a href="{{asset('public/images/'.$image->file)}}" itemprop="contentUrl" data-size="1600x950">
                                                                              <div><img src="{{asset('public/images/'. $image->file)}}" style="width:200px;height:120px;" itemprop="thumbnail" alt="Image description"></div>
                                                                           </a>
                                                                        </figure>
                                                                        @endforeach
                                                                     </div>

                                                                     @if( count($blog->videos ) > 0)
                                                                     <div class="row">
                                                               <div class="col">
                                                                  <p class="my-3" style="font-size:20px; float:left"> <b> Videos  </b></p>
                                                               </div>
                                                            </div>
                                                         

                                                                     <div class="row">
                                                                        
                                                                        @foreach($blog->videos  as $video)    
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