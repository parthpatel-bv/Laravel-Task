<?php
use App\Models\User_data;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\AuthController;

Route::view('/login', 'login')->name('user.login');
Route::post('/login', [AuthController::class, 'login'])->name('user.login.post');

Route::get('/registration', function () {
    return view('registration');
});

Route::view('/dashboard', 'dashboard')->name('user.dashbord');

Route::post('/user', function (UserRequest $request) {
    $user = User_data::create($request->validated());
    return redirect()->route('user.dashboard')
        ->with('success', 'User ' . $user['fname'] . ' registered successfully!');
})->name('user.store');



