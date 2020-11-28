<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudyController extends Controller
{
    //
    public function CalculateCost(){
        $data = request()->all();
        
        print_r($data);
        
        return response()->json($data);
    }
}
