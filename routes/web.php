<?php
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;


//Route kas anggota

Route::get('/kasbiro/{month:id}', 'MoneyController@index');

Route::get('/kasbiro', 'MonthController@index');

Route::get('/kasinti/{month:id}', 'MoneyController@index');

Route::get('/kasinti', 'MonthController@index');

Route::get('/approvekas', 'MonthController@indexapprove');

Route::get('/approvekas/{month:id}', 'MoneyController@approve');

//Routing fitur update Uang kas 
Route::get('/edituangkasbiro/{money:id}', 'MoneyController@updateIndex');
Route::patch('/edituangkasbiro/{money:id}', 'MoneyController@update');

Route::get('/edituangkasinti/{money:id}', 'MoneyController@updateIndex');
Route::patch('/edituangkasinti/{money:id}', 'MoneyController@update');

//Routing fitur update Approve 
Route::get('/editapproved/{money:id}', 'MoneyController@editapproved');
Route::patch('/editapproved/{money:id}', 'MoneyController@updateapproved');

Auth::routes();
// Routing fitur CRUD Anggota bendahara (FARHAN)

Route::get('/anggotabiro', 'MemberController@index');
Route::post('/anggotabiro/store', 'MemberController@store');
Route::get('/anggotabiro/{member:id}', 'MemberController@edit');
Route::patch('/anggotabiro/{member:id}/update', 'MemberController@update');
Route::delete('/member/{member:id}', 'MemberController@destroy');

Route::get('/anggotainti', 'MemberController@index');
Route::post('/anggotainti/store', 'MemberController@store');
Route::get('/anggotainti/{member:id}', 'MemberController@edit');
Route::patch('/anggotainti/{member:id}/update', 'MemberController@update');
Route::delete('/member/{member:id}', 'MemberController@destroy');



Route::get('/profilebiro', 'UserController@index');
Route::get('/profileinti', 'UserController@index');

// Routing fitur CRUD pendapatan lain bendahara 

Route::get('/pendapataninti', 'IncomeController@index');
Route::post('/pendapataninti/store', 'IncomeController@store');
Route::delete('/pendapataninti/{income:id}', 'IncomeController@destroy');
Route::get('/editpendapatan/{income:id}', 'IncomeController@updateIndex');
Route::patch('/editpendapatan/{income:id}', 'IncomeController@update');

Route::get('/pendapatanbiro', 'IncomeController@index');
Route::post('/pendapatanbiro/store', 'IncomeController@store');
Route::delete('/pendapatanbiro/{income:id}', 'IncomeController@destroy');

// Routing fitur CRUD pengeluaran bendahara 
Route::get('/pengeluaraninti', 'ExpenseController@index');
Route::post('/pengeluaraninti/store', 'ExpenseController@store');
Route::delete('/pengeluaraninti/{expense:id}', 'ExpenseController@destroy');
Route::get('/editpengeluaran/{expense:id}', 'ExpenseController@updateIndex');
Route::patch('/editpengeluaran/{expense:id}', 'ExpenseController@update');
Route::get('/pengeluaranbiro', 'ExpenseController@index');






//Controller daris
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/homepagebiro', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/homepageinti', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/tambahakun', function () {
    return view('Bendaharainti.user.adduser');
});
Route::post('/tambahakun/submit', 'AdduserController@store');
Route::get('/excel', 'HomeController@export');
Route::get('/listuser', 'AdduserController@index');
Route::post('/listuser/store', 'AdduserController@store');
Route::get('/listuser/{user:id}', 'AdduserController@edit');
Route::patch('/listuser/{user:id}/update', 'AdduserController@update');
Route::delete('/user/{user:id}', 'AdduserController@destroy');

Route::get('/logintes', function () {
    return view('Bendaharainti.login');
});