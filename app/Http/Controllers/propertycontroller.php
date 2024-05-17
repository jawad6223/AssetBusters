<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\property_categories;
use App\Models\property;
use App\Models\user;
use App\Models\image;
use App\Models\video;
use App\Models\favourite;
use Illuminate\Support\Facades\File; 
use Auth;

class propertycontroller extends Controller
{
    
//***************** Admin*********************


function adminviewproperty(){

  $property = property::with(['propertycategories','property_user','images','videos'])->where('status',1)->orderBy('id','DESC')->get();
  

    return view('admin.viewproperty' ,compact('property'));


       }

       function adminpendingproperty(){

        $property = property::with(['propertycategories','property_user','images','videos'])->where('status',0)->orderBy('id','DESC')->get();
        return view('admin.pendingproperty' ,compact('property'));
    
           }

           function adminpropertydelete($id){

            $property = property::find($id);
      
            $images = image::where('property_id',$id)->get();
            $videos = video::where('property_id',$id)->get();
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
      
             $property->delete();
              return back()->with('delete','Successfully Delete Property');
          }

          function adminpropertyapprove($id){

            $property=property::find($id);
            $property->status = 1;
            $property->save();
             return back()->with('approve','Successfully Approve Property');
          }
       
    

    //***************** *Seller*********************


    function selleraddproperty(){
        $categories = property_categories::all();
        
 return view('seller.addproperty',compact('categories'));
    }


function selleraddpropertyaction(Request $req){

    $req->validate([
        'image' => 'required||mimes:jpeg,jpg,bmp,png',
        'price' =>'required',
        'title' =>'required',
         
]);

 
if($req->has('newlunch'))
    {
      $newlunch = 1;
    }
    else{
      $newlunch = 0;
    }
    if($req->has('water'))
    {
      $water = 1;
    }
    else{
      $water = 0;
    }

    if($req->has('heating'))
    {
    $heating = 1;
    }
    else{
    $heating = 0;
    }

    if($req->has('lighting'))
    {
    $lighting = 1;
    }
    else{
    $lighting = 0;
    }

    

    if($req->has('gas'))
    {
      $gas = 1;
    }
    else{
      $gas = 0;
    }


    $id = auth()->id();

    $filename = $req->file('image')->store('media');
 
 
       $id2 =  property::create([
              'title' => $req->title,
              'user_id' =>$id,
              'primaryimage' => $filename,
              'property_categories' => $req->categories,
              'property_type' => $req->type,
              'property_id' => $req->propertyid,
              'price' => $req->price,
              'area' => $req->area,
              'year_built' => $req->yearbluit,
              'description' => $req->description,   
              'street' => $req->street,
              'city' => $req->city,
              'state' => $req->state,
              'zip' => $req->zip,
              'country' => $req->country,
              'expire_date' =>$req->expiredate,
              'buyer_fee' =>$req->buyerfee,
              'frontage' =>$req->frontage,
              'bluilding_height' =>$req->height,
              'leased_rate' => $req->leasedrate,
              'room' => $req->room,
              'available_space' =>$req->available,
              'cap_rate' => $req->cap,
              'tenancy' =>$req->tenancy,
              'new_lunch' =>$newlunch,
              'heating'=>$heating,
              'water' =>$water,
              'gas'=> $gas,
              'lighting' =>$lighting
           
         ]);

         $id1= $id2->id;

        
       
         return view('seller.propertygallery',compact('id1'));

        

}

    function sellerviewproperty(){
      $property = property::where('status',1)->orderBy('id','DESC')->get();
        return view('seller.viewproperty',compact('property'));
    }


    function sellerreadproperty($id){
      $images= image::where('property_id',$id)->get();
      
      $videos = video::where('property_id',$id)->get();
   

      $property = property::with(['propertycategories'])->find($id);


      return view('seller.readproperty',compact('property','images','videos'));
    }


    function sellerdeleteproperty($id){

      $property = property::find($id);

      $images = image::where('property_id',$id)->get();
      $videos = video::where('property_id',$id)->get();
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

       $property->delete();
        return redirect('seller/viewproperty')->with('delete','Successfully Delete Property');
    }

    function sellereditproperty($id){
      
  $property = property::find($id);

  $categories = property_categories::all();

  return view('seller.editproperty',compact('property','categories'));
       
    }


    function sellereditpropertyaction(Request $req){
      $req->validate([
        
        'price' =>'required',
        'title' =>'required',
         
]);

$id= $req->id;

$update = property::find($id);


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


if($req->has('newlunch'))
    {
      $newlunch = 1;
    }
    else{
      $newlunch = 0;
    }
    if($req->has('water'))
    {
      $water = 1;
    }
    else{
      $water = 0;
    }

    if($req->has('heating'))
    {
    $heating = 1;
    }
    else{
    $heating = 0;
    }

    if($req->has('lighting'))
    {
    $lighting = 1;
    }
    else{
    $lighting = 0;
    }

    

    if($req->has('gas'))
    {
      $gas = 1;
    }
    else{
      $gas = 0;
    }


    $id23 = auth()->id();

    
 
 
       $id2 =  property::where('id',$id)->update([
              'title' => $req->title,
              'user_id' =>$id23,
              'primaryimage' => $filename,
              'property_categories' => $req->categories,
              'property_type' => $req->type,
              'property_id' => $req->propertyid,
              'price' => $req->price,
              'area' => $req->area,
              'year_built' => $req->yearbluit,
              'description' => $req->description,   
              'street' => $req->street,
              'city' => $req->city,
              'state' => $req->state,
              'zip' => $req->zip,
              'country' => $req->country,
              'expire_date' =>$req->expiredate,
              'buyer_fee' =>$req->buyerfee,
              'frontage' =>$req->frontage,
              'bluilding_height' =>$req->height,
              'leased_rate' => $req->leasedrate,
              'room' => $req->room,
              'available_space' =>$req->available,
              'cap_rate' => $req->cap,
              'tenancy' =>$req->tenancy,
              'new_lunch' =>$newlunch,
              'heating'=>$heating,
              'water' =>$water,
              'gas'=> $gas,
              'lighting' =>$lighting
         ]);

       
        
       return redirect('seller/editproperty2/' . $id);
     
    }

