<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper">
            <ul class="right">            
                @if(Auth::Check())
                    <li>
                    <a href="{{route('user_pages.hall')}}">Halls</a> 
                    </li>
                    <li>
                        <a href="#" class="dropdown-button" data-activates="user-dropdown"><i class="fa fa-user"></i> Hi, {{ Auth::user()->full_name }} <i class="material-icons right">arrow_drop_down</i></a>
                        <ul id="user-dropdown" class="dropdown-content">
                            <li>{{ link_to_route('auth.changePassword', 'Change Password') }}</li>
                            <li>{{ link_to_route('auth.logout', 'Logout') }}</li>
                        </ul>
                    </li>
                @else
                <li><a href="{{ route('auth.login') }}"> Login</a></li>
                    <li><a href="{{ route('auth.register') }}">  Register</a></li>                                 
                @endif
            </ul>
        </div>
    </nav>
</div>