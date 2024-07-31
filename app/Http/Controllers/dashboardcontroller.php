<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\property;
use App\Models\business;
use App\Models\blog;
use App\Models\user;

class dashboardcontroller extends Controller
{
    ....

    function dashboard(){

        $totalseller = user::where('user_role',2)->count();
       $approvalseller =user::where('user_role',2)->where('status',1)->count();
       $pendingseller =user::where('user_role',2)->where('status',0)->count();

       $totalclient = user::where('user_role', 3)->count();
       $approvalclient =user::where('user_role',3)->where('status',1)->count();
       $pendingclient =user::where('user_role',3)->where('status',0)->count();



       $totalproperty = property::count();
       $approvalproperty =property::where('status',1)->count();
       $pendingproperty=property::where('status',0)->count();


       $totalbusiness = business::count();
       $approvalbusiness =business::where('status',1)->count();
       $pendingbusiness=business::where('status',0)->count();

       
       $totalblog = blog::count();
       $approvalblog =blog::where('status',1)->count();
       $pendingblog=blog::where('status',0)->count();



$agent = user::where('status',0) -> get();
       return view('admin.dashboard',compact('totalseller','approvalseller','pendingseller','totalclient','approvalclient','pendingclient',
       'totalproperty','approvalproperty','pendingproperty','totalbusiness','approvalbusiness','pendingbusiness',
       'totalblog','approvalblog','pendingblog'));
       
       }
}
