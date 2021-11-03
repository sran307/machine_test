<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\admin;

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
}
