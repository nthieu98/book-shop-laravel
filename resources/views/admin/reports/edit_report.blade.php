@extends('layouts.adminLayout.admin_design')
@section('content')
<script src="{{ asset('js/backend_js/jquery.min.js') }}"></script>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Reports</a> <a href="#" class="current">Add Report</a> </div>
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
            <h5>Edit Report</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('admin/edit-report/'.$reportDetails->reportId) }}" name="add_report" id="add_report" novalidate="novalidate">{{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">Report Type</label>
                <div class="controls">
                  <input type="text" name="report_type" id="report_type" value="{{ $reportDetails->reportType }}">
                </div>
              </div>
              <!-- <div class="control-group">
                <label class="control-label">Date</label>
                <div class="controls">
                  <textarea name="date">{{ $reportDetails->categoryDetail }}</textarea>
                </div>
              </div> -->
              <div class="control-group">
                <label class="control-label">Date</label>
                <div class="controls">
                  <input type="date" name="date" id="date" value="{{ $reportDetails->reportDate }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Product Id</label>
                <div class="controls">
                  <input type="text" name="product_id" id="product_id" value="{{ $reportDetails->productId }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Quantity</label>
                <div class="controls">
                  <input type="number" name="quantity" id="quantity" value="{{ $reportDetails->quantity }}" class = "numberic_value">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Price</label>
                <div class="controls">
                  <input type="number" name="price" id="price" value="{{ $reportDetails->price }}" class="numberic_value">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Total</label>
                <div class="controls">
                  <span id="total" type = "number" value = "{{ $reportDetails->totalPrice }}">{{ $reportDetails->totalPrice }}</span>
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Edit Report" class="btn btn-success">
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