<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Userdata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Usertype;
use App\Models\Accesstype;


class AuthController extends Controller
{
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
            $accessType = Accesstype::where('id',$userType)->value('access_type');
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
}
