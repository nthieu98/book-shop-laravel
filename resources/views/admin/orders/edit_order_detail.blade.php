@extends('layouts.adminLayout.admin_design')
@section('content')
<script src="{{ asset('js/backend_js/jquery.min.js') }}"></script>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Orders</a> <a href="#" class="current">Add Order</a> </div>
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
            <h5>Order Info</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('admin/add-order') }}" name="add_order" id="add_order" novalidate="novalidate">{{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">User ID</label>
                <div class="controls">
                <input type="text" name="user_id" id="user_id" value = "{{ $order->id }}" disabled>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Date</label>
                <div class="controls">
                  <input type="date" name="date" id="date" value = "{{ $order->orderDate }}" disabled>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Order Status</label>
                <div class="controls">
                <input type="text" name="order_status" id="order_status" value = "{{ $order->orderStatus }}" disabled>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Order Address</label>
                <div class="controls">
                  <input type="text" name="order_address" id="order_address" value = "{{ $order->orderAddress }}" disabled>
                </div>
              </div>
            </form>
          </div>
          
        </div>
        
      </div>
      
    </div>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Products</h5>
          </div>
          <div class="widget-content nopadding">
            <div>
            <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Product ID</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Total</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($orderList as $orderChild)
                  <tr class="gradeX">
                    <form method = "post" action="{{ url('admin/edit-order/'.$orderChild->orderId.'/edit-order-detail') }}">{{ csrf_field() }}
                      
                        <td class="center"><input type="text" name="product_id0" id="product_id0" value = "{{ $orderChild->productId}}" required disabled>
                        <input type="hidden" name="product_id" id="product_id" value = "{{ $orderChild->productId}}"  hidden = "hidden"></td>
                        
                        <td class="center"><input type="number" name="quantity" id="quantity1"class="numberic_value1" value = "{{ $orderChild->quantity}}" required></td>
                        <input type ="hidden" name = "quantity1" id = "quantity1" value = "{{$orderChild->quantity}}" min = "1">
                        <td class="center"><input type="number" name="price" id="price1" class="numberic_value1" value = "{{ $orderChild->price}}" disabled></td>
                        <td class="center"><span type="number" name="total1" id="total1" value = "">{{ $orderChild->price*$orderChild->quantity}}</span></td>
                        <td class="center">
                          <input type="hidden" name = "type_req" id = "type_req" value = "0"> 
                          <button  class="btn btn-primary btn-mini" type = "submit">Edit</button> 
                          <a href=""  rel="{{$orderChild->productId}}" rel1="edit-order/{{ $order->orderId }}/delete-order-detail" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a></td>                  </tr>
                    </form>
                  @endforeach
                  <script>
                    $('.numberic_value1').keyup(function() {
                      var mul = 1;
                      var quantity = Number($('#quantity1').val());
                      var price = Number($('#price1').val());
                      mul *= quantity;
                      mul *= price;
                      // $('.numeric_value').each(function() {
                      //     sum += Number($(this).val());
                      // });
                      console.log(mul);
                      $('#total1').text(mul);
                    });
                    $('.numberic_value1').click(function() {
                      var mul = 1;
                      var quantity = Number($('#quantity1').val());
                      var price = Number($('#price1').val());
                      mul *= quantity;
                      mul *= price;
                      // $('.numeric_value').each(function() {
                      //     sum += Number($(this).val());
                      // });
                      console.log(mul);
                      $('#total1').text(mul);
                    });
                  </script>
    
                <tr class="gradeX">
                  <form method = "post" action="{{ url('admin/edit-order/'.$order->orderId.'/edit-order-detail') }}">{{ csrf_field() }}
                  <td class="center">
                    <select name = "product_id" id = "product_id" style = "width:220px;" class = "product_id" required>
                      <option selected="selected" value ="" disabled>--</option>
                      @foreach($products as $product)
                         <option value = "{{ $product->productId }}" product-price = "{{ $product->productPrice }}"> {{ $product->productId }}</option>
                      @endforeach
                    <select>
                    
                  </td>
                  <td class="center"><input type="number" name="quantity" id="quantity"class="numberic_value" min = "1" required></td>
                  <td class="center"><input type="number" name="price" id="price" class="numberic_value" disabled></td>
                  <td class="center"><span type="number" name="total" id="total"></span></td>
                  <td class="center">
                    <input type="hidden" name = "type_req" id = "type_req" value = "1"> 
                    <button href="" class="btn btn-primary btn-mini" type = "submit">Add</button> 
                  <script src = "{{asset('js/getPriceOfProduct.js')}}"></script>
                <form>
                </tr>
                
              </tbody>
            </table>
          </div>
            </div>
            
          </div>
          
        </div>
        
      </div>
      
    </div>
    
  </div>
  
</div>


<script src = "{{asset('js/autoCalTotal.js')}}"></script>
@endsection
