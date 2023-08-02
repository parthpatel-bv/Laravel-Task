<?php
use App\Models\User_data;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\AuthController;

Route::view('/login', 'login')->name('user.login');
Route::post('/login', [AuthController::class, 'login'])->name('user.login.post');

Route::get('/registration', function () {
    return view('registration');
});

Route::get('/dashbord',function() {
    return view('dashbord');
})->name('dashbord');

// Route::view('/dashbord', 'dashbord')->name('user.dashbord');

Route::post('/user', function (UserRequest $request) {
    $user = User_data::create($request->validated());
    return redirect()->route('user.login')
        ->with('success', 'User ' . $user['fname'] . ' registered successfully!');
})->name('user.store');

Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::get('/listuser',[AuthController::class,'view'])->name('listuser');

Route::get('/userview/{id}',[AuthController::class,'userview'])->name('userview');

Route::get('/delete/{id}',[AuthController::class,'delete'])->name('delete');

Route::get('/edit/{id}',[AuthController::class,'edit'])->name('edit');

Route::put('/update/{id}',[AuthController::class,'update'])->name('update');



