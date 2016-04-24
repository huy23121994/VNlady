      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="/img/backend/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Hello Admin's VNLady</p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">DASHBOARD</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="treeview active">
              <a href="{{url('manager/item')}}">
                <i class="fa fa-thumb-tack"></i> <span>Posts</span><i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu menu-open">
                <li class="@yield('all')"><a href="{{url('manager/item')}}"><i class="fa fa-circle-o"></i> All Posts</a></li>
                <li class="@yield('new')"><a href="{{url('manager/item/create')}}"><i class="fa fa-circle-o"></i> Add New</a></li>
                <li class="@yield('category')"><a href="{{url('manager/category')}}"><i class="fa fa-circle-o"></i> Categories</a></li>
                <li class="@yield('tag')"><a href="{{url('manager/tag')}}"><i class="fa fa-circle-o"></i> Tags</a></li>
              </ul>
            </li>
            <li>
              <a href="{{url('manager/category')}}">
                <i class="fa fa-user"></i> <span>User</span>
              </a>
            </li>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>