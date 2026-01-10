<?php

namespace App\Traits;


trait ApiResponse
{
    public function SendResponse($code=200 , $message= null , $data= null)
    {

     $response=[

            'status'=>$code,
            'message'=>$message,
            'data'=>$data,


        ];

        return response()->json($response,$code);


    }


}
