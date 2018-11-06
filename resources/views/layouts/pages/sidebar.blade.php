<aside class="app-sidebar">
  <div class="app-sidebar__user"><img height="50" class="app-sidebar__user-avatar" src="{{asset('back/img/mr.jpg')}}" alt="User Image">
    <div>
      <p class="app-sidebar__user-name">Mizanur Rahman</p>
      <!--p class="app-sidebar__user-designation">Frontend Developer</p-->
    </div>
  </div>
  <ul class="app-menu">
    <li><a class="app-menu__item {{Request::is('admin/dashboard*')? 'active':''}}" href="{{route('admin.admin-dashboard')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

    <li><a class="app-menu__item {{Request::is('admin/slider*')? 'active':''}}" href="{{route('slider.index')}}"><i class="app-menu__icon material-icons">slideshow</i><span class="app-menu__label">Slide Management</span></a></li>

    
    
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Employee Management</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item {{Request::is('admin.role*')?'active':''}}" href="{{route('role.index')}}"><i class="icon fa fa-circle-o"></i> Role</a></li>
        <li><a class="treeview-item {{Request::is('admin/employee*')? 'active':''}}" href="{{route('employee.index')}}"><i class="icon fa fa-circle-o"></i> Employee</a></li>
      </ul>
    </li>
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-shopping-cart"></i><span class="app-menu__label">Purchase Management</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item {{Request::is('admin/supplier*')?'active':''}}" href="{{route('supplier.index')}}"><i class="icon fa fa-circle-o"></i> Supplier</a></li>
        <li><a class="treeview-item" href="form-custom.html"><i class="icon fa fa-circle-o"></i> Row Materials</a></li>
      </ul>
    </li>
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-shopping-cart"></i><span class="app-menu__label">Order Management</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item {{Request::is('admin/reservation*')?'active':''}}" href="{{route('reservation.index')}}"><i class="icon fa fa-circle-o"></i> Reservation</a></li>
        <li><a class="treeview-item {{Request::is('admin/order*')?'active':''}}" href="{{route('order.index')}}"><i class="icon fa fa-circle-o"></i> Order</a></li>
      </ul>
    </li>

    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Item Management</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item {{Request::is('admin/category*')?'active':''}}" href="{{route('category.index')}}"><i class="icon fa fa-circle-o"></i> Category</a></li>

        <li><a class="treeview-item {{Request::is('admin/uom*')?'active':''}}" href="{{route('uom.index')}}"><i class="icon fa fa-circle-o"></i> UOM</a></li>

        <li><a class="treeview-item {{Request::is('admin/item*')?'active':''}}" href="{{route('item.index')}}"><i class="icon fa fa-circle-o"></i> Item</a></li>
      </ul>
    </li>
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Kitchen Management</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item" href="table-basic.html"><i class="icon fa fa-circle-o"></i> Basic Tables</a></li>
        <li><a class="treeview-item" href="table-data-table.html"><i class="icon fa fa-circle-o"></i> Data Tables</a></li>
      </ul>
    </li>
    <!--li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Pages</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item" href="blank-page.html"><i class="icon fa fa-circle-o"></i> Blank Page</a></li>
        <li><a class="treeview-item" href="page-login.html"><i class="icon fa fa-circle-o"></i> Login Page</a></li>
        <li><a class="treeview-item" href="page-lockscreen.html"><i class="icon fa fa-circle-o"></i> Lockscreen Page</a></li>
        <li><a class="treeview-item" href="page-user.html"><i class="icon fa fa-circle-o"></i> User Page</a></li>
        <li><a class="treeview-item" href="page-invoice.html"><i class="icon fa fa-circle-o"></i> Invoice Page</a></li>
        <li><a class="treeview-item" href="page-calendar.html"><i class="icon fa fa-circle-o"></i> Calendar Page</a></li>
        <li><a class="treeview-item" href="page-mailbox.html"><i class="icon fa fa-circle-o"></i> Mailbox</a></li>
        <li><a class="treeview-item" href="page-error.html"><i class="icon fa fa-circle-o"></i> Error Page</a></li>
      </ul>
    </li-->
  </ul>
</aside>