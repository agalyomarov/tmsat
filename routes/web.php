<?php

use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\MainController as AdminMainController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
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
   Route::get('/paket', [PaketController::class, 'index'])->name('paket');
   Route::get('/select_server', [SelectServerController::class, 'index'])->name('select_server');
   Route::get('/tools', [ToolsController::class, 'index'])->name('tools');
   Route::get('/regulation', [RegulationController::class, 'index'])->name('regulation');
   Route::controller(DillerController::class)->group(function () {
      Route::get('/diller', 'index')->name('diller.index');
      Route::post('/diller/create_client', 'createClient')->name('diller.create_client');
      Route::put('/diller/update_client', 'updateClient')->name('diller.updateClient');
      Route::delete('/diller/delete_client', 'deleteClient')->name('diller.updateClient');
      Route::get('/diller/client/{client}', 'buyPaket')->name('diller.buyPaket');
      Route::post('/diller/client', 'buyPaketStore')->name('diller.buyPaketStore');
      Route::post('/diller/stop_client', 'stopClient')->name('diller.stopClient');
      Route::post('/diller/set-server-all-client', 'setServer')->name('diller.setServer');
      Route::post('/diller/buy-paket-all-client', 'buyPaketAllUser')->name('diller.buyPaketAllUser');
   });
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
   Route::get('/', [AdminMainController::class, 'index'])->name('diller');
   Route::post('/', [AdminMainController::class, 'store'])->name('diller.store');
   Route::put('/', [AdminMainController::class, 'update'])->name('diller.update');
   Route::get('/diller/delete/{diller}', [AdminMainController::class, 'delete'])->name('diller.delete');

   Route::get('/client', [ClientController::class, 'index'])->name('client');
   Route::get('/client/delete/{client}', [ClientController::class, 'delete'])->name('client.delete');

   Route::get('/news', [AdminNewsController::class, 'index'])->name('news');
   Route::post('/news', [AdminNewsController::class, 'store'])->name('news.store');
   Route::put('/', [AdminNewsController::class, 'update'])->name('news.update');
   Route::get('/news/delete/{post}', [AdminNewsController::class, 'delete'])->name('news.delete');
});
