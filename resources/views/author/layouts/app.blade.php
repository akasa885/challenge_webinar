<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} Author Panel</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">     -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css" />
    <link href="{{ asset('/assets/admin_assets/main.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('/assets/jquery.min.js') }}"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

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
                              <a id="dashboardLink" href="{{route('author.dashboard')}}">
                                  <i class="metismenu-icon pe-7s-rocket"></i>
                                  Dashboard
                              </a>
                          </li>
                          <li class="app-sidebar__heading">Content</li>
                          <li>
                              <a id="postLink" onclick="sidebarMenu__Inner('{{route('author.post.view')}}')" href="javascript:void(0)" />
                                  <i class="metismenu-icon pe-7s-diamond"></i>
                                  Post
                              </a>
                          </li>
                          <li>
                              <a id="galeryLink" href="#">
                                  <i class="metismenu-icon pe-7s-photo"></i>
                                  Galery
                              </a>
                          </li>
                          <li>
                              <a id="videoLink" href="#">
                                  <i class="metismenu-icon pe-7s-play"></i>
                                  Video
                              </a>
                          </li>
                          <li class="app-sidebar__heading">Settings</li>
                          <li>
                              <a id="settingLink" href="#">
                                  <i class="metismenu-icon pe-7s-display2"></i>
                                  Setting
                              </a>
                          </li>
                          <li>
                              <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                  <i class="metismenu-icon pe-7s-power"></i>
                                  {{ __('Logout') }}
                              </a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                          </li>
                      </ul>
                  </div>
                <!-- Sidebar Menu END-->
              <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 607px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 545px;"></div></div></div>
          </div>
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('/assets/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('/assets/admin_assets/assets/scripts/main.js') }}"></script>
    <script src="{{ asset('/assets/admin_assets/domScripts.js') }}"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.js"></script>
    @yield('optionalScript')
    <script type="text/javascript">
      $(document).ready(function() {
         @if(request()->is('author/dashboard'))
         $('#dashboardLink').toggleClass('mm-active');
         @elseif(request()->is('author/post') || request()->is('author/post/*'))
         $('#postLink').toggleClass('mm-active');
         @elseif(request()->is('author/setting'))
         var path = '{{request()->path()}}';
         var strArray = path.split("/");
         @endif
      });
</script>
</body>
</html>
