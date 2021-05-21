<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\LoginController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/generic', function () {
    return view('generic');
});
Route::get('/elements', function () {
    return view('elements');
});




Route::group(['middleware'=>['LoginMiddleware']],function()
{
    Route::get('/login', function () {return view('login');});
    //Route::get('/login',[LoginController::class,'create']);
    Route::get('/AdminHome',[LoginController::class,'adminHomeView']);    
    Route::get('/logout',[LoginController::class , 'lgout' ] );
    Route::get('/AdminHome',[LoginController::class,'adminHomeView']);
    Route::get('/StaffHome',[LoginController::class,'staffHomeView']);
    Route::get('/StudentHome',[LoginController::class,'studHomeView']);
});

Route::post('/log',[LoginController::class,'check']);

//Route::get('/StudentHome',[StudentController::class,'dues']);
/*
Route::get('/signup',[LoginController::class,'createadm']);
Route::post('/ReadAdmin',[LoginController::class,'store']);
*/

Route::get('/AddStaff',[StaffController::class,'create']);
Route::post('/ReadStaff',[StaffController::class,'store']);
Route::get('/ManageStaff',[StaffController::class,'index']);


Route::get('/AddStud',[StudentController::class,'create']);
Route::get('/AddStud',[FeeController::class,'viewCoursewithFee']);
Route::post('/ReadStu',[StudentController::class,'store']);
Route::get('/ManageStud',[StudentController::class,'index']);

Route::get('/ViewStud',[StudentController::class,'admViewStud']);


Route::get('/AddFee',[FeeController::class,'create']);
Route::post('/ReadFee',[FeeController::class,'store']);
Route::get('/ManageFee',[FeeController::class,'index']);


Route::get('/ViewPay',[PaymentController::class,'index']);
Route::get('/StfViewPay',[PaymentController::class,'staffindex']);
Route::get('/MyPays',[PaymentController::class,'studindex']);


Route::get('/feepayment',[PaymentController::class,'getamt']);
Route::post('/paymentportal',[PaymentController::class,'store']);
Route::get('/paysuccess',[PaymentController::class,'psuccess']);


Route::get('/PrintRep',[PaymentController::class,'studviewreport']);
Route::get('/StaffPrintRep',[PaymentController::class,'staffviewreport']);



Route::get('/staffdetail/{id}/del',[StaffController::class,'del']);
Route::get('/staffdetail/{id}/edit',[StaffController::class,'edit']);
Route::post('/staffeditprocess/{id}/edit',[StaffController::class,'update']);

Route::get('/feedetail/{id}/del',[FeeController::class,'del']);

Route::get('/studentdetail/{id}/del',[StudentController::class,'del']);
Route::get('/studentdetail/{id}/edit',[StudentController::class,'edit']);
Route::post('/studenteditprocess/{id}/edit',[StudentController::class,'update']);


Route::get('/ViewFee',[StudentController::class,'feev']);
