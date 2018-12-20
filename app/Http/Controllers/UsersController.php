<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Order;
use App\OrderDetail;
use Auth;
use Validator;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function addUser(Request $request){
		if($request->isMethod('post')){
            $rules = [
            // 'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'max:16', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                // return withErrors($validator );
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                // return 2;
                $data = $request->all();
                // echo "<pre>"; print_r($data); die;
                $user = new User;
                $user->name = 'sample';	
                $user->username = $data['username'];
                $user->password = Hash::make($data['password']);	
                $user->email = $data['email'];
                // $user->expiry_date = $data['expiry_date'];
                // $user->status = $data['status'];
                $user->save();	
                return redirect()->action('UsersController@viewUsers')->with('flash_message_success', 'User has been added successfully');
            }
			
		}
		return view('admin.users.add_user');
	}  

	public function editUser(Request $request,$id=null){
        $userDetails = User::find($id);
		if($request->isMethod('post')){
            $ruleUsername = ['username' => ['required', 'max:16', 'unique:users'],];
            $ruleEmail = ['email' => ['required', 'string', 'email', 'max:255', 'unique:users'],];
            $rulePassword = ['password' => ['required', 'string', 'min:6', 'confirmed'],];
            // $validator = Validator::make($request->all(), $rules);
            $data = $request->all();

            $user = User::find($id);
            if(empty($data['name'])){
                $data['name'] = 0;
            }
            $user->name = $data['name'];	

            if($userDetails->username != $data['username']){
                $validator = Validator::make($request->all(), $ruleUsername);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                else{
                    $user->username = $data['username'];	
                }
            }
    
            if($userDetails->password != $data['password']){
                $validator = Validator::make($request->all(), $rulePassword);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                else{
                    $user->password = Hash::make($data['password']);
                }
            }
            else $user->password = $userDetails->password;

            
            if($userDetails->email != $data['email']){
                $validator = Validator::make($request->all(), $ruleEmail);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                else{
                    $user->email = $data['email'];	
                }
            }

            if(empty($data['male'])){
                $data['male'] = '?';
            }
            $user->male = $data['male'];
            // if(empty($data['birthday'])){
            //     $data['birthday'] = '00-00-0000';
            // }
            $user->birthday = $data['birthday'];
            if(empty($data['phoneNumber'])){
                $data['phoneNumber'] = '';
            }
            $user->phoneNumber = $data['phoneNumber'];
            $user->save();	
            return redirect()->action('UsersController@viewUsers')->with('flash_message_success', 'User has been updated successfully');
            
			// echo "<pre>"; print_r($data); die;
            
		}
        // $userDetails = User::find($id);
		/*$couponDetails = json_decode(json_encode($couponDetails));
        echo "<pre>"; print_r($couponDetails); die;*/
        $males = array('Nam', 'Nữ', '?', '');
        $males_drop_down = "<option value='' disabled>Select</option>";
        foreach($males as $male){
            if($male==$userDetails->male){
                $selected = "selected";
            }else{
                $selected = "";
            }
            $males_drop_down .= "<option value='".$male."' ".$selected.">".$male."</option>";
        }
		return view('admin.users.edit_user')->with(compact('userDetails', 'males_drop_down'));
	} 

	public function viewUsers(){
		$users = User::where('id', '>', '0')->orderBy('id','DESC')->get();
		return view('admin.users.view_users')->with(compact('users'));
	}

	public function deleteUser($id = null){
        $order = Order::where(['id'=>$id])->first();
        if(!empty($order)){
            return redirect()->back()->with('flash_message_error', 'User has been deleted unsuccessfully');
        }
        User::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'User has been deleted successfully');
    }

}