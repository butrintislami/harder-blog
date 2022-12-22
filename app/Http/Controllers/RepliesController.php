<?php

namespace App\Http\Controllers;

use App\Models\Replies;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    public function store(Request $request,$id){
        try{
            $reply=new Replies();
            $reply->thread_id= $id;
            $reply->user_id=auth()->id();
            $reply->comment= $request->comment;

            if($reply->save()){
                return response()->json(['status'=>'success','message'=>'Reply made successfully']);
            }

        }catch(\Exception $e){
            return response()->json(['status'=>'fail','message'=>$e->getmessage()]);
        }
    }

    public function destroy($id){

            $reply = Replies::findOrFail($id);
            if ($reply->user_id == auth()->id() or auth()->guard('instructor')->check()) {
                $reply->delete();
                return response()->json(['status' => 'success', 'message' => 'Reply deleted successfully']);
        }else{
                return response()->json(['status' => 'fail', 'message' => 'You are not authorized to delete this reply']);

            }
    }

}


