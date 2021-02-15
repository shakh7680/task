<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function  __construct(){
        $this->middleware(['guest']);
    }
    public function index(){
        return view('auth.register');
    }
    
    public function store(Request $request){
        $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|email',
            'password'=>'required|confirmed|min:6'
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        
        if(!Auth::attempt($request->only('email', 'password'))){
            return back()->with('satus', 'Invalid login details');
        }
        return redirect()->route('subject.dashboard');
    }
}
