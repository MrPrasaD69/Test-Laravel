<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
                            //to access the user data, use request
    public function register(Request $request){
        $incomingFields=$request->validate([    
            //'name'=> ['required','min:3','max:10',],
            //'email'=>['required','email', ],
            //'password'=>['required','min:8','max:16'],


                                                    //add new rule, unique values for Users table, for name column
            'name'=> ['required','min:3','max:10',Rule::unique('users','name')],
            'email'=>['required','email', Rule::unique('users','email')],
            'password'=>['required','min:8','max:16'], 
        ]);

        //hashing password
        $incomingFields['password']=bcrypt($incomingFields['password']);

        //creating user model
        $user = User::create($incomingFields);

        //auth()-> login($user);

        return redirect('/');
    }

    public function login(Request $request){
        $incomingFields=$request->validate([
            'loginname'=>'required',
            'loginpassword'=>'required'
        ]);

        if(auth()->attempt(['name'=>$incomingFields['loginname'], 'password'=>$incomingFields['loginpassword']])){
            $request->session()->regenerate();

        }
        return redirect('/');
        
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}
