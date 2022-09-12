<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class Helper
{
    public static function validateFakeRequest(Request $request, $rules){
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return [
                'success' => false,
                'errors' => $validator->errors()
            ];
        }else{
            return [
                'validated' => $validator->valid(),
                'success' => true
            ];
        }
    }
}
