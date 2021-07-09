<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'username' => ['required', 'max:255'],
            'password' => ['required', 'min:8'],
        ]);

        // User::create([
        //     'username' => $request->username,
        //     'password' => Hash::make($request->username),
        // ]);

        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        // auth()->attempt(['username', 'password']);
        auth()->attempt($request->only('username', 'password'));

        return redirect()->route('admin.index');
    }

    public function login(Request $request)
    {
        $this->validate($request,[
            'username' => ['required', 'max:255'],
            'password' => ['required', 'min:8'],
        ]);

        if (!auth()->attempt($request->only('username', 'password'), $request->remember)) {
            return back()->with('status', 'kredensial salah');
        }
        return back();
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('index');
    }
}
