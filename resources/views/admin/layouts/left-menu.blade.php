<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="{{ Request::is('admin/menu*') ? 'active' : '' }}"><a href="{{ route('admin.menu.list') }}"><i class="fa fa-align-justify"></i> <span>Меню</span></a></li>
            <li class="{{ Request::is('admin/slider*') ? 'active': '' }}"><a href="{{ route('admin.slider.list') }}"><i class="fa fa-image"></i> <span>Слайдер</span></a></li>
            {{--<li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#">Link in level 2</a></li>
                    <li><a href="#">Link in level 2</a></li>
                </ul>
            </li>--}}
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
