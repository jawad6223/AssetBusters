<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\property_categories;
use App\Models\business_categories;
use App\Models\property;
use App\Models\business;
class categorycontroller extends Controller
{
// Property
function addpropertycategory(){

  $categories = property_categories::all();
 
return view('admin.addpropertycategory',compact('categories'));
}

function propertycategoryaction(Request $req){
$req->validate([
'name' => 'required',  
]);
Property_categories::create([
'name'=>$req->name,
]);
return back()->with('message','Add');
}


function adminpropertycategorydelete($id)
{
$categories = property_categories::find($id);
$property = property::where('property_categories',$id)->count();
if($property == 0)
{
$categories->delete();
return back()->with('message1','Category Deleted Successfully');
}
else
{
return back()->with('message1','Can not delete Category because this category use in the Property');
}
}

// Business
function addbusinesscategory(){
  $categories = business_categories::all();
  
return view('admin.addbusinesscategory',compact('categories'));
}

function businesscategoryaction(Request $req){
$req->validate([
'name' => 'required',  
]);
business_categories::create([
'name'=>$req->name,
]);
return back()->with('message','Add');
}



function adminbusinesscategorydelete($id)
{
$categories =business_categories::find($id);
$business = business::where('business_categories',$id)->count();
if($business == 0)
{
$categories->delete();
return back()->with('message1','Successfully Delete Category');
}
else
{
return back()->with('message1','Can not delete Category because this category use in the Business');
}
}
}