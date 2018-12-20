<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Session;
use DB;
use Auth;

class IndexController extends Controller
{
    public function index(){

    	// Get all Products
    	$productsAll = Product::inRandomOrder()->take(12)->get();
    	$productsAll = json_decode(json_encode($productsAll));
    	/*echo "<pre>"; print_r($productsAll);die;*/
			// $session_id = Session::get('session_id');
			$session_id = Auth::id();
			$cart = DB::table('cart')->where(['session_id' => $session_id])->get();
			$cartTotal = 0;
			$cartNum = 0;
			foreach($cart as $product){
				$cartNum += (int)$product->productQuantity;
				$cartTotal += (int)$product->productPrice*(int)$product->productQuantity;
			}
    	$categories_menu = "";
    	$categories = Category::with('categories')->where('categoryId', '>', '0')->get();
    	$categories = json_decode(json_encode($categories));
    	return view('welcome')->with(compact('productsAll','categories', 'cartNum', 'cartTotal'));
		}
		
		public function search(Request $request){
			$data = $request->all();
			// print_r($data);
			if($data['srchTxt'] == "all" and $data['srchField'] == ""){
				$productsAll = Product::inRandomOrder()->take(12)->get();
			}
			elseif($data['srchTxt'] == "all" and $data['srchField'] != ""){
				$productsAll = Product::where('productName', $data['srchField'])->orWhere('productName', 'like', '%' .  $data['srchField'] . '%')->get();
			}
			elseif($data['srchTxt'] != "all" and $data['srchField'] == ""){
				
				$category = Category::where(['categoryName'=>$data['srchTxt']])->first();
				$categoryId = $category->categoryId;
				$productsAll = Product::where(['categoryId'=> $categoryId])->get();
				// print_r($data);
				// print_r($productsAll); die;
				// return $productsAll;
			}
			else{
				$category = Category::where(['categoryName'=>$data['srchTxt']])->first();
				$productsAll = Product::where(['categoryId'=>$category->categoryId])->where('productName', $data['srchField']) ->orWhere('productName', 'like', '%' .  $data['srchField'] . '%')->get();
			}
			// $session_id = Session::get('session_id');
			$session_id = Auth::id();
			$cart = DB::table('cart')->where(['session_id' => $session_id])->get();
			$cartTotal = 0;
			$cartNum = 0;
			foreach($cart as $product){
				$cartNum += (int)$product->productQuantity;
				$cartTotal += (int)$product->productPrice*(int)$product->productQuantity;
			}
			$productsAll = json_decode(json_encode($productsAll));
			$categories = Category::with('categories')->where('categoryId', '>', '0')->get();
    	$categories = json_decode(json_encode($categories));
			return view('welcome')->with(compact('productsAll','categories','cartNum', 'cartTotal'));
		}

		public function viewProduct($id = null){
			$product = Product::where(['productId'=>$id])->first();
			// $session_id = Session::get('session_id');
			$session_id = Auth::id();
			$cart = DB::table('cart')->where(['session_id' => $session_id])->get();
			$cartTotal = 0;
			$cartNum = 0;
			foreach($cart as $pro){
				$cartNum += (int)$pro->productQuantity;
				$cartTotal += (int)$pro->productPrice*(int)$pro->productQuantity;
			}
			$categories = Category::with('categories')->where('categoryId', '>', '0')->get();
    	$categories = json_decode(json_encode($categories));
			return view('view_product')->with(compact('product','categories','cartNum', 'cartTotal'));
		}
}
