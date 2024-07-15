<?php /** @noinspection PhpMultipleClassDeclarationsInspection */

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),])->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard/index');
    })->name('dashboard');

    Route::get('/StartSession', function () {
        return Inertia::render('Dashboard/StartSession');
    });
});

Route::middleware('guest')->group(function () {

    Route::get('/register', function () {
        return Inertia::render('Auth/Register');
    });
    Route::get('/lognin', function () {
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
