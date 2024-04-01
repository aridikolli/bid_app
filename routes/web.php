<?php

use App\Http\Controllers\AuctionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/register',[RegisterController::class,'index'])->name('register')->middleware('guest');
Route::post('/register',[RegisterController::class,'register']);

Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'login']);

Route::get('/newAuction',[AuctionController::class,'index'])->name('newAuction')->middleware('auth');
Route::post('/newAuction',[AuctionController::class,'store'])->middleware('auth');

Route::get('/',[HomeController::class,'index'])->name('home')->middleware('auth');
Route::get('/auctions/{id}',[AuctionController::class,'detail'])->middleware('auth');
Route::post('/savebid',[AuctionController::class,'save'])->name('saveBid')->middleware('auth');
Route::get('/auctions/delete/{id}',[AuctionController::class,'delete'])->name('delete')->middleware('auth');

Route::get('/logout',[LogoutController::class,'logout'])->name('logout');


Route::get('/detail',function (){
   return view('auctions.auction_detail');
})->middleware('auth');

