<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class contactcontroller extends Controller
{
    //

    function contact(){
        return view('contact');
    }

  function contactaction(request $req){

        $name= $req->name;
        $email =$req->email;
        $contact= $req->contact;
        $subject1 =$req->subject;
        $description= $req->about;

        $subject=$subject1;
            
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: '.$name.' <'.$email.'>' . "\r\n";
        $headers .= 'Cc: '.$email . '\r\n';
        $headers .= 'Reply-To: '.$email . "\r\n" ;
         
        //emails
        $to='info@assetbusters.com';
        
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
        
        
    </table> 
</body>
<p>'.$description.'</p> 
</html>'; 





       
        
        if(mail($to, $subject, $htmlContent, $headers))
        {
            return back()->with('message88','Successfully Send');
        }
        else{
            return back()->with('message89','Try Again');
        }

}
}
