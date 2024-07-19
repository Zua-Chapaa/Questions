<?php /** @noinspection PhpMultipleClassDeclarationsInspection */

use App\Http\Controllers\AccountController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('Home');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),])->group(function () {
    Route::get('/dashboard', [AccountController::class,'index'])->name('dashboard');
});

Route::middleware('guest')->group(function () {

    Route::get('/register', function () {
        return Inertia::render('Auth/Register');
    });
    Route::get('/login', function () {
        return Inertia::render('Auth/Login');
    });

    Route::post('/registerUser', function (Request $request) {

        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

    })->name('registerUser');
});


include "SessionManager/index.php";
include "AccountManager/index.php";
include "Admin/index.php";
