<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libraries\Study;

class StudyController extends Controller
{
    //
    public function CalculateCost(){
        $data = request()->all();
                
        $Study = new Study($data['nb_study'], $data['growth'], $data['nb_months']);
        
        return response()->json($Study->CalculateCost());
    }
}
