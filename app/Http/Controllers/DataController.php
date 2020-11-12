<?php

namespace App\Http\Controllers;

use App\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function test (){
        return Data::get();
    }

    public function getPop (){
        return DB::table('Raw_Survey_Data')
                 ->select('employeeCount', DB::raw('count(*) as total'))
                 ->groupBy('employeeCount')
                 ->get();
    }
}
