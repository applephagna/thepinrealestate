<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CheckReferalController extends Controller
{
  function check(Request $request)
  {
    if($request->get('referal_code')){
        $referal_code = $request->get('referal_code');
        $data = User::where('referal_code', $referal_code)
         ->orWhere('phone', $referal_code)
         ->first();
        if($data){
					$response = array(
						'success' => true,
            'data'	=> $data,
            'message' =>'Referal ID is correct',
            'type'  =>'success'
					);            
        } else {
					$response = array(
						'success' => false,
            'data'	=> '',
            'message' =>'Referal ID not correct',
            'type'  =>'error'
					);
        }
        return $response; 
    } else {
      $data = User::where('referal_code', '9988776655')
      ->orWhere('phone', '092374003')
      ->first();
     if($data){
       $response = array(
         'success' => true,
         'data'	=> $data,
         'message' =>'Referal ID is correct',
         'type'  =>'success'
       );            
     } else {
       $response = array(
         'success' => false,
         'data'	=> '',
         'message' =>'Referal ID not correct',
         'type'  =>'error'
       );
     }
     return $response;       
    }
  }  
}
