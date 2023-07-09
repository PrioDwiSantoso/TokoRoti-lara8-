<?php
        namespace App\Http\Controllers\Back\Tbl_transaksi;
        use Illuminate\Http\Request;
        use App\Http\Controllers\Controller;
        use App\Models\Tbl_transaksi;
        use DB;
        use Hash;
        use Illuminate\Support\Arr;

        class Tbl_transaksiController extends Controller
        {
            /**
             * Display a listing of the resource.
             *
             * @return \Illuminate\Http\Response
             */
        
            public function index(Request $request)
            {
                $data = Tbl_transaksi::orderBy("id","DESC")->get();
                return view("back.Tbl_transaksi.index",compact("data"))
                    ->with("i", ($request->input("page", 1) - 1) * 5);
            }
        
            /**
             * Show the form for creating a new resource.
             *
             * @return \Illuminate\Http\Response
             */
        
            public function create()
            {
                return view("back.Tbl_transaksi.create");
            }
        
        
        
            /**
             * Store a newly created resource in storage.
             *
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response
             */
        
            public function store(Request $request)
            {
               
                    $this->validate($request, ["id_product" => "required",
"id_pelanggan" => "required",
]);
                $input = $request->all();
                
                
                $Tbl_transaksi = Tbl_transaksi::create($input);
               
            
                return redirect()->route("tbl_transaksi.index")
                ->with("success","Tbl_transaksi created successfully");
            
            }
        
        
            /**
                 * Display the specified resource.
                 *
                 * @param  int  $id
                 * @return \Illuminate\Http\Response
                 */
        
                public function show($id)
                {
                    $Tbl_transaksi = Tbl_transaksi::find($id);
                    return view("back.Tbl_transaksi.show",compact("Tbl_transaksi"));
                }
            

            
                /**
                 * Show the form for editing the specified resource.
                 *
                 * @param  int  $id
                 * @return \Illuminate\Http\Response
                 */
            
                public function edit($id)
                {
                    $Tbl_transaksi = Tbl_transaksi::find($id);
                    return view("back.Tbl_transaksi.edit",compact("Tbl_transaksi"));
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
                
                   
                        $this->validate($request, ["id_product" => "required",
"id_pelanggan" => "required",
]);
                        

                    $input = $request->all();

                    
                    
                    
                    $Tbl_transaksi = Tbl_transaksi::find($id);
                    $Tbl_transaksi->update($input);
                
                    return redirect()->route("tbl_transaksi.index")
                    ->with("success","Tbl_transaksi updated successfully");
                
                }
            

                /**
                 * Remove the specified resource from storage.
                 *
                 * @param  int  $id
                 * @return \Illuminate\Http\Response
                 */
            
                public function destroy($id)
                {
                    Tbl_transaksi::find($id)->delete();
                    return redirect()->route("tbl_transaksi.index")
                    ->with("success","Tbl_transaksi deleted successfully");
                
                }
            }
        
        ?>