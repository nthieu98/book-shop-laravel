@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> <a href="/admin/dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Orders</a> <a href="#" class="current">Add Order</a> </div>
    <h1>Products</h1>
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
            <h5>Edit Product</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/edit-product/'.$productDetails->productId) }}" name="edit_product" id="edit_product">{{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">Under Category</label>
                <div class="controls" required>
                  <select name="category_id" id="category_id" style="width:220px;">
                    <?php echo $categories_drop_down; ?>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Product Name</label>
                <div class="controls">
                  <input type="text" required name="product_name" id="product_name" value="{{ $productDetails->productName }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Product Quantity</label>
                <div class="controls">
                  <input type="number" required name="product_quantity" id="product_quantity" value="{{ $productDetails->productQuantity }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Product Price</label>
                <div class="controls">
                  <input type="number" required name="product_price" id="product_price" value="{{ $productDetails->productPrice }}">
                </div>
              </div>
              <!-- <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                  <textarea name="description">{{ $productDetails->description }}</textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Material & Care</label>
                <div class="controls">
                  <textarea name="care">{{ $productDetails->care }}</textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Price</label>
                <div class="controls">
                  <input type="text" name="price" id="price" value="{{ $productDetails->price }}">
                </div>
              </div> -->
              <div class="control-group">
                <label class="control-label">Image</label>
                <div class="controls">
                  <div id="uniform-undefined">
                    <table>
                      <tr>
                        <td>
                          <input name="image" id="image" type="file">
                          @if(!empty($productDetails->productImage))
                            <input type="hidden" required name="current_image" value="{{ $productDetails->productImage }}"> 
                          @endif
                        </td>
                        <td>
                          @if(!empty($productDetails->productImage))
                            <img style="width:30px;" src="{{ asset('/images/backend_images/product/small/'.$productDetails->productImage) }}">
                            <img style="width:100px;" src="{{ asset('/images/backend_images/product/medium/'.$productDetails->productImage) }}"> 
                          @endif
                        </td>
                      </tr>
                    </table>
                </div>
              </div>
              <!-- <div class="control-group">
                <label class="control-label">Enable</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" @if($productDetails->status == "1") checked @endif value="1">
                </div>
              </div> -->
              <div class="form-actions">
                <input type="submit" value="Edit Product" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection