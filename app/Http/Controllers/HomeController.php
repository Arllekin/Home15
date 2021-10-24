<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Advt;


class HomeController

{
    public function login_form()
    {
        $advts = Advt::orderBy('id', 'desc')->paginate(5);

        return view('home', ['advts' => $advts]);
    }

    public function log_in(Request $request)
    {
        $user_dump = User::where('name', $request->get('name'))->get()->first();
        $credentials = $request->only('name', 'password');
        if($request->method() == 'POST') {
            if($user_dump == null) {

                $request -> validate([
                    'name' => ['required'],
                    'password' => ['required'],
                ]);
                User::create([
                    'name' => $request->get('name'),
                    'password' => password_hash($request->get('password'), 1),
                    'remember_token' => md5(Str::random(10)),
                ]);
            }

            if(Auth::attempt($credentials)){
                return back();
            }
            return back()->withErrors([
                'name' => 'Имя пользователя и пароль не совпадают',
                'password' => 'Имя пользователя и пароль не совпадают',
            ]);
        }

        return redirect('/');
    }

    public function log_out()
    {
        Auth::logout();

        return back();
    }

}
