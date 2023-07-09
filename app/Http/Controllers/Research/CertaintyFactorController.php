<?php

namespace App\Http\Controllers\Research;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use DB;
use Hash;

use Illuminate\Support\Arr;



class CertaintyFactorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        echo"<H2>CF</H2>";
        $gejalaPenyakit = array(
            'P1' => array(
                'Gejala1' => 0.8,
                'Gejala2' => 0.6,
                'Gejala3' => 0.7,
            ),
            'P2' => array(
                'Gejala1' => 0.5,
                'Gejala3' => 0.9,
                'Gejala4' => 0.7,
            ),
            'P3' => array(
                'Gejala2' => 0.6,
                'Gejala4' => 0.8,
                'Gejala5' => 0.7,
            ),
        );

        $gejalaUser = array(
            'Gejala1' => 0.9,
            'Gejala3' => 0.8,
        );
        dump("GEJALA PENYAKIT");
        dump($gejalaPenyakit);

        dump("GEJALA USER");
        dump($gejalaUser);
        
        $cfTotal = $this->hitungCF($gejalaPenyakit, $gejalaUser);
        $penyakitTerdiagnosa = $this->diagnosaPenyakit($cfTotal);
        
        echo "Penyakit yang mungkin terjadi: $penyakitTerdiagnosa\n";
      
    }

    public function hitungCF($gejalaPenyakit, $gejalaUser) {
        $cfTotal = array();
    
        foreach ($gejalaPenyakit as $penyakit => $gejala) {
            $cfTotal[$penyakit] = 1;
    
            foreach ($gejalaUser as $gejala => $nilai) {
                if (isset($gejalaPenyakit[$penyakit][$nilai])) {
                    $cfTotal[$penyakit] *= $gejalaPenyakit[$penyakit][$gejala];
                }
            }
        }
    
        return $cfTotal;
    }

    function diagnosaPenyakit($cfTotal) {
        $penyakitTerbesar = '';
        $cfTerbesar = -1;
    
        foreach ($cfTotal as $penyakit => $cf) {
            if ($cf > $cfTerbesar) {
                $penyakitTerbesar = $penyakit;
                $cfTerbesar = $cf;
            }
        }
    
        return $penyakitTerbesar;
    }
    
    

}
