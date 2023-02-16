<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Mail\VerifyMail;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\RegisterRequest  $request
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(RegisterRequest $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'bio' => $request->bio,
        ]);
        $this->sendMail($user);

        //Auth::login($user);

        return redirect('login')->with('success', 'Registered Successfully');
    }

    public function sendMail($user)
    {
        $data = [
            'title' => 'Mail from Medium.com',
        ];

        Mail::to($user)->send(new VerifyMail($data));
    }

    public function showAdminRegisterForm()
    {
        return view('admin.auth.register');
    }

    protected function createAdmin(Request $request)
    {
        $admin = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('admin');
    }
}