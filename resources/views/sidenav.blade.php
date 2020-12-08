<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading"></li>
                @if(isset($loginSession['user_id']))
                    <li>
                        <a href="{{route('user.index')}}">
                            <i class="metismenu-icon pe-7s-home"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="metismenu-icon pe-7s-menu"></i>
                            PPA
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="{{route('user.ppa-izin')}}">
                                    <i class="metismenu-icon"></i>
                                    Izin
                                </a>
                            </li>
                            <li>
                                <a href="{{route('user.ppa-laporan')}}">
                                    <i class="metismenu-icon"></i>
                                    Laporan
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="metismenu-icon pe-7s-menu"></i>
                            PPU
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="{{route('user.ppu-izin')}}">
                                    <i class="metismenu-icon"></i>
                                    Izin
                                </a>
                            </li>
                            <li>
                                <a href="{{route('user.ppu-laporan')}}">
                                    <i class="metismenu-icon"></i>
                                    Laporan
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="metismenu-icon pe-7s-menu"></i>
                            PLB3
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="{{route('user.plb3-izin')}}">
                                    <i class="metismenu-icon"></i>
                                    Izin
                                </a>
                            </li>
                            <li>
                                <a href="{{route('user.plb3-laporan')}}">
                                    <i class="metismenu-icon"></i>
                                    Laporan
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('user.profile')}}" >
                            <i class="metismenu-icon pe-7s-user"></i>
                            Profil
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{route('admin.index')}}">
                            <i class="metismenu-icon pe-7s-home"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="metismenu-icon pe-7s-menu"></i>
                            PPA
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="{{route('admin.ppa-izin')}}">
                                    <i class="metismenu-icon"></i>
                                    Izin
                                </a>
                            </li>
                            <li>
                                <a href="{{route('admin.ppa-laporan')}}">
                                    <i class="metismenu-icon"></i>
                                    Laporan
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="metismenu-icon pe-7s-menu"></i>
                            PPU
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="{{route('admin.ppu-izin')}}">
                                    <i class="metismenu-icon"></i>
                                    Izin
                                </a>
                            </li>
                            <li>
                                <a href="{{route('admin.ppu-laporan')}}">
                                    <i class="metismenu-icon"></i>
                                    Laporan
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="metismenu-icon pe-7s-menu"></i>
                            PLB3
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="{{route('admin.plb3-izin')}}">
                                    <i class="metismenu-icon"></i>
                                    Izin
                                </a>
                            </li>
                            <li>
                                <a href="{{route('admin.plb3-laporan')}}">
                                    <i class="metismenu-icon"></i>
                                    Laporan
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('admin.instansi-perusahaan')}}">
                            <i class="metismenu-icon pe-7s-culture"></i>
                            Perusahaan/Instansi
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.profile')}}">
                            <i class="metismenu-icon pe-7s-user"></i>
                            Profil
                        </a>
                    </li>
                @endif
                <li>
                    <a href="{{ route('logout') }}">
                        <i class="metismenu-icon pe-7s-close-circle"></i>
                        Keluar
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>