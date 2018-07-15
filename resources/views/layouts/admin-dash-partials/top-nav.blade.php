<header>
    <!-- Dropdown Structure -->
    <ul id="user-links" class="dropdown-content">
        @if(Auth::check() && Auth::user()->isAdmin())

            <li><a href="/admin">Admin</a></li>

        @endif
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
        <nav class="navbar white">
            <div class="nav-wrapper"><a href="/home" class="brand-logo grey-text text-darken-4">Home</a>
                <ul id="nav-mobile" class="right">
                    <li class="hide-on-med-and-down"><a href="#!" data-target="dropdown1" class="dropdown-trigger waves-effect"><i class="material-icons">notifications</i></a></li>
                    <li><a href="#!" data-target="chat-dropdown" class="dropdown-trigger waves-effect"><i class="material-icons">settings</i></a></li>
                    <li><img class="circ" src="{{ Gravatar::get(Auth::user()->email)  }}"></li>
                    <!-- Dropdown Trigger -->
                    <li><a class="dropdown-trigger" href="#!" data-target="user-links">{{ Auth::user()->name }}
                            <i class="material-icons right">arrow_drop_down</i></a></li>
                </ul><a href="#!" data-target="sidenav-left" class="sidenav-trigger left"><i class="material-icons black-text">menu</i></a>
            </div>
        </nav>
    </div>

    @include('layouts.admin-dash-partials.side-nav')

    <div id="dropdown1" class="dropdown-content notifications">
        <div class="notifications-title">notifications</div>
        <div class="card">
            <div class="card-content"><span class="card-title">Joe Smith made a purchase</span>
                <p>Content</p>
            </div>
            <div class="card-action"><a href="#!">view</a><a href="#!">dismiss</a></div>
        </div>
        <div class="card">
            <div class="card-content"><span class="card-title">Daily Traffic Update</span>
                <p>Content</p>
            </div>
            <div class="card-action"><a href="#!">view</a><a href="#!">dismiss</a></div>
        </div>
        <div class="card">
            <div class="card-content"><span class="card-title">New User Joined</span>
                <p>Content</p>
            </div>
            <div class="card-action"><a href="#!">view</a><a href="#!">dismiss</a></div>
        </div>
    </div>
    <div id="chat-dropdown" class="dropdown-content dropdown-tabbed">
        <ul class="tabs tabs-fixed-width">
            <li class="tab col s3"><a href="#settings">Settings</a></li>
            <li class="tab col s3"><a href="#friends" class="active">Friends</a></li>
        </ul>
        <div id="settings" class="col s12">
            <div class="settings-group">
                <div class="setting">Night Mode
                    <div class="switch right">
                        <label>
                            <input type="checkbox"><span class="lever"></span>
                        </label>
                    </div>
                </div>
                <div class="setting">Beta Testing
                    <label class="right">
                        <input type="checkbox"><span></span>
                    </label>
                </div>
            </div>
        </div>
        <div id="friends" class="col s12">
            <ul class="collection flush">
                <li class="collection-item avatar">
                    <div class="badged-circle online"><img src="/dist/img/portrait1.jpg" alt="avatar" class="circle"></div><span class="title">Jane Doe</span>
                    <p class="truncate">Lo-fi you probably haven't heard of them</p>
                </li>
                <li class="collection-item avatar">
                    <div class="badged-circle"><img src="/dist/img/portrait2.jpg" alt="avatar" class="circle"></div><span class="title">John Chang</span>
                    <p class="truncate">etsy leggings raclette kickstarter four dollar toast</p>
                </li>
                <li class="collection-item avatar">
                    <div class="badged-circle"><img src="/dist/img/portrait3.jpg" alt="avatar" class="circle"></div><span class="title">Lisa Simpson</span>
                    <p class="truncate">Raw denim fingerstache food truck chia health goth synth</p>
                </li>
            </ul>
        </div>
    </div>
</header>