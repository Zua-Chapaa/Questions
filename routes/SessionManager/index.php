<?php /** @noinspection PhpMultipleClassDeclarationsInspection */

use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),])->group(function () {
//    Route::get('/StopSession')
});
