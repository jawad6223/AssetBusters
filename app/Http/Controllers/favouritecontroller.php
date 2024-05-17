<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\favourite;
use Auth;
class favouritecontroller extends Controller
{

    public function homefavouriteproperty($id){

        $fav = favourite::where('property_id',$id)->first();
        if ($fav === null) {
        
        $id1 = auth()->id();

        $user11 = favourite::create([
            'user_id' => $id1,
            'property_id'=>$id
         ]);
return back()->with('fav','Successfully Favourite Property');
        }

        else{

            $fav->delete();
            return back()->with('fav','Successfully UnFavourite Property');
        }

    }

    public function favouriteproperty(){

        $id = auth()->id();

        $property = favourite::with(['favourite_property'])->where('user_id',$id)->where('status',0)->orderBy('id','DESC')->get();

        return view('client.favouriteproperty' ,compact('property'));
    }


    public function homefavouritebusiness($id){

        $fav = favourite::where('business_id',$id)->first();
        if ($fav === null) {
        
        $id1 = auth()->id();

        $user11 = favourite::create([
            'user_id' => $id1,
            'business_id'=>$id,
            'status' => 1
         ]);
return back()->with('fav','Successfully Favourite Business');
        }

        else{

            $fav->delete();
            return back()->with('fav','Successfully UnFavourite Business');
        }

    }

    public function favouritebusiness(){

        $id = auth()->id();

        $business = favourite::with(['favourite_business'])->where('user_id',$id)->where('status',1)->orderBy('id','DESC')->get();
     
        
        return view('client.favouritebusiness' ,compact('business'));


    }

}
