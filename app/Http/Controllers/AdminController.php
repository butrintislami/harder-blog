<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    public  function register(Request $request){
        try{
            $request->validate([
                'name'=>'required',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:24|confirmed'
            ]);

            $admin = new Admin();
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->password = Hash::make($request->password);


            if($admin->save()){
                return response()->json(['status'=>'success','message'=>'Admin created successfully']);

            }

        }catch(\Exception $e){
            return response()->json(['status'=>'fail','message'=>$e->getmessage()]);
        }
    }
    public function login(Request $request)
    {
        $creds = $request->only(['email','password']);
        if (!$token=auth()->guard('admin')->attempt($creds)){
            return response()->json([
                'success'=>false,
                'message'=>'information is not correct'
            ],Response::HTTP_UNAUTHORIZED);
        }
        return response()->json([
            'success'=>true,
            'token'=>$token,
            'admin'=>Auth::guard('admin')->user()
        ],Response::HTTP_OK);

    }

    public function logout(Request $request){
        try {
            JWTAuth::invalidate(JWTAuth::parseToken($request->token));
            return response()->json([
                "success"=>true,
                "message"=>"logout success"
            ]);
        }catch (Exception $exception){
            return response()->json([
                "success"=>false,
                "message"=>"".$exception
            ]);
        }
    }
}
