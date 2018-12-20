<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Product;
use Auth;
use Validator;
use Session;
use DB;

class UserController extends Controller
{
	public function __construct()
  {
    $this->middleware('auth');
	}
		
  public function editProfile(Request $request, $id = null){
		$userDetails = User::find($id);
		if(Auth::id() == $id){
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
			return redirect()->back()->with('flash_message_success', 'Your profile has been updated successfully');
		}
		return redirect()->back();
	}  


	public function viewProfile($id = null){
		if(Auth::id() == $id){
			$user = User::where(['id'=>$id])->first();
			$males = array('Nam', 'Nữ', '?', '');
      $males_drop_down = "";
        foreach($males as $male){
            if($male==$user->male){
                $selected = "selected";
            }else{
                $selected = "";
            }
            $males_drop_down .= "<option value='".$male."' ".$selected.">".$male."</option>";
        }
			return view('profile')->with(compact('user', 'males_drop_down'));
		}
		return redirect()->back();
	}

	public function addCart(Request $request, $id = null){
		// print_r($request->all());die;
		if(1 == 1){
			$data = $request->all();
			// $session_id = Session::get('session_id');
			$session_id = Auth::id();
			// print($session_id);die;
			$productId = $data['productId'];
			$userId = $id;
			$quantity = $data['quantity'];
			$price = $data['price'];
			$productName = $data['name'];
			$existCart = DB::table('cart')->where(['session_id'=>$session_id, 'productId'=>$productId])->first();
			// print_r($existCart);die;
			if(empty($existCart)){
				DB::insert("insert into cart (id, productId, productName, productPrice, productQuantity, session_id) 
				values ('$session_id', '$productId','$productName','$price','$quantity','$session_id')");
			}
			else{
				DB::table('cart')->where(['session_id'=>$session_id, 'productId'=>$productId])
				->update(['productQuantity'=>$existCart->productQuantity+$quantity]);
			}
		
			$cart = DB::table('cart')->where(['session_id' => $session_id])->get();	
			$cartNum = 0;
			$cartTotal = 0;
			foreach($cart as $product){
				$cartNum += (int)$product->productQuantity;
				$cartTotal += (int)$product->productPrice*(int)$product->productQuantity;
			}
			// print_r($cartNum);die;
    	$categories_menu = "";
    	$categories = Category::with('categories')->where('categoryId', '>', '0')->get();
			$categories = json_decode(json_encode($categories));
			$product = Product::where(['productId'=>$id])->first();
			$productsAll = Product::inRandomOrder()->take(12)->get();
			$productsAll = json_decode(json_encode($productsAll));
			$categories_menu = "";
    	$categories = Category::with('categories')->where('categoryId', '>', '0')->get();
    	$categories = json_decode(json_encode($categories));
			// print_r($cartNum); die;
			return view('view_product')->with(compact('categories', 'cartTotal', 'cartNum', 'product'));
		}
	}
		
	public function addCart2($id = null, $idp = null){
		// print_r($request->all());die;
		// return $id;
		if(Auth::id() == $id){
			// $data = $request->all();
			// $session_id = Session::get('session_id');
			$session_id = Auth::id();
			// print($session_id);die;
			$pickedPro = Product::where(['productId'=>$idp])->first();
			$productId = $idp;
			$userId = Auth::id();
			$quantity = 1;
			$price = $pickedPro->productPrice;
			$productName = $pickedPro->productName;
			$existCart = DB::table('cart')->where(['session_id'=>$session_id, 'productId'=>$productId])->first();
			if(empty($existCart)){
				DB::insert("insert into cart (id, productId, productName, productPrice, productQuantity, session_id) 
				values ('$id', '$productId','$productName','$price','$quantity','$id')");
			}
			else{
				DB::table('cart')->where(['session_id'=>$session_id, 'productId'=>$productId])
				->update(['productQuantity'=>$existCart->productQuantity+$quantity]);
			}
		
			$cart = DB::table('cart')->where(['session_id' => $session_id])->get();	
			$cartNum = 0;
			$cartTotal = 0;
			foreach($cart as $product){
				$cartNum += (int)$product->productQuantity;
				$cartTotal += (int)$product->productPrice*(int)$product->productQuantity;
			}
    	$categories_menu = "";
    	$categories = Category::with('categories')->where('categoryId', '>', '0')->get();
			$categories = json_decode(json_encode($categories));
			$product = Product::where(['productId'=>$id])->first();
			// print_r($cartNum); die;
		}
		$productsAll = Product::inRandomOrder()->take(12)->get();
		$productsAll = json_decode(json_encode($productsAll));
		$categories_menu = "";
		$categories = Category::with('categories')->where('categoryId', '>', '0')->get();
		$categories = json_decode(json_encode($categories));
		// return 1;
		return view('welcome')->with(compact('categories', 'cartTotal', 'cartNum', 'productsAll'));
	}

	public function checkOut($id = null)
	{
		// return 1;
		$session_id = Auth::id();
		$cart = DB::table('cart')->where(['session_id' => $session_id])->get();	
		$cartNum = 0;
		$cartTotal = 0;
		$productsALl = "";
		foreach($cart as $product){
			$cartNum += (int)$product->productQuantity;
			$cartTotal += (int)$product->productPrice*(int)$product->productQuantity;
			$pro = Product::where(['productId'=>$product->productId])->first();
			$product->productImage = $pro->productImage;
		}
		$categories_menu = "";
		$categories = Category::with('categories')->where('categoryId', '>', '0')->get();
		$categories = json_decode(json_encode($categories));
		return view('checkout')->with(compact('categories', 'cartTotal', 'cartNum', 'cart'));
	}

	public function deleteCoupon($id = null){
        Coupon::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Coupon has been deleted successfully');
    }

}
