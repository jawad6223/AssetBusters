<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;

class signupcontroller extends Controller
{

    // --------------------Sellelr----------------------

public function sellersignup(){
    return view('seller.signup');
}


public function sellersignupaction(Request $req){
  
   
    $req->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|max:16|min:6',
        'image' => 'required||mimes:jpeg,jpg,bmp,png',
        'usertype' => 'required'

]);



$filename = $req->file('image')->store('media');
 

$user11 = user::create([
   'name'=>$req->name,
   'email'=>$req->email,
   'password'=>bcrypt($req->password),
   'contact'=>$req->contact,
   'image'=>$filename,
   'user_type' => $req->usertype,
   'user_role'=> 2
]);
   
return back()->with('message','Successfully create account wait Admin approval then login');
}




// Client


public function clientsignupaction(Request $req){

    $req->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|max:16|min:6',
        'image' => 'required||mimes:jpeg,jpg,bmp,png',
        

]);



$filename = $req->file('image')->store('media');
 

$user11 = user::create([
   'name'=>$req->name,
   'email'=>$req->email,
   'password'=>bcrypt($req->password),
   'image'=>$filename,
   'user_type' => $req->type,
   'user_role'=> 3
]);
   
return back()->with('signupmessage','Successfully create account wait Admin approval then login');
}
}
