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
        try{
            $thread=new Threads();
            $thread->instructor_id=auth()->id();
            $thread->course_id=$cou;
            $thread->thread= $request->thread;
            $thread->information= $request->information;

            if($thread->save()){
                return response()->json(['status'=>'success','message'=>'Thread created successfully']);
            }

        }catch(\Exception $e){
            return response()->json(['status'=>'fail','message'=>$e->getmessage()]);
        }
    }









}
