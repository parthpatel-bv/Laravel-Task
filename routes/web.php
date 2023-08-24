<?php
use App\Http\Controllers\StandardController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\AsiignchapTosubController;
use App\Http\Controllers\AssignsubTostdController;
use App\Models\Accesstype;
use App\Models\Usertype;
use App\Models\Userdata;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Assignstdtostucontroller;

Route::get('/',function(){
        return redirect()->route('user.login');
});

Route::view('/login', 'users.login')->name('user.login');
Route::post('/login', [AuthController::class, 'login'])->name('user.login.post');

Route::get('/registration', function () 
{
        $accesstype = Accesstype::all();
    return view('users.registration',['accesstype'=>$accesstype]);
});

Route::get('/email/verify',function(){
        return view('verifyemail');
})->middleware('auth')->name('verification.notice');

 
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
     
      return view('success');

    })->middleware(['auth', 'signed'])->name('verification.verify');


// Route::get('/dashbord',function() {
//     return view('users.dashbord');
// })->name('dashbord')->middleware('auth');

Route::get('/dashbord',[AuthController::class,'dashbord'])->name('dashbord')->middleware('auth');

Route::post('/user',[AuthController::class,'register'])->name('user.store');

Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::get('/listuser',[AuthController::class,'view'])->name('listuser')->middleware(['auth','verified']);

Route::get('/userview/{id}',[AuthController::class,'userview'])->name('userview')->middleware(['auth','verified']);

Route::get('/delete/{id}',[AuthController::class,'delete'])->name('delete')->middleware(['auth','verified']);

Route::get('/edit/{id}',[AuthController::class,'edit'])->name('edit')->middleware(['auth','verified']);

Route::put('/update/{id}',[AuthController::class,'update'])->name('update')->middleware(['auth','verified']);

Route::resource('standard',StandardController::class)
        ->only('index','create','store','show','edit','update','destroy')->middleware(['auth','verified']);


Route::resource('subject',SubjectController::class)
        ->only('index','create','store','show','edit','update','destroy')->middleware(['auth','verified']);

Route::resource('chapter',ChapterController::class)
        ->only('index','create','store','show','edit','update','destroy')->middleware(['auth','verified']);

Route::get('/chaptosub',[AsiignchapTosubController::class,'assign'])
        ->name('assign.chapTosub')->middleware(['auth','verified']);

Route::post('/chaptosub',[AsiignchapTosubController::class,'store'])
        ->name('store.chapTosub')->middleware(['auth','verified']);

Route::get('/subtostd',[AssignsubTostdController::class,'assign'])
        ->name('assign.subtostd')->middleware(['auth','verified']);

Route::post('/subtostd',[AssignsubTostdController::class,'store'])
        ->name('store.subtostd')->middleware(['auth','verified']);


Route::get('/stdtostu',[Assignstdtostucontroller::class,'assign'])
        ->name('assign.stdtostu')->middleware(['auth','verified']);

Route::post('/stdtostu',[Assignstdtostucontroller::class,'store'])
        ->name('store.stdtostu')->middleware(['auth','verified']);

Route::get('/storeimage/{user_id}/{fname}',[AuthController::class,'showImageUploadForm'])->name('image.store');

Route::post('/storeimage',[AuthController::class,'storeimage'])
        ->name('store.image')->middleware(['auth','verified']);

Route::post('/chapterstatus',[ChapterController::class,'status'])->name('chapter.status');