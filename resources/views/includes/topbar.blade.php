<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <style>
          @media screen and (max-width: 480px) {
  #logo{
  display:none;
  }
}


      </style>
   </head>
   <body>
      <header id="header-container" class="fullwidth">
         <!-- Header -->
         <div id="header">
            <div class="container">
               <div class="left-side">
                  <div id="logo"><a href="#"><img src="{{asset('public/assets1/images/logo.png')}}" style="width:220px;  important" alt=""></a></div>
                  <div class="mmenu-trigger">
                     <button class="hamburger hamburger--collapse" type="button"> <span class="hamburger-box"> <span class="hamburger-inner"></span> </span> </button>
                  </div>
                  <!-- Main Navigation -->
                  <nav id="navigation" class="style-1 mt-2">
                     <ul id="responsive"  style="padding-top:20px;margin-left:20px;">
                        <li><a class="current" href="{{url('/home')}}">Home</a>
                        </li>
                        <li>
                           <a href="#">Property</a>
                           <ul>
                              <li><a href="{{url('homepropertycategory/' . 111 )}}"> All Categories </a></li>
                              @foreach($cat as $property)
                              <li><a href="{{url('homepropertycategory/' . $property->id )}}">{{ $property->name }}</a></li>
                              @endforeach
                           </ul>
                        </li>
                        <li>
                           <a href="#">Business</a>
                           <ul>
                              <li><a href="{{url('homebusinesscategory/' . 111 )}}"> All Categories </a></li>
                              
                              @foreach($bus as $business)
                              <li><a href="{{url('homebusinesscategory/' . $business->id )}}">{{ $business->name }}</a></li>
                              @endforeach

                           </ul>
                        </li>
                       
                        </li>
                        <li>
                           <a href="#">Seller</a>
                           <ul>
                              <li><a href="{{url('topsellerlist/' . 1)}}">Owner</a></li>
                              
                              <li><a href="{{url('topsellerlist/' . 3)}}">Investor</a></li>
                              <li><a href="{{url('topsellerlist/' . 4)}}">Broker</a></li>
                           </ul>
                        </li>
                        <li>
                           <a href="#">Client</a>
                           <ul>
                              <li><a href="{{url('topclientlist/' . 5)}}">Buyer</a></li>
                              <li><a href="{{url('topclientlist/' . 6)}}">Tenant</a></li>
                              <li><a href="{{url('topclientlist/' . 7)}}">Joint Venture</a></li>
                           </ul>
                        </li>
                        <li>
                           <a href="#">Funding Sources</a>
                           <ul>
                              <li><a href="{{url('allfunding/' . 1)}}">Factoring / Receivables / Contracts Funding</a></li>
                              <li><a href="{{url('allfunding/' . 2)}}">Loan / Mortgage</a></li>
                              <li><a href="{{url('allfunding/' . 3)}}">Private Equity / Venture Capital</a></li>
                              <li><a href="{{url('allfunding/' . 4)}}">Private Offering / Reg A+ / Reg CF</a></li>
                              <li><a href="{{url('allfunding/' . 5)}}">Public Offering / IPO / SPAC</a></li>
                              <li><a href="{{url('allfunding/' . 6)}}">All Funding Types</a></li>
                           </ul>
                        </li>


                        <li>
                           <a href="#">Funding Wanted</a>
                           <ul>
                              <li><a href="{{url('allfundingwanted/' . 1)}}">Agriculture / Cannabis</a></li>
                              <li><a href="{{url('allfundingwanted/' . 2)}}">Crypto / Blockchain</a></li>
                              <li><a href="{{url('allfundingwanted/' . 3)}}">Entertainment / Film / TV</a></li>
                              <li><a href="{{url('allfundingwanted/' . 4)}}">Green Energy / Solar / Renewables</a></li>
                              <li><a href="{{url('allfundingwanted/' . 5)}}">Hotels / Restaurants / Bars</a></li>
                              <li><a href="{{url('allfundingwanted/' . 6)}}">Internet / Online / Tech</a></li>

                              <li><a href="{{url('allfundingwanted/' . 7)}}"> Medical / Pharma / Biotech</a></li>
                              <li><a href="{{url('allfundingwanted/' . 8)}}"> Mining / Metals</a></li>
                              <li><a href="{{url('allfundingwanted/' . 9)}}">Oil & Gas</a></li>
                              <li><a href="{{url('allfundingwanted/' . 10)}}">Real Estate</a></li>
                              <li><a href="{{url('allfundingwanted/' . 11)}}">All Industries</a></li>

                           </ul>
                        </li>

                        
                        <li><a href="{{url('allblog')}}">Blogs</a>
                        </li>
                        <li><a href="{{url('contact')}}">Contact</a></li>
                     </ul>
                  </nav>
                  <div class="clearfix"></div>
               </div>
               <div class="right-side">
                  <div class="header-widget">
                     @if (Auth::check() && auth::user()->user_role == 2)
                     <a href="{{url('seller/logout')}}" class="button border"> <i class="icon-line-awesome-user"></i> 
                     <span> Log out</span></a>
                     <a href="{{url('seller/myprofile')}}" class=" button border sign-in"><i class="icon-feather-plus-circle"></i> <span>Dashboard</span></a> 
                     @elseif(Auth::check() && auth::user()->user_role == 3)
                     <a href="{{url('client/logout')}}" class="button border"> <i class="icon-line-awesome-user"></i> 
                     <span> Log out</span></a>
                     <a href="{{url('client/myprofile')}}" class=" button border sign-in"><i class="icon-feather-plus-circle"></i> <span>Dashboard</span></a> 
                     @else
                     <a href="#utf-signin-dialog-block" 
                        class="popup-with-zoom-anim log-in-button sign-in"><i class="icon-line-awesome-user"></i> 
                     <span>Sign In</span></a>


                     <a  class="log-in-button sign-in blue" href="{{url('seller/login')}}" >Login as Seller</a>

                     @endif
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- Header Container / End --> 
      <!-- Sign In Popup -->
      <div id="utf-signin-dialog-block" class="zoom-anim-dialog mfp-hide dialog-with-tabs">
         <div class="utf-signin-form-part">
            <ul class="utf-popup-tabs-nav-item">
               <li><a href="#login">Log In</a></li>
               <li><a href="#register">Register</a></li>
            </ul>
            <div class="utf-popup-container-part-tabs">
               <!-- Login -->
               <div class="utf-popup-tab-content-item" id="login">
                  <div class="utf-welcome-text-item">
                     <span>Don't Have an Account? <a href="#" class="register-tab">Sign Up!</a></span> 
                  </div>
                  <form method="post" action="{{url('client/clientloginaction')}}" id="login-form">
                     @csrf
                     <div class="utf-no-border">
                        <input type="text" name="email" id="emailaddress" placeholder="Email Address" required/>
                     </div>
                     <div class="utf-no-border">
                        <input type="password" name="password" id="password" placeholder="Password" required/>
                     </div>
                     <div class="checkbox margin-top-0">
                     </div>
                     <a href="{{url('client/clientforget')}}" class="forgot-password">Forgot Password?</a>
                  </form>
                  <button class="button full-width utf-button-sliding-icon ripple-effect" type="submit" form="login-form">Log In <i class="icon-feather-chevrons-right"></i></button>
                  <div class="utf-welcome-text-item">
                     <span>Do you login as Seller ? <a href="{{url('seller/login')}}" class="">Login!</a></span> 
                  </div>
               </div>
               <!-- Register -->
               <div class="utf-popup-tab-content-item" id="register">
                  <div class="utf-welcome-text-item">
                     <h3>Create your account</h3>
                     <p>Enter your personal details to create account</p>
                  </div>
                  <form method="post" action="{{url('client/clientsignupaction')}}" enctype="multipart/form-data"  id="utf-register-account-form">
                     @csrf
                     <div class="utf-no-border">
                        <label>Name:</label>
                        <input type="text" name="name" id="" placeholder="" required/>
                     </div>
                     <div class="utf-no-border">
                        <label>Email:</label>
                        <input type="email" name="email" id="" placeholder="test@gmail.com" required/>
                     </div>
                     <div class="utf-no-border">
                        <label>Password:</label>
                        <input type="password" name="password" id="" placeholder="" required/>
                     </div>
                     <div class="utf-no-border"  style="padding-left:0px;">
                        <label>Client Type:</label>
                        <select class="utf-chosen-select-single-item" id="Select"   name="type" required="required">
                           <option value=""   > Select an option</option>
                           <option value="5">Buyer</option>
                           <option  value="6">Tenant</option>
                           <option value="7">Joint Venture</option>
                        </select>
                     </div>
                     <div class="utf-no-border">
                        <label>Image:</label>
                        <input type="file" name="image" id="" placeholder="" required/>
                     </div>
                  </form>
                  <button class="margin-top-10 button full-width utf-button-sliding-icon ripple-effect" style="margin-top:20px;" type="submit" form="utf-register-account-form">Register <i class="icon-feather-chevrons-right"></i></button>        
               </div>
            </div>
         </div>
      </div>
      <!-- Sign In Popup / End -->
      <div class="clearfix"></div>
   </body>
</html>