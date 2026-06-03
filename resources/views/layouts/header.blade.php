<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box" style="padding: 12px 0;">
            <div class="container">
                <!-- Brand -->
                <a class="navbar-brand logo_h font-weight-bold" href="{{ url('/') }}" style="color: #ff6c00; font-size: 2.4rem; font-weight: 800; letter-spacing: 1px;">SAW Dashboard</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Nav Links -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto" style="font-size: 1.05rem;">
                        <li class="nav-item {{ request()->is('/') ? 'active' : '' }}"><a class="nav-link" href="{{ url('/') }}" style="padding: .75rem 1rem;">Home</a></li>

                        <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false" style="padding: .75rem 1rem;">Data SAW</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ route('kriteria.index') }}" style="padding: .5rem 1rem;">Data Kriteria</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('sereal.index') }}" style="padding: .5rem 1rem;">Data Sereal</a></li>
                            </ul>
                        </li>

                        <li class="nav-item {{ request()->is('ranking') ? 'active' : '' }}"><a class="nav-link" href="{{ route('ranking') }}" style="padding: .75rem 1rem;">Ranking</a></li>

                        @if(auth()->check() && auth()->user()->role === 'admin')
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="nav-link d-inline-flex align-items-center justify-content-center" style="background: none; border: none; cursor: pointer; color: #e53e3e; font-weight: 600; padding: 0.5rem 0.75rem; font-size: 15px; line-height: 1.2; min-height: 44px; height: 100%;">
                                        <i class="fa fa-sign-out"></i><span style="margin-left: 6px;">Logout</span>
                                    </button>
                                </form>
                            </li>
                        @elseif(auth()->check())
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="nav-link d-inline-flex align-items-center justify-content-center" style="background: none; border: none; cursor: pointer; color: #718096; font-weight: 500; padding: 0.5rem 0.75rem; font-size: 15px; line-height: 1.2; min-height: 44px; height: 100%;">
                                        <i class="fa fa-sign-out"></i><span style="margin-left: 6px;">Logout</span>
                                    </button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}" style="color: #ff6c00; font-weight: 700;">
                                    <i class="fa fa-sign-in"></i> Login
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
