<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="{{ route('admin.dashboard') }}" class="logo">
                <img src="{{ asset('assets/admin/img/logo/sales_logo.png') }}" alt="navbar brand" class="navbar-brand" height="50" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item active">
                    <a data-bs-toggle="collapse" href="#" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="dashboard">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="#">
                                    <span class="sub-item">Dashboard 1</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#forms">
                        <i class="fas fa-pen-square"></i>
                        <p>Users</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="forms">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('all.admin') }}">
                                    <span class="sub-item">All Admin</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin') }}">
                                    <span class="sub-item">Add Admin</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('all.product.manager') }}">
                                    <span class="sub-item">All Product manager</span>
                                </a>
                            </li>
                             <li>
                                <a href="{{ route('product.manager') }}">
                                    <span class="sub-item">Add Product manager</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('all.machine.operator') }}">
                                    <span class="sub-item">All Machine Operator</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('machine.operator') }}">
                                    <span class="sub-item">Add Machine Operator</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('all.dispatch') }}">
                                    <span class="sub-item">All Dispatch Manager</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('dispatch') }}">
                                    <span class="sub-item">Add Dispatch Manager</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                
                <!--<li class="nav-item">
                    <a data-bs-toggle="collapse" href="#forms">
                        <i class="fas fa-pen-square"></i>
                        <p>Role Management</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="forms">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('role') }}">
                                    <span class="sub-item">All Role</span>
                                </a>
                            </li>
                             <li>
                                <a href="#">
                                    <span class="sub-item">Create Role</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>-->
            </ul>
        </div>
    </div>
</div>
