<?php
        namespace App\Http\Controllers\Back\Tbl_product;
        use Illuminate\Http\Request;
        use App\Http\Controllers\Controller;
        use App\Models\Tbl_product;
        use DB;
        use Hash;
        use Illuminate\Support\Arr;

        class Tbl_productController extends Controller
        {
            /**
             * Display a listing of the resource.
             *
             * @return \Illuminate\Http\Response
             */
        
            public function index(Request $request)
            {
                $data = Tbl_product::orderBy("id","DESC")->get();
                return view("back.Tbl_product.index",compact("data"))
                    ->with("i", ($request->input("page", 1) - 1) * 5);
            }
        
            /**
             * Show the form for creating a new resource.
             *
             * @return \Illuminate\Http\Response
             */
        
            public function create()
            {
                return view("back.Tbl_product.create");
            }
        
        
        
            /**
             * Store a newly created resource in storage.
             *
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response
             */
        
            public function store(Request $request)
            {
               
                    
                $input = $request->all();

            
                
                
                $Tbl_product = Tbl_product::create($input);
               
            
                return redirect()->route("tbl_product.index")
                ->with("success","Tbl_product created successfully");
            
            }
        
        
            /**
                 * Display the specified resource.
                 *
                 * @param  int  $id
                 * @return \Illuminate\Http\Response
                 */
        
                public function show($id)
                {
                    $Tbl_product = Tbl_product::find($id);
                    return view("back.Tbl_product.show",compact("Tbl_product"));
                }
            

            
                /**
                 * Show the form for editing the specified resource.
                 *
                 * @param  int  $id
                 * @return \Illuminate\Http\Response
                 */
            
                public function edit($id)
                {
                    $Tbl_product = Tbl_product::find($id);
                    return view("back.Tbl_product.edit",compact("Tbl_product"));
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
                
                   
                        
                        

                    $input = $request->all();

                    
                    
                    
                    $Tbl_product = Tbl_product::find($id);
                    $Tbl_product->update($input);
                
                    return redirect()->route("tbl_product.index")
                    ->with("success","Tbl_product updated successfully");
                
                }
            

                /**
                 * Remove the specified resource from storage.
                 *
                 * @param  int  $id
                 * @return \Illuminate\Http\Response
                 */
            
                public function destroy($id)
                {
                    Tbl_product::find($id)->delete();
                    return redirect()->route("tbl_product.index")
                    ->with("success","Tbl_product deleted successfully");
                
                }
            }
