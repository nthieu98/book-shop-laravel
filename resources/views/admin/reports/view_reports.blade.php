@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Report</a> <a href="#" class="current">View Reports</a> </div>
    <h1>Reports</h1>
    @if(Session::has('flash_message_error'))
            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_error') !!}</strong>
            </div>
        @endif   
        @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_success') !!}</strong>
            </div>
        @endif
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Reports</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Report ID</th>
                  <th>Type</th>
                  <th>Date</th>
                  <th>Product ID</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Total</th>
                  <!-- <th>Level</th> -->
                  <!-- <th>Category URL</th> -->
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($reports as $report)
                <tr class="gradeX">
                  <td class="center">{{ $report->reportId }}</td>
                  <td class="center">{{ $report->reportType }}</td>
                  <td class="center">{{ $report->reportDate }}</td>
                  <td class="center">{{ $report->productId }}</td>
                  <td class="center">{{ $report->quantity }}</td>
                  <td class="center">{{ $report->price }}</td>
                  <td class="center">{{ $report->totalPrice }}</td>
                  <td class="center">
                    <a href="{{ url('/admin/edit-report/'.$report->reportId) }}" class="btn btn-primary btn-mini">Edit</a> 
                    <a <?php /* id="delCat" href="{{ url('/admin/delete-category/'.$category->id) }}" */ ?> rel="{{ $report->reportId }}" rel1="delete-report" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection