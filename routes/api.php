<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\WebContentController;
use App\Http\Controllers\DepartmentContentroller;
use App\Http\Controllers\PreviousWorkController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SponserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\TestimonailController;
use App\Http\Controllers\BannerController;





/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/login',[AuthController::class,'login']);
Route::post('/resetpassword',[AuthController::class,'resetlink'])->middleware('auth:api');
//visitor controller
Route::post('/visiters',[VisitorController::class,'store']);
Route::get('/countvisitor',[VisitorController::class,'index'])->middleware('auth:api');

//news route
Route::post('/news/store',[NewsController::class,'store'])->middleware('auth:api');
Route::get('/news/getall',[NewsController::class,'index']);
Route::get('/news/edit/{id}',[NewsController::class,'edit']);
Route::post('/news/update/{id}',[NewsController::class,'update'])->middleware('auth:api');
Route::post('/hidden',[NewsController::class,'hidden'])->middleware('auth:api');


//events route
Route::post('/event/store',[EventController::class,'store'])->middleware('auth:api');
Route::get('/event/getall',[EventController::class,'index']);
Route::get('/event/edit/{id}',[EventController::class,'edit']);
Route::post('/event/update/{id}',[EventController::class,'update'])->middleware('auth:api');
Route::post('/event/hidden',[EventController::class,'hidden'])->middleware('auth:api');


//qustion route
Route::post('/question/store',[QuestionController::class,'store']);
Route::post('/answer/{id}',[QuestionController::class,'answer'])->middleware('auth:api');
Route::get('/getall/question',[QuestionController::class,'index'])->middleware('auth:api');
Route::get('/count/question',[QuestionController::class,'totalquestions'])->middleware('auth:api');




//web content route
Route::post('/store/content',[WebContentController::class,'store']);
Route::get('/getall/content',[WebContentController::class,'index']);
Route::get('/edit/content/{id}',[WebContentController::class,'edit']);
Route::post('/webcontent/update/{id}',[WebContentController::class,'update'])->middleware('auth:api');

//departments route
Route::post('/store/department',[DepartmentContentroller::class,'store']);
Route::get('/getall/department',[DepartmentContentroller::class,'index']);
Route::get('/edit/department/{id}',[DepartmentContentroller::class,'edit']);
Route::post('/update/department/{id}',[DepartmentContentroller::class,'update'])->middleware('auth:api');

//privious ork wroute
Route::post('/store/PreviousWork',[PreviousWorkController::class,'store'])->middleware('auth:api');
Route::get('/getall/PreviousWork',[PreviousWorkController::class,'index']);
Route::get('/edit/PreviousWork/{id}',[PreviousWorkController::class,'edit']);
Route::post('/update/PreviousWork/{id}',[PreviousWorkController::class,'update'])->middleware('auth:api');
Route::post('/work/hidden',[PreviousWorkController::class,'hidden'])->middleware('auth:api');

//user route
Route::get('/user/getall',[UserController::class,'index']);
Route::get('/edit/user/{id}',[UserController::class,'edit']);
Route::post('/update/user/{id}',[UserController::class,'update'])->middleware('auth:api');


//service route
Route::get('/service/getall',[ServiceController::class,'index']);
Route::get('/service/edit/{id}',[ServiceController::class,'edit']);
Route::post('/service/update/{id}',[ServiceController::class,'update'])->middleware('auth:api');

//resource controller
Route::get('/resource/getall',[ResourceController::class,'index']);
Route::get('/resource/delete/{id}',[ResourceController::class,'edit']);
Route::post('/resource/store',[ResourceController::class,'store'])->middleware('auth:api');
Route::post('/resource/hidden',[ResourceController::class,'hidden'])->middleware('auth:api');



//subscribers route
Route::get('/subscriber/getall',[SubscriptionController::class,'index']);
Route::get('/subscriber/delete/{id}',[SubscriptionController::class,'edit']);
Route::post('/subscriber/store',[SubscriptionController::class,'store']);
Route::post('/subscriber/broadcast',[SubscriptionController::class,'broadcast'])->middleware('auth:api');


//sponser route
Route::post('/store/sponser',[SponserController::class,'store'])->middleware('auth:api');
Route::get('/getall/sponser',[SponserController::class,'index']);
Route::post('/sponser/hidden',[SponserController::class,'hidden'])->middleware('auth:api');
//testimonial route
Route::post('/store/testimonial',[TestimonailController::class,'store'])->middleware('auth:api');
Route::get('/getall/testimonial',[TestimonailController::class,'index']);
Route::post('/testimonial/hidden',[TestimonailController::class,'hidden'])->middleware('auth:api');
//banner route
Route::post('/store/banner',[BannerController::class,'store'])->middleware('auth:api');
Route::get('/getall/banner',[BannerController::class,'index']);
Route::post('/banner/hidden',[BannerController::class,'hidden'])->middleware('auth:api');
