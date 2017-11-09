{{-- Authentication Links --}}
@if (Auth::guest())
    <li>
        <a href="{{ route('login') }}">
            Login
        </a>
    </li>
@else
    @includeIf('common.nav.right')
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            {{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <ul class="dropdown-menu" role="menu">
            <li>
                <a href="{{ route('api') }}">
                    <i class="fa fa-fw fa-grav" aria-hidden="true"></i>
                    API Tokens
                </a>
            </li>
            <li role="separator" class="divider"></li>
            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-fw fa-power-off"></i> Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </li>
@endif
