<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Validator;
class logincontroller extends Controller
{

 
    // --------------------Admin-----------------------

    public function adminlogin(){
        return view('admin.login');
    }
    public  function adminloginaction(Request $req){

      $req->validate([
          'email' => 'required|email',
          'password'=> 'required',
        ]);
      

        if (Auth::attempt(['email' => $req->email, 'password' => $req->password,'user_role' => 1])) {

          if(auth::user()->user_role == 1 && auth::user()->status == 1){
          return redirect('admin/dashboard');
          }
          else{
            return back()->with(['error1'=> 'Password and Email does not match try again']);
          }
      }


        else{
          return back()->with(['error1'=> 'Password and Email does not match try again']);
        }
      }
    
    
    
    // --------------------Seller----------------------
    
    public function sellerlogin(){
        return view('seller.login');
    }
    
    
    public function sellerloginaction(Request $req){
    
        $req->validate([
            'email' => 'required|email',
            'password'=> 'required'
          ]);
  
          if (Auth::attempt(['email' => $req->email, 'password' => $req->password ,'user_role' => 2])) { 

          
        
        
            if(auth::user()->user_role == 2 && auth::user()->status == 1){
            return redirect('seller/myprofile');
          }
          else{
            return back()->with(['message'=> 'Password and Email does not match try again']);
          }
        }
        
        
          else{
            return back()->with(['message'=> 'Password and Email does not match try again']);
          }
    
          
      
     
    
    }
    

    public function clientloginaction(Request $req){
    
   
      $req->validate([
          'email' => 'required|email',
          'password'=> 'required'
        ]);
  
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password,'user_role' => 3 ])) { 

                
          
      
          if(auth::user()->user_role == 3 && auth::user()->status == 1){
          return redirect('client/myprofile');
        }
        else{
          return back()->with(['message'=> 'Password and Email does not match try again']);
        }
      }
      
      
        else{
          return back()->with(['message'=> 'Password and Email does not match try again']);
        }
  
        
    
   
  
  }
    
    }
