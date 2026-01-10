<?php

namespace App\Traits;


trait ApiResponse
{


    public function success($message= 'success' , $data= null ,$meta = null , $code=200 )
    {

     $response = [
        
        'status' => true,
         'message'=>$message,
            'data'=>$data,
            'meta'=>$meta,


        ];

        
        return response()->json($response,$code);


    }


     public function fail($message= 'error' , $data= null ,  $code=400 )
    {

     $response = [
        
        'status' => false,
         'message'=>$message,
        ];

        

        return response()->json($response,$code);


    }


}
