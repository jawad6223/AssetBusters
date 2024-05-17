<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
class forgetcontroller extends Controller
{
    //

    public function adminforget(){
      
        return view('admin.forget');
            }
        
            public  function adminforgetaction(Request $req){
                
  
                   
        $req->validate([
            'email' => 'required|email',

        ]);
    
        $user = user::where('email', $req->email)->where('user_role',1)->first();
    
    

        if ($user) { 
           $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
  
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
            $user->password = bcrypt(implode($pass));
            $user->save();

            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $to = $req->email;
            $from = 'info@assetbusters.com';
            $subject = 'Asset busters Password recovery email';
            $message = '<h3 > Dear <span style="color:red;">' . $user->name .' </span> </h3> <p>There was a request for password  resetting. Asset busters system generated password is  <b>'. 
implode($pass).' </b> </p>';
            $headers .= 'From:  info@assetbusters.com'."\r\n".
            'Reply-To:  info@assetbusters.com'. "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            
            if(mail($to, $subject, $message, $headers))
            {
                return back()->with('message1','djj');
            }
            else{
                return back()->with('message2','djj');
            }
           
         
        }
        else{
            return back()->with('message','djj');
        }
            }



    public function sellerforget(){
      
        return view('seller.forget');
            }
        
            public  function sellerforgetaction(Request $req){
                
        
        $req->validate([
            'email' => 'required|email',

        ]);
    
        $user = user::where('email', $req->email)->where('user_role',2)->first();
    
    

        if ($user) { 
           $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
  
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
            $user->password = bcrypt(implode($pass));
            $user->save();

            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $to = $req->email;
            $from = 'info@assetbusters.com';
            $subject = 'Asset busters Password recovery email';
            $message = '<h3 > Dear <span style="color:red;">' . $user->name .' </span> </h3> <p>There was a request for password  resetting. Asset busters system generated password is  <b>'. 
implode($pass).' </b> </p>';
            $headers .= 'From:  info@assetbusters.com'."\r\n".
            'Reply-To:  info@assetbusters.com'. "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            
            if(mail($to, $subject, $message, $headers))
            {
                return back()->with('message1','djj');
            }
            else{
                return back()->with('message2','djj');
            }
           
         
        }
        else{
            return back()->with('message','djj');
        }
        
    

                
            }


    public function clientforget(){
      
return view('client.forget');
    }

    public  function clientforgetaction(Request $req){
        
  
        $req->validate([
            'email' => 'required|email',

        ]);
    
 $user = user::where('email', $req->email)->where('user_role',3)->first();

        if ($user) { 
           $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
            $user->password = bcrypt(implode($pass));
            $user->save();

            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $to = $req->email;
            $from = 'info@assetbusters.com';
            $subject = 'Asset busters Password recovery email';
            $message = '<h3 > Dear <span style="color:red;">' . $user->name .' </span> </h3> <p>There was a request for password  resetting. Asset busters system generated password is  <b>'. 
implode($pass).' </b> </p>';
            $headers .= 'From:  info@assetbusters.com'."\r\n".
            'Reply-To:  info@assetbusters.com'. "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            
            if(mail($to, $subject, $message, $headers))
            {
                return back()->with('message1','djj');
            }
            else{
                return back()->with('message2','djj');
            }
           
         
        }
        else{
            return back()->with('message','djj');
        }
        
    }



}