    function sellereditproperty2($id){
        
$image= image::where('property_id',$id)->orderBy('id','DESC')->get();

$video = video::where('property_id',$id)->orderBy('id','DESC')->get();

  return view('seller.editproperty2',compact('image','video','id'));
    }

    function  sellerimagepropertydelete($id){

      $image = image::find($id);
      $destinationPath = 'public/images/'.$image->file;
      
    
      file::delete($destinationPath);
      
      $image->delete();
     
    return back()->with('delete','Successfully Delete Image');
     }
     
    
     function sellervideopropertydelete($id){
    
      $video= video::find($id);
      
     
      $destinationPath1 = 'public/images/'.$video->file;
    
    
      file::delete($destinationPath1);
      
      $video->delete();
    return back()->with('delete','Successfully Delete Video');
     }

    // **************Client***********

  
    function  propertydetail($id){

      
      $images= image::where('property_id',$id)->get();
      
      $videos = video::where('property_id',$id)->get();

      $fav = favourite::where('property_id',$id)->first();
   

      $property = property::with(['propertycategories','property_user',])->find($id);
      
      return view('propertydetail',compact('property','images','videos','fav'));
    
    }
    // ---------------home-----------------
function homepropertycategory($id){

  $category = property_categories::all();
  $city =  property::where('status',1)->get()->unique('city');

  
  $state =  property::where('status',1)->get()->unique('state');
 


if($id == 111){
  $propertys = property::with(['propertycategories','property_user','images','videos'])->where('status',1)->orderBy('id','DESC')->paginate(6);

}
else{
  $propertys = property::with(['propertycategories','property_user','images','videos'])->where('status',1)->where('property_categories',$id)->orderBy('id','DESC')->paginate(6);
}


 
  return view('propertycategory',compact('propertys','category','city','state'));
}


function propertysearch(request $req){
  $category = property_categories::all();
  $city =  property::where('status',1)->get()->unique('city');
  $state =  property::where('status',1)->get()->unique('state');

  
                   
    $query = property::query();
   $query->with(['propertycategories','property_user','images','videos'])->where('status',1);
   
   if($req->listingid){

   $query->where('property_id',$req->listingid); 
   }
   if($req->type){

    $query->where('property_type',$req->type); 
    }

    if($req->category){

      $query->where('property_categories',$req->category); 
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

              if($req->tenancy){

                $query->where('tenancy',$req->tenancy); 
                }


   if($req->pricemax){
    $query->where('price','<=', $req->pricemax);          
  }
  
  if($req->peicemin){
    $query->where('price','>=', $req->peicemin);          
  }

  if($req->lotmax){
    $query->where('area','<=', $req->lotmax);          
  }
  
  if($req->lotmin){
    $query->where('area','>=', $req->lotmin);          
  }

  if($req->buildingmax){
    $query->where('bluilding_height','<=', $req->buildingmax);          
  }
  
  if($req->buildingmin){
    $query->where('bluilding_height','>=', $req->buildingmin);          
  }

  if($req->capmax){
    $query->where('cap_rate','<=', $req->capmax);          
  }
  
  if($req->capmin){
    $query->where('cap_rate','>=', $req->capmin);          
  }

  if($req->yearmax){
    $query->where('year_built','<=', $req->yearmax);          
  }
  
  if($req->yearmin){
    $query->where('year_built','>=', $req->yearmin);          
  }

  

  $propertys = $query->orderBy('id','DESC')->paginate(6); 

  return view('propertycategory',compact('propertys','category','city','state'));
}   



public function propertydetailsidebar(request $req){

    $user = user::find($req->id);
  $useremail = $user->email;
  
 $name= $req->name;
        $email =$req->email;
        $contact= $req->phone;
        $subject1 =$req->subject;
         $date =$req->date;
        $description= $req->description;
      
                $subject=$subject1;
            
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: '.$name.' <'.$email.'>' . "\r\n";
            $headers .= 'Cc: '.$email . '\r\n';
            $headers .= 'Reply-To: '.$email . "\r\n" ;
             
            //emails
            $to=$useremail;
         
            $htmlContent = ' 
    <html> 
    <head> 
        <title>Wolfsurety Online Query</title> 
    </head> 
    <body> 
        <h3>Client Info</h3> 
        <table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;"> 
            <tr> 
                <th>Name:</th><td>'.$name.'</td> 
            </tr> 
            <tr style="background-color: #e0e0e0;"> 
                <th>Email:</th><td>'.$email.'</td> 
            </tr>
            <tr style="background-color: #e0e0e0;"> 
              <th>Phone:</th><td>'.$contact.'</td> 
            </tr> 
            <tr style="background-color: #e0e0e0;"> 
              <th>Date :</th><td>'.$date.'</td> 
            </tr> 
            
        </table> 
    </body>
    <p>'.$description.'</p> 
    </html>'; 





           
            
            if(mail($to, $subject, $htmlContent, $headers))
            {
                return back()->with('message1','djj');
            }
            else{
                return back()->with('message2','djj');
            }
           
         
        }
    



}






