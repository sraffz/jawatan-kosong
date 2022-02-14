<?php

namespace App\Http\Controllers\Auth\admin;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.admin.login');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except(['logout', 'logoutAdmin']);
    }


    protected function sendLoginResponse(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('admin');
        }
        Session::flash('message', 'Rekod tidak sepadan.');
        return back()->withInput($request->only('email', 'remember'));
    }

    

    public function logoutAdmin(Request $request)
    {
        Auth::guard('admin')->logout();
        // $request->session()->invalidate();
        return redirect('/admin');
    }
}
