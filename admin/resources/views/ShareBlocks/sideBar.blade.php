<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="dist/img/kite.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block"><?php echo session()->get('UserInfo.hovaten') ?></a>
        </div>
    </div>
    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="">
            <input class="form-control form-control-sidebar" id="search" type="search" placeholder="Search" aria-label="Search">
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
            <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Thống kê
                        {{-- <i class="right fas fa-angle-left"></i> --}}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                        Sản phẩm
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('product') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Danh sách sản phẩm</p>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="pages/tables/simple.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Thêm sản phẩm</p>
                        </a>
                    </li> --}}
                </ul>
            </li>
            {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                        Khách hàng
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="pages/tables/simple.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Danh sách khách hàng</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/tables/simple.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Thêm khách hàng</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                        Hóa đơn
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <li class="nav-item">
                        <a href="pages/tables/simple.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Danh sách hóa đơn</p>
                        </a>
                    </li>
            </li> --}}
        </ul>
        </li>
        {{-- <li class="nav-header">EXAMPLES</li> --}}
    </nav>

    <!-- /.sidebar-menu -->
</div>
