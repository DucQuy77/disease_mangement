
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
      <img src="/template/admin/dist/img/b.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">DuongNam Pharmacy</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->


      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="/admin/main" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        TỔNG QUAN
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        QUẢN LÝ TÀI KHOẢN
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/accounts/list" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Danh Sách Tài Khoản</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/accounts/add" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Thêm Tài khoản</p>
                        </a>
                    </li>
                </ul>
            </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                QUẢN LÝ CÁC BỆNH
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/menus/list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách quản lý bệnh</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/menus/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm thông tin bệnh</p>
                </a>
              </li>
            </ul>
          </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        CÁC MÙA
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/managements/seasons" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Danh sách</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/managements/season/add" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Thêm mới</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        ĐỐI TƯỢNG
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/managements/objects" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Danh sách</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/managements/object/add" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Thêm mới</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Thông tin cá nhân
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/updateInfoAdmin/{{Auth::id()}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Chỉnh sửa</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" style="display: none;" id="logout-form">
                            @csrf
                        </form>
                        <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Đăng xuất</p>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
