<?php /** @noinspection PhpMultipleClassDeclarationsInspection */

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;





Route::get('/admin', function (){
    return \Inertia\Inertia::render('Admin/index');
})->name('admin');

Route::get('/admin/choices', [AdminController::class,'index']);



Route::post('/admin/acceptQuestion', [AdminController::class,'accept'])->name('acceptQuestion');
Route::post('/admin/rejectQuestion', [AdminController::class,'reject'])->name('rejectQuestion');
