<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper">
        <ul class="left">
                <li>
                    <a href="#" class="btn-collapse-sidebar" data-activates="slide-out"><i class="material-icons">menu</i></a>
                </li>
            </ul>
            <ul class="right">            
                @if(Auth::Check())
                    <li>
                        <a href="#" class="dropdown-button" data-activates="user-dropdown"><i class="fa fa-user"></i> Hi, {{ Auth::user()->full_name }} <i class="material-icons right">arrow_drop_down</i></a>
                        <ul id="user-dropdown" class="dropdown-content">
                            <li>{{ link_to_route('auth.changePassword', 'Change Password') }}</li>
                            <li>{{ link_to_route('auth.logout', 'Logout') }}</li>
                        </ul>
                    </li>                                
                @endif
            </ul>
            <ul class="side-nav" id="slide-out">
                <li>
                    <a href="{{ route('admin::root') }}"><i class="fa fa-2x fa-home"></i> Home</a>
                </li>
                <li class="collection-item">
                        <li>
                            <a href="{{ route('admin::clubs.index') }}"><i class="fa fa-2x fa-user"></i>  Manage Clubs</a>
                        </li>   
                        <li>
                            <a href="{{ route('admin::events.index') }}"><i class="fa fa-2x fa-graduation-cap"></i>  Manage Events</a>
                        </li>
                        <li>
                            <a href="{{ route('admin::halls.index') }}"><i class="fa fa-2x fa-graduation-cap"></i>  Manage Halls</a>
                        </li>   
                        <li>
                            <a href="{{ route('admin::users.index') }}"><i class="fa fa-2x fa-graduation-cap"></i>  Manage Users</a>
                        </li>
                </li>
        </div>
    </nav>
</div>