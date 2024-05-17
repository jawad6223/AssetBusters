@include('admin.includes.head');
<!-- Page Sidebar Start-->
<div class="sidebar-wrapper">
   <div>
      <div class="logo-wrapper py-2" >
         <a href="{{url('admin/dashboard')}}"><img class="img-fluid for-light pb-2" src="{{asset('public/assets/images/logo/logo.png')}}" alt="" style="width:250px;height:70px; ">
        </a>
         <div class="back-btn"><i class="fa fa-angle-left"></i></div>
         <!-- <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div> -->
      </div>
      <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="{{asset('public/assets/images/logo/logo-icon.png')}}" alt=""></a></div>
      <nav class="sidebar-main">
         <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
         <div id="sidebar-menu">
            <ul class="sidebar-links" id="simple-bar">
               <li class="back-btn">
                  <a href="index.html"><img class="img-fluid" src="{{asset('public/assets/images/logo/logo-icon.png')}}" alt=""></a>
                  <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
               </li>
               <li class=" sidebar-list">
          <a class="sidebar-link sidebar-title " href="{{ url('/admin/dashboard' )}}"><i class="fas fa-home" style="padding-right:8px; font-size:17px"></i><span class="lan-3">Dashboard              </span></a>
               </li>
               <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title" href="#"><i class="fas fa-igloo" style="padding-right:8px; font-size:17px"></i><span>property </span></a>
                  <ul class="sidebar-submenu">

                  <li><a href="{{ url('/admin/viewproperty' )}}">View Property</a></li>
                     <li><a href="{{ url('/admin/pendingproperty' )}}"> Pending Approvals </a></li>
                     </ul>
               </li>
             
                

               <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title" href="{{url('admin/addpropertycategory')}}"><i class="fas fa-dungeon" style="padding-right:8px; font-size:17px;"></i> <span>property Categories</span></a>
                
               </li>

               <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title" href="#"><i class="fas fa-warehouse" style="padding-right:8px; font-size:17px"></i><span> Business </span></a>
                  <ul class="sidebar-submenu">

                  <li><a href="{{ url('/admin/viewbusiness' )}}">View Business</a></li>
                     <li><a href="{{ url('/admin/pendingbusiness' )}}"> Pending Approvals </a></li>
                     </ul>
               </li>

               
               <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title" href="{{url('admin/addbusinesscategory')}}"><i class="fas fa-landmark" style="padding-right:8px; font-size:17px;"></i> <span>Business Categories</span></a>
                
               </li>

               <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title" href="#"><i class="fas fa-blog" style="padding-right:8px; font-size:20px"></i><span>Blog </span></a>
                  <ul class="sidebar-submenu">

                  <li><a href="{{ url('/admin/viewblog' )}}">View Blog</a></li>
                     <li><a href="{{ url('/admin/pendingblog' )}}"> Pending Approvals </a></li>
                     </ul>
               </li>

  <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title" href="#"><i class="fas fa-users" style="padding-right:8px; font-size:17px"></i><span>Seller</span></a>
                  <ul class="sidebar-submenu">
                     <li><a href="{{ url('/admin/viewseller')}}">View Seller</a></li>
                     <li><a href="{{ url('/admin/pendingseller')}}"> Pending Approvals </a></li>
                  </ul>
               </li>

               <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title" href="#"><i class="fas fa-user" style="padding-right:8px; font-size:20px"></i><span> Client </span></a>
                  <ul class="sidebar-submenu">
                     <li><a href="{{ url('/admin/viewclient')}}">View Client</a></li>
                     <li><a href="{{ url('/admin/pendingclient')}}"> Pending Approvals </a></li>
                  </ul>
               </li>
              
               
            </ul>
         </div>
         <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
      </nav>
   </div>
</div>
<!-- Page Sidebar Ends-->