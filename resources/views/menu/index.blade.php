<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                @include('menu.partials.profile')
            </li>
            <li>
                <a href="#"><i class="fa fa-shield"></i> <span class="nav-label">Dashboard</span></a>
            </li>
            <li class="active">
                <a href="{{ url('/admin/cosplay') }}"><i class="fa fa-users"></i> <span class="nav-label">Cosplays</span></a>
            </li>
        </ul>
    </div>
</nav>