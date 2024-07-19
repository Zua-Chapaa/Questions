<?php /** @noinspection PhpMultipleClassDeclarationsInspection */

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),])->group(function () {
    Route::get('/Account',[AccountController::class,'account'])->name('Account');
});

Route::get('/logoutaccount',function (){
    Auth::logout();
    return redirect()->route('Home', ['_t' => time()]);
});
