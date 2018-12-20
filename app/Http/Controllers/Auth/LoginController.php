<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    public function username()  
    {
      return 'username';
    }

    public function postLogin(Request $request)
    {
    	$data=[
    		'username'=>$request->username,
            'password'=>$request->password,
        ];
        return $data;
    	if(Auth::attempt($data)){
    		return redirect()->url('/welcome');
    	}else{
    		return view('/login');
    	}
    }

    // public function login(Request $request){
    // 	if($request->isMethod('post')){
    // 		$data = $request->input();
    // 		 if (Auth::attempt(['username' => $data['username'], 'password' => $data['password']])) {
    //                 //echo "Success"; die;
    //                 Session::put('userSession', $data['username']);
    //                 return redirect('/');
    //     	}else{
    //                 //echo "failed"; die;
    //                 return redirect('/login')->with('flash_message_error','Invalid Username or Password');
    //     	}
    // 	}
    // 	return view('welcome');
    // }
    public function logout()
    {
        // Session::flush();
        DB::table('cart')->where(['session_id'=>Auth::id()])->delete();
        Auth::logout();
        return redirect('/');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
