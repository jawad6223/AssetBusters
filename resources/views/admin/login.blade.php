<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from admin.pixelstrap.com/cuba/theme/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Apr 2021 09:50:27 GMT -->
<head>
@include('admin.includes.head')
  </head>
  <body>
  
    <!-- login page start-->
    <div class="container-fluid p-0">
      <div class="row m-0">
        <div class="col-12 p-0">    
          <div class="login-card">
            <div>
              <div><a class="logo" href=""><img class="img-fluid for-light" src="{{asset('public/assets/images/logo/login.png')}}" style="width:350px;height:100px;" alt="looginpage">
         </a></div>
              <div class="login-main"> 
              @if (session('error1'))
              <div class="alert alert-danger mb-2" id="hi" role="alert">
Invalid Credentials 
</div>                   
   @endif
                <form class="theme-form" action="{{url('admin/adminloginaction')}}" method="post">
            
                  @csrf
                    <h4>Sign in to account</h4>
                  <p>Enter your email & password to login</p>
                  <div class="form-group">
                    <label class="col-form-label">Email Address</label>
                    <input class="form-control" type="email" required  name="email"  >
               
                      @error('email')
                      <span class="text-danger">
                      {{$message}}
                      </span>
                    @enderror
                   
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Password</label>
                    <div class="form-input position-relative">
                      <input class="form-control" id="login_password" required type="password" name="password" >
                      @error('password')
                      <span class="text-danger">
                      {{$message}}
                      </span>
                    @enderror
                      <div class="show-hide">
                        <span class="show" onclick="visibility()"> </span>
                      </div>
                    </div>
                  </div>
                   
                  
                 
                      
                  <div class="form-group mb-0">
                    <div class="checkbox p-0">
                      <input id="checkbox1" type="checkbox">
                    
                    </div><a class="link" href="{{ url('admin/adminforget') }}">Forgot password?</a>
                    <div class="text-end mt-3">
                      <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                    </div>
                  </div>
                 
                  
                </form>
              </div>
            </div>
          </div>
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
      <!-- Sidebar jquery-->
      <script src="{{asset('public/assets/js/config.js')}}"></script>
      <!-- Plugins JS start-->
      <!-- Plugins JS Ends-->
      <!-- Theme js-->
      <script src="{{asset('public/assets/js/script.js')}}"></script>
      <!-- login js-->
      <!-- Plugin used-->
    </div>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script>
      function visibility() {
  var x = document.getElementById('login_password');
  if (x.type === 'password') {
    x.type = "text";
    $('#eyeShow').show();
    $('#eyeSlash').hide();
  }else {
    x.type = "password";
    $('#eyeShow').hide();
    $('#eyeSlash').show();
  }
}
    </script>
      <script>
$('#hi').delay(2000).slideUp(1200);
</script>
  </body>

<!-- Mirrored from admin.pixelstrap.com/cuba/theme/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Apr 2021 09:50:27 GMT -->
</html>