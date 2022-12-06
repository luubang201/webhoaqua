<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <img src="/Backend/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/Backend/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div><div class="sidebar-search-results"><div class="list-group"><a href="#" class="list-group-item"><div class="search-title"><strong class="text-light"></strong>N<strong class="text-light"></strong>o<strong class="text-light"></strong> <strong class="text-light"></strong>e<strong class="text-light"></strong>l<strong class="text-light"></strong>e<strong class="text-light"></strong>m<strong class="text-light"></strong>e<strong class="text-light"></strong>n<strong class="text-light"></strong>t<strong class="text-light"></strong> <strong class="text-light"></strong>f<strong class="text-light"></strong>o<strong class="text-light"></strong>u<strong class="text-light"></strong>n<strong class="text-light"></strong>d<strong class="text-light"></strong>!<strong class="text-light"></strong></div><div class="search-path"></div></a></div></div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="{{route('admin.category.index')}}">
                    <i class="fa fa-th"></i> <span>Quản lý  danh mục</span>
                </a>
            </li>

            <li>
                <a href="{{route('admin.vendor.index')}}">
                    <i class="fa fa-th"></i> <span>Quản lý nhà cung cấp</span>
                </a>
            </li>

            <li>
                <a href="{{route('admin.user.index')}}">
                    <i class="fa fa-th"></i> <span>Quản lý Người dùng</span>
                </a>
            </li>

            <li>
                <a href="{{route('admin.product.index')}}">
                    <i class="fa fa-th"></i> <span>Quản lý Sản phẩm</span>
                </a>
            </li>

            <li>
                <a href="{{route('admin.banner.index')}}">
                    <i class="fa fa-th"></i> <span>Quản lý Banner</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.article.index')}}">
                    <i class="fa fa-th"></i> <span>Quản lý bài viết</span>
                </a>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
