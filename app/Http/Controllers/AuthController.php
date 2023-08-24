<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\UserRequest;
use App\Jobs\sendWelcomeEmail;
use App\Models\Userdata;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Usertype;
use App\Models\Accesstype;
use App\Mail\WelcomeMail;
use App\Models\Image;

class AuthController extends Controller
{

   

    public function register(UserRequest $request){
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
        event(new Registered($user));
        // Create a new user_type record
        $user_type = new usertype();
        $user_type->userid = $user->id;
        $user_type->access_id = $validatedData['access_type'];
        $user_type->save();

        //new add
        // $userType = Usertype::where('userid', $user_type)->first();
        // dd($userType);
        // Mail::to($user->email)->send(new WelcomeMail($user));
        sendWelcomeEmail::dispatch($user);


        return redirect()->route('user.login')
            ->with('success', 'User ' . $user->fname . ' registered successfully!');
    }
    
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        

        $user = Userdata::where('email',$request->email)->first();
        if (Auth::attempt($credentials)) {

            session(['id' => $user->id]);
            session(['fname'=>$user->fname]);
            session(['lname'=>$user->lname]);
            session(['email'=>$user->email]);
            session(['state'=>$user->state]);
            session(['city'=>$user->city]);
            $userType = Usertype::where('userid', session('id'))->first();
            $accessType = Accesstype::where('id',$userType->access_id)->value('access_type');
            session(['access_type' => $accessType]);
            return redirect()->route('dashbord');
        } else {
            return redirect('login')->withErrors(['email' => 'Invalid credentials']);
        }

        // if ($credentials) {
        //     $email = $request->input('email');
        //     $password = $request->input('password');
        
        //     // Retrieve the user record based on the provided email
        //     $user = Userdata::where('email', $email)->first();
        
        //     if ($user && Hash::check($password, $user->password)) {
        //         // Passwords match, proceed with authentication
        //         // Here, you can use Laravel's authentication mechanisms
        //         // For example, log the user in using Auth::login($user)
        //         // Auth::login($user);

        //         return redirect()->route('dashbord');
        //     } else {
        //         // Passwords do not match or user not found, handle authentication failure
        //         return redirect('login')->withErrors(['email' => 'Invalid credentials']);
        //     }
        // }
    }

    public function logout(Request $request){
        Auth::logout();
        // return view('test');
        // Session::forget('data');
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('user.login');

    }
    
    public function view()
    {
        $users = Userdata::all();
        
        return view('users.views', compact('users'));
        

    }

    public function userview($id){
        $user = Userdata::find($id);
        return view('users.userview', compact('user'));

    }

    public function delete($id){
        $data = Userdata::find($id);
        $data->delete();
        return redirect()->route('listuser');
    }

    public function edit($id){
        $user = Userdata::find($id);
        return view('users.edit',compact('user'));
        }
        public function update(Request $request, $id)
        {
            $user = Userdata::findOrFail($id);
            $user->update($request->all());
            $user->save();
            return redirect()->route('listuser');
        }
        public function showImageUploadForm($user_id, $fname) {
            return view('users.storeimage', compact('user_id', 'fname'));
        }
        
        
    public function storeimage(Request $request){
        $user_id = $request->input('user_id');
        $fname = $request->input('fname');
        $userdatas = Userdata::findOrFail($user_id);
    
        if($request->hasFile('image')){
            $path = $request->file('image')->store('images');
            $userdatas->image()->save(
                Image::create(['path'=>$path])
            );
        }
        return redirect()->route('dashbord');
    }

    public function dashbord() {
    $user_id = Auth::user()->id;
    $path = Image::where('userdata_id', '=', $user_id)->value('path');
    // return view('users.dashbord', ['path' => $path]);
    session(['final_path' => $path]);
    return view ('users.dashbord');
}

}
