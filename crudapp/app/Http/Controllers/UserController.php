<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users=User::all();

        return view('users.index', compact('users'));
    }

    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
        
        $incomingFields=$request->validate([
            'name'=>['required','min:3','max:16'],
            'email'=>['required','email'],
            'password'=>['required','min:8','max:16'],
        ]);
        $incomingFields['password']=bcrypt($incomingFields['password']);
        
        $user=User::create($incomingFields);
        $user->save();

        return redirect('/users');
    }

    //pass the data to our view
    public  function edit($id){
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

            // Redirect to a relevant page after the update
        return redirect()->route('users.index')->with('success', 'User updated successfully');
        }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();

            // Redirect to a relevant page after the deletion
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }


}
