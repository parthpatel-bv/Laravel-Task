<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User_data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;



class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($credentials) {
            $email = $request->input('email');
            $password = $request->input('password');
            // echo $email;

            $data = User_data::where('email', $email)
                ->where('password', $password)
                ->first();

            if ($data) {
                
                Session::put('data', $data);
                return redirect()->route('dashbord');

            }
            else
            {
                return redirect('login')->withErrors('Error');
            }
        }
    }

    public function logout(){
        // return view('test');
        Session::forget('data');
        return redirect()->route('user.login');
    }
    
    public function view()
    {
        $users = User_data::all();
        
        return view('users.views', compact('users'));
        

    }

    public function userview($id){
        $user = User_data::find($id);
        return view('users.userview', compact('user'));

    }

    public function delete($id){
        $data = User_data::find($id);
        $data->delete();
        return redirect()->route('listuser');
    }

    public function edit($id){
        $user = User_data::find($id);
        return view('users.edit',compact('user'));
        }
        public function update(Request $request, $id)
        {
            $user = User_data::findOrFail($id);
            $user->update($request->all());
            $user->save();
            return redirect()->route('listuser');
        }
}
