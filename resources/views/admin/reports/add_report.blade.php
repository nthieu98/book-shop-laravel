@extends('layouts.adminLayout.admin_design')
@section('content')
<script src="{{ asset('js/backend_js/jquery.min.js') }}"></script>

<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> <a href="/admin/dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Orders</a> <a href="#" class="current">Add Order</a> </div>
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
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Report</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('admin/add-report') }}" name="add_report" id="add_report" >{{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">Report Type</label>
                <div class="controls">
                  <select name = "report_type" id = "report_type"  style="width:220px;" required>
                    <option value="Import"> Import </option>
                    <option value="Export"> Export </option>
                  </select>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Date</label>
                <div class="controls">
                  <input type="date" name="date" id="date" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Product Id</label>
                <div class="controls">
                  <input type="text" name="productId" id="productId" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Quantity</label>
                <div class="controls">
                  <input type="number" name="quantity" id="quantity"class="numberic_value" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Price</label>
                <div class="controls">
                  <input type="number" name="price" id="price"class="numberic_value" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Total</label>
                <div class="controls">
                  <span id="total" type = "number"></span>
                </div>
              </div>
              <!-- <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script> -->

              <!-- <script type="text/javascript" src="lib.js"></script> -->
              
              <!-- <div class="control-group">
                <label class="control-label">Enable</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" value="1">
                </div>
              </div> -->
              <div class="form-actions">
                <input type="submit" value="Add Report" class="btn btn-success">
              </div>
            </form>
            <script src = "{{asset('js/autoCalTotal.js')}}"></script>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
