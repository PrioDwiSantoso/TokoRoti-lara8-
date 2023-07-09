<?php
        namespace App\Http\Controllers\Api\Crud;
        use Illuminate\Support\Facades\App;
        use Illuminate\Support\Facades\Session;
        use Illuminate\Http\Request;
        use App\Http\Controllers\Controller;
        use Illuminate\Support\Facades\DB;
        use Hash;
        use Illuminate\Support\Arr;
        

        class GetFieldController extends Controller
        {
            /**
             * Display a listing of the resource.
             *
             * @return \Illuminate\Http\Response
             */
            public function Index(Request $request)
            {
                $table = $request->table;
                $response = DB::select("SHOW FIELDS FROM $table FROM " . env('DB_DATABASE') . ";");

        
             $field = [];
            //  $response =  DB::select("select * from setting_menu");
             for ($v = 0; $v < count($response); $v++) {
                 $res_field = $response[$v];
                 array_push($field, $res_field);
             }
             return response([
                 "data" => $field,
                 "msg" => "success"
             ], 200);
            }

        }
        
        ?>