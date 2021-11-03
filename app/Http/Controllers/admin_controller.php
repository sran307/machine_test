<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
//admin table
use App\Models\admin;
//product table
use App\Models\Product;
class admin_controller extends Controller
{
    public function admin_page(){
        if(session()->has("admin_id")){
            session()->pull("admin_id");
        }
        return view("layout");
    }
    public function admin(Request $request){
        //fetching data from database and compare the passwords
        $password=$request->post("password");
        //encrypting the  password
        $enc_password=md5($password);
        //at first time the table is empty so we entered the details of admin
        if(!admin::exists()){
            DB::beginTransaction();
            try{
                admin::create([
                    "Name"=>"sreeraj",
                    "Email"=>"sreerajs728@gmail.com",
                    "Password"=>md5(123),
                ]);
                DB::commit();
            }catch(\Exception $e){
                DB::rollback();
            }

        }else{
            //if data is available in the table compare the password that entered with existing in database
            $data=admin::all();
            foreach($data as $value){
                $admin_password=$value->Password;
            }
            //comparing the passwords
            if($enc_password==$admin_password){
                return response()->json([
                    "status"=>200,
                    "message"=>"welcome admin"

                ]);
            }else{
                return response()->json([
                    "message"=>"passwords are not matching"
                ]);
            }
        }
    }
    //function for registration page loading
    public function admin_panel(){
        //taking value from table for create a session
        $data=admin::all();
        foreach($data as $value){
            $id=$value->id;
            $name=$value->Name;
        }
        session()->put("admin_id",$id);
        return view("admin_panel",["name"=>$name]);
    }
    //function for adding product
    public function add_product_form(Request $request){
        DB::beginTransaction();
        try{
            //fetching data from form and create a row in table 
            $add_product=Product::create([
                "Name"=>$request->post("product_name"),
                "Color"=>$request->post("product_color"),
                "Quantity"=>$request->post("available_quantity"),
                "Description"=>$request->post("product_description")
            ]);
            DB::commit();
            if($add_product){
                return back()->with("success_message","Product added successfully.");
            }else{
                return back()->with("error_message","Product cannot added.");
            }
        }catch(\Exception $e){
            DB::rollback();
            return back()->with("error_message","process terminated.");
        }
        

    }
}
