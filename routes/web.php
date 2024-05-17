<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\profilecontroller;
use App\Http\Controllers\propertycontroller;
use App\Http\Controllers\passwordcontroller;
use App\Http\Controllers\businesscontroller;
use App\Http\Controllers\gallerycontroller;
use App\Http\Controllers\blogcontroller;
use App\Http\Controllers\signupcontroller;
use App\Http\Controllers\categorycontroller;
use App\Http\Controllers\logoutcontroller;
use App\Http\Controllers\homecontroller;
use App\Http\Controllers\contactcontroller;
use App\Http\Controllers\favouritecontroller;
use App\Http\Controllers\forgetcontroller;
use App\Http\Controllers\fundingcontroller;
use App\Http\Controllers\fundingwantedcontroller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
route::get('/',[homecontroller::class,'home']);
route::get('admin',[logincontroller::class,'adminlogin']);

Route::prefix('admin')->group(function () {

route::get('login',[logincontroller::class,'adminlogin']);
 route::post('adminloginaction',[logincontroller::class,'adminloginaction']);


 route::post('adminforgetaction',[forgetcontroller::class,'adminforgetaction']);

 route::get('adminforget',[forgetcontroller::class,'adminforget']);
 
 //----------Middleware---------------------
Route::group(['middleware' => 'one'], function () {
 route::get('logout',[logoutcontroller::class,'adminlogout']);


route::get('dashboard',[dashboardcontroller::class,'dashboard']);
route::get('profile',[profilecontroller::class,'adminviewprofile']); 
route::post('adminprofileupdate',[profilecontroller::class,'adminprofileupdate']); 

route::get('updatepassword',[passwordcontroller::class,'adminupdatepassword']); 
route::post('adminupdatepassword',[passwordcontroller::class,'adminupdatepassword11']); 

// ******************Seller*********************** 
route::get('viewseller',[profilecontroller::class,'adminviewseller']); 
route::get('userdetail/{id}',[profilecontroller::class,'adminuserdetail']); 

route::get('adminsellerapprove/{id}',[profilecontroller::class,'adminsellerapprove']); 

route::get('sellerdelete/{id}',[profilecontroller::class,'sellerdelete']);
route::get('pendingseller',[profilecontroller::class,'adminpendingseller']); 
// ******************Client*********************** 
route::get('viewclient',[profilecontroller::class,'adminviewclient']); 


route::get('adminclientdelete/{id}',[profilecontroller::class,'adminclientdelete']); 


route::get('adminclientapprove/{id}',[profilecontroller::class,'adminclientapprove']); 


route::get('pendingclient',[profilecontroller::class,'adminpendingclient']); 
// ******************Business***********************
route::get('viewbusiness',[businesscontroller::class,'adminviewbusiness']);
route::get('pendingbusiness',[businesscontroller::class,'adminpendingbusiness']);


route::get('adminbusinessdelete/{id}',[businesscontroller::class,'adminbusinessdelete']);
route::get('adminbusinessapprove/{id}',[businesscontroller::class,'adminbusinessapprove']);


route::get('addbusinesscategory',[categorycontroller::class,'addbusinesscategory']);

route::get('adminpropertycategorydelete/{id}',[categorycontroller::class,'adminpropertycategorydelete']);

route::get('adminbusinesscategorydelete/{id}',[categorycontroller::class,'adminbusinesscategorydelete']);

route::post('businesscategoryaction',[categorycontroller::class,'businesscategoryaction']);
route::get('viewbusinesscategory',[categorycontroller::class,'viewbusinesscategory']);
// ******************Property***********************
route::get('viewproperty',[propertycontroller::class,'adminviewproperty']);
route::get('pendingproperty',[propertycontroller::class,'adminpendingproperty']);

route::get('adminpropertydelete/{id}',[propertycontroller::class,'adminpropertydelete']);


route::get('adminpropertyapprove/{id}',[propertycontroller::class,'adminpropertyapprove']);

route::get('addpropertycategory',[categorycontroller::class,'addpropertycategory']);
route::post('propertycategoryaction',[categorycontroller::class,'propertycategoryaction']);
route::get('viewpropertycategory',[categorycontroller::class,'viewpropertycategory']);
// ******************Blog*********************** 
route::get('viewblog',[blogcontroller::class,'adminviewblog']);
route::get('pendingblog',[blogcontroller::class,'adminpendingblog']);

route::get('adminblogdelete/{id}',[blogcontroller::class,'adminblogdelete']);
route::get('adminblogapprove/{id}',[blogcontroller::class,'adminblogapprove']);
});
});
//    End Admin
// ********************Seller****************************
Route::prefix('seller')->group(function () {
route::get('login',[logincontroller::class,'sellerlogin']);
route::post('sellerloginaction',[logincontroller::class,'sellerloginaction']);
route::get('signup',[signupcontroller::class,'sellersignup']);
route::post('sellersignupaction',[signupcontroller::class,'sellersignupaction']);



route::post('sellerforgetaction',[forgetcontroller::class,'sellerforgetaction']);

route::get('sellerforget',[forgetcontroller::class,'sellerforget']);


//----------Middleware---------------------
Route::group(['middleware' => 'two'], function () {
 route::get('logout',[logoutcontroller::class,'sellerlogout']);
route::get('myprofile',[profilecontroller::class,'sellerprofile']);

route::post('sellermyprofileaction',[profilecontroller::class,'sellermyprofileaction']);
// ******************Property***********************
route::get('addproperty',[propertycontroller::class,'selleraddproperty']);
route::post('addpropertyaction',[propertycontroller::class,'selleraddpropertyaction']);
route::get('viewproperty',[propertycontroller::class,'sellerviewproperty']);
route::get('editproperty/{id}',[propertycontroller::class,'sellereditproperty']);
route::get('readproperty/{id}',[propertycontroller::class,'sellerreadproperty']);
route::get('editproperty/{id}',[propertycontroller::class,'sellereditproperty']);
route::post('editpropertyaction',[propertycontroller::class,'sellereditpropertyaction']);
route::get('editproperty2/{id}',[propertycontroller::class,'sellereditproperty2']);
route::get('imagepropertydelete/{id}',[propertycontroller::class,'sellerimagepropertydelete']);
route::get('videopropertydelete/{id}',[propertycontroller::class,'sellervideopropertydelete']);
route::get('deleteproperty/{id}',[propertycontroller::class,'sellerdeleteproperty']);
Route::post('file-upload1', [galleryController::class, 'dropzoneFileUpload3' ])->name('dropzoneFileUpload3');
// ********************Business**************************
route::get('addbusiness',[businesscontroller::class,'selleraddbusiness']);
route::post('addbusinessaction',[businesscontroller::class,'selleraddbusinessaction']);
route::get('viewbusiness',[businesscontroller::class,'sellerviewbusiness']);
route::get('editbusiness/{id}',[businesscontroller::class,'sellereditbusiness']);
route::post('editbusinessaction',[businesscontroller::class,'sellereditbusinessaction']);
route::get('editbusiness2/{id}',[businesscontroller::class,'sellereditbusiness2']);
route::get('imagebusinessdelete/{id}',[businesscontroller::class,'sellerimagebusinessdelete']);
route::get('videobusinessdelete/{id}',[businesscontroller::class,'sellervideobusinessdelete']);
route::get('readbusiness/{id}',[businesscontroller::class,'sellerreadbusiness']);
route::get('deletebusiness/{id}',[businesscontroller::class,'sellerdeletebusiness']);
Route::post('file-upload2', [galleryController::class, 'dropzoneFileUpload1' ])->name('dropzoneFileUpload1');


// ********************Funding**************************

route::get('addfunding',[fundingcontroller::class,'addfunding']);
route::post('addfundingaction',[fundingcontroller::class,'addfundingaction']);

Route::post('file-upload3', [galleryController::class, 'dropzoneFileUpload6' ])->name('dropzoneFileUpload6');

route::get('viewfunding',[fundingcontroller::class,'viewfunding']);

route::get('editfunding/{id}',[fundingcontroller::class,'editfunding']);
route::post('editfundingaction',[fundingcontroller::class,'editfundingaction']);

route::get('editfunding2/{id}',[fundingcontroller::class,'editfunding2']);

route::get('readfunding/{id}',[fundingcontroller::class,'readfunding']);

route::get('deletefunding/{id}',[fundingcontroller::class,'deletefunding']);

// ********************Funding wanted**************************

route::get('addfundingwanted',[fundingwantedcontroller::class,'addfundingwanted']);
route::post('addfundingwantedaction',[fundingwantedcontroller::class,'addfundingwantedaction']);

Route::post('file-upload5', [galleryController::class, 'dropzoneFileUpload8' ])->name('dropzoneFileUpload8');

route::get('viewfundingwanted',[fundingwantedcontroller::class,'viewfundingwanted']);

route::get('editfundingwanted/{id}',[fundingwantedcontroller::class,'editfundingwanted']);
route::post('editfundingwantedaction',[fundingwantedcontroller::class,'editfundingwantedaction']);

route::get('editfundingwanted2/{id}',[fundingwantedcontroller::class,'editfundingwanted2']);

route::get('readfundingwanted/{id}',[fundingwantedcontroller::class,'readfundingwanted']);

route::get('deletefundingwanted/{id}',[fundingwantedcontroller::class,'deletefundingwanted']);


// ********************Blog**************************
route::get('addblog',[blogcontroller::class,'selleraddblog']);
route::post('addblogaction',[blogcontroller::class,'selleraddblogaction']);
route::get('viewblog',[blogcontroller::class,'sellerviewblog']);
route::get('readblog/{id}',[blogcontroller::class,'sellerreadblog']);
route::get('editblog/{id}',[blogcontroller::class,'sellereditblog']);
route::post('editblogaction',[blogcontroller::class,'sellereditblogaction']);
route::get('editblog2/{id}',[blogcontroller::class,'sellereditblog2']);
route::get('deleteblog/{id}',[blogcontroller::class,'sellerdeleteblog']);
route::get('imageblogdelete/{id}',[blogcontroller::class,'sellerimageblogdelete']);
route::get('videoblogdelete/{id}',[blogcontroller::class,'sellervideoblogdelete']);
route::get('changepassword',[passwordcontroller::class,'sellerchangepassword']);
route::post('changepasswordaction',[passwordcontroller::class,'sellerchangepasswordaction']);
Route::post('file-upload', [galleryController::class, 'dropzoneFileUpload2' ])->name('dropzoneFileUpload2');
});
});


