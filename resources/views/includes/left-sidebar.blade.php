<section>
    <aside id="leftsidebar" class="sidebar">
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li @if(Request::url() === route('dashboard'))
                    class="active"
                        @endif >
                    <a href="{{ route('dashboard') }}">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li @if(Request::url() === route('category') or Request::url() == route('category.create') or Request::url() == route('category.trashed') or Request::url() == route('category.active.search') or Request::url() == route('category.trashed.search')  )
                    class="active "
                        @endif >
                    <a class="menu-toggle" href="#">
                        <i class="material-icons">library_add</i>
                        <span>Category</span>
                    </a>
                    <ul class="ml-menu">
                        <li @if ( Request::url() == route('category') or Request::url() == route('category.active.search') )
                            class="active"
                                @endif>
                            <a href="{{ route('category') }}">All</a>
                        </li>
                        <li @if (Request::url()== route('category.create'))
                            class="active"
                                @endif >
                            <a href="{{ route('category.create') }}">Add</a>
                        </li>
                        <li @if (Request::url()== route('category.trashed') or Request::url() == route('category.trashed.search') )
                            class="active"
                                @endif >
                            <a href="{{ route('category.trashed') }}">Trashed</a>
                        </li>
                    </ul>
                </li>

                <li @if(Request::url() === route('blog') or Request::url() == route('blog.create') or Request::url() == route('blog.trashed') or Request::url() == route('blog.active.search') or Request::url() == route('blog.trashed.search')  )
                    class="active "
                        @endif >
                    <a class="menu-toggle" href="#">
                        <i class="fas fa-newspaper"></i>
                        <span>Blog</span>
                    </a>
                    <ul class="ml-menu">
                        <li @if ( Request::url() == route('blog') or Request::url() == route('blog.active.search') )
                            class="active"
                                @endif>
                            <a href="{{ route('blog') }}">All</a>
                        </li>
                        <li @if (Request::url()== route('blog.create'))
                            class="active"
                                @endif >
                            <a href="{{ route('blog.create') }}">Add</a>
                        </li>
                        <li @if (Request::url()== route('blog.trashed') or Request::url() == route('blog.trashed.search') )
                            class="active"
                                @endif >
                            <a href="{{ route('blog.trashed') }}">Trashed</a>
                        </li>
                    </ul>
                </li>

                <li @if(Request::url() === route('service-category') or Request::url() == route('service-category.create') or Request::url() == route('service-category.trashed') or Request::url() == route('service-category.active.search') or Request::url() == route('service-category.trashed.search')  )
                    class="active "
                        @endif >
                    <a class="menu-toggle" href="#">
                        <i class="fas fa-hand-holding-usd"></i>
                        <span>Service Category</span>
                    </a>
                    <ul class="ml-menu">
                        <li @if ( Request::url() == route('service-category') or Request::url() == route('service-category.active.search') )
                            class="active"
                                @endif>
                            <a href="{{ route('service-category') }}">All</a>
                        </li>
                        <li @if (Request::url()== route('service-category.create'))
                            class="active"
                                @endif >
                            <a href="{{ route('service-category.create') }}">Add</a>
                        </li>
                        <li @if (Request::url()== route('service-category.trashed') or Request::url() == route('service-category.trashed.search') )
                            class="active"
                                @endif >
                            <a href="{{ route('service-category.trashed') }}">Trashed</a>
                        </li>
                    </ul>
                </li>

                <li @if(Request::url() === route('service') or Request::url() == route('service.create') or Request::url() == route('service.trashed') or Request::url() == route('service.active.search') or Request::url() == route('service.trashed.search')  )
                    class="active "
                        @endif >
                    <a class="menu-toggle" href="#">
                        <i class="fas fa-hand-holding-usd"></i>
                        <span>Service</span>
                    </a>
                    <ul class="ml-menu">
                        <li @if ( Request::url() == route('service') or Request::url() == route('service.active.search') )
                            class="active"
                                @endif>
                            <a href="{{ route('service') }}">All</a>
                        </li>
                        <li @if (Request::url()== route('service.create'))
                            class="active"
                                @endif >
                            <a href="{{ route('service.create') }}">Add</a>
                        </li>
                        <li @if (Request::url()== route('service.trashed') or Request::url() == route('service.trashed.search') )
                            class="active"
                                @endif >
                            <a href="{{ route('service.trashed') }}">Trashed</a>
                        </li>
                    </ul>
                </li>


                <li @if(Request::url() === route('slider') or Request::url() == route('slider.create') or Request::url() == route('slider.trashed') or Request::url() == route('slider.active.search') or Request::url() == route('slider.trashed.search')  )
                    class="active "
                        @endif >
                    <a class="menu-toggle" href="#">
                        <i class=" fas fa-sliders-h"></i>
                        <span>Slider</span>
                    </a>
                    <ul class="ml-menu">
                        <li @if ( Request::url() == route('slider') or Request::url() == route('slider.active.search') )
                            class="active"
                                @endif>
                            <a href="{{ route('slider') }}">All</a>
                        </li>
                        <li @if (Request::url()== route('slider.create'))
                            class="active"
                                @endif >
                            <a href="{{ route('slider.create') }}">Add</a>
                        </li>
                        <li @if (Request::url()== route('slider.trashed') or Request::url() == route('slider.trashed.search') )
                            class="active"
                                @endif >
                            <a href="{{ route('slider.trashed') }}">Trashed</a>
                        </li>
                    </ul>
                </li>

                <li @if(Request::url() === route('team') or Request::url() == route('team.create') or Request::url() == route('team.trashed') or Request::url() == route('team.active.search') or Request::url() == route('team.trashed.search')  )
                    class="active "
                        @endif >
                    <a class="menu-toggle" href="#">
                        <i class=" fas fa-users"></i>
                        <span>Team</span>
                    </a>
                    <ul class="ml-menu">
                        <li @if ( Request::url() == route('team') or Request::url() == route('team.active.search') )
                            class="active"
                                @endif>
                            <a href="{{ route('team') }}">All</a>
                        </li>
                        <li @if (Request::url()== route('team.create'))
                            class="active"
                                @endif >
                            <a href="{{ route('team.create') }}">Add</a>
                        </li>
                        <li @if (Request::url()== route('team.trashed') or Request::url() == route('team.trashed.search') )
                            class="active"
                                @endif >
                            <a href="{{ route('team.trashed') }}">Trashed</a>
                        </li>
                    </ul>
                </li>

                <li @if(Request::url() === route('gallery') or Request::url() == route('gallery.create') or Request::url() == route('gallery.trashed') or Request::url() == route('gallery.active.search') or Request::url() == route('gallery.trashed.search')  )
                    class="active "
                        @endif >
                    <a class="menu-toggle" href="#">
                        <i class=" fas fa-images"></i>
                        <span>Gallery</span>
                    </a>
                    <ul class="ml-menu">
                        <li @if ( Request::url() == route('gallery') or Request::url() == route('gallery.active.search') )
                            class="active"
                                @endif>
                            <a href="{{ route('gallery') }}">All</a>
                        </li>
                        <li @if (Request::url()== route('gallery.create'))
                            class="active"
                                @endif >
                            <a href="{{ route('gallery.create') }}">Add</a>
                        </li>
                        <li @if (Request::url()== route('gallery.trashed') or Request::url() == route('gallery.trashed.search') )
                            class="active"
                                @endif >
                            <a href="{{ route('gallery.trashed') }}">Trashed</a>
                        </li>
                    </ul>
                </li>



                <li @if(Request::url() === route('settings'))
                    class="active"
                        @endif >
                    <a href="{{ route('settings') }}">
                        <i class="material-icons">settings</i>
                        <span>Settings</span>
                    </a>
                </li>

                <li @if(Request::url() === route('users') or request::url()==route('add-user') or request::url()==route('user.trashed') or request::url()==route('users.search') )
                    class="active "
                        @endif >
                    <a class="menu-toggle" href="#">
                        <i class="material-icons">account_box</i>
                        <span>Users</span>
                    </a>
                    <ul class="ml-menu">
                        <li @if (Request::url() == route('users') or request::url()==route('users.search') )
                            class="active"
                                @endif>
                            <a href="{{ route('users') }}">All Users</a>
                        </li>
                        <li @if (Request::url()== route('add-user'))
                            class="active"
                                @endif >
                            <a href="{{ route('add-user') }}">Add User</a>
                        </li>
                        <li @if (Request::url()== route('user.trashed'))
                            class="active"
                                @endif >
                            <a href="{{ route('user.trashed') }}">All Trashed</a>
                        </li>
                    </ul>

                </li>

            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                Developed by <a target="_blank" href="https://www.facebook.com/shakhalmahmud">Mahmud</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0.0
            </div>
        </div>
        <!-- #Footer -->
    </aside>
</section>