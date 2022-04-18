<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('personal.main.index')}}" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Personal</span>
    </a>

    <!-- Sidebar -->
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{route('personal.main.index')}}" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    Main
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('personal.liked.index')}}" class="nav-link">
                <i class="nav-icon far fa-heart"></i>
                <p>
                    Liked
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('personal.comment.index')}}" class="nav-link">
                <i class="nav-icon far fa-comment"></i>
                <p>
                    Comments
                </p>
            </a>
        </li>

    </ul>


    <!-- /.sidebar -->
</aside>
