<div class="dropdown profile-element"> <span>

                             </span>
    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Auth::user()->name }}</strong>
                             </span> <span class="text-muted text-xs block">{{ Auth::user()->role }} <b class="caret"></b></span> </span> </a>
    <ul class="dropdown-menu animated fadeInRight m-t-xs">
        <li><a href="{{ url('/logout') }}">Salir</a></li>
    </ul>
</div>
<div class="logo-element">

</div>