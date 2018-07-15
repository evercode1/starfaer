
<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
    @if(Auth::user()->isAdmin())

        <li><a href="/admin">Admin</a></li>

    @endif
        <li><a href="/settings">Settings</a></li>
        <li><a href="/support-messages">Support</a></li>
        <li>
            <a href="/auth/facebook">
                fb Sync </a>
        </li>
    <li class="divider"></li>
    <li>
        <a href="/logout"
           onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="/logout" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>
</ul>
<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper">
            <a href="#!" class="brand-logo ml-10">Star Faer</a>
            <ul class="right hide-on-med-and-down">
                <li><img class="circ" src="{{ Gravatar::get(Auth::user()->email)  }}"></li>
                <!-- Dropdown Trigger -->
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
        </div>
    </nav>
</div>


@section('scripts')

    <script>

        $(document).ready(function() {
            M.AutoInit();
            console.log('yes');
        });

    </script>

    @endsection