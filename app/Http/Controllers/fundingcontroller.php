<?php

namespace App\Http\Controllers;

use App\Models\image;
use App\Models\video;
use App\Models\funding_source;
use Illuminate\Support\Facades\File; 
use Illuminate\Http\Request;

class fundingcontroller extends Controller
{
    //


    function addfunding(){

        return view('seller.addfunding');
    }


    function addfundingaction(Request $req){
     
        $id = auth()->id();

        $filename = $req->file('image')->store('media');
     
     
           $id2 =  funding_source::create([
                 
                  'user_id' =>$id,
                  'primaryimage' => $filename,
                  'title' =>$req->title,
                  'description' => $req->description,   
                  'street' => $req->street,
                  'city' => $req->city, 
                  'state' => $req->state,
                  'zip' => $req->zip,
                  'country' => $req->country,
                  'funding_type_id' =>$req->funding_type_id,
               

             ]);
    
           
             $id1= $id2->id;
             return view('seller.fundinggallery',compact('id1'));
    }


    function viewfunding(){
        $funding = funding_source::orderBy('id','DESC')->get();
      
        return view('seller.viewfunding',compact('funding'));
    }


    function editfunding($id){

        $funding = funding_source::find($id);
        return view('seller.editfunding' , compact('funding'));
    }


    function editfundingaction(request $req){
    
        $id= $req->id;

$update = funding_source::find($id);



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

 
 
       $id2 =  funding_source::where('id',$id)->update([
              'title' => $req->title,
              'user_id' =>$id23,
              'primaryimage' => $filename,
                  'description' => $req->description,   
                  'street' => $req->street,
                  'city' => $req->city, 
                  'state' => $req->state,
                  'zip' => $req->zip,
                  'country' => $req->country,
                  'funding_type_id' =>$req->funding_type_id
         ]);

      
         return redirect('seller/editfunding2/' . $id);

    }


    function editfunding2($id){
   
  
        $image= image::where('funding_id',$id)->orderBy('id','DESC')->get();
        
        $video = video::where('funding_id',$id)->orderBy('id','DESC')->get();
        
          return view('seller.editfunding2',compact('image','video','id'));
        }
        
        
        function readfunding($id){

            $images= image::where('funding_id',$id)->get();
      
            $videos = video::where('funding_id',$id)->get();


            $funding = funding_source::find($id);

            return view('seller.readfunding',compact('images','videos','funding'));
        }

        function deletefunding($id){

            $funding= funding_source::find($id);


            $destinationPath = 'storage/app/'.$funding->primaryimage;
            if(file::exists($destinationPath)){    
             file::delete($destinationPath);
            }

            $images = image::where('funding_id',$id)->get();
            $videos = video::where('funding_id',$id)->get();

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
        
             $funding->delete();
              return redirect('seller/viewfunding')->with('delete','Successfully Delete ');


        }



        function allfunding($id){
         if($id == 6 ){
          $funding= funding_source::with(['funding_user'])->orderBy('id','DESC')->get();

         }
         else{
          $funding= funding_source::with(['funding_user'])->where('funding_type_id',$id)->orderBy('id','DESC')->get();

         }

            return view('allfunding',compact('funding'));
        }



        function fundingdetail($id){

            $images= image::where('funding_id',$id)->get();
      
            $videos = video::where('funding_id',$id)->get();


            $funding = funding_source::find($id);

            return view('fundingdetail',compact('images','videos','funding'));
        }
}
