<?php
        namespace App\Http\Controllers\Back\Products_models;
        use Illuminate\Http\Request;
        use App\Http\Controllers\Controller;
        use App\Models\Products_models;
        use DB;
        use Hash;
        use Illuminate\Support\Arr;

        class Products_modelsController extends Controller
        {
            /**
             * Display a listing of the resource.
             *
             * @return \Illuminate\Http\Response
             */
        
            public function index(Request $request)
            {
                $data = Products_models::orderBy("id","DESC")->get();
                return view("back.Products_models.index",compact("data"))
                    ->with("i", ($request->input("page", 1) - 1) * 5);
            }
        
            /**
             * Show the form for creating a new resource.
             *
             * @return \Illuminate\Http\Response
             */
        
            public function create()
            {
                return view("back.Products_models.create");
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
                
                
                $Products_models = Products_models::create($input);
               
            
                return redirect()->route("products_models.index")
                ->with("success","Products_models created successfully");
            
            }
        
        
            /**
                 * Display the specified resource.
                 *
                 * @param  int  $id
                 * @return \Illuminate\Http\Response
                 */
        
                public function show($id)
                {
                    $Products_models = Products_models::find($id);
                    return view("back.Products_models.show",compact("Products_models"));
                }
            

            
                /**
                 * Show the form for editing the specified resource.
                 *
                 * @param  int  $id
                 * @return \Illuminate\Http\Response
                 */
            
                public function edit($id)
                {
                    $Products_models = Products_models::find($id);
                    return view("back.Products_models.edit",compact("Products_models"));
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

                    
                    
                    
                    $Products_models = Products_models::find($id);
                    $Products_models->update($input);
                
                    return redirect()->route("products_models.index")
                    ->with("success","Products_models updated successfully");
                
                }
            

                /**
                 * Remove the specified resource from storage.
                 *
                 * @param  int  $id
                 * @return \Illuminate\Http\Response
                 */
            
                public function destroy($id)
                {
                    Products_models::find($id)->delete();
                    return redirect()->route("products_models.index")
                    ->with("success","Products_models deleted successfully");
                
                }
            }
        
        ?>