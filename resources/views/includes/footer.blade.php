<div id="footer" > 
    <div class="container" >
      <div class="row">
	    <div class="col-md-5 col-sm-12 col-xs-12"> 
      <img class="mt-2" src="{{asset('public/assets1/images/footer_logo.png')}}"
            style=" height:130px;width:350px; margin-top:20px; important"
          alt="">
         </div>
        <div class="col-md-2 col-sm-3 col-xs-6">
          <h4>Useful Links</h4>
          <ul class="utf-footer-links-item">
            <li><a href="{{url('home')}}">Home</a></li>
            <li><a href="{{url('homepropertycategory/' . 111 )}}">All Properties</a></li>
            
            <li><a href="{{url('homebusinesscategory/' . 111 )}}">All Business</a></li>

            
            <li><a href="{{url('allblog'  )}}">All Blogs</a></li>

        
            <li><a href="{{url('contact')}}">Contact</a></li>
          </ul>
        </div>
        <div class="col-md-2 col-sm-3 col-xs-6">
          <h4>My Account</h4>
          <ul class="utf-footer-links-item">
          @if(Auth::check() && auth::user()->user_role == 2 )
          <li><a href="{{url('seller/myprofile')}}">My Profile</a></li>
        
          @elseif(Auth::check() && auth::user()->user_role == 3 )
          <li><a href="{{url('client/myprofile')}}">My Profile</a></li>
         
          @else
          <li><a href="#">My Profile</a></li>
          @endif
            <li><a href="{{url('seller/viewproperty')}}">My Properties</a></li>
            <li><a href="{{url('seller/viewbusiness')}}">My Business</a></li>
            
            @if(Auth::check() && auth::user()->user_role == 2 )
            <li><a href="{{url('seller/viewblog')}}">My Blog</a></li>
        
          @elseif(Auth::check() && auth::user()->user_role == 3 )
          <li><a href="{{url('client/viewblog')}}">My Blog</a></li>
         
          @else
          <li><a href="#">My Blog</a></li>
          @endif

		
            <li><a href="{{url('seller/login')}}">Login as Seller</a></li>
          </ul>
        </div>
       
        <div class="col-md-2 col-sm-3 col-xs-6">
          <h4>Contact</h4>
          <div class="col-md-12">	
                               <b>  <p style="font-size:20px;">Email </p> </b>
                               <p style="line-height: 0">info@example.com</p>
                              </div>
                              <div class="col-md-12">	
                               <b>  <p style="font-size:20px;">Contact  </p> </b>
                               <p style="line-height: 0">+931 7663763</p>
                              </div>

                            
        </div>
  </div>
  <script>
         $('#Select').on('change', function() {
  var value = $(this).val();
  

  var x = document.getElementById("demo");
  
  if(value == 3){
  x.style.display = "block";


  }
  else {
         x.style.display = "none";
         }

});
      </script>