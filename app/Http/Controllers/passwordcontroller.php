<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\user;

class passwordcontroller extends Controller
{
    //*****************Admin*******************

function adminupdatepassword(){
   return view('admin.updatepassword');
}

function  adminupdatepassword11(Request $req){

  $req->validate([
      'oldpassword' => 'required',
      'newpassword' => 'required',
      'confirmpassword' => 'same:newpassword',
  ]);
 
  $id =Auth::id();
  $user= user::find($id);

 if(password_verify($req->oldpassword,$user->password)){
      $user->password = bcrypt($req->newpassword);
$user->save();
      return back()->with('message','Update');;
  }
  else{
      return back()->with(['error'=> 'Old Password  does not match try again']);
    }
}

    // *****************************Seller*******************

 function    sellerchangepassword(){

    return view('seller.changepassword');
 }


 function  sellerchangepasswordaction(Request $req){

   $req->validate([
       'oldpassword' => 'required',
       'newpassword' => 'required',
       'confirmpassword' => 'same:newpassword|max:16|min:6',
   ]);
  
   $id =Auth::id();
   $user= user::find($id);

  if(password_verify($req->oldpassword,$user->password)){

       $user->password = bcrypt($req->newpassword);
$user->save();
       return back()->with('message','Update');
   }
   else{
       return back()->with(['error'=> 'Old Password  does not match try again']);
     }
}

  // *****************************Client*******************
  function    clientchangepassword(){

    return view('client.changepassword');
 }


 function  clientchangepasswordaction(Request $req){

   $req->validate([
       'oldpassword' => 'required',
       'newpassword' => 'required',
       'confirmpassword' => 'same:newpassword|max:16|min:6',
   ]);
  
   $id =Auth::id();
   $user= user::find($id);

  if(password_verify($req->oldpassword,$user->password)){

       $user->password = bcrypt($req->newpassword);
$user->save();
       return back()->with('message','Update');
   }
   else{
       return back()->with(['error'=> 'Old Password  does not match try again']);
     }
}
}
