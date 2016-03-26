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
            <li class="active">
              <a href="{{url('manager/item')}}">
                <i class="fa fa-video-camera"></i> <span>Items</span>
              </a>
            </li>
            <li>
              <a href="{{url('manager/category')}}">
                <i class="fa fa-gavel"></i> <span>Categoies</span>
              </a>
            </li>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>