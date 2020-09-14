
<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
    @if(Auth::check() && Auth::user()->isAdmin())

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
    <nav class="navbar blue-grey darken-1">
        <div class="nav-wrapper">
            <a href="/" class="brand-logo ml-10 left"><img src="/imgs/home/logo.png"
                                                           height="50"
                                                           class="image-scale"
                                                           alt="Star Faer"></a>

            @if(Auth::check())
            <ul class="right">
                <li><img class="circ" src="{{ Gravatar::get(Auth::user()->email)  }}"></li>
                <!-- Dropdown Trigger -->
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>

                @else

                <ul id="nav-mobile" class="right">

                   <!-- <li><a href="{{ url('/auth/facebook') }}">Facebook Login/Register</a></li>  -->

                </ul>


                @endif


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