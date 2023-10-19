<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view(
            'users.index',
            ['users' => $users]
        );
    }

    public function create()
    {
        return view('users.manage');
    }

    public function store(Request $request){
        // dd($request-> all());

        $request->validate([
            'name'=> 'required',
            'email'=> 'required|unique:users,email',
            'phone'=> 'required|unique:users,phone',
            'password'=> 'required|min:6',
            
        ]);

      $user = new User();
      $user->name = $request->name;
      $user->phone = $request->phone;
      $user->email = strtolower($request->email);
      $user->password = bcrypt($request->password);
      $user->save();

    
    //   return redirect()->route('carAdmin.users.index')->with('success', 'User created successfully');
    return redirect('/carAdmin/users');
      
    }


}