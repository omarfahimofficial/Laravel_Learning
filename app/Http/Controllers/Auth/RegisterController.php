<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function posts()
    {
        return view('posts.index');
    }

    public function registration()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // dd($request);

       // dd($request->email);

        // validation
        // store user data
        // Sing the user in
        // redirect
        
        $this->validate($request, [
            'name' => 'required|max:60',
            'username' => 'required|max:40',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            // Encrypted password:
           // 'password' => Hash::make($request->password),
        ]);


        // auth()->user();       -// Logged in user get a user model other it's a null.
        
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ]);

        //Quicker mathod
        auth()->user($request->only('email','password'));

        return redirect()-> route('dashboard');

    }
}
