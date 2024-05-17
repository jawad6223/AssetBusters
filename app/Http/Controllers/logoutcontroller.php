<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class logoutcontroller extends Controller
{
    //

    function  sellerlogout(){
        auth::logout();
  return redirect('/seller/login');

    }

    
    function  clientlogout(){
        auth::logout();
  return redirect('home');

    }

    
    function  adminlogout(){
      auth::logout();
return redirect('admin/login');

  }


}
