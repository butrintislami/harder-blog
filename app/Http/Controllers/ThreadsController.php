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
        $id=auth()->id();
//        $course=Course::findOrFail($cou);
        $user=User::findOrFail($id);
        return $user-course()->title();
//            if(){
//                return Threads::all();
//            }
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


    public function destroy($id){
        try{
            $uid=auth()->id();
            $thread=Threads::findOrfail($id);
            $user=User::findOrfail($uid);


            if ($thread->user_id==auth()->id() OR $user->role=='admin'){
                $thread->delete();
                return response()->json(['status'=>'success','message'=>'Thread deleted successfully']);

            }else{
                return response()->json(['status'=>'fail','message'=>'You do not have access to delete this post']);

            }

        }catch(\Exception $e){
            return response()->json(['status'=>'fail','message'=>$e->getmessage()]);
        }
    }







}
