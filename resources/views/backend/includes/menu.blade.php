<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-header">Setup</li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Device Type
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Blog
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('backend.blog.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('backend.setting.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{route('backend.contact.index')}}" class="nav-link">
                <i class="nav-icon fas fa-envelope-open"></i>
                <p>
                    Contact Us
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('backend.setting.create')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Setting
                </p>
            </a>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
