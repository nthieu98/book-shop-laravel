@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> <a href="/admin/dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Orders</a> <a href="#" class="current">Add Order</a> </div>
    <h1>Users</h1>
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
            <h5>Add User</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('admin/add-user') }}" name="add_user" id="add_user">{{ csrf_field() }}
              <!-- <div class="control-group">
                <label class="control-label">Amount Type</label>
                <div class="controls">
                  <select name="amount_type" id="amount_type" style="width:220px;">
                    <option value="Percentage">Percentage</option>
                    <option value="Fixed">Fixed</option>
                  </select>
                </div>
              </div> -->
              <div class="control-group">
                <label class="control-label">Username</label>
                <div class="controls">
                  <input type="text" name="username" id="username" maxlength="15" minlength="5" value="{{ old('username') }}" required>
                  @if($errors->has('username'))
                    <p style="color:red">{{$errors->first('username')}}</p>
                  @endif
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Password</label>
                <div class="controls">
                  <input type="password" name="password" id="password" value="" required>
                  @if($errors->has('password'))
                    <p style="color:red">{{$errors->first('password')}}</p>
                  @endif
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Password Confirm</label>
                <div class="controls">
                  <input id="password-confirm" type="password" name="password_confirmation" required>
                  <!-- @if($errors->has('password'))
                    <p style="color:red">{{$errors->first('password')}}</p>
                  @endif -->
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Email</label>
                <div class="controls">
                  <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                  @if($errors->has('email'))
                    <p style="color:red">{{$errors->first('email')}}</p>
                  @endif
                </div>
              </div>
              <!-- <div class="control-group">
                <label class="control-label">Enable</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" value="1">
                </div>
              </div> -->
              <div class="form-actions">
                <input type="submit" value="Add User" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection