<?php

namespace App\Http\Controllers\Research;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use DB;
use Hash;

use Illuminate\Support\Arr;



class RecomenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
     
        $preferences = array(
            'Rizky' => array(
                'coffee aceh' => 5,
                'java' => 4,
                'lampung coffee' => 1,
                'bali coffee' => 1,
            ),
            'dimas' => array(
                'coffee aceh' => 5,
                'java' => 5,
                'lampung coffee' => 1,
                'bali coffee' => 1,
            ),
            'sherlly' => array(
                'coffee aceh' => 1,
                'java' => 5,
                'lampung coffee' => 2,
                'bali coffee' => 2,
            ),
            'wibi' => array(
                'coffee aceh' => 1,
                'java' => 5,
                'lampung coffee' => 1,
                'bali coffee' => 1,
            ),
            'suryo' => array(
                'coffee aceh' => 1,
                'java' => 5,
                'lampung coffee' => 2,
                'bali coffee' => 1,
            ),
        );

        $person = 'Rizky';
        $recommendations = $this->getRecommendations($preferences, $person);

        echo "Rekomendasi untuk $person:\n";
        echo "<br>";
        foreach ($recommendations as $item => $score) {
            echo "$item";
            echo "<br>";
        }
    }

    public function euclideanDistance($prefs, $person1, $person2)
    {
        $similarItems = array_intersect_key($prefs[$person1], $prefs[$person2]);
        $sumOfSquares = 0;

        foreach ($similarItems as $item => $rating) {
            

            $sumOfSquares += pow($prefs[$person1][$item] - $prefs[$person2][$item], 2);
            dump($prefs[$person1][$item]."-".$prefs[$person2][$item]."=".$sumOfSquares);
        }

        return 1 / (1 + sqrt($sumOfSquares));
    }

    public function getRecommendations($prefs, $person)
    {
        $totalSimilarity = array();
        $similaritySums = array();
        $rankings = array();

        foreach ($prefs as $otherPerson => $items) {
            if ($otherPerson !== $person) {
                $similarity = $this->euclideanDistance($prefs, $person, $otherPerson);
                //dump($prefs);
                //dump("person :".$person.", ortherPerson :".$otherPerson.", similarity:".$similarity);
                foreach ($items as $item => $rating) {
                  
                    if (!isset($prefs[$person][$rating]) || $prefs[$person][$rating] == 0) {
                        $rankings[$item] = 0;
                        $rankings[$item] += $prefs[$otherPerson][$item] * $similarity;
                        // dump($prefs[$otherPerson][$item]."*".$similarity);
                        $similaritySums[$item] = 0;
                        $similaritySums[$item] += $similarity;
                    }
                    // dump("person :".$otherPerson." item :".$item.":".$rating." similarity:".$similarity);
                }
                dump("======================");
            }
        }

        // dump($rankings);

        foreach ($rankings as $item => $score) {
            $rankings[$item] = $score / $similaritySums[$item];
        }

        arsort($rankings);

        return $rankings;
    }
}
