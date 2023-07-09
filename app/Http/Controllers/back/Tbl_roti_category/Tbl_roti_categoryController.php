<?php
        namespace App\Http\Controllers\Back\Tbl_roti_category;
        use Illuminate\Http\Request;
        use App\Http\Controllers\Controller;
        use App\Models\Tbl_roti_category;
        use DB;
        use Hash;
        use Illuminate\Support\Arr;

        class Tbl_roti_categoryController extends Controller
        {
            /**
             * Display a listing of the resource.
             *
             * @return \Illuminate\Http\Response
             */
        
            public function index(Request $request)
            {
                $data = Tbl_roti_category::orderBy("id","DESC")->get();
                return view("back.Tbl_roti_category.index",compact("data"))
                    ->with("i", ($request->input("page", 1) - 1) * 5);
            }
        
            /**
             * Show the form for creating a new resource.
             *
             * @return \Illuminate\Http\Response
             */
        
            public function create()
            {
                return view("back.Tbl_roti_category.create");
            }
        
        
        
            /**
             * Store a newly created resource in storage.
             *
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response
             */
        
            public function store(Request $request)
            {
               
                    $this->validate($request, ["name" => "required",
"deleted" => "required",
]);
                $input = $request->all();
                
                
                $Tbl_roti_category = Tbl_roti_category::create($input);
               
            
                return redirect()->route("tbl_roti_category.index")
                ->with("success","Tbl_roti_category created successfully");
            
            }
        
        
            /**
                 * Display the specified resource.
                 *
                 * @param  int  $id
                 * @return \Illuminate\Http\Response
                 */
        
                public function show($id)
                {
                    $Tbl_roti_category = Tbl_roti_category::find($id);
                    return view("back.Tbl_roti_category.show",compact("Tbl_roti_category"));
                }
            

            
                /**
                 * Show the form for editing the specified resource.
                 *
                 * @param  int  $id
                 * @return \Illuminate\Http\Response
                 */
            
                public function edit($id)
                {
                    $Tbl_roti_category = Tbl_roti_category::find($id);
                    return view("back.Tbl_roti_category.edit",compact("Tbl_roti_category"));
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
                
                   
                        $this->validate($request, ["name" => "required",
"deleted" => "required",
]);
                        

                    $input = $request->all();

                    
                    
                    
                    $Tbl_roti_category = Tbl_roti_category::find($id);
                    $Tbl_roti_category->update($input);
                
                    return redirect()->route("tbl_roti_category.index")
                    ->with("success","Tbl_roti_category updated successfully");
                
                }
            

                /**
                 * Remove the specified resource from storage.
                 *
                 * @param  int  $id
                 * @return \Illuminate\Http\Response
                 */
            
                public function destroy($id)
                {
                    Tbl_roti_category::find($id)->delete();
                    return redirect()->route("tbl_roti_category.index")
                    ->with("success","Tbl_roti_category deleted successfully");
                
                }
            }
        
        ?>