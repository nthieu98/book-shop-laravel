<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Illuminate\Support\MessageBag;
use DB;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function getLogin(){
        return view('login');
    }

    public function postLogin(Request $request)
    {
    	$data=[
    		'username'=>$request->input('username'),
    		'password'=>$request->input('password')
        ];
        return $data;
    	if(Auth::attempt($data)){
    		return "success";
    	}else{
    		//false
    	}
    }

    // public function postLogin(Request $request) {
    //     // dd($request->all());       
    //     $adminuser = $request->input('inputEmail1');
    //     $adminpass = $request->input('inputPassword1');
    //     if(empty($adminuser)){
    //         $user = $request->input('inputEmail0');
    //         $pass = $request->input('inputPassword0');
    //         $user1 = DB::select("select userID from user where username = '$user' and password = '$pass'");
    //         if(empty($user1)){
    //             $errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
    //             return $errors;
    //         }
    //         else return redirect()->route('welcome');
    //     }
    //     $admin1 = DB::select("select adminId from admin where username = '$adminuser' and password = '$adminpass'"); 
    //     if(empty($admin1)){
    //         $errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
    //         return $errors;
    //     }
    //     else return redirect()->route('admin');
    //     // if(1) {
    //     //     return "succes";
    //     //     return response()->json([
    //     //         'error' => false,
    //     //         'message' => 'success'
    //     //     ], 200);
    //     //     return redirect()->intended('/');
    //     // } else {
    //     //     $errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
    //     //     return $errors;
    //     //     return response()->json([
    //     //         'error' => true,
    //     //         'message' => $errors
    //     //     ], 200);
    //     //     return redirect()->back()->withInput()->withErrors($errors);
    //     // }
    // }
}
