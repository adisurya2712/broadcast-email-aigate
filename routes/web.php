<?php

use App\Http\Controllers\BeritaController;
use App\Mail\BroadcastEmail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BroadcastEmailController;
use App\Http\Controllers\TemplateEmailController;

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

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');
Route::get('/register', function (){
    abort(404);
});
Route::post('/register', function (){
    abort(404);
});
Route::group(['auth:sanctum','verified'], function(){
    Route::prefix('jobs')->group(function () {
        Route::queueMonitor();
    });

//CRUD Template
    Route::get('/',[TemplateEmailController::class, 'index']);
    Route::get('template-email/create',[TemplateEmailController::class, 'create']);
    Route::post('template-email/store',[TemplateEmailController::class, 'store']);
    Route::get('template-email/edit/{id}',[TemplateEmailController::class, 'edit']);
    Route::post('template-email/update/{id}',[TemplateEmailController::class, 'update']);
    Route::get('template-email/delete/{id}',[TemplateEmailController::class, 'delete']);


//Route::get('/broadcast-email', 'BroadcastEmailController@index');
    Route::get('broadcast-email',[BroadcastEmailController::class, 'index']);

    Route::get('send/mail/{id}', [BroadcastEmailController::class, 'send_mail'])->name('send_mail');

});
