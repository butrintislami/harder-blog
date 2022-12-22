<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function create(Request $request,$cou){
        try{
        $uid=auth()->id();
        $user=User::findOrfail($uid);

        $user->save();

        $course=Course::findOrfail($cou);
        $user->courses()->attach($course);
            if(true){
                return response()->json(['status'=>'success','message'=>'You have successfully joined this course']);
            }else{
                return response()->json(['status'=>'Fail','message'=>'This course does not exist']);

            }

    }catch(\Exception $e){
            return response()->json(['status'=>'fail','message'=>'This course does not exist']);
        }

    }

}
