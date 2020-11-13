<?php

namespace App\Http\Controllers;

use App\Data;
use Exception;
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
                  ->select(['employeeCount','opinionOnTechIndustrySupportingMentalHealth'])
                  ->get();
 
     

     $response = [];

     foreach($r as $x){
        if($x->employeeCount != null){
            if(isset($response[$x->employeeCount]) ){
            
                array_push($response[$x->employeeCount], $x->opinionOnTechIndustrySupportingMentalHealth);
            }else{
                $response[$x->employeeCount] = [$x->opinionOnTechIndustrySupportingMentalHealth];
            } 
        }
        

     }
     $workers = [];
     foreach($p as $x){
         if($x->employeeCount != null){
            $workers[$x->employeeCount] = $x->total;
         }
        

     }

     foreach(array_keys($workers)  as $n){
        //var_dump($n);
         //$n["levelOfImportanceEmployerPlacesOnMentalHealth"] =  $n["levelOfImportanceEmployerPlacesOnMentalHealth"] /  $workers[$n["employeeCount"]];
         //var_dump($response[$n],$workers[$n]);
        //$response[$n] = $response[$n] /  $workers[$n];
        $response[$n] = $this->getMedian($response[$n]);
        

        }
     


     return [$response];

     }

     function getMedian($arr) {
        //Make sure it's an array.
        if(!is_array($arr)){
            throw new Exception('$arr must be an array!');
        }
        //If it's an empty array, return FALSE.
        if(empty($arr)){
            return false;
        }
        //Count how many elements are in the array.
        $num = count($arr);
        //Determine the middle value of the array.
        $middleVal = floor(($num - 1) / 2);
        //If the size of the array is an odd number,
        //then the middle value is the median.
        if($num % 2) { 
            return $arr[$middleVal];
        } 
        //If the size of the array is an even number, then we
        //have to get the two middle values and get their
        //average
        else {
            //The $middleVal var will be the low
            //end of the middle
            $lowMid = $arr[$middleVal];
            $highMid = $arr[$middleVal + 1];
            //Return the average of the low and high.
            return (($lowMid + $highMid) / 2);
        }
    }

    public function everDisscussed (){
        $d =  DB::table('mytable')
                 ->select('mentalHealthEverDiscussedWithEmployer','lessLikelyToRevealIssueInWorkPlaceAfterObservingDiscussion')
                 ->get();

    
        $discussed = [
            "Yes" => 0,
            "No" => 0,
        ];

        $k = "Yes";
        foreach($d as $p){
            
            if($p->mentalHealthEverDiscussedWithEmployer == null){
                $k = "No";
            }else{
                $k = "Yes";
            }
            
            $discussed[$k] += 1;

            
        }

        $wouldDiscuss = [
            "Yes" => 0,
            "No" => 0,
            "Maybe" => 0,
        ];

        

        $k = "Yes";
        foreach($d as $x){
            if($x->mentalHealthEverDiscussedWithEmployer == null  ){
               if($x->lessLikelyToRevealIssueInWorkPlaceAfterObservingDiscussion == "Yes" ){
                $k = "No";
               }else if($x->lessLikelyToRevealIssueInWorkPlaceAfterObservingDiscussion == "No"){
                $k = "Yes";
               }else if($x->lessLikelyToRevealIssueInWorkPlaceAfterObservingDiscussion == "Maybe"){
                $k = "Maybe";
               }
               $wouldDiscuss[$k] += 1;
            }
            

        }

        
    
        return [
            "HaveDisscussed" => $discussed,
            "WouldDisscuss" =>$wouldDiscuss
        ];
    }

    public function concerns(){
        $d =  DB::table('mytable')
                 ->select('employerProvidesMentalHealthBenefits', DB::raw('count(*) as total'))
                 ->groupBy('employerProvidesMentalHealthBenefits')
                 ->get();

                   $results =  [
                    "I don't know" => $d[1]->total,
                    "No" => $d[0]->total + $d[2]->total,
                    "Not eligible for coverage / NA" =>$d[3]->total,
                    "Yes" => $d[4]->total,
                 ];

                 $d =  DB::table('mytable')
                 ->select('mentalHealthCareOptionsKnown', DB::raw('count(*) as total'))->where('employerProvidesMentalHealthBenefits','Yes')
                 ->groupBy('mentalHealthCareOptionsKnown')
                 ->get();
                
                 $know =  [
                    "No" => $d[1]->total + $d[0]->total,
                    "Yes" => $d[2]->total,
                 ];


    


        
    
        return [
            "provides" => $results,
            "knowCare" => $know,
        ];
    }


}
