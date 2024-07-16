<?php /** @noinspection PhpMultipleClassDeclarationsInspection */

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),])->group(function () {
    Route::get('/Account',[AccountController::class,'index'])->name('Account');
});
