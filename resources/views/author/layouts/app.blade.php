<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('/assets/jquery.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/admin_assets/main.css') }}" rel="stylesheet">
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <!-- header -->
        @include('author.includes.header')
        <!-- header end -->
        <div class="app-main">
          <div class="app-sidebar sidebar-shadow bg-heavy-rain sidebar-text-dark">
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
              </div>    <div class="scrollbar-sidebar ps ps--active-y">
                <!-- Sidebar Menu START-->
                  <div class="app-sidebar__inner">
                      <ul class="vertical-nav-menu metismenu">
                          <li class="app-sidebar__heading">Dashboards</li>
                          <li>
                              <a href="index.html" class="mm-active">
                                  <i class="metismenu-icon pe-7s-rocket"></i>
                                  Dashboard
                              </a>
                          </li>
                          <li class="app-sidebar__heading">Content</li>
                          <li>
                              <a href="#">
                                  <i class="metismenu-icon pe-7s-diamond"></i>
                                  Post
                              </a>
                          </li>
                          <li>
                              <a href="#">
                                  <i class="metismenu-icon pe-7s-car"></i>
                                  Galery
                              </a>
                          </li>
                          <li>
                              <a href="tables-regular.html">
                                  <i class="metismenu-icon pe-7s-display2"></i>
                                  Video
                              </a>
                          </li>
                          <li class="app-sidebar__heading">Settings</li>
                          <li>
                              <a href="dashboard-boxes.html">
                                  <i class="metismenu-icon pe-7s-display2"></i>
                                  Setting
                              </a>
                          </li>
                          <li>
                              <a href="dashboard-boxes.html">
                                  <i class="metismenu-icon pe-7s-display2"></i>
                                  Logout
                              </a>
                          </li>
                      </ul>
                  </div>
                <!-- Sidebar Menu END-->
              <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 607px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 545px;"></div></div></div>
          </div>
            @yield('content')
        </div>
    </div>
    <div class="jvectormap-tip"></div>
    <script src="{{ asset('/assets/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('/assets/admin_assets/assets/scripts/main.js') }}"></script>
</body>
</html>
