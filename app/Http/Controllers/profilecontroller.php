<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\favourite;
use App\Models\property;
use App\Models\business;
use App\Models\blog;
use App\Models\image;
use App\Models\video;
use Auth;
use Illuminate\Support\Facades\File; 

class profilecontroller extends Controller
{

     // *****************************Admin*******************

     function adminviewprofile(){
        $id =Auth::id();
        $user= user::find($id);
        return view('admin.profile',compact('user'));

     }
     function  adminprofileupdate(request $req){

        
        $req->validate([
            'name' =>'required',
            'email' => 'required|email',
          
        ]);

        $id =Auth::id();
        $update  = user::findOrFail($id);
        $emailExists = user::where('id', '<>', $id)->where('email', $req->email)->first();
        if($emailExists){
            return back()->with('message1','Email Already exist');
        }

        $input = $req->all();
        $update->fill($input)->save();

          return back()->with('message','Successfully update profile'); 
        
    }

    function adminclientdelete($id){

$client = user::find($id);
    $client->delete();
       

          return back()->with('delete','Successfully Delete blog');
    }
    function adminsellerapprove($id){
        $seller=user::find($id);
        $seller->status = 1;
        $seller->save();
         return back()->with('approve','Successfully Approve Seller');
    }


    function adminclientapprove($id){
        $client=user::find($id);
        $client->status = 1;
        $client->save();
         return back()->with('approve','Successfully Approve Client');
    }

    //  Seller
     public function    adminviewseller(){
        $seller = user::where('user_role',2)->where('status',1)->orderBy('id','DESC')->get();
        return view('admin.viewseller',compact('seller'));
    }


    public function    adminuserdetail($id){
        $seller = user::find($id);
        return view('admin.userdetail',compact('seller'));
    }

    public function    adminpendingseller(){
        $seller = user::where('user_role',2)->where('status',0)->get();
        
        return view('admin.pendingseller',compact('seller'));
    }

    public function sellerdelete($id){

        $seller = user::find($id);

         $seller->delete();
         return back()->with('delete','Successfully Delete Seller');
    }

    //  Client
    public function    adminviewclient(){

        $client = user::where('user_role',3)->where('status',1)->orderBy('id','DESC')->get();
        return view('admin.viewclient',compact('client'));
    }


    public function    adminclientdetail(){
        return view('admin.clientdetail');
    }

    public function    adminpendingclient(){
        $client = user::where('user_role',3)->where('status',0)->get();
        return view('admin.pendingclient',compact('client'));
    }
    

 
 // *****************************Seller*******************
    public function sellerprofile(){

        $id = auth()->id();
        $seller = user::find($id);
     

        return view('seller.myprofile', compact('seller'));
    }

    function sellermyprofileaction(Request $req){


        $req->validate([
            'name' => 'required',
            'email' => 'required|email',
            'usertype' => 'required'
    
    ]);


    $id = auth()->id();
   
$update = user::find($id);

$emailExists = user::where('id', '<>', $id)->where('email', $req->email)->first();
        if($emailExists){
            return back()->with('message1','Email Already exist');
        }


    if ($req->has('image')) {

        $req->validate([
          'image' => 'required||mimes:jpeg,jpg,bmp,png',
   ]);
          $image_path = 'storage/app/' . $update->image;
          File::delete($image_path);
       
  
          $filename = $req->file('image')->store('media');
   
      }
     else {
          $filename = $update->image;
      }


     $user11 = user::where('id',$id)->update([
       'name'=>$req->name,
       'email'=>$req->email,
       'password'=>bcrypt($req->password),
       'contact'=>$req->contact,
       'image'=>$filename,
       'street'=>$req->street,
       'city'=>$req->city,
       'state'=>$req->state,
       'zip'=>$req->zip,
       'country'=>$req->country,
       'description' => $req->description,
       'user_type' => $req->usertype,
       'user_role' =>2,
       'facebook'   => $req->facebook,
        'instagram'  =>$req->instagram,
        'linkedin' =>$req->linkedin,
        'twitter' => $req->twitter 
    ]);


       
    return back()->with('message','Successfully Updated Profile');
    }

     // *****************************Client******************

     public function clientprofile(){

        $id = auth()->id();
        $client = user::find($id);
     

        return view('client.myprofile', compact('client'));
     
    }

    function clientmyprofileaction(Request $req){


        $req->validate([
            'name' => 'required',
            'email' => 'required|email',
           
    
    ]);


    $id = auth()->id();
   
$update = user::find($id);

$emailExists = user::where('id', '<>', $id)->where('email', $req->email)->first();
        if($emailExists){
            return back()->with('message1','Email Already exist');
        }


    if ($req->has('image')) {

        $req->validate([
          'image' => 'required||mimes:jpeg,jpg,bmp,png',
   ]);
          $image_path = 'storage/app/' . $update->image;
          File::delete($image_path);
       
  
          $filename = $req->file('image')->store('media');
   
      }
     else {
          $filename = $update->image;
      }


     $user11 = user::where('id',$id)->update([
       'name'=>$req->name,
       'email'=>$req->email,
       'contact'=>$req->contact,
       'image'=>$filename,
       'street'=>$req->street,
       'city'=>$req->city,
       'state'=>$req->state,
       'zip'=>$req->zip,
       'country'=>$req->country,
       'description' => $req->description,
       'user_type' => $req->usertype,
       'user_role' =>3,
       'facebook'   => $req->facebook,
        'instagram'  =>$req->instagram,
        'linkedin' =>$req->linkedin,
        'twitter' => $req->twitter 
    ]);


       
    return back()->with('message','Successfully Updated Profile');
    }


    function sellerlist(){
        $sellers = user::where('user_role',2)->where('status',1)->paginate(9);
    
        return view('sellerlist',compact('sellers'));
    }

    function topsellerlist($id){

        if($id == 1){
        $sellers = user::where('user_role',2)->where('user_type',1)->where('status',1)->paginate(9); }

        
        if($id == 2){
            $sellers = user::where('user_role',2)->where('user_type',2)->where('status',1)->paginate(9); }

            
        if($id == 3){
            $sellers = user::where('user_role',2)->where('user_type',3)->where('status',1)->paginate(9); }
            
        if($id == 4){
            $sellers = user::where('user_role',2)->where('user_type',4)->where('status',1)->paginate(9); }
    
        return view('sellerlist',compact('sellers'));
    }



    function clientlist(){
        $clients = user::where('user_role',3)->where('status',1)->paginate(9);
    
        return view('clientlist',compact('clients'));
    }

    function topclientlist($id){
       

        if($id == 5){
        $clients = user::where('user_role',3)->where('user_type',5)->where('status',1)->paginate(9);
       
            
        }

        if($id == 6){
            $clients = user::where('user_role',3)->where('user_type',6)->where('status',1)->paginate(9); }
            if($id == 7){
                $clients = user::where('user_role',3)->where('user_type',7)->where('status',1)->paginate(9); }
    
        return view('clientlist',compact('clients'));
    }
    function homesellerprofile($id){


$seller = user::where('status',1)->find($id);
        $propertys= property::where('user_id',$id)->where('status',1)->paginate(3);;
        $businesss = business::where('user_id',$id)->where('status',1)->paginate(3);;
        $blogs= blog::where('user_id',$id)->where('status',1)->paginate(3);;
        return view('sellerprofile',compact('seller','propertys','businesss','blogs'));
    }
    
    function homeclientprofile($id){
 $client = user::where('status',1)->find($id);
               
                $blog = blog::with(['blog_user'])->where('user_id',$id)->where('status',1)->paginate(4);;

                return view('clientprofile',compact('client','blog'));
            }
}
