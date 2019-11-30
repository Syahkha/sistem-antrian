<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('admin/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/modules/fontawesome/css/all.css')}}" >

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/components.css')}}">
</head>

<body>
    <div id="app">
        <div class="main-wrapper" id="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
            
            <ul class="navbar-nav navbar-right ml-auto">
          
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
           
            <div class="d-sm-none d-lg-inline-block">{{Auth::user()->name}}</div></a>

            <div class="dropdown-menu dropdown-menu-right">
    
              <a href="{{url('akun')}}" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Edit Akun
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"  onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
            </div>
          </li>
        </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="{{url('home')}}">Sistem Antrian</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="{{url('home')}}">SA</a>
                    </div>
                    <ul class="sidebar-menu">
                    <li class="nav-item">
              <a href="{{url('home')}}" class="nav-link "><i class="fas fa-home"></i><span>Dashboard</span></a>
            </li>
           
           
            <li class="nav-item">
              <a href="{{url('data-akun')}}" class="nav-link"><i class="fas fa-user"></i><span>Data Admin</span></a>
            </li>
         
            
            <li class="nav-item">
              <a href="{{url('loket')}}" class="nav-link"><i class="fas fa-desktop"></i><span>Counter</span></a>
            </li>
            <li class="nav-item">
              <a href="{{url('departement')}}" class="nav-link"><i class="fas fa-building"></i><span>Departement</span></a>
            </li>
            
            
            <li class="nav-item">
              <a href="{{url('antrian')}}" class="nav-link"><i class="fas fa-users"></i><span>Antrian</span></a>
            </li>
            <li class="nav-item">
              <a href="{{url('pemanggilan')}}" class="nav-link"><i class="fas fa-user-clock"></i><span>Pemanggilan</span></a>
            </li>
            <li class="nav-item">
              <a href="{{url('display')}}" class="nav-link"><i class="fas fa-tv"></i><span>Display</span></a>
            </li>
            <li class="nav-item">
              <a href="{{url('setting')}}" class="nav-link"><i class="fas fa-cog"></i><span>Setting</span></a>
            </li>
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            @yield('konten')
            <footer class="main-footer">
                <div class="footer-left">
                    <!-- Copyright © 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval
                        Azhar</a> -->
                </div>
                <div class="footer-right">
                    <!-- v2.0.0 -->
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    @yield('print')

    <script src="{{asset('admin/modules/jquery.min.js')}}"> </script>
    <script src="{{asset('admin/modules/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/js/stisla.js')}}"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
    @yield('js')

    <!-- Template JS File -->
    <script src="{{asset('admin/js/scripts.js')}}"></script>
    <script src="{{asset('admin/js/custom.js')}}"></script>
</body>

</html>
