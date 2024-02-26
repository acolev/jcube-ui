<div class="app-menu navbar-menu">
    <div class="navbar-brand-box">
        <a href="#" class="logo">
            <span class="logo-sm">
{{--                <x-svg.logo.icon height="22"/>--}}
            </span>
            <span class="logo-lg">
{{--               <x-svg.logo height="22"/>--}}
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span>{{__('menu')}}</span></li>
{{--                @foreach(config('menu.tenant') as $item)--}}
{{--                    <x-menu :item="$item" :admin="auth()->user()"/>--}}
{{--                @endforeach--}}
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<div class="vertical-overlay"></div>
