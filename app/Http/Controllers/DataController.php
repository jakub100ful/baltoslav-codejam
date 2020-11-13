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
        $d =  DB::table('mytable')
                 ->select('employeeCount', DB::raw('count(*) as total'))
                 ->groupBy('employeeCount')
                 ->get();

    


        $d[0]->employeeCount = "No Answer";
    
        return $d;

    }

    public function illAmmount(){
       $r =  DB::table('mytable')
                 ->select('currentlyHasMentalHealthDisorder', DB::raw('count(*) as total'))
                 ->groupBy('currentlyHasMentalHealthDisorder')
                 ->get();

    return $r;
    }

    public function illTypes(){

         $disorderDic = [
            "hasAnxietyDisorder",
            "hasMoodDisorder",
            'hasPsychoticDisorder',
            'hasEatingDisorder',
            'hasADHD',
            'hasPersonalityDisorder',
            'hasOCD',
            'hasPTSD',
            'hasStressResponseSyndrome',
            'hasDissociativeDisorder',
            'hasSubstanceUseDisorder',
            'hasAddictiveDisorder',
            'Other',
        ];

        $response = [];


        $r =  DB::table('mytable')
                 ->select("hasAnxietyDisorder", DB::raw('count(*) as total'))->whereNotNull("hasAnxietyDisorder")
                 ->groupBy("hasAnxietyDisorder")
                 ->get();

                 

        array_push($response,$r[0]);

        $r =  DB::table('mytable')
                 ->select("hasMoodDisorder", DB::raw('count(*) as total'))->whereNotNull("hasMoodDisorder")
                 ->groupBy("hasMoodDisorder")
                 ->get();

                 

        array_push($response,$r[0]);

        $r =  DB::table('mytable')
                 ->select("hasPsychoticDisorder", DB::raw('count(*) as total'))->whereNotNull("hasPsychoticDisorder")
                 ->groupBy("hasPsychoticDisorder")
                 ->get();

                 

        array_push($response,$r[0]);

        $r =  DB::table('mytable')
                 ->select("hasEatingDisorder", DB::raw('count(*) as total'))->whereNotNull("hasEatingDisorder")
                 ->groupBy("hasEatingDisorder")
                 ->get();

                 

        array_push($response,$r[0]);

         $r =  DB::table('mytable')
                 ->select("hasADHD", DB::raw('count(*) as total'))->whereNotNull("hasADHD")
                 ->groupBy("hasADHD")
                 ->get();

                 

        array_push($response,$r[0]);

        $r =  DB::table('mytable')
                 ->select("hasPersonalityDisorder", DB::raw('count(*) as total'))->whereNotNull("hasPersonalityDisorder")
                 ->groupBy("hasPersonalityDisorder")
                 ->get();

                 

        array_push($response,$r[0]);

        $r =  DB::table('mytable')
                 ->select("hasOCD", DB::raw('count(*) as total'))->whereNotNull("hasOCD")
                 ->groupBy("hasOCD")
                 ->get();

                 

        array_push($response,$r[0]);

        $r =  DB::table('mytable')
                 ->select("hasPTSD", DB::raw('count(*) as total'))->whereNotNull("hasPTSD")
                 ->groupBy("hasPTSD")
                 ->get();

                 

        array_push($response,$r[0]);

        $r =  DB::table('mytable')
                 ->select("hasStressResponseSyndrome", DB::raw('count(*) as total'))->whereNotNull("hasStressResponseSyndrome")
                 ->groupBy("hasStressResponseSyndrome")
                 ->get();

                 

        array_push($response,$r[0]);

        $r =  DB::table('mytable')
                 ->select("hasDissociativeDisorder", DB::raw('count(*) as total'))->whereNotNull("hasDissociativeDisorder")
                 ->groupBy("hasDissociativeDisorder")
                 ->get();

                 

        array_push($response,$r[0]);

        $r =  DB::table('mytable')
                 ->select("hasSubstanceUseDisorder", DB::raw('count(*) as total'))->whereNotNull("hasSubstanceUseDisorder")
                 ->groupBy("hasSubstanceUseDisorder")
                 ->get();

                 

        array_push($response,$r[0]);


        $r =  DB::table('mytable')
                 ->select("hasAddictiveDisorder", DB::raw('count(*) as total'))->whereNotNull("hasAddictiveDisorder")
                 ->groupBy("hasAddictiveDisorder")
                 ->get();



                 

        array_push($response,$r[0]);

        

        return $response;


    }

    public function gender(){
        $r =  DB::table('mytable')
                  ->select('gender', DB::raw('count(*) as total'))
                  ->groupBy('gender')
                  ->get();
 
     return $r;
     }

     public function popcomp(){

        $p =  DB::table('mytable')
                     ->select('employeeCount', DB::raw('count(*) as total'))
                     ->groupBy('employeeCount')
                     ->get();
    
        
    
    
            
        
            

        $r =  DB::table('mytable')
                  ->select(['employeeCount','levelOfImportanceEmployerPlacesOnMentalHealth'])
                  ->get();
 
     

     $response = [];

     foreach($r as $x){
        if($x->employeeCount != null){
            if(isset($response[$x->employeeCount]) ){
            
                $response[$x->employeeCount] += $x->levelOfImportanceEmployerPlacesOnMentalHealth;
            }else{
                $response[$x->employeeCount] = $x->levelOfImportanceEmployerPlacesOnMentalHealth;
            } 
        }
        

     }
     $workers = [];
     foreach($r as $x){
         if($x->employeeCount != null){
            if(isset($workers[$x->employeeCount]) ){
                $workers[$x->employeeCount] += 1;
            }else{
                $workers[$x->employeeCount] = 1;
            }
         }
        

     }

     foreach(array_keys($workers)  as $n){
        //var_dump($n);
         //$n["levelOfImportanceEmployerPlacesOnMentalHealth"] =  $n["levelOfImportanceEmployerPlacesOnMentalHealth"] /  $workers[$n["employeeCount"]];
        $response[$n] = $response[$n] /  $workers[$n];
        }
     


     return $response;

     }


}
