<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();

        return view('profile.index', compact('user' ));
    }

    public function simpan(Request $request)
    {
        $profile =  User::where('id', Auth::user()->id)->first();
        if(!empty($request->password)){
            $password = Hash::make($request->password);
        }
        $profile->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'nohp'      => $request->nohp,
            'alamat'    => $request->alamat,
            'password'  => $request->password
        ]);

        Alert::success("Profile Berhasil di update", "Berhasil");
        return back();
    }
}

