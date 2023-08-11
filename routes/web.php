<?php
use App\Http\Controllers\StandardController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\AsiignchapTosubController;
use App\Http\Controllers\AssignsubTostdController;
use App\Models\Accesstype;
use App\Models\Usertype;
use App\Models\Userdata;
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

Route::get('/dashbord',function() {
    return view('users.dashbord');
})->name('dashbord')->middleware('auth');

// Route::view('/dashbord', 'dashbord')->name('user.dashbord');

Route::post('/user', function (UserRequest $request) {
        $validatedData = $request->validated();
    
        $hashedPassword = Hash::make($validatedData['password']);
    
        $user = Userdata::create([
            'fname' => $validatedData['fname'],
            'lname' => $validatedData['lname'],
            'email' => $validatedData['email'],
            'state' => $validatedData['state'],
            'city' => $validatedData['city'],
            'password' => $hashedPassword, // Use the hashed password
          
            // ... other fields
        ]);
    
        // Create a new user_type record
        $user_type = new usertype();
        $user_type->userid = $user->id;
        $user_type->access_id = $validatedData['access_type'];
        $user_type->save();
    
        return redirect()->route('user.login')
            ->with('success', 'User ' . $user->fname . ' registered successfully!');
    })->name('user.store');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::get('/listuser',[AuthController::class,'view'])->name('listuser')->middleware('auth');;

Route::get('/userview/{id}',[AuthController::class,'userview'])->name('userview')->middleware('auth');;

Route::get('/delete/{id}',[AuthController::class,'delete'])->name('delete')->middleware('auth');;

Route::get('/edit/{id}',[AuthController::class,'edit'])->name('edit')->middleware('auth');;

Route::put('/update/{id}',[AuthController::class,'update'])->name('update')->middleware('auth');;

//Route::get('/standard',[EducationController::class,'standard'])->name('standard');

Route::resource('standard',StandardController::class)
        ->only('index','create','store','show','edit','update','destroy')->middleware('auth');;


Route::resource('subject',SubjectController::class)
        ->only('index','create','store','show','edit','update','destroy')->middleware('auth');;

Route::resource('chapter',ChapterController::class)
        ->only('index','create','store','show','edit','update','destroy')->middleware('auth');;

Route::get('/chaptosub',[AsiignchapTosubController::class,'assign'])
        ->name('assign.chapTosub')->middleware('auth');;

Route::post('/chaptosub',[AsiignchapTosubController::class,'store'])
        ->name('store.chapTosub')->middleware('auth');;


Route::get('/subtostd',[AssignsubTostdController::class,'assign'])
        ->name('assign.subtostd')->middleware('auth');;

Route::post('/subtostd',[AssignsubTostdController::class,'store'])
        ->name('store.subtostd')->middleware('auth');;


Route::get('/stdtostu',[Assignstdtostucontroller::class,'assign'])
        ->name('assign.stdtostu')->middleware('auth');;

Route::post('/stdtostu',[Assignstdtostucontroller::class,'store'])
        ->name('store.stdtostu')->middleware('auth');;
