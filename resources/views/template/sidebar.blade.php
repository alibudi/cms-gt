  <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ asset('admin/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{ Auth::user()->name }}</p>
                        <!-- Status -->
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                <!-- search form (Optional) -->
                <!-- <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                    class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form> -->
                <!-- /.search form -->

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    <!-- <li class="header">HEADER</li> -->
                    <!-- Optionally, you can add icons to the links -->
                    <li id="menu-dashboard"><a href="{{ route('home.index') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                    @can('isAdmin')
                    <li id="menu-user"><a href="{{ route('users.index') }}"><i class="fa fa-users"></i> <span>Users</span></a></li>
                    <li id="menu-role"><a href="{{ route('role.index') }}"><i class="fa fa-user"></i> <span>Role</span></a></li>
                      <li id="menu-categori"><a href="{{ route('categori.index') }}"><i class="fa fa-file"></i> <span>Rubrik</span></a></li>
                        <li id="menu-tag"><a href="{{ route('tag.index') }}"><i class="fa fa-file-o"></i> <span>Tags</span></a></li>
                  @endcan
                  {{-- @can('isEditor') --}}
                    <li class="treeview" id="menu-editor">
                        <a href="#"><i class="fa fa-pencil-square-o"></i> <span>Editorial</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li id="menu-create-article" ><a href="{{ route('article.create') }}"> <i class="fa fa-file-text-o"></i>   Create Article</a></li>
                            <li><a href="{{ route('article.index') }}/draft"><i class="fa fa-clone"></i>Draft</a></li>
                            <li id="menu-article"><a href="{{ route('article.index') }}/published"><i class="fa fa-check-square-o"></i>Published</a></li>
                            <li><a href="{{ route('article.index') }}/scheduled"><i class="fa  fa-calendar"></i>Scheduled</a></li>
                            <li><a href="{{ route('article.index') }}/deleted"><i class="fa fa-trash-o"></i>Trash</a></li>
                        </ul>
                    </li>
                    <li class="treeview" id="menu-web">
                        <a href="#"><i class="fa fa-clipboard"></i> <span>Web Management</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-reorder"></i>Headline WP</a></li>
                            <li><a href="#"><i class="fa fa-reorder"></i>Headline Rubrik</a></li>
                            <li><a href="#"><i class="fa fa-thumb-tack"></i>Pilihan Editor</a></li>
                            <li id="menu-topik"><a href="{{ route('topic.index') }}"><i class="fa fa-file-text-o"></i>Topik Khusus</a></li>
                        </ul>
                    </li>
                    {{-- @endcan --}}
                    <li class="treeview">
                        <a href="#"><i class="fa fa-image"></i> <span>Gallery</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li id="menu-photo"><a href="{{ route('galeri.index') }}"><i class="fa fa-file-image-o"></i>Photo</a></li>
                            <li><a href="#"> <i class="fa fa-film"></i>Video</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-envelope"></i> <span>Notifikasi</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-file-text"></i>Notifikasi</a></li>
                        </ul>
                    </li>
                    <li class="treeview" id="menu-news">
                        <a href="#"><i class="fa fa-envelope "></i> <span>Breaking News</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li id="menu-news"><a href="{{ route('news.index') }}"><i class="fa fa-file-text"></i>Breaking News</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-bar-chart"></i> <span>Report</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-user"></i>Editor</a></li>
                            <li><a href="#"><i class="fa fa-user"></i>Author</a></li>
                            <li><a href="#"><i class="fa fa-file-text-o"></i>Article</a></li>
                            <li><a href="#"><i class="fa fa-file-text-o"></i>Section</a></li>
                            <li><a href="#"><i class="fa fa-file-text-o"></i>Article User</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-twitter "></i> <span>Feed Management</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-rss text-purple"></i>Rss Feed</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-database "></i> <span>Assets</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('photo') }}"><i class="fa  fa-file-image-o text-blue"></i>Photo</a></li>
                            <li><a href="#"><i class="fa  fa-file-film text-blue"></i>Video</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>