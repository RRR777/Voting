<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{{ route('categories.index') }}"><i class="fa fa-clipboard-list"></i><span>Categories</span></a>
</li>

@if (Auth::user()->role_id == 1)
    <li class="{{ Request::is('nominations*') ? 'active' : '' }}">
        <a href="{{ route('nominations.index') }}"><i class="fa fa-award"></i><span>Nominations</span></a>
    </li>
    <li class="{{ Request::is('roles*') ? 'active' : '' }}">
        <a href="{{ route('roles.index') }}"><i class="fa fa-shield-alt"></i><span>Roles</span></a>
    </li>
    <li class="{{ Request::is('settings*') ? 'active' : '' }}">
        <a href="{{ route('settings.index') }}"><i class="fa fa-cog"></i><span>Settings</span></a>
    </li>
    <li class="{{ Request::is('users*') ? 'active' : '' }}">
        <a href="{{ route('users.index') }}"><i class="fa fa-user"></i><span>Users</span></a>
    </li>
@endif
