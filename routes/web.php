<?php

use App\Http\Controllers\DillerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PayBalanceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegulationController;
use App\Http\Controllers\SelectServerController;
use App\Http\Controllers\ToolsController;
use Illuminate\Support\Facades\Route;


Route::get('/', [MainController::class, 'index'])->name('main');

Route::controller(LoginController::class)->group(function () {
   Route::get('/login', 'index')->name('login.index');
   Route::post('/register', 'register')->name('login.register');
   Route::post('/login', 'login')->name('login.login');
   Route::put('/update', 'update')->name('login.update');
   Route::get('/logout', 'logout')->name('login.logout');
});

Route::group(['middleware' => ['auth']], function () {
   Route::get('/news', [NewsController::class, 'index'])->name('news');
   Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
   Route::get('/pay_balance', [PayBalanceController::class, 'index'])->name('pay_balance');
   Route::post('/pay_balance/send', [PayBalanceController::class, 'send'])->name('pay_balance.send');
   Route::get('/diller', [DillerController::class, 'index'])->name('diller');
   Route::get('/paket', [PaketController::class, 'index'])->name('paket');
   Route::get('/select_server', [SelectServerController::class, 'index'])->name('select_server');
   Route::get('/tools', [ToolsController::class, 'index'])->name('tools');
   Route::get('/regulation', [RegulationController::class, 'index'])->name('regulation');
});
