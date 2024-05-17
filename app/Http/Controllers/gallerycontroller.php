<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\image;
use App\Models\video;

class gallerycontroller extends Controller
{
    public  function dropzoneFileUpload3(Request $req)  
    {  

        $image = $req->file('file');
        

        $ext = $image->extension();
    
    
        $imageName =  uniqid().'.'.$ext; 

if($ext == 'png' || $ext == 'jpg' ||$ext == 'jpeg'){
 
    image::create([
                'property_id'=>$req->property_id,
                'file'=>$imageName
                ]); 
               
            }
            elseif($ext == "mp4" ||$ext == 'mov' ||$ext == 'gif'){
               
                video::create([
                    'property_id'=>$req->property_id,
                    'file'=>$imageName
                    ]); 
       }
       else{
           return back()->with('message','Something Wrong');
       } 

       $saveimage = $image->move(public_path('images'),$imageName);  
        return response()->json(['success'=>$imageName]);
    }
//  Business

    public  function dropzoneFileUpload1(Request $req)  
    {  

        $image = $req->file('file');
        

        $ext = $image->extension();
    
    
        $imageName =  uniqid().'.'.$ext; 

if($ext == 'png' || $ext == 'jpg' ||$ext == 'jpeg'){
 
    image::create([
                'business_id'=>$req->business_id,
                'file'=>$imageName
                ]); 
               
            }
            elseif($ext == "mp4" ||$ext == 'mov' ||$ext == 'gif'){
               
                video::create([
                    'business_id'=>$req->business_id,
                    'file'=>$imageName
                    ]); 
       }
       else{
           return back()->with('message','Something Wrong');
       } 

       $saveimage = $image->move(public_path('images'),$imageName);  
        return response()->json(['success'=>$imageName]);
    }

    // Blog

    public  function dropzoneFileUpload2(Request $req)  
    {  


        
        $image = $req->file('file');
        

        $ext = $image->extension();
    
    
        $imageName =  uniqid().'.'.$ext; 

if($ext == 'png' || $ext == 'jpg' ||$ext == 'jpeg'){
 
   image::create([
                'blog_id'=>$req->blog_id,
                'file'=>$imageName
                ]); 
               
            }
            elseif($ext == "mp4" ||$ext == 'mov' ||$ext == 'gif'){
               
                video::create([
                    'blog_id'=>$req->blog_id,
                    'file'=>$imageName
                    ]); 
       }
       else{
           return back()->with('message','Something Wrong');
       } 

       $saveimage = $image->move(public_path('images'),$imageName);  
        return response()->json(['success'=>$imageName]);
    }

    // client blog


    
    public  function dropzoneFileUpload4(Request $req)  
    {  

return $req;
        
        $image = $req->file('file');
        

        $ext = $image->extension();
    
    
        $imageName =  uniqid().'.'.$ext; 

if($ext == 'png' || $ext == 'jpg' ||$ext == 'jpeg'){
 
   image::create([
                'blog_id'=>$req->blog_id,
                'file'=>$imageName
                ]); 
               
            }
            elseif($ext == "mp4" ||$ext == 'mov' ||$ext == 'gif'){
               
                video::create([
                    'blog_id'=>$req->blog_id,
                    'file'=>$imageName
                    ]); 
       }
       else{
           return back()->with('message','Something Wrong');
       } 

       $saveimage = $image->move(public_path('images'),$imageName);  
        return response()->json(['success'=>$imageName]);
    }


    public  function dropzoneFileUpload6(Request $req)  
    {  

        $image = $req->file('file');
        

        $ext = $image->extension();
    
    
        $imageName =  uniqid().'.'.$ext; 

if($ext == 'png' || $ext == 'jpg' ||$ext == 'jpeg'){
 
    image::create([
                'funding_id'=>$req->funding_id,
                'file'=>$imageName
                ]); 
               
            }
            elseif($ext == "mp4" ||$ext == 'mov' ||$ext == 'gif'){
               
                video::create([
                    'funding_id'=>$req->funding_id,
                    'file'=>$imageName
                    ]); 
       }
       else{
           return back()->with('message','Something Wrong');
       } 

       $saveimage = $image->move(public_path('images'),$imageName);  
        return response()->json(['success'=>$imageName]);
    }



    // wanted

    
    public  function dropzoneFileUpload8(Request $req)  
    {  

        $image = $req->file('file');
        

        $ext = $image->extension();
    
    
        $imageName =  uniqid().'.'.$ext; 

if($ext == 'png' || $ext == 'jpg' ||$ext == 'jpeg'){
 
  $id3=  image::create([
                'funding_wanted_id'=>$req->funding_wanted_id,
                'file'=>$imageName
                ]); 
           
            }
            
            elseif($ext == "mp4" ||$ext == 'mov' ||$ext == 'gif'){
               
                video::create([
                    'funding_wanted_id'=>$req->funding_wanted_id,
                    'file'=>$imageName
                    ]); 
       }
       else{
           return back()->with('message','Something Wrong');
       } 

       $saveimage = $image->move(public_path('images'),$imageName);  
        return response()->json(['success'=>$imageName]);
    }

}