Route::prefix('client')->group(function  (){

   

    route::post('clientloginaction',[logincontroller::class,'clientloginaction']);
route::get('signup',[signupcontroller::class,'clientsignup']);
route::post('clientsignupaction',[signupcontroller::class,'clientsignupaction']);

    //----------Middleware---------------------
Route::group(['middleware' => 'three'], function () {
route::get('logout',[logoutcontroller::class,'clientlogout']);
route::get('myprofile',[profilecontroller::class,'clientprofile']);


route::post('clientmyprofileaction',[profilecontroller::class,'clientmyprofileaction']);

route::get('changepassword',[passwordcontroller::class,'clientchangepassword']);
// ********************Blog**************************
route::get('addblog',[blogcontroller::class,'clientaddblog']);

route::post('addblogaction',[blogcontroller::class,'clientaddblogaction']);


route::get('viewblog',[blogcontroller::class,'clientviewblog']);
route::get('readblog/{id}',[blogcontroller::class,'clientreadblog']);
route::get('editblog/{id}',[blogcontroller::class,'clienteditblog']);
route::post('editblogaction',[blogcontroller::class,'clienteditblogaction']);
route::get('editblog2/{id}',[blogcontroller::class,'clienteditblog2']);
route::get('deleteblog/{id}',[blogcontroller::class,'clientdeleteblog']);
route::get('imageblogdelete/{id}',[blogcontroller::class,'clientimageblogdelete']);
route::get('videoblogdelete/{id}',[blogcontroller::class,'clientvideoblogdelete']);

route::get('favouriteproperty',[favouritecontroller::class,'favouriteproperty']);

route::get('favouritebusiness',[favouritecontroller::class,'favouritebusiness']);

route::get('changepassword',[passwordcontroller::class,'clientchangepassword']);
route::post('changepasswordaction',[passwordcontroller::class,'clientchangepasswordaction']);


route::post('clientforgetaction',[forgetcontroller::class,'clientforgetaction']);

Route::post('file-upload', [galleryController::class, 'dropzoneFileUpload4' ])->name('dropzoneFileUpload4');

});


route::post('clientforgetaction',[forgetcontroller::class,'clientforgetaction']);

route::get('clientforget',[forgetcontroller::class,'clientforget']);

});
// ********************Home**************************

