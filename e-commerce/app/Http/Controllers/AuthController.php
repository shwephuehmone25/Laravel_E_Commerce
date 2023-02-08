<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Mail\VerifyMail;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
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
        ]);
        $this->sendMail($user);

        Auth::login($user);

        return redirect('login')->with('success', 'Registered Successfully');
    }

    public function sendMail()
    {
        $data = [
            'title' => 'Mail from E-Shopper',
        ];

        Mail::to('shwephue7889@gmail.com')->send(new VerifyMail($data));
    }

    public function showAdminRegisterForm()
    {

        return view('admin.auth.register');
    }

    protected function createAdmin(RegisterRequest $request)
    {
        $admin = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect('admin')->with('success', 'Registered Successfully');
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return [
            'message' => 'Successfully Logged out',
        ];
    }
}