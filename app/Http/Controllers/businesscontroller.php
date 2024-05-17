<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\business_categories;
use App\Models\business;

use App\Models\image;
use App\Models\video;
use App\Models\favourite;
use Illuminate\Support\Facades\File; 
class businesscontroller extends Controller
{


    //***************** Admin*********************


function adminviewbusiness(){
   
  $business = business::with(['businesscategories','business_user','images','videos'])->where('status',1)->orderBy('id','DESC')->get();
 
    return view('admin.viewbusiness',compact('business'));
     
  }

     function adminpendingbusiness(){
      $business = business::with(['businesscategories','business_user','images','videos'])->where('status',0)->orderBy('id','DESC')->get();
  

      return view('admin.pendingbusiness',compact('business'));
        
     }

     
     function adminbusinessdelete($id){

      $business = business::find($id);

      $destinationPath = 'storage/app/'.$business->primaryimage;
      if(file::exists($destinationPath)){    
       file::delete($destinationPath);
      }


      $images = image::where('business_id',$id)->get();
      $videos = video::where('business_id',$id)->get();
        foreach($images as $image){
          $destinationPath = 'public/images/'.$image->file;
          if(file::exists($destinationPath)){    
           file::delete($destinationPath);
           $image->delete();
          }
        }
        foreach($videos as $video){
          $destinationPath = 'public/images/'.$video->file;
          if(file::exists($destinationPath)){    
           file::delete($destinationPath);
           $video->delete();
          }
        }

       $business->delete();
        return back()->with('delete','Successfully Delete   Business');
    }

    function adminbusinessapprove($id){

      $business=business::find($id);
      $business->status = 1;
      $business->save();
       return back()->with('approve','Successfully Approve Business');
    }


    //  ***********Seller******************

function selleraddbusiness(){

    $categories = business_categories::all();
        
    return view('seller.addbusiness',compact('categories'));
}
 function selleraddbusinessaction(Request $req){


    $req->validate([
        'image' => 'required||mimes:jpeg,jpg,bmp,png',
        'totalprice' =>'required',
        'title' =>'required',
         
]);

     
    $id = auth()->id();

    $filename = $req->file('image')->store('media');
 
 
       $id2 =  business::create([
              'title' => $req->title,
              'user_id' =>$id,
              'primaryimage' => $filename,
              'business_categories' => $req->categories,
              'business_type' => $req->type,
              'business_id' => $req->businessid,
             
              
              'year_built' => $req->yearbluit,
              'description' => $req->description,   
              'street' => $req->street,
              'city' => $req->city, 
              'state' => $req->state,
              'zip' => $req->zip,
              'country' => $req->country,
             'reason_for_saling' =>$req->reason,
             'support_and_training' =>$req->support,
             'inventory' =>$req->inventory,
             'employees' =>$req->employees,
             'total_price'=>$req->totalprice,
             'asking_price'=>$req->askingprice,
             'gross_revenue' =>$req->grossrevenue,
             'cash_flow' =>$req->cashflow,
             'real_estate' =>$req->realestate

           
         ]);

         $id1= $id2->id;

         return view('seller.businessgallery',compact('id1'));
 }

function sellerviewbusiness(){

    $business = business::where('status',1)->orderBy('id','DESC')->get();
    return view('seller.viewbusiness',compact('business'));
}


function sellerreadbusiness($id){
    $images= image::where('business_id',$id)->get();
      
    $videos = video::where('business_id',$id)->get();
 

    $business = business::with(['businesscategories'])->find($id);

    return view('seller.readbusiness',compact('business','images','videos'));
 
}

function sellerdeletebusiness($id){
    $business = business::find($id);

    $destinationPath = 'storage/app/'.$business->primaryimage;
    if(file::exists($destinationPath)){    
     file::delete($destinationPath);
    }

    $images = image::where('business_id',$id)->get();
    $videos = video::where('business_id',$id)->get();
      foreach($images as $image){
        $destinationPath = 'public/images/'.$image->file;
        if(file::exists($destinationPath)){    
         file::delete($destinationPath);
         $image->delete();
        }
      }
      foreach($videos as $video){
        $destinationPath = 'public/images/'.$video->file;
        if(file::exists($destinationPath)){    
         file::delete($destinationPath);
         $video->delete();
        }
      }

     $business->delete();
      return redirect('seller/viewbusiness')->with('delete','Successfully Delete Business');
}

function sellereditbusiness($id){
    
    $business = business::find($id);

    $categories = business_categories::all();

    return view('seller.editbusiness',compact('categories','business'));
}
function sellereditbusinessaction(Request $req){

    
    $req->validate([
       
        'totalprice' =>'required',
        'title' =>'required',
         
]);


$id= $req->id;

$update = business::find($id);


if ($req->has('image')) {
  $req->validate([
  'image' => 'required||mimes:jpeg,jpg,bmp,png',
 ]);
   $image_path = 'storage/app/' . $update->primaryimage;
   File::delete($image_path);
   $filename = $req->file('image')->store('media');
 }
 else {
     $filename = $update->primaryimage;
 }
     
    $id23= auth()->id();

 
 
       $id2 =  business::where('id',$id)->update([
              'title' => $req->title,
              'user_id' =>$id23,
              'primaryimage' => $filename,
              'business_categories' => $req->categories,
              'business_type' => $req->type,
              'business_id' => $req->businessid,
              'year_built' => $req->yearbluit,
              'description' => $req->description,   
              'street' => $req->street,
              'city' => $req->city, 
              'state' => $req->state,
              'zip' => $req->zip,
              'country' => $req->country,
             'reason_for_saling' =>$req->reason,
             'support_and_training' =>$req->support,
             'inventory' =>$req->inventory,
             'employees' =>$req->employees,
             'total_price'=>$req->totalprice,
             'asking_price'=>$req->askingprice,
             'gross_revenue' =>$req->grossrevenue,
             'cash_flow' =>$req->cashflow,
             'real_estate' =>$req->realestate

           
         ]);

      
         return redirect('seller/editbusiness2/' . $id);

     
}

function sellereditbusiness2($id){
   
  
    $image= image::where('business_id',$id)->orderBy('id','DESC')->get();
    
    $video = video::where('business_id',$id)->orderBy('id','DESC')->get();
    
      return view('seller.editbusiness2',compact('image','video','id'));
    }
function  sellerimagebusinessdelete($id){

    $image = image::find($id);
    $destinationPath = 'public/images/'.$image->file;
    
  
    file::delete($destinationPath);
    
    $image->delete();
   
  return back()->with('delete','Successfully Delete Image');
   }
   
  
   function sellervideobusinessdelete($id){
  
    $video= video::find($id);
    
   
    $destinationPath1 = 'public/images/'.$video->file;
  
  
    file::delete($destinationPath1);
    
    $video->delete();
  return back()->with('delete','Successfully Delete Video');
   }


