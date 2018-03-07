<div class="navbar-fixed">
    <nav>
    <div class="nav-wrapper">
    <a href="#" class="brand-logo">SeminarHallBooking</a>
    <ul class="left hide-on-large-only">
        <li>
            <a href="#" class="btn-collapse-sidebar" data-activates="slide-out"><i class="material-icons">menu</i></a>
        </li>
    </ul>
            <ul class="right">            
                @if(Auth::Check())
                    <li>
                    <a href="{{route('user_pages.hall')}}">Halls</a> 
                    </li>
                    <li> <a href="{{route('user_pages.bookings')}}">Bookings</a> </li>
                    <li>
                        <a href="#" class="dropdown-button" data-activates="user-dropdown"><i class="fa fa-user"></i> Hi, {{ Auth::user()->name }} <i class="material-icons right">arrow_drop_down</i></a>
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