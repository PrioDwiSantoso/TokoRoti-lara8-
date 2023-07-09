<?php

namespace App\Http\Controllers\Back;
use App\Http\Controllers\Controller;
use App\Charts\SampleChart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $historyorders = DB::select("select YEAR(tanggalorder) as date, MONTH(tanggalorder) as month,sum(itemsubtotal) as jumlah
				from order_models where deleted = 'false' 
			 group by YEAR(tanggalorder), MONTH(tanggalorder) order by tanggalorder asc");
    //  /dd($historyorders);

        $label = [2011,2012,2013,2014,2015,2016,2017];
        $dataset = [5,4,10,6,5,9,8];
        $dataset2 = [6,7,3,5,4,6,10];
        // for ($ho = 0; $ho < count($historyorders); $ho++) { 
        //     array_push($label, $historyorders[$ho]->date);
        //     array_push($dataset, $historyorders[$ho]->jumlah);
        // }

        $chart = new SampleChart;

        $chart->labels($label);
        $chart->dataset('Orders Laptop', 'bar', $dataset)->options([
            'backgroundColor' => "#91416C",
        ]);
        $chart->dataset('Orders Dekstop', 'bar', $dataset2)->options([
            'backgroundColor' => "#91f1e8",
        ]);
        return view('back/dashboard',compact('chart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
