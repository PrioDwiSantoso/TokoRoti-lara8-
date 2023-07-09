<?php
        namespace App\Http\Controllers\Back\Customers_models;
        use Illuminate\Http\Request;
        use App\Http\Controllers\Controller;
        use App\Models\Customers_models;
        use DB;
        use Hash;
        use Illuminate\Support\Arr;

        class Customers_modelsController extends Controller
        {
            /**
             * Display a listing of the resource.
             *
             * @return \Illuminate\Http\Response
             */
        
            public function index(Request $request)
            {
                $data = Customers_models::orderBy("id","DESC")->get();
                return view("back.Customers_models.index",compact("data"))
                    ->with("i", ($request->input("page", 1) - 1) * 5);
            }
        
            /**
             * Show the form for creating a new resource.
             *
             * @return \Illuminate\Http\Response
             */
        
            public function create()
            {
                return view("back.Customers_models.create");
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
                
                
                $Customers_models = Customers_models::create($input);
               
            
                return redirect()->route("customers_models.index")
                ->with("success","Customers_models created successfully");
            
            }
        
        
            /**
                 * Display the specified resource.
                 *
                 * @param  int  $id
                 * @return \Illuminate\Http\Response
                 */
        
                public function show($id)
                {
                    $Customers_models = Customers_models::find($id);
                    return view("back.Customers_models.show",compact("Customers_models"));
                }
            

            
                /**
                 * Show the form for editing the specified resource.
                 *
                 * @param  int  $id
                 * @return \Illuminate\Http\Response
                 */
            
                public function edit($id)
                {
                    $Customers_models = Customers_models::find($id);
                    return view("back.Customers_models.edit",compact("Customers_models"));
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

                    
                    
                    
                    $Customers_models = Customers_models::find($id);
                    $Customers_models->update($input);
                
                    return redirect()->route("customers_models.index")
                    ->with("success","Customers_models updated successfully");
                
                }
            

                /**
                 * Remove the specified resource from storage.
                 *
                 * @param  int  $id
                 * @return \Illuminate\Http\Response
                 */
            
                public function destroy($id)
                {
                    Customers_models::find($id)->delete();
                    return redirect()->route("customers_models.index")
                    ->with("success","Customers_models deleted successfully");
                
                }
            }
        
        ?>