<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blog;
use App\Models\image;
use App\Models\video;
use Illuminate\Support\Facades\File;
use Auth;
class blogcontroller extends Controller
{


//***************** Admin*********************


function adminviewblog(){

  // $blog = blog::with(['blog_user','images','videos'])->where('status',1)->orderBy('id','DESC')->get();
  

  // return view('admin.viewblog' ,compact('blog'));


       }

       function adminpendingblog(){
       
        
  $blog = blog::with(['blog_user','images','videos'])->where('status',0)->orderBy('id','DESC')->get();
  

  return view('admin.pendingblog' ,compact('blog'));
           }

           function adminblogdelete($id){
             

            $blog = blog::find($id);
      
            $images = image::where('blog_id',$id)->get();
            $videos = video::where('blog_id',$id)->get();
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
      
             $blog->delete();
              return back()->with('delete','Successfully Delete blog');
          }

          function adminblogapprove($id){

            $blog=blog::find($id);
            $blog->status = 1;
            $blog->save();
             return back()->with('approve','Successfully Approve blog');
          }


    // ************Seller*******************

function selleraddblog(){
    return view('seller.addblog');
}


function selleraddblogaction(Request $req){

  $req->validate([
    'image' => 'required||mimes:jpeg,jpg,bmp,png',
     
]);

$id = auth()->id();

    $filename = $req->file('image')->store('media');
 
 
       $id2 =  blog::create([
              'title' => $req->title,
              'user_id' =>$id,
              'primary_image' => $filename,
              'description' =>$req->description
         ]);
         $id1= $id2->id;

        
       
         return view('seller.bloggallery',compact('id1'));

           

}


function sellerviewblog(){
    $blog = blog::where('status',1)->orderBy('id','DESC')->get();
    return view('seller.viewblog',compact('blog'));
}
 function sellerreadblog($id){

    $images= image::where('blog_id',$id)->get();
      
    $videos = video::where('blog_id',$id)->get();
 

    $blog = blog::find($id);

    return view('seller.readblog',compact('blog','images','videos'));
  
 }

 function sellerdeleteblog($id){

    $blog = blog::find($id);

    $images = image::where('blog_id',$id)->get();
    $videos = video::where('blog_id',$id)->get();
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

     $blog->delete();
      return redirect('seller/viewblog')->with('delete','Successfully Delete Blog');
 }

 function sellereditblog($id){


  $blog = blog::find($id);

    return view('seller.editblog',compact('blog'));
 }

 function sellereditblogaction(Request $req){
  
$id1 = auth::id();
$id= $req->id;
  $update = blog::find($id);

  if ($req->has('image')) {
    $req->validate([
    'image' => 'required||mimes:jpeg,jpg,bmp,png',
   ]);
     $image_path = 'storage/app/' . $update->primary_image;
     File::delete($image_path);
     $filename = $req->file('image')->store('media');
   }
   else {
       $filename = $update->primary_image;
   }

   $id2 =  blog::where('id',$id)->update([
    'title' => $req->title,
    'user_id' =>$id1,
    'primary_image' => $filename,
    'description' =>$req->description
]);


return redirect('seller/editblog2/' .$id);
 }

 
 function sellereditblog2($id){
   
  
$image= image::where('blog_id',$id)->orderBy('id','DESC')->get();

$video = video::where('blog_id',$id)->orderBy('id','DESC')->get();

  return view('seller.editblog2',compact('image','video','id'));
}


function  sellerimageblogdelete($id){

  $image = image::find($id);
  $destinationPath = 'public/images/'.$image->file;
  

  file::delete($destinationPath);
  
  $image->delete();
 
return back()->with('delete','Successfully Delete Image');
 }
 

 function sellervideoblogdelete($id){

  $video= video::find($id);
  
 
  $destinationPath1 = 'public/images/'.$video->file;


  file::delete($destinationPath1);
  
  $video->delete();
return back()->with('delete','Successfully Delete Video');
 }


  // ************Client*******************

function clientaddblog(){
    return view('client.addblog');
}

function clientaddblogaction(Request $req){

  $req->validate([
    'image' => 'required||mimes:jpeg,jpg,bmp,png',
     
]);

$id = auth()->id();

    $filename = $req->file('image')->store('media');
 
 
       $id2 =  blog::create([
              'title' => $req->title,
              'user_id' =>$id,
              'primary_image' => $filename,
              'description' =>$req->description
         ]);
         $id1= $id2->id;

     
         return view('client.bloggallery',compact('id1'));

           
        }



        function clientviewblog(){
          $id = auth::id();
          
          $blog = blog::where('status',1)->where('user_id',$id)->orderBy('id','DESC')->get();
          return view('client.viewblog',compact('blog'));
      }
       function clientreadblog($id){
         
      
          $images= image::where('blog_id',$id)->get();
            
          $videos = video::where('blog_id',$id)->get();
    
          $blog = blog::find($id);
          
          return view('client.readblog',compact('blog','images','videos'));
       }
      
       function clientdeleteblog($id){
      
          $blog = blog::find($id);
      
          $images = image::where('blog_id',$id)->get();
          $videos = video::where('blog_id',$id)->get();
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
      
           $blog->delete();
            return redirect('client/viewblog')->with('delete','Successfully Delete Blog');
       }
      
       function clienteditblog($id){
      
      
        $blog = blog::find($id);
      
          return view('client.editblog',compact('blog'));
       }
      
       function clienteditblogaction(Request $req){
        
      $id1 = auth::id();
      $id= $req->id;
        $update = blog::find($id);
      
        if ($req->has('image')) {
          $req->validate([
          'image' => 'required||mimes:jpeg,jpg,bmp,png',
         ]);
           $image_path = 'storage/app/' . $update->primary_image;
           File::delete($image_path);
           $filename = $req->file('image')->store('media');
         }
         else {
             $filename = $update->primary_image;
         }
      
         $id2 =  blog::where('id',$id)->update([
          'title' => $req->title,
          'user_id' =>$id1,
          'primary_image' => $filename,
          'description' =>$req->description
      ]);
      
      
      return redirect('client/editblog2/' .$id);
       }
      
       
       function clienteditblog2($id){
         
        
      $image= image::where('blog_id',$id)->orderBy('id','DESC')->get();
      
      $video = video::where('blog_id',$id)->orderBy('id','DESC')->get();
      
        return view('client.editblog2',compact('image','video','id'));
      }
      
      
      function  clientimageblogdelete($id){
      
        $image = image::find($id);
        $destinationPath = 'public/images/'.$image->file;
        
      
        file::delete($destinationPath);
        
        $image->delete();
       
      return back()->with('delete','Successfully Delete Image');
       }
       
      
       function clientvideoblogdelete($id){
      
        $video= video::find($id);
        
       
        $destinationPath1 = 'public/images/'.$video->file;
      
      
        file::delete($destinationPath1);
        
        $video->delete();
      return back()->with('delete','Successfully Delete Video');
       }
      





  // *************Home***********

  
  function  blogdetail($id){

    $images= image::where('blog_id',$id)->get();
      
    $videos = video::where('blog_id',$id)->get();
 

    $blog = blog::find($id);

    return view('blogdetail',compact('blog','images','videos'));
    return view('blogdetail');
    
}

function  allblog(){



  $blog = blog::with(['blog_user'])->where('status',1)->orderBy('id','DESC')->get();
  return view('allblog',compact('blog'));

    
}

}

