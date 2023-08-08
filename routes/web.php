<?php
use App\Http\Controllers\StandardController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\AsiignchapTosubController;
use App\Http\Controllers\AssignsubTostdController;
use App\Models\Accesstype;
use App\Models\Usertype;
use App\Models\User_data;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Assignstdtostucontroller;

// route::view('','login');
Route::view('/login', 'users.login')->name('user.login');
Route::post('/login', [AuthController::class, 'login'])->name('user.login.post');

Route::get('/registration', function () 
{
        $accesstype = Accesstype::all();
    return view('users.registration',['accesstype'=>$accesstype]);
});

Route::get('/dashbord',function() {
    return view('users.dashbord');
})->name('dashbord');

// Route::view('/dashbord', 'dashbord')->name('user.dashbord');

Route::post('/user', function (UserRequest $request) {
    $user = User_data::create($request->validated());

    $user_type = new usertype();
    $user_type->userid = $user->id;
    $user_type->access_id = $request->input('access_type');
    $user_type->save();

    return redirect()->route('user.login')
        ->with('success', 'User ' . $user['fname'] . ' registered successfully!');
})->name('user.store');

Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::get('/listuser',[AuthController::class,'view'])->name('listuser');

Route::get('/userview/{id}',[AuthController::class,'userview'])->name('userview');

Route::get('/delete/{id}',[AuthController::class,'delete'])->name('delete');

Route::get('/edit/{id}',[AuthController::class,'edit'])->name('edit');

Route::put('/update/{id}',[AuthController::class,'update'])->name('update');

//Route::get('/standard',[EducationController::class,'standard'])->name('standard');

Route::resource('standard',StandardController::class)
        ->only('index','create','store','show','edit','update','destroy');


Route::resource('subject',SubjectController::class)
        ->only('index','create','store','show','edit','update','destroy');

Route::resource('chapter',ChapterController::class)
        ->only('index','create','store','show','edit','update','destroy');

Route::get('/chaptosub',[AsiignchapTosubController::class,'assign'])
        ->name('assign.chapTosub');

Route::post('/chaptosub',[AsiignchapTosubController::class,'store'])
        ->name('store.chapTosub');


Route::get('/subtostd',[AssignsubTostdController::class,'assign'])
        ->name('assign.subtostd');

Route::post('/subtostd',[AssignsubTostdController::class,'store'])
        ->name('store.subtostd');


Route::get('/stdtostu',[Assignstdtostucontroller::class,'assign'])
        ->name('assign.stdtostu');

Route::post('/stdtostu',[Assignstdtostucontroller::class,'store'])
        ->name('store.stdtostu');

