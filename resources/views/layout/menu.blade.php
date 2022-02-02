@php $user = Auth::user(); @endphp
@section('menu')

    {{-- Header --}}
    <nav
        class="header-navbar navbar navbar-expand-lg align-items-center floating-nav  {{ Auth::user()->theme == 'd' ? 'navbar-dark' : 'navbar-light' }} navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon"
                                data-feather="menu"></i></a></li>
                </ul>
                <ul class="nav navbar-nav bookmark-icons">
                    <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style">Tema: <i class="ficon"
                                data-feather="moon"></i></a></li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ms-auto">
                <li class="nav-item dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none">
                            <span class="user-name fw-bolder">{{ $user->name . ' ' . $user->lastname }}</span>
                            <span class="user-status">Editar</span>
                        </div>
                        <span class="avatar">
                            <img class="round"
                                src="{{ is_null($user->avatar) || empty($user->avatar) ? url('/storage/avatar/no-image.png') : url('/storage/' . $user->avatar) }}"
                                alt="avatar" height="40" width="40">
                            <span class="avatar-status-online"></span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="#"><i class="far fa-user"></i> Meus Dados</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><i class="me-50"
                                data-feather="power"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header pt-1">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto">
                    <a href="#">
                        <img src="{{ url('/storage/images/logo.png') }}" alt="Logo" class="img img-fluid" srcset="">
                    </a>
                </li>
                <li class="nav-item nav-toggle">
                    <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                        <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                        <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                            data-ticon="disc"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

                <li class=" navigation-header mt-1">
                    <span data-i18n="Apps &amp; Pages"><strong>Painel</strong></span><i data-feather="more-horizontal"></i>
                    <hr>
                </li>

                <li class="nav-item {{ Route::current()->getName() === 'painel.home' ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="#">
                        <i class="fas fa-home"></i>
                        <span class="menu-title text-truncate" data-i18n="Dashboards">Home</span>
                    </a>
                </li>

                <?php
                $rot = ['#'];
                $active = in_array(Route::current()->getName(), $rot) ? 'active' : '';
                ?>

                <li class=" navigation-header mt-1">
                    <span data-i18n="Apps &amp; Pages">
                        <strong>Site</strong>
                    </span>
                    <i data-feather="more-horizontal"></i>
                    <hr>
                </li>

                <?php
                $rot = ['web.options'];
                $active = in_array(Route::current()->getName(), $rot) ? 'active' : '';
                ?>
                <li class="nav-item {{ $active }}">
                    <a class="d-flex align-items-center" href="#">
                        <i class="fas fa-paint-brush"></i>
                        <span class="menu-title text-truncate">Editar Site</span>
                    </a>
                </li>

                <?php
                $rot = ['list.users', 'app_user.edit'];
                $active = in_array(Route::current()->getName(), $rot) ? 'active' : '';
                ?>
                <li class="nav-item {{ $active }}">
                    <a class="d-flex align-items-center" href="#">
                        <i class="fas fa-users"></i>
                        <span class="menu-title text-truncate">Usuários</span>
                    </a>
                </li>


             

                <li class="mb-5">&nbsp;</li>
            </ul>
        </div>
    </div>
    {{-- End menu --}}

@endsection
