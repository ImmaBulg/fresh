<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="{{ Request::is('admin/menu*') ? 'active' : '' }}"><a href="{{ route('admin.menu.list') }}"><i class="fa fa-align-justify"></i> <span>Меню</span></a></li>
            <li class="{{ Request::is('admin/slider*') ? 'active': '' }}"><a href="{{ route('admin.slider.list') }}"><i class="fa fa-image"></i> <span>Слайдер</span></a></li>
            <li class="{{ Request::is('admin/video*') ? 'active': '' }}"><a href="{{ route('admin.video.list') }}"><i class="fa fa-video-camera"></i> <span>Видео</span></a></li>
            <li class="{{ Request::is('admin/album*') ? 'active': '' }}"><a href="{{ route('admin.album.list') }}"><i class="fa fa-file-image-o"></i> <span>Альбомы</span></a></li>
            <li class="{{ Request::is('admin/contacts*') ? 'active': '' }}"><a href="{{ route('admin.contacts.edit') }}"><i class="fa fa-address-book"></i> <span>Контакты</span></a></li>
            <li class="{{ Request::is('admin/about*') ? 'active': '' }}"><a href="{{ route('admin.about.list') }}"><i class="fa fa-child"></i> <span>О нас</span></a></li>
            <li class="{{ Request::is('admin/creator*') ? 'active': '' }}"><a href="{{ route('admin.creator.list') }}"><i class="fa fa-lightbulb-o"></i> <span>Создатели</span></a></li>
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
