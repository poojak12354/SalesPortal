<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//ADMIN DASHBOARD
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::get('/dashboard/{final_id}/{select_id}', [App\Http\Controllers\Admin\DashboardController::class, 'updateVerify']);
    Route::get('/upwork', [App\Http\Controllers\Admin\UpworkController::class, 'index']);
    Route::get('/upwork/page/{page}', [App\Http\Controllers\Admin\UpworkController::class, 'index'])->name('admin.upwork.index');
    Route::get('/add-upwork', [App\Http\Controllers\Admin\UpworkController::class, 'create']);
    Route::post('/add-upwork', [App\Http\Controllers\Admin\UpworkController::class, 'store']);
    Route::get('/edit-upwork/{category_id}', [App\Http\Controllers\Admin\UpworkController::class, 'edit']);
    Route::put('update-upwork/{category_id}', [App\Http\Controllers\Admin\UpworkController::class, 'update']);
    Route::get('delete-upwork', [App\Http\Controllers\Admin\UpworkController::class, 'destroy']);
    // BDE PROFILE SETTING
    Route::get('/bde', [App\Http\Controllers\Admin\BdeController::class, 'index']);
    Route::post('/bde/{id}', [App\Http\Controllers\Admin\BdeController::class, 'updatestatus']);
    Route::get('/add-bde', [App\Http\Controllers\Admin\BdeController::class, 'create']);
    Route::post('/add-bde', [App\Http\Controllers\Admin\BdeController::class, 'store']);
    Route::get('/edit-bde/{bde_id}', [App\Http\Controllers\Admin\BdeController::class, 'edit']);
    Route::put('update-bde/{bde_id}', [App\Http\Controllers\Admin\BdeController::class, 'update']);
    Route::get('delete-bde', [App\Http\Controllers\Admin\BdeController::class, 'destroy']);
    // BIDS SETTING
    Route::get('/bids', [App\Http\Controllers\Admin\bidsController::class, 'index']);
    Route::get('/showbids/{showbid_id}', [App\Http\Controllers\Admin\bidsController::class, 'showbid']);
    Route::post('/showbids/{showbid_id}', [App\Http\Controllers\Admin\bidsController::class, 'search']);
    Route::post('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'search']);
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'notification']);
    Route::post('/dashboard/notification/', [App\Http\Controllers\Admin\DashboardController::class, 'updnotification'])->name('notification');
    // Route::post('/dashboard/notification/', [App\Http\Controllers\Admin\DashboardController::class, 'updnotification']);
});


//USER DASHBOARD
Route::prefix('user')->middleware(['auth', 'isUser'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\User\DashboardController::class, 'index']);
    Route::get('/bid', [App\Http\Controllers\User\UserbidController::class, 'index']);
    Route::get('/add-bid', [App\Http\Controllers\User\UserbidController::class, 'create']);
    Route::post('/add-bid', [App\Http\Controllers\User\UserbidController::class, 'store']);
    Route::get('/edit-bid/{bid_id}', [App\Http\Controllers\User\UserbidController::class, 'edit']);
    Route::put('/update-bid/{bid_id}', [App\Http\Controllers\User\UserbidController::class, 'update']);
    Route::get('/delete-bid', [App\Http\Controllers\User\UserbidController::class, 'destroy']);
    // USER MONTH REPORT SETTING
    Route::get('/month-report/{final_id}', [App\Http\Controllers\User\UsermonthController::class, 'index']);
    Route::get('/create-report', [App\Http\Controllers\User\UsermonthController::class, 'create']);
    Route::get('/create-report', [App\Http\Controllers\User\UsermonthController::class, 'sumbitData']);
    //Route::get('/create-report', [App\Http\Controllers\User\Userfinalmoth::class, 'sumbitData']);
    Route::get('/edit-report/{report_id}', [App\Http\Controllers\User\UsermonthController::class, 'edit']);
    Route::put('update-report/{report_id}', [App\Http\Controllers\User\UsermonthController::class, 'update']);
    Route::get('/delete-report/{report_id}', [App\Http\Controllers\User\UsermonthController::class, 'destroy']);
    Route::get('/download-report', [App\Http\Controllers\User\UsermonthController::class, 'showReport']);
    //--
    Route::get('/finalbid', [App\Http\Controllers\User\UsermonthController::class, 'finalreportindex']);
    Route::get('/delete-finalreport', [App\Http\Controllers\User\UsermonthController::class, 'finalreportdestroy']);
});
