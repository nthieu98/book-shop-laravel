<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;

class AdminLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:admin', ['except' => ['logout']]);
    }
    
    public function username()  
    {
      return 'username';
    }

    public function showLoginForm()
    {
      return view('admin.admin_login');
    }

    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'username'   => 'required|',
        'password' => 'required|min:6'
      ]);
      // return $request->all();
      // Attempt to log the user in
      if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location
        // return 1;
        return redirect()->intended(route('admin.dashboard'));
      }

      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('username', 'remember'));
    }

    // public function login(Request $request)
    // {
    //   // Validate the form data
    //   $this->validate($request, [
    //     'username'   => 'required|',
    //     'password' => 'required|min:6'
    //   ]);

    //   // Attempt to log the user in
    //   // return $request;
    //   if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
    //     // if successful, then redirect to their intended location
    //     // return 1;
    //     // return Auth::guard('admin')->user()->username;
    //     // if(Auth::guard('admin')->check())return 1;
    //     return redirect()->intended(route('admin.dashboard'));
    //     // return redirect()->intended(route('admin.dashboard'));
    //   }

    //   // if unsuccessful, then redirect back to the login with the form data
    //   // return 2;
    //   return redirect()->route('admin.login')->back()->withInput($request->only('username', 'remember'));
    // }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
