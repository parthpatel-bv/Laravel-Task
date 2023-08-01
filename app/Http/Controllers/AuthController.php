<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use App\Models\User_data;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($credentials){
            $email = $request->input('email');
            $password = $request->input('password');
            // echo $email;
            
            $data = User_data::where('email',$email)
                    ->where('password',$password)
                    ->first();

                    if($data){
                        // return redirect()->route('user.dashbord');
                        echo "Yes this is correct";
                    }
                    else
                    {
                        echo "Wrong";
                    }
        }
    }
}
