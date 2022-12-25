<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Threads;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThreadsController extends Controller
{



    public function index()
    {
        $uid=Auth::id();
        $user=User::findOrFail($uid);
       foreach($user->courses as $course){
           return $course->threads;
       }


    }

    public function store(Request $request,$cou){

            $course=Course::findOrFail($cou);
            if($course->instructor_id==Auth::id()){
                $thread=new Threads();
                $thread->instructor_id=auth()->id();
                $thread->course_id=$cou;
                $thread->thread= $request->thread;
                $thread->information= $request->information;
            $thread->save();
                 return response()->json(['status'=>'success','message'=>'Thread created successfully']);

            }else{
                return response()->json(['status'=>'fail','message'=>'You are only allowed to create threads in your own courses']);

            }


        }









}
