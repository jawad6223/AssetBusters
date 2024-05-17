<?php

namespace App\Http\Controllers;
use App\Models\image;
use App\Models\video;
use App\Models\funding_wanted;
use Illuminate\Support\Facades\File; 
use Illuminate\Http\Request;

class fundingwantedcontroller extends Controller
{
    
    //


    function addfundingwanted(){

        return view('seller.addfundingwanted');
    }


    function addfundingwantedaction(Request $req){
     
        $id = auth()->id();

        $filename = $req->file('image')->store('media');
     
     
           $id2 =  funding_wanted::create([
                 
                  'user_id' =>$id,
                  'primaryimage' => $filename,
                  'title' =>$req->title,
                  'description' => $req->description,   
                  'street' => $req->street,
                  'city' => $req->city, 
                  'state' => $req->state,
                  'zip' => $req->zip,
                  'country' => $req->country,
                  'funding_wanted_id' =>$req->funding_type_id,
               

             ]);
 
           
             $id1= $id2->id;
             return view('seller.fundingwantedgallery',compact('id1'));
    }

    function viewfundingwanted(){
        $funding = funding_wanted::orderBy('id','DESC')->get();
    
        return view('seller.viewfundingwanted',compact('funding'));
    }


    function editfundingwanted($id){

        $funding = funding_wanted::find($id);
        return view('seller.editfundingwanted' , compact('funding'));
    }


    function editfundingwantedaction(request $req){
    
        $id= $req->id;

$update = funding_wanted::find($id);



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

 
 
       $id2 =  funding_wanted::where('id',$id)->update([
              'title' => $req->title,
              'user_id' =>$id23,
              'primaryimage' => $filename,
                  'description' => $req->description,   
                  'street' => $req->street,
                  'city' => $req->city, 
                  'state' => $req->state,
                  'zip' => $req->zip,
                  'country' => $req->country,
                  'funding_wanted_id' =>$req->funding_type_id
         ]);

      
         return redirect('seller/editfundingwanted2/' . $id);

    }


    function editfundingwanted2($id){
   
  
        $image= image::where('funding_wanted_id',$id)->orderBy('id','DESC')->get();
        
        $video = video::where('funding_wanted_id',$id)->orderBy('id','DESC')->get();
        
          return view('seller.editfundingwanted2',compact('image','video','id'));
        }
        
        
        function readfundingwanted($id){

            $images= image::where('funding_id',$id)->get();
      
            $videos = video::where('funding_id',$id)->get();


            $funding = funding_wanted::find($id);

            return view('seller.readfundingwanted',compact('images','videos','funding'));
        }


        function deletefundingwanted($id){

            $funding= funding_wanted::find($id);


            $destinationPath = 'storage/app/'.$funding->primaryimage;
            if(file::exists($destinationPath)){    
             file::delete($destinationPath);
            }

            $images = image::where('funding_wanted_id',$id)->get();
            $videos = video::where('funding_wanted_id',$id)->get();

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
              return redirect('seller/viewfundingwanted')->with('delete','Successfully Delete ');


        }



        function allfunding($id){
         if($id == 6 ){
          $funding= funding_wanted::with(['funding_user'])->orderBy('id','DESC')->get();

         }
         else{
          $funding= funding_wanted::with(['funding_user'])->where('funding_wanted_id',$id)->orderBy('id','DESC')->get();

         }

            return view('allfundingwanted',compact('funding'));
        }



        function fundingdetail($id){

            $images= image::where('funding_wanted_id',$id)->get();
      
            $videos = video::where('funding_wanted_id',$id)->get();


            $funding = funding_wanted::find($id);

            return view('fundingdetailwanted',compact('images','videos','funding'));
        }
}


