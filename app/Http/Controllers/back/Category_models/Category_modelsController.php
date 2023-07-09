<?php
        namespace App\Http\Controllers\Back\Category_models;
        use Illuminate\Http\Request;
        use App\Http\Controllers\Controller;
        use App\Models\Category_models;
        use DB;
        use Hash;
        use Illuminate\Support\Arr;

        class Category_modelsController extends Controller
        {
            /**
             * Display a listing of the resource.
             *
             * @return \Illuminate\Http\Response
             */
        
            public function index(Request $request)
            {
                $data = Category_models::orderBy("id","DESC")->get();
                return view("back.Category_models.index",compact("data"))
                    ->with("i", ($request->input("page", 1) - 1) * 5);
            }
        
            /**
             * Show the form for creating a new resource.
             *
             * @return \Illuminate\Http\Response
             */
        
            public function create()
            {
                return view("back.Category_models.create");
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
                
                
                $Category_models = Category_models::create($input);
               
            
                return redirect()->route("category_models.index")
                ->with("success","Category_models created successfully");
            
            }
        
        
            /**
                 * Display the specified resource.
                 *
                 * @param  int  $id
                 * @return \Illuminate\Http\Response
                 */
        
                public function show($id)
                {
                    $Category_models = Category_models::find($id);
                    return view("back.Category_models.show",compact("Category_models"));
                }
            

            
                /**
                 * Show the form for editing the specified resource.
                 *
                 * @param  int  $id
                 * @return \Illuminate\Http\Response
                 */
            
                public function edit($id)
                {
                    $Category_models = Category_models::find($id);
                    return view("back.Category_models.edit",compact("Category_models"));
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

                    
                    
                    
                    $Category_models = Category_models::find($id);
                    $Category_models->update($input);
                
                    return redirect()->route("category_models.index")
                    ->with("success","Category_models updated successfully");
                
                }
            

                /**
                 * Remove the specified resource from storage.
                 *
                 * @param  int  $id
                 * @return \Illuminate\Http\Response
                 */
            
                public function destroy($id)
                {
                    Category_models::find($id)->delete();
                    return redirect()->route("category_models.index")
                    ->with("success","Category_models deleted successfully");
                
                }
            }
        
        ?>