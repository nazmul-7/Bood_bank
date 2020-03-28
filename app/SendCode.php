<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class SendCode 
{
    public static function sendCode($phone){
    	$code = rand(1111,9999);
    	// $nexmo = app('Nexmo\Client');
    	// $nexmo->message()->send([
    	// 	'to'=>'+880'.(int) $phone,
    	// 	'from'=>'Blood Source',
    	// 	'text'=>'Verify Code: '.$code,
    	// ]);

    	// return $code;

    	$url = "http://66.45.237.70/api.php";
        $number='+880'.(int) $phone;
        $user = User::select('name')->where('phone','=',$phone)->first();
        $text= 'Hello '.$user->name.', Your blood source Verification Code is: '.$code;
        $data= array(
        'username'=>"01619672554",
        'password'=>"Nokia6300",
        'number'=>"$number",
        'message'=>"$text"
        );

        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        $p = explode("|",$smsresult);
        $sendstatus = $p[0];
        return($code);
    }
}
