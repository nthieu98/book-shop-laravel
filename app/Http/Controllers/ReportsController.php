<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Report;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function addReport(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		//echo "<pre>"; print_r($data); die;

            // if(empty($data['status'])){
            //     $status='0';
            // }else{
            //     $status='1';
            // }

    		$report = new Report;
            $report->reportType = $data['report_type'];
            $report->reportDate = $data['date'];
            $report->productId = $data['productId'];
            $report->quantity = $data['quantity'];
            $report->price = $data['price'];
            $report->totalPrice = $data['quantity']*$data['price'];
            // $category->parent_id = $data['parent_id'];
    		// $category->categoryDetail = $data['description'];
    		// $category->url = $data['url'];
            // $category->status = $status;
    		$report->save();
    		return redirect()->back()->with('flash_message_success', 'Report has been added successfully');
    	}

        // $levels = Category::where(['parent_id'=>0])->get();
        $reports = Report::where('reportId', '>', 0)->get();
    	return view('admin.reports.add_report')->with(compact('reports'));
    }

    public function editReport(Request $request,$id=null){

        if($request->isMethod('post')){
            $data = $request->all();
            echo "<pre>"; print_r($data); 

            // if(empty($data['status'])){
            //     $status='0';
            // }else{
            //     $status='1';
            // }

            // Category::where(['id'=>$id])->update(['status'=>$status,'name'=>$data['category_name'],'parent_id'=>$data['parent_id'],'description'=>$data['description'],'url'=>$data['url']]);
            Report::where(['reportId'=>$id])->
            update(['reportType'=>$data['report_type'],'reportDate'=>$data['date'], 
            'productId'=>$data['product_id'], 'quantity'=>$data['quantity'],'price'=>$data['price'], 
            'totalPrice'=>($data['quantity']*$data['price'])]);
            return redirect()->back()->with('flash_message_success', 'Report has been updated successfully');
        } 
        $reportDetails = Report::where(['reportId'=>$id])->first();
        $types = array('Export', 'Import');
        $types_drop_down = "<option value='' disabled>Select</option>";
        foreach($types as $type){
            if($type==$reportDetails->reportType){
                $selected = "selected";
            }else{
                $selected = "";
            }
            $types_drop_down .= "<option value='".$type."' ".$selected.">".$type."</option>";
        }
       
        // "<pre>"; print_r($reportDetails);
        // $levels = Category::where(['categoryId'=>0])->get();
        // return $levels;
        return view('admin.reports.edit_report')->with(compact('reportDetails','types_drop_down' ));
    }

    public function deleteReport($id = null){
        Report::where(['reportId'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Report has been deleted successfully');
    }

    public function viewReports(){ 
        $reports = Report::get();
        return view('admin.reports.view_reports')->with(compact('reports'));
    }
}
