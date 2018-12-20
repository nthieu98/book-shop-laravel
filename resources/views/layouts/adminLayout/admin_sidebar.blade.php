<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>User</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{ url('/admin/add-user')}}">Add User</a></li>
        <li><a href="{{ url('/admin/view-users')}}">View Users</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Categories</span> <span class="label label-important">2</span></a>
    <ul>
        <li><a href="{{ url('/admin/add-category')}}">Add Category</a></li>
        <li><a href="{{ url('/admin/view-categories')}}">View Categories</a></li>
      </ul>
    </li>
     <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Products</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{ url('/admin/add-product')}}">Add Product</a></li>
        <li><a href="{{ url('/admin/view-products')}}">View Products</a></li>
      </ul>
    </li>
    
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Reports</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{ url('/admin/add-report')}}">Add Report</a></li>
        <li><a href="{{ url('/admin/view-reports')}}">View Reports</a></li>
      </ul>
    </li>

    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Orders</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{ url('/admin/add-order')}}">Add Order</a></li>
        <li><a href="{{ url('/admin/view-orders')}}">View Orders</a></li>
      </ul>
    </li>
  </ul>
</div>
<!--sidebar-menu-->