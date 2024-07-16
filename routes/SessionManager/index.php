<?php /** @noinspection PhpMultipleClassDeclarationsInspection */

use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),])->group(function () {

    Route::get('/StartSession',[SessionController::class,'startSession'])->name('startSession');

    Route::get('/StopSession',[SessionController::class,'stopSession'])->name('StopSession');

    Route::post('/Valid',[SessionController::class,'SetValid'])->name('SetValid');

    Route::post('/Invalid',[SessionController::class,'SetInvalid'])->name('SetInvalid');

});
