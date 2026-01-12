<?php

namespace App\Http\Traits;


trait ApiResponse
{
    public function success($message= null , $data= null , $code=200)
    {

     $response=[

            'status'=>true,
            'message'=>$message?? 'Success',
            'data'=>$data,


        ];

        return response()->json($response,$code);


    }



        public function error( $message= null , $data= null , $code=400 )
    {

     $response=[

            'status'=>false,
            'message'=>$message,
            'data'=>$data,


        ];

        return response()->json($response,$code);


    }


}
