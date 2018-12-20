<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Category;
use App\Product;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function addCategory(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		//echo "<pre>"; print_r($data); die;

            if(empty($data['status'])){
                $status='0';
            }else{
                $status='1';
            }

    		$category = new Category;
    		$category->categoryName = $data['category_name'];
            // $category->parent_id = $data['parent_id'];
    		$category->categoryDetail = $data['description'];
    		// $category->url = $data['url'];
            // $category->status = $status;
    		$category->save();
    		return redirect()->back()->with('flash_message_success', 'Category has been added successfully');
    	}

        // $levels = Category::where(['parent_id'=>0])->get();
        $levels = Category::where(['categoryId'=>0])->get();
    	return view('admin.categories.add_category')->with(compact('levels'));
    }

    public function editCategory(Request $request,$id=null){

        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); */

            if(empty($data['status'])){
                $status='0';
            }else{
                $status='1';
            }

            // Category::where(['id'=>$id])->update(['status'=>$status,'name'=>$data['category_name'],'parent_id'=>$data['parent_id'],'description'=>$data['description'],'url'=>$data['url']]);
            Category::where(['categoryId'=>$id])->update(['categoryName'=>$data['category_name'],'categoryDetail'=>$data['description']]);
            return redirect()->back()->with('flash_message_success', 'Category has been updated successfully');
        }

        $categoryDetails = Category::where(['categoryId'=>$id])->first();
        $levels = Category::where(['categoryId'=>0])->get();
        // return $levels;
        return view('admin.categories.edit_category')->with(compact('categoryDetails','levels'));
    }

    public function deleteCategory($id = null){
        $product = Product::where(['categoryId'=>$id])->first();
        if(!empty($product)){
            return redirect()->back()->with('flash_message_error', 'Category has been deleted unsuccessfully');
        }

        Category::where(['categoryId'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Category has been deleted successfully');
    }

    public function viewCategories(){ 
        $categories = category::get();
        return view('admin.categories.view_categories')->with(compact('categories'));
    }
}
