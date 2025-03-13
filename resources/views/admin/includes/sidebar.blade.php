<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
           Book Review
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            Book
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>

            <li><a class="nav-link" href="{{route("admin.home.index")}}"><i class="fas fa-fire"></i>
                    <span>Dashboard</span></a></li>

            <li class="menu-header">Book Management</li>
            <li class="{{ Request::is('admin/book*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.book.index') }}"><i class="fa fa-book"></i> <span>Book</span></a> </li>


        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="{{route("admin.auth.logout")}}" class="btn btn-primary btn-lg btn-block btn-icon-split" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="fas fa-rocket"></i>Logout
            </a>
            <form id="logout-form" action="{{ route('admin.auth.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </aside>
</div>