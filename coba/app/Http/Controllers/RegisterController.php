<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index',[
            'title'     => 'Register',
            'active'    => 'register'
        ]);
    }


    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name'      => 'required|max:20',
            'username'  => ['required','min:3','max:10','unique:users'],
            'email'     => 'required|email:dns|unique:users',
            'password'  => 'required|min:3:max:8'
        ]);
        $validateData['password']   = Hash::make($validateData['password']);
        User::create($validateData);
        return redirect('/login')->with('success','Registration successfull! Please login');
    }
}
