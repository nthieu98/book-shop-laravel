@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> <a href="/admin/dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Orders</a> <a href="#" class="current">Add Order</a> </div>
    <h1>Orders</h1>
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
            <h5>Orders</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>User ID</th>
                  <th>Date</th>
                  <th>Order Status</th>
                  <th>Order Address</th>
                  <!-- <th>Level</th> -->
                  <!-- <th>Category URL</th> -->
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($orders as $order)
                <tr class="gradeX">
                  <td class="center">{{ $order->orderId }}</td>
                  <td class="center">{{ $order->id }}</td>
                  <td class="center">{{ $order->orderDate }}</td>
                  <td class="center">{{ $order->orderStatus }}</td>
                  <td class="center">{{ $order->orderAddress }}</td>

                  <td class="center">
                    <a href="{{ url('/admin/edit-order/'.$order->orderId.'/edit-order-detail') }}" class="btn btn-primary btn-success btn-mini">View Details</a>
                    <a href="{{ url('/admin/edit-order/'.$order->orderId) }}" class="btn btn-primary btn-mini">Edit</a> 
                    <a href = "delete-order/{{ $order->orderId}}" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a></td>
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