 // **************Client***********

  
 function  businessdetail($id){

  $images= image::where('business_id',$id)->get();
      
  $videos = video::where('business_id',$id)->get();
  $fav = favourite::where('business_id',$id)->first();

  $business = business::with(['businesscategories','business_user'])->find($id);
    return view('businessdetail' ,compact('business','images','videos','fav'));
 
}



    // ---------------home-----------------
    function homebusinesscategory($id){

      $category = business_categories::all();
  $city =  business::where('status',1)->get()->unique('city');
  $state =  business::where('status',1)->get()->unique('state');
  

      if($id == 111){
        $businesss = business::with(['businesscategories','business_user','images','videos'])->where('status',1)->orderBy('id','DESC')->paginate(6);
      
      }
     else{
        $businesss = business::with(['businesscategories','business_user','images','videos'])->where('status',1)->where('business_categories',$id)->orderBy('id','DESC')->paginate(6);
      
      }
    
    
      
       
        return view('businesscategory',compact('businesss','category','city','state'));
      }

      function businesssearch(request $req){
        $category = business_categories::all();
        $city =  business::where('status',1)->get()->unique('city');
        $state =  business::where('status',1)->get()->unique('state');
      
        
                         
          $query = business::query();
         $query->with(['businesscategories','business_user','images','videos'])->where('status',1);
         
         if($req->listingid){
      
         $query->where('business_id',$req->listingid); 
         }
         if($req->type){
      
          $query->where('business_type',$req->type); 
          }
      
          if($req->category){
      
            $query->where('business_categories',$req->category); 
            }
      
            if($req->state){
      
              $query->where('state',$req->state); 
              }
      
              if($req->city){
      
                $query->where('city',$req->city); 
                }
      
                if($req->zip){
      
                  $query->where('zip',$req->zip); 
                  }
      
                  if($req->country){
      
                    $query->where('country',$req->country); 
                    }
      
                    if($req->real_estate){
      
                      $query->where('real_estate',$req->real_estate); 
                      }
      
      
         if($req->pricemax){
          $query->where('total_price','<=', $req->pricemax);          
        }
        
        if($req->peicemin){
          $query->where('total_price','>=', $req->peicemin);          
        }
      
      
     
      
        if($req->yearmax){
          $query->where('year_built','<=', $req->yearmax);          
        }
        
        if($req->yearmin){
          $query->where('year_built','>=', $req->yearmin);          
        }
      
        
      
        $businesss = $query->orderBy('id','DESC')->paginate(6); 
      
        return view('businesscategory',compact('businesss','category','city','state'));
      }
}
