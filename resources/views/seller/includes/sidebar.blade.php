<div class="margin-bottom-20">
                     <div class="utf-edit-profile-photo-area">
               
                     <img src="{{asset('storage/app/'.auth()->user()->image)}}" style="width:250px;height:250px;" alt="">
 
                     </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="sidebar margin-top-20">
                     <div class="user-smt-account-menu-container">
                        <ul class="user-account-nav-menu">
                           <li><a href="{{url('seller/myprofile')}}"><i class="fas fa-user"></i> My Profile</a></li>
                           <li><a href="{{url('seller/addproperty')}}"><i class="fas fa-landmark"></i> Add New Property</a></li>
                           <li><a href="{{url('seller/viewproperty')}}"><i class="fas fa-igloo"></i> View Property</a></li>
                          

 <li><a href="{{url('seller/addbusiness')}}"><i class="fas fa-dungeon"></i> Add New Business</a></li>
                           <li><a href="{{url('seller/viewbusiness')}}"><i class="fas fa-warehouse"></i> View Business</a></li>


                           <li><a href="{{url('seller/addfunding')}}"><i class="fas fa-hands-helping"></i>Add Funding Source</a></li>
                           <li><a href="{{url('seller/viewfunding')}}"><i class="fas fa-hard-hat"></i>View Funding Source</a></li>

                           <li><a href="{{url('seller/addfundingwanted')}}"><i class="fas fa-hands-helping"></i>Add Funding wanted</a></li>
                           <li><a href="{{url('seller/viewfundingwanted')}}"><i class="fas fa-city"></i> View Funding wanted</a></li>



                           <li><a href="{{url('seller/addblog')}}"><i class="fas fa-blog"></i> Add New Blog</a></li>
                           <li><a href="{{url('seller/viewblog')}}"><i class="fab fa-blogger"></i> View Blog</a></li>
                          

                           <li><a href="{{url('seller/changepassword')}}"><i class="fas fa-lock"></i> Change Password</a></li>
                           <li><a href="{{url('seller/logout')}}"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
                        </ul>
                     </div>
                  </div>

                  