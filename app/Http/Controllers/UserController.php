<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getLoginPage()
    {
        return view('login');
    }

    public function signIn(Request $request) {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($validated)){
            $request->session()->regenerate();
            return redirect('/');
        }

        return redirect('/login')->with('failure', 'Invalid login/password.');
    }

    public function signOut(){
        Auth::logout();

        return redirect('/');
    }

    public function getRegisterPage() {
        return view('registerPage');
    }

    public function register(Request $request) {
        $validated = $request->validate([
            'username' => 'required|alpha_num|min:4|max:24|unique:users,username',
            'password' => 'required|alpha_num|min:4|max:16|confirmed',
            'email' => 'required|email|unique:users,email'
        ]);

        $user = User::create($validated);

        Auth::login($user);

        return redirect(route('home'));
    }

    public function getUserPage(User $user)
    {
        return view('user', compact('user'));
    }

    public function getUserPosts(User $user){
        $posts = $user->posts;
        return view('posts', compact('posts'));
    }
}
