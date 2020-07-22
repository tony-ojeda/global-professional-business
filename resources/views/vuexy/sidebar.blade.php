<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="dashboard-analytics">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">Vuexy</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
                    <i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block primary collapse-toggle-icon"
                        data-ticon="icon-disc">
                    </i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            @if(isset($menus))
                @foreach($menus as $menu)
                    @if(isset($menu['navheader']))
            <li class="navigation-header">
                <span>{{ $menu['navheader'] }}</span>
            </li>
                    @else
                        @php
                            $custom_classes = "";
                            if(isset($menu['classlist'])) {
                                $custom_classes = $menu['classlist'];
                            }
                            $translation = "";
                            if(isset($menu['i18n'])){
                                $translation = $menu['i18n'];
                            }
                        @endphp
            <li class="nav-item {{ (request()->route()->getName() == $menu['url']) ? 'active' : '' }} {{ $custom_classes }}">
                <a href="{{ route($menu['url']) }}">
                    <i class="{{ $menu['icon'] }}"></i>
                    <span class="menu-title">{{ $menu['name'] }}</span>
                    @if (isset($menu['badge']))
                        <?php $badgeClasses = "badge badge-pill badge-primary float-right" ?>
                        <span class="{{ isset($menu['badgeClass']) ? $menu['badgeClass'].' test' : $badgeClasses.' notTest' }} ">{{$menu['badge']}}</span>
                    @endif
                </a>
                    @if(isset($menu['submenu']))
                        @include('vuexy.submenu', ['menu' => $menu['submenu']])
                    @endif
            </li>
                    @endif
                @endforeach
            @endif
        </ul>
    </div>
</div>