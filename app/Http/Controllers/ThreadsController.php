<?php

namespace App\Http\Controllers;

use App\Models\Threads;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThreadsController extends Controller
{



    public function index()
    {
        return Threads::all();
    }

    public function store(Request $request){
        try{
            $thread=new Threads();
            $thread->user_id=auth()->id();
            $thread->title= $request->title;
            $thread->description= $request->description;

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
            $post=Threads::findOrfail($id);
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
