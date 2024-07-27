<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\HeroController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\LotteryController;
use App\Http\Controllers\PrizeController;
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

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/upcoming', [FrontendController::class, 'upcoming'])->name('upcoming');
Route::resource('lottery',LotteryController::class)->only('create','store');


//Dashboard Start
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware(['auth', 'verified','agent_admin']);

Route::middleware(['auth', 'agent_admin'])->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // profile
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::put('/profile-update/{id}', [DashboardController::class, 'profile_update'])->name('profile_update');
    Route::post('/profile/change-password', [DashboardController::class, 'changePassword'])->name('changePassword');
    // profile



});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    // settings
    Route::get('/edit-website-info', [SettingsController::class, 'editWebsiteInfo'])->name('editWebsiteInfo');
    Route::post('/update-website-info', [SettingsController::class, 'updateWebsiteInfo'])->name('updateWebsiteInfo');
    // settings

    Route::resource('user', UserController::class);
    Route::get('agent-list', [UserController::class, 'agentList'])->name('agentList');
    Route::get('user/role/{id}', [UserController::class, 'userRole'])->name('userRole');

    Route::resource('lottery',LotteryController::class)->except('create','store');
    Route::get('lottery-history',[LotteryController::class,'acceptedLottery'])->name('acceptedLottery');
    Route::get('lottery-id-list',[LotteryController::class,'lotteryIdlist'])->name('lotteryIdlist');
    Route::get('lottery/status/{id}', [LotteryController::class, 'lotteryStatus'])->name('lotteryStatus');
    
    Route::resource('prize',PrizeController::class);


});


require __DIR__ . '/auth.php';
