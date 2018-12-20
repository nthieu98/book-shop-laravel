<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Auth;
use Illuminate\Support\MessageBag;
use DB;

class RegisterController extends Controller
{
    public function getRegister(){
        return view('register');
    }

    public function postRegister(Request $request){
        $Username = $request->input('inputUsername');
        $Password = $request->input('inputPassword');
        $Fullname = $request->input('inputFullname');
        $male = $request->input('male');
        $Birthday = $request->input('inputBirthday');
        $Email = $request->input('inputEmail');
        $PhoneNumber = $request->input('inputPhoneNumber');
        $existUser = DB::select("select userId from user where username = '$Username' ");
        if(!empty($existUser)){
            return "error";
        }
        DB::insert("insert into user (username, password, fullname, male, birthday, email, phoneNumber) values ('$Username', '$Password','$Fullname','$male','$Birthday','$Email','$PhoneNumber')");
        return redirect()->route('welcome');
    }
}