route::post('clientforgetaction',[forgetcontroller::class,'clientforgetaction']);
route::get('propertydetail/{id}',[propertycontroller::class,'propertydetail']);

route::post('propertydetailsidebar',[propertycontroller::class,'propertydetailsidebar']);


route::get('homepropertycategory/{id}',[propertycontroller::class,'homepropertycategory']);

route::post('propertysearch',[propertycontroller::class,'propertysearch']);


route::get('businessdetail/{id}',[businesscontroller::class,'businessdetail']);

route::post('businesssearch',[businesscontroller::class,'businesssearch']);

route::get('sellerlist',[profilecontroller::class,'sellerlist']);

route::get('topsellerlist/{id}',[profilecontroller::class,'topsellerlist']);

route::get('homesellerprofile/{id}',[profilecontroller::class,'homesellerprofile']);

route::get('homeclientprofile/{id}',[profilecontroller::class,'homeclientprofile']);
route::get('clientlist',[profilecontroller::class,'clientlist']);
route::get('topclientlist/{id}',[profilecontroller::class,'topclientlist']);


route::get('homebusinesscategory/{id}',[businesscontroller::class,'homebusinesscategory']);

route::get('blogdetail/{id}',[blogcontroller::class,'blogdetail']);
route::get('allblog',[blogcontroller::class,'allblog']);


route::get('home',[homecontroller::class,'home']);


route::post('homesearch',[homecontroller::class,'homesearch']);
route::get('contact',[contactcontroller::class,'contact']);

route::post('contactaction',[contactcontroller::class,'contactaction']);


route::get('propertyfavourite/{id}',[favouritecontroller::class,'homefavouriteproperty']);

route::get('businessfavourite/{id}',[favouritecontroller::class,'homefavouritebusiness']);



route::get('allfunding/{id}',[fundingcontroller::class,'allfunding']);

route::get('fundingdetail/{id}',[fundingcontroller::class,'fundingdetail']);

route::get('allfundingwanted/{id}',[fundingwantedcontroller::class,'allfunding']);

route::get('fundingdetailwanted/{id}',[fundingwantedcontroller::class,'fundingdetail']);