<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

        public function index(){
            return Course::all();
        }


    public function store(Request $request){
        try{
            $course=new Course();
            $course->instructor_id=auth()->id();
            $course->title= $request->title;
            $course->description= $request->description;

            if($course->save()){
                return response()->json(['status'=>'success','message'=>'Course created successfully']);
            }

        }catch(\Exception $e){
            return response()->json(['status'=>'fail','message'=>$e->getmessage()]);
        }
    }




    public function destroy($id){
        try{
            $course=Course::findOrfail($id);
            if ($course->delete()) {
                return response()->json(['status' => 'success', 'message' => 'Course deleted successfully']);
            }

        }catch(\Exception $e){
            return response()->json(['status'=>'fail','message'=>$e->getmessage()]);
        }
    }



}
