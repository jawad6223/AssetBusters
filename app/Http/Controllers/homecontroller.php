<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\property;
use App\Models\business;
use App\Models\blog;
use App\Models\user;
use App\Models\image;
use App\Models\video;
use App\Models\business_categories;
use App\Models\property_categories;
use Illuminate\Support\Facades\File; 
use Auth;

class homecontroller extends Controller
{
    
    function home(){
        $property = property::with(['propertycategories','property_user','images','videos'])->where('status',1)->orderBy('id','DESC')->paginate(9);
        $business= business::with(['businesscategories','business_user','images','videos'])->where('status',1)->orderBy('id','DESC')->paginate(9);

        $blog= blog::with(['blog_user','images','videos'])->where('status',1)->orderBy('id','DESC')->paginate(3);
 
        $seller =  user::where('user_role',2)->where('status',1)->orderBy('id','DESC')->paginate(4);
        
        $client =  user::where('user_role',3)->where('status',1)->orderBy('id','DESC')->paginate(4);

        $totalseller = user::where('user_role',2)->count();
        $totalclient = user::where('user_role', 3)->count();
        $totalproperty = property::where('status' ,1)->count();
        $totalbusiness = business::where('status' ,1)->count();
        $total_categories =business_categories::all();
     
 

        return view('home',compact('property','business','blog','client','seller','totalseller','totalclient','totalproperty','total_categories','totalbusiness'));
    }

    function homesearch(request $req){
        
                  if($req->tab ==  1){
                    $category = property_categories::all();
     $city =  property::where('status',1)->get()->unique('city');
        $state =  property::where('status',1)->get()->unique('state');
        
                    $query = property::query();
                   $query->with(['propertycategories','property_user','images','videos'])->where('status',1);
                   
                   if($req->type1){

                   $query->where('property_type',$req->type1); 
                   }
                   if($req->max){
                    $query->where('price','<=', $req->max);          
                  }
                  
                  if($req->min){
                    $query->where('price','>=', $req->min);          
                  }

                  $propertys = $query->orderBy('id','DESC')->paginate(6); 

                  return view('propertycategory',compact('propertys','category','city','state'));
                }   
                if($req->tab == 2){
                     $category = business_categories::all();
     $city =  business::where('status',1)->get()->unique('city');
        $state =  business::where('status',1)->get()->unique('state');
        
                    $query = business::query();
                    $query->with(['businesscategories','business_user','images','videos'])->where('status',1);
                   
                    if($req->type){
                   $query->where('business_categories',$req->type); 
                    }
                   if($req->max){
                    $query->where('total_price','<=', $req->max);          
                  }
                  
                  if($req->min){
                    $query->where('total_price','>=', $req->min);          
                  }

                  $businesss = $query->orderBy('id','DESC')->paginate(6); 

                  return view('businesscategory',compact('businesss','category','city','state'));
                  
                } 
               
  
              
      
                }
}
