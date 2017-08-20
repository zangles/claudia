<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                @include('menu.partials.profile')
            </li>
            <li class="{{ Request::is('home') ? 'active' : '' }}">
                <a href="{{ route('home') }}"><i class="fa fa-shield"></i> <span class="nav-label">Dashboard</span></a>
            </li>
            <li class="{{ Request::is('patient') ? 'active' : '' }}">
                <a href="{{ route('patient.index')}}"><i class="fa fa-users"></i> <span class="nav-label">Pacientes</span></a>
            </li>
        </ul>
    </div>
</nav>