<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ControllerRegister;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\RepliesController;
use App\Http\Controllers\ThreadsController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//User register and login
Route::post('register',[ControllerRegister::class,'register']);
Route::post('login',[ControllerRegister::class,'login']);

//Admin register and login
Route::post('admin/register',[AdminController::class,'register']);
Route::post('admin/login',[AdminController::class,'login']);

//Instructor register and login
Route::post('instructor/register',[InstructorController::class,'register']);
Route::post('instructor/login',[InstructorController::class,'login']);

//Instructor can create a Course
Route::post('create/course',[CourseController::class,'store'])->middleware('auth:instructor');

//View all Courses
Route::get('courses',[CourseController::class,'index']);

//Student enrolling in a course
Route::put('course/{id}',[UserController::class,'create'])->middleware('auth:api');

//Instructor posting a thread
Route::post('course/{id}/thread',[ThreadsController::class,'store'])->middleware('auth:instructor');


//---------------------------NOT FINISHED YET----------------------//
//Student can view threads of the course they enrolled
Route::get('course/threads',[ThreadsController::class,'index']);
//---------------------------NOT FINISHED YET----------------------//

//Admin can delete a course
Route::delete('course/{id}',[CourseController::class,'destroy'])->middleware('auth:admin');

//Student can reply to a thread
Route::post('thread/{id}/reply',[RepliesController::class,'store'])->middleware('auth:api');

//Student can delete replies or Student can delete his own replies
Route::delete('reply/{id}',[RepliesController::class,'destroy']);



Route::middleware('auth')->group( function(){

        Route::get('posts/{id}',[PostsController::class,'update']);
        Route::post('posts',[PostsController::class,'store']);
        Route::delete('posts/{id}',[PostsController::class,'destroy']);
        Route::put('posts/{id}',[PostsController::class,'update']);
        Route::post('posts/{id}/comment',[Repliescontroller::class,'store']);


});
