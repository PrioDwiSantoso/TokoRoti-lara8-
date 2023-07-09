<?php
        namespace App\Http\Controllers\Back\Order_models;
        use Illuminate\Http\Request;
        use App\Http\Controllers\Controller;
        use App\Models\Order_models;
        use DB;
        use Hash;
        use Illuminate\Support\Arr;

        class Order_modelsController extends Controller
        {
            /**
             * Display a listing of the resource.
             *
             * @return \Illuminate\Http\Response
             */
        
            public function index(Request $request)
            {
                $data = Order_models::orderBy("id","DESC")->get();
                return view("back.Order_models.index",compact("data"))
                    ->with("i", ($request->input("page", 1) - 1) * 5);
            }
        
            /**
             * Show the form for creating a new resource.
             *
             * @return \Illuminate\Http\Response
             */
        
            public function create()
            {
                return view("back.Order_models.create");
            }
        
        
        
            /**
             * Store a newly created resource in storage.
             *
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response
             */
        
            public function store(Request $request)
            {
               
                    $this->validate($request, ["order_date" => "required",
"total_amount" => "required",
"payment_status" => "required",
]);
                $input = $request->all();
                
                
                $Order_models = Order_models::create($input);
               
            
                return redirect()->route("order_models.index")
                ->with("success","Order_models created successfully");
            
            }
        
        
            /**
                 * Display the specified resource.
                 *
                 * @param  int  $id
                 * @return \Illuminate\Http\Response
                 */
        
                public function show($id)
                {
                    $Order_models = Order_models::find($id);
                    return view("back.Order_models.show",compact("Order_models"));
                }
            

            
                /**
                 * Show the form for editing the specified resource.
                 *
                 * @param  int  $id
                 * @return \Illuminate\Http\Response
                 */
            
                public function edit($id)
                {
                    $Order_models = Order_models::find($id);
                    return view("back.Order_models.edit",compact("Order_models"));
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
                
                   
                        $this->validate($request, ["order_date" => "required",
"total_amount" => "required",
"payment_status" => "required",
]);
                        

                    $input = $request->all();

                    
                    
                    
                    $Order_models = Order_models::find($id);
                    $Order_models->update($input);
                
                    return redirect()->route("order_models.index")
                    ->with("success","Order_models updated successfully");
                
                }
            

                /**
                 * Remove the specified resource from storage.
                 *
                 * @param  int  $id
                 * @return \Illuminate\Http\Response
                 */
            
                public function destroy($id)
                {
                    Order_models::find($id)->delete();
                    return redirect()->route("order_models.index")
                    ->with("success","Order_models deleted successfully");
                
                }
            }
        
        ?>