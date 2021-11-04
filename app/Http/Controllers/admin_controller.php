<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
//admin table
use App\Models\admin;
//product table
use App\Models\Product;
//user table
use App\Models\user_data;
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
            }elseif($password==null){
                return response()->json([
                    "message"=>"please enter the password"
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
    //edit product function for form
    public function edit_product(){
        $data=Product::all();
        return view("edit_product",["data"=>$data]);
    }
    //fetching data for the corresponding product id and passing it
    public function fetch_edit_product(Request $request){
        $id=$request->post("id");
        $product_data=Product::where("id",$id)->get();
        foreach($product_data as $value){
            $name=$value->Name;
            $color=$value->Color;
            $quantity=$value->Quantity;
            $description=$value->Description;
        }
        return response()->json([
            "name"=>$name,
            "color"=>$color,
            "quantity"=>$quantity,
            "description"=>$description
        ]);
    }
    //updating the table
    public function edit_product_data(Request $request){
        $id=$request->post("product_id");
        //dd($id);
        DB::beginTransaction();
        try{
            $update=Product::where("id",$id)->update([
                "Name"=>$request->post("product_name"),
                "Color"=>$request->post("product_color"),
                "Quantity"=>$request->post("product_quantity"),
                "Description"=>$request->post("product_description")
            ]);
            DB::commit();
            if($update){
                return back()->with("success_message","product updated");
            }else{
                return back()->with("error_message","Cannot update the product");
            }
        }catch(\Exception $e){
            DB::rollback();
            return back()->with("error_message","Cannot update the product");
        }
    }
    //fetch data for delete
    public function delete_product(){
        $data=Product::all();
        return response()->json([
            "data"=>$data
        ]);
    }
    public function delete_data($id){
        DB::beginTransaction();
        try{
            $delete=Product::where("id",$id)->delete();
            DB::commit();
            if($delete){
                return response()->json([
                    "status"=>200,
                    "message"=>"Product deleted successfully"
                ]);
            }else{
                return response()->json([
                    "status"=>400,
                    "message"=>"Cannot delete the product"
                ]);
            }
        }catch(\Exception $e){
            DB::rollback();
            return response()->json([
                "status"=>400,
                "message"=>"Cannot delete the product"
            ]);
        }
    }
    //product listing
    public function product_list(){
        $data=Product::all();
        return view("product_list",["data"=>$data]);
    }
    //add user
    public function add_user_data(Request $request){
        $email=$request->post("email");
        //password is encrypting
        $password=md5($request->post("password"));
        //json encoding array value
        $user_role=$request->post("user_role");
        $enc_user_role=json_encode($user_role);
        $validator=Validator::make($request->all(),[
            "name"=>"required",
            "email"=>"required",
            "password"=>"required",
            "gender"=>"required",
            "user_role"=>"required"
        ]);
        if($validator->fails()){
            return response()->json([
                "status"=>400,
                "errors"=>$validator->messages()
            ]);
        }else{
            //add user data to the database
            //take the email as unique 
            //check the email id exists or not
            //if exists abort the creation otherwise create
            $data=user_data::where("email",$email)->get();
            if(count($data)>0){
                return response()->json([
                    "status"=>404,
                    "message"=>"email id exists. Try another one.",
                ]);
            }else{
                DB::beginTransaction();
                try{
                    $user_creation=user_data::create([
                        "Name"=>$request->post("name"),
                        "Email"=>$request->post("email"),
                        "Password"=>$password,
                        "Gender"=>$request->post("gender"),
                        "User_rol"=>$enc_user_role
                    ]);
                    DB::commit();
                    if($user_creation){
                        return response()->json([
                            "status"=>200,
                            "message"=>"User created successfully"
                        ]);
                    }else{
                        return response()->json([
                            "status"=>404,
                            "message"=>"Cannot create the user"
                        ]);
                    }
                }catch(\Exception $e){
                    DB::rollback();
                    return response()->json([
                        "status"=>404,
                        "message"=>"Terminate the creation process"
                    ]);
                }
                
            }
           
        }
    }
}
