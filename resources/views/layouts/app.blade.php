
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  {{-- <!-- Bootstrap -->
  <link rel="stylesheet" href="dist/css/bootstrap.min.css"> --}}

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('adminlte/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Home</a>
      </li>
    </ul>
      <li class="dropdown nav nav-tabs-right">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              @if(Auth::user()) {{ Auth::user()->name }} @endif
                  <span class="caret"></span>
          </a>

          <ul class="dropdown-menu" role="menu">

              <li>
                  <a style=" position: absolute; right: 10px;"
                      href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                      Logout
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>

              </li>
          </ul>
      </li>
 </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
    <img src="{{asset('adminlte/img/AdminLTELogo.png')}}"
           alt="Blood Bank Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Blood Bank</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="{{asset('adminlte/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block">@if(Auth::user()) {{ Auth::user()->name }} @endif</a>
        </div>
      </div>

      <!-- Sidebar Menu -->

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Posts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('post')}}" class="nav-link">
                  <i class="far fa-comment-alt nav-icon"></i>
                  <p>Posts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('category')}}" class="nav-link">
                  <i class="far fa-list-alt nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
            </ul>
        </li>
            {{-- <li class="nav nav-pills nav-sidebar flex-column"><a href=""><i class="fa fa-book"></i> <span>Settings</span></a></li> --}}
    <li class="nav nav-pills nav-sidebar flex-column my-1 py-1 "><a href="{{url('governorate')}}"><i class="fa fa-globe-americas"></i> <span>Governorates</span></a></li>
    <li class="nav nav-pills nav-sidebar flex-column my-1 py-1 "><a href="{{url('city')}}"><i class="fa fa-city"></i> <span>Cities</span></a></li>
    <li class="nav nav-pills nav-sidebar flex-column my-1 py-1"><a href="{{url('client')}}"><i class="fa fa-user"></i> <span>Clients</span></a></li>
    <li class="nav nav-pills nav-sidebar flex-column my-1 py-1"><a href="{{url('donation')}}"><i class="fa fa-hand-holding-heart"></i> <span>Donation Rrequests</span></a></li>
    <li class="nav nav-pills nav-sidebar flex-column my-1 py-1"><a href="{{url('contact')}}"><i class="fa fa-envelope"></i> <span>Contacts</span></a></li>
    <li class="nav nav-pills nav-sidebar flex-column my-1 py-1"><a href="{{url('setting')}}"><i class="fa fa-cog"></i> <span>Settings</span></a></li>
    <li class="nav nav-pills nav-sidebar flex-column my-1 py-1"><a href="{{url('role')}}"><i class="fa fa-meh-rolling-eyes"></i> <span>Roles</span></a></li>
    <li class="nav nav-pills nav-sidebar flex-column my-1 py-1"><a href="{{url('user')}}"><i class="fa fa-user-tie"></i> <span>Users</span></a></li>
    <li class="nav nav-pills nav-sidebar flex-column my-1 py-1"><a href="{{url('/password/reset')}}"><i class="fa fa-user-cog"></i> <span>Change User Password</span></a></li>

        </ul>
        <ul>

        </ul>
      </nav>
    </div>
  </aside>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark">@yield('page_title')</h1>
                </div><!-- /.col -->
                {{-- <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Starter Page</li>
                  </ol>
                </div><!-- /.col --> --}}
              </div>
            </div>
          </div>


    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.0-rc.5
    </div>
    <strong>Copyright &copy; 2019 <a href="">Company name</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('adminlte/js/demo.js')}}"></script>
</body>
</html>
