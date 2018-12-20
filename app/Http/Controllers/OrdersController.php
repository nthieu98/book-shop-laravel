<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Order;
use App\User;
use App\Product;
use App\OrderDetail;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function addOrder(Request $request){
        $order = new Order;        
        $orders = Order::where('orderId', '>', 0)->get();
        $users = User::where('id', '>', 0)->get();
        $products = Product::where('productId', '>', 0)->get();
    	if($request->isMethod('post')){
    		$data = $request->all();
    		//echo "<pre>"; print_r($data); die;

            // if(empty($data['status'])){
            //     $status='0';
            // }else{
            //     $status='1';
            // }

    		
            $order->id = $data['user_id'];
            $order->orderDate = $data['date'];
            $order->orderStatus = $data['order_status'];
            $order->orderAddress = $data['order_address'];
            // $category->parent_id = $data['parent_id'];
    		// $category->categoryDetail = $data['description'];
    		// $category->url = $data['url'];
            // $category->status = $status;
            $order->save();
            return redirect('admin/add-order/'.$order->id.'/add-product')->with('flash_message_success', 'Order has been added successfully');
    		// return view('admin.orders.add_product')->with(compact('order', 'products'))->with('flash_message_success', 'Order has been added successfully');
    	}

        // $levels = Category::where(['parent_id'=>0])->get();

        // echo "<pre>"; print_r($products); die;
    	return view('admin.orders.add_order')->with(compact('orders', 'users', 'products', 'order'));
    }

    public function addProduct(Request $request, $id = null){
        $order = Order::where(['orderId'=>$id])->first();        
        $users = User::where('id', '>', 0)->get();
        $orderList = OrderDetail::where(['orderId'=>$id])->get();
        // echo "<pre>"; print_r($orderList); die;
        $products = Product::where('productId', '>', 0)->get();
    	if($request->isMethod('post')){
            $data = $request->all();
            $orderDetails = new OrderDetail;
            $checkOrder = OrderDetail::where(['orderId'=>$id, 'productId'=>$data['product_id']])->first();
            // echo "<pre>"; print_r($orderList); die;
            if(empty($checkOrder)){
                // return 1;
                $orderDetails->quantity = $data['quantity'];
            }
            else{    
                // echo "<pre>"; print_r($checkOrder); die;
                // return 2;
                $orderDetails->quantity = $data['quantity'] + $checkOrder->quantity;        
                OrderDetail::where(['orderId'=>$id, 'productId'=>$data['product_id']])->delete();
            }

    		// echo "<pre>"; print_r($data); die;

            // if(empty($data['status'])){
            //     $status='0';
            // }else{
            //     $status='1';
            // }
            $pickedProduct = Product::where(['productId'=>$data['product_id']])->first();
            $orderDetails->orderId = $id;
            $orderDetails->productId = $data['product_id'];
            $orderDetails->price = $pickedProduct->productPrice;
            $orderDetails->totalPrice = $orderDetails->quantity * $orderDetails->price;
            $orderDetails->save();
            // echo "<pre>"; print_r($orderDetails); die;
    		return redirect()->back()->with(compact('products', 'order', 'orderList'))->with('flash_message_success', 'Product has been added successfully');
    	}

        // $levels = Category::where(['parent_id'=>0])->get();
        

        // echo "<pre>"; print_r($order); die;
    	return view('admin.orders.add_product')->with(compact('products', 'order', 'orderList'));
    }

    public function deleteProduct($id = null, $idp = null){
        OrderDetail::where(['orderId'=>$id, 'productId'=>$idp])->delete();
        return redirect()->back()->with('flash_message_success', 'Product has been deleted successfully');
    }

    public function editOrder(Request $request,$id=null){
        $users = User::where('id', '>', 0)->get();
        $products = Product::where('productId', '>', 0)->get();

        if($request->isMethod('post')){
            $data = $request->all();
            echo "<pre>"; print_r($data); 

            // if(empty($data['status'])){
            //     $status='0';
            // }else{
            //     $status='1';
            // }

            // Category::where(['id'=>$id])->update(['status'=>$status,'name'=>$data['category_name'],'parent_id'=>$data['parent_id'],'description'=>$data['description'],'url'=>$data['url']]);
            Order::where(['orderId'=>$id])->
            update(['id'=>$data['user_id'],'orderDate'=>$data['date'], 
            'orderStatus'=>$data['order_status'], 'orderAddress'=>$data['order_address']]);
            return redirect()->back()->with('flash_message_success', 'Order has been updated successfully');
        }

        $order = Order::where(['orderId'=>$id])->first();
        $status = array('Processing', 'Delivering', 'Completed', 'Cancelled');
        $status_drop_down = "<option value='' disabled>Select</option>";
        foreach($status as $stt){
            if($stt==$order->orderStatus){
                $selected = "selected";
            }else{
                $selected = "";
            }
            $status_drop_down .= "<option value='".$stt."' ".$selected.">".$stt."</option>";
        }

        // echo "<pre>"; print_r($categories); die;
		$users_drop_down = "<option value='' disabled>Select</option>";
		foreach($users as $usr){
			if($usr->id==$order->id){
				$selected = "selected";
			}else{
				$selected = "";
			}
            $users_drop_down .= "<option value='".$usr->id."' ".$selected.">".$usr->id."</option>";
        }
        // "<pre>"; print_r($reportDetails);
        // $levels = Category::where(['categoryId'=>0])->get();
        // return $levels;
        return view('admin.orders.edit_order')->with(compact('order', 'status_drop_down', 'users_drop_down'));
    }

    public function editOrderDetail(Request $request, $id = null){
        $order = Order::where(['orderId'=>$id])->first();        
        $users = User::where('id', '>', 0)->get();
        $orderList = OrderDetail::where(['orderId'=>$id])->get();
        // echo "<pre>"; print_r($orderList); die;
        $products = Product::where('productId', '>', 0)->get();
    	if($request->isMethod('post')){
            
            $data = $request->all();      

            $pickedProduct = Product::where(['productId'=>$data['product_id']])->first();
            $orderDetails = new OrderDetail;           
            $orderDetails->price = $pickedProduct->productPrice;
            $orderDetails->quantity = $data['quantity'];
            // echo "<pre>"; print_r($data); die;
            $checkOrder = OrderDetail::where(['orderId'=>$id, 'productId'=>$data['product_id']])->first();
            if($data['type_req'] == "0"){
                OrderDetail::where(['orderId'=>$id, 'productId'=>$data['product_id']])->
                update(['quantity'=>$data['quantity'],'totalPrice'=> $orderDetails->quantity * $orderDetails->price]);
            }else{
                if(empty($checkOrder)){
                    // return 1;
                    $orderDetails->quantity = $data['quantity'];
                }
                else{    
                    // echo "<pre>"; print_r($checkOrder); die;
                    // return 2;
                    $orderDetails->quantity = $data['quantity'] + $checkOrder->quantity;        
                    OrderDetail::where(['orderId'=>$id, 'productId'=>$data['product_id']])->delete();
                }
                
                // $orderDetails->quantity = $data['quantity'] + $checkOrder->quantity;        
                $orderDetails->orderId = $id;
                $orderDetails->productId = $data['product_id'];
                $orderDetails->totalPrice = $orderDetails->quantity * $orderDetails->price;
                $orderDetails->save();
            
            }
            return redirect()->back()->with(compact('products', 'order', 'orderList'))->with('flash_message_success', 'Order has been updated successfully');

        // $levels = Category::where(['parent_id'=>0])->get();
        }

        // echo "<pre>"; print_r($order); die;
    	return view('admin.orders.edit_order_detail')->with(compact('products', 'order', 'orderList'));
    }

    public function deleteDetail($id = null, $idp = null){
        OrderDetail::where(['orderId'=>$id, 'productId'=>$idp])->delete();
        return redirect()->back()->with('flash_message_success', 'Order has been updated successfully');
    }

    public function deleteOrder($id = null){
        OrderDetail::where(['orderId'=>$id])->delete();
        Order::where(['orderId'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Order has been deleted successfully');
    }

    public function viewOrders(){ 

        $orders = Order::get();
        return view('admin.orders.view_orders')->with(compact('orders'));
    }
}
