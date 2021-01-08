<!-- Header-->
<nav class="navbar navbar-expand-md navbar-default fixed-top">
    <div class="navbar-header">
        <div id="mobile-menu">
            <div class="left-nav-toggle">
                <a href="#">
                    <i class="stroke-hamburgermenu"></i>
                </a>
            </div>
        </div>
        <a class="navbar-brand" href="#">
            {{ config('app.name') }}
        </a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
        <div class="left-nav-toggle">
            <a href="#">
                <i class="stroke-hamburgermenu"></i>
            </a>
        </div>
        <div class="navbar-form mr-auto">
            @php $current = Route::currentRouteName() @endphp
            @if(preg_match('/index/', $current))
                <form method="GET" action="{{ route($current) }}">
                    <input type="text" name="search" class="form-control" placeholder="Search data" style="width: 175px">
                </form>
            @endif
        </div>
        <ul class="nav navbar-nav">
            <li class="nav-item profil-link">
                <a href="#">
                    <span class="profile-address">{{ auth()->user()->email }}</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
<!-- End header-->
