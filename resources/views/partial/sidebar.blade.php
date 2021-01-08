<!-- Navigation-->
<aside class="navigation">
    <nav>
        @php
            $cur = Route::currentRouteName();
            $prefix = explode( '.', $cur );
        @endphp
        <ul class="nav luna-nav">
            <li class="nav-category">
                Main
            </li>
                <li class="{{ $prefix[0] == 'home' ? 'active' : '' }}">
                    <a href="{{ $prefix[0] == 'home' ? '#' : route('home') }}">Dashboard</a>
                </li>
            <li class="nav-category">
                Shifts
            </li>
                <li class="{{ $cur == 'shifts.index' ? 'active' : '' }}">
                    <a href="{{ route('shifts.index') }}">List</a>
                </li>
            <li class="nav-category" id="logout">
                {{ __('Logout') }}
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
    </nav>
</aside>
<!-- End navigation-->
