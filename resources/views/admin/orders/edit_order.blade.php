@extends('layouts.adminLayout.admin_design')
@section('content')
<!doctype html>
<script src="{{ asset('js/backend_js/jquery.min.js') }}"></script>

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
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Order</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('admin/edit-order/'.$order->orderId) }}" name="edit_order" id="edit_order">{{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">User ID</label>
                <div class="controls">
                  <select name = "user_id" id = "user_id" style = "width:220px;" required>
                    <?php echo $users_drop_down; ?>
                  <select>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Date</label>
                <div class="controls">
                  <input type="date" name="date" id="date" value = "{{$order->orderDate}}" required>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Order Status</label>
                <div class="controls">
                  <select name = "order_status" id = "order_status" style = "width:220px;"required>
                    <<?php echo $status_drop_down; ?>
                  <select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Order Address</label>
                <div class="controls">
                  <input type="text" name="order_address" id="order_address" value = "{{$order->orderAddress}}" required>
                </div>
              </div>
              

            
              <!-- <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script> -->

              <!-- <script type="text/javascript" src="lib.js"></script> -->
              
          
              <div class="form-actions">
                <input type="submit" value="Edit Order" class="btn btn-success">
              </div>
              
            </form>
          </div>
          
        </div>
        
      </div>
      
    </div>
    
  </div>
  
</div>

<script src = "{{asset('js/getPriceOfProduct.js')}}"></script>
<script src = "{{asset('js/autoCalTotal.js')}}"></script>
@endsection
