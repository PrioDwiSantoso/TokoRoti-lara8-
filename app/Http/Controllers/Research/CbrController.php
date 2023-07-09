<?php

namespace App\Http\Controllers\Research;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use DB;
use Hash;

use Illuminate\Support\Arr;



class CbrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
       echo"<H2>CBR</H2>";
        $cases = array(
            array(
                'Gejala1' => 'Ya',
                'Gejala2' => 'Tidak',
                'Gejala3' => 'Ya',
                'Diagnosis' => 'P1',
            ),
            array(
                'Gejala1' => 'Tidak',
                'Gejala2' => 'Ya',
                'Gejala3' => 'Tidak',
                'Diagnosis' => 'P2',
            ),
            // Kasus lainnya
        );

        $userCase = array(
            'Gejala1' => 'Ya',
            'Gejala2' => 'Tidak',
            'Gejala3' => 'Tidak',
        );
        
        $diagnosis = $this->diagnoseDisease($cases, $userCase);
        
        echo "Diagnosis penyakit: $diagnosis\n";
        
      
    }

    function calculateSimilarity($case1, $case2) {
        dump("case pembanding");
        dump($case1);
        dump("case dicari");
        dump($case2);
        // dd("test");
        $matched = 0;
        $total = count($case1) - 1; // Exclude diagnosis attribute
       
        foreach ($case1 as $key => $value) {
          
            if (($key!="Diagnosis")&&($value == $case2[$key])) 
            {
                $matched++;
            }
          
        }
       
        dump("matched / total : ".$matched / $total);
        return $matched / $total;
    }

    function diagnoseDisease($cases, $userCase) {
        $bestSimilarity = -1;
        $diagnosis = '';
       
        foreach ($cases as $case) {
            $similarity = $this->calculateSimilarity($case, $userCase);
           
            if ($similarity > $bestSimilarity) {
                $bestSimilarity = $similarity;
                $diagnosis = $case['Diagnosis'];
            }
        }
    
        return $diagnosis;
    }
    

    
    

}
