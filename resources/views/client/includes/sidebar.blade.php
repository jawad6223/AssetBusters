<div class="margin-bottom-20">
                     <div class="utf-edit-profile-photo-area">
               
                     <img src="{{asset('storage/app/'.auth()->user()->image)}}" style="width:250px;height:250px;" alt="">
 
                     </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="sidebar margin-top-20">
                     <div class="user-smt-account-menu-container">
                        <ul class="user-account-nav-menu">
                           <li><a href="{{url('client/myprofile')}}"><i class="fas fa-user"></i> My Profile</a></li>
                          

                           <li><a href="{{url('client/addblog')}}"><i class="fas fa-blog"></i> Add New Blog</a></li>
                           <li><a href="{{url('client/viewblog')}}"><i class="fab fa-blogger"></i> View Blog</a></li>
                          
                           <li><a href="{{url('client/favouriteproperty')}}"><i class="fas fa-igloo"></i> Favourite Properties</a></li>
                           <li><a href="{{url('client/favouritebusiness')}}"><i class="fas fa-warehouse"></i> Favourite Business</a></li>

                           <li><a href="{{url('client/changepassword')}}"><i class="fas fa-lock"></i> Change Password</a></li>
                           <li><a href="{{url('client/logout')}}"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
                        </ul>
                     </div>
                  </div>

                  