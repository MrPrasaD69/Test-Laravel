<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index(){
        return view('home');
    }


    public function registerUser(Request $request){
        $incomingFields = $request->validate([
            'name'=>['required', 'min:3','max:15',Rule::unique('users','name')],
            'email'=>['required','email', Rule::unique('users','email')],
            'password'=>['required','min:8','max:16'], 
        ]);

        //hashing the password
        $incomingFields['password']=bcrypt($incomingFields['password']);

        //creating user model
        $user=User::create($incomingFields);
        return redirect('/');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('home');
        }

        return redirect()->back()->with('error', 'Invalid login credentials.');
    }



    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function showData()
    {
        $data = Http::get('https://jsonplaceholder.typicode.com/posts')->json();
        return view('fetchdata')->with('value', $data);
    }


    public function getUser(){
        $user=User::all(); //fetch all records from DB
        return view('getuser',['users'=>$user]);
    }

    public function goBack(){
        return view('welcome');
    }

    public function editUser($id)
    {
        $user = User::find($id); // Fetch the user record based on the ID
        return view('edituser', ['user' => $user]);
    }

}
