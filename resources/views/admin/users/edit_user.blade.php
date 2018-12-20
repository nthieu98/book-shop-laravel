@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Users</a> <a href="#" class="current">Add User</a> </div>
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
            <h5>Edit User</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('admin/edit-user/'.$userDetails->id) }}" name="add_coupon" id="add_coupon">{{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">Name</label>
                <div class="controls">
                  <input value="{{ $userDetails->name }}" type="text" name="name" id="name" maxlength="30" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Username</label>
                <div class="controls">
                  <input value="{{ $userDetails->username }}" type="text" name="username" id="username" required>
                  @if($errors->has('username'))
                    <p style="color:red">{{$errors->first('username')}}</p>
                  @endif
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Password</label>
                <div class="controls">
                  <input autocomplete="off" value="{{ $userDetails->password }}" type="password" name="password" id="password" required>
                  @if($errors->has('password'))
                    <p style="color:red">{{$errors->first('password')}}</p>
                  @endif
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Password Confirm</label>
                <div class="controls">
                  <input id="password-confirm" type="password" name="password_confirmation" value="{{ $userDetails->password }}" required>
                  <!-- @if($errors->has('password'))
                    <p style="color:red">{{$errors->first('password')}}</p>
                  @endif -->
                </div>
              <div class="control-group">
                <label class="control-label">Email</label>
                <div class="controls">
                  <input autocomplete="off" value="{{ $userDetails->email }}" type="text" name="email" id="email" required>
                  @if($errors->has('email'))
                    <p style="color:red">{{$errors->first('email')}}</p>
                  @endif
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Male</label>
                <div class="controls">
                  <select name="male" id="male" style="width:220px;">
                    <?php echo $males_drop_down; ?>
                  </select>
                  <!-- <input autocomplete="off" value="{{ $userDetails->male }}" type="text" name="male" id="male"> -->
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Birthday</label>
                <div class="controls">
                  <input autocomplete="off" value="{{ $userDetails->birthday }}" type="date" name="birthday" id="birthday">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Phone Number</label>
                <div class="controls">
                  <input autocomplete="off" value="{{ $userDetails->phoneNumber }}" type="text" name="phoneNumber" id="phoneNumber">
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Edit User" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection