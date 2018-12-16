<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- habilita el jax para poder enviar los datos -->
   <meta content="{{ csrf_token() }}" name="csrf-token">

  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


    <!--select2 -->
  <link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.css')}}">
  <!-- datatable  -->
  
  <link rel="stylesheet" href="{{ asset('css/dataTables.min.css') }}">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css')}}">

   <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
   <link rel="stylesheet" href="{{ asset('css/mycss.css') }}">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!--iconos -->
   <link crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" rel="stylesheet">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Lt</b>da</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Frutas </b>Ltda</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>


  <!-------------------navbar menu ------------------->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">



          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Diego Rios</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Diego Rios - Web Developer
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="home" class="btn btn-default btn-flat">exit</a>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>
  <!--------------------sidebar ------------------->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

      <li>
          <a href="{{ route('pallet') }}"><i class="fas fa-pallet"></i></i><span> Recepcion</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>


          <li>
          <a href="{{ route('bodega') }}"><i class="fas fa-hockey-puck"></i></i><span> Bodega</span>
            <span class="pull-right-container">
            </span>
          </a>

        </li>


             <li>
          <a href="{{ route('seleccion') }}">
            <i class="far fa-hand-pointer"></i></i><span> Seleccion</span>
            <span class="pull-right-container">
            </span>
          </a>

        </li>



      </ul>
    </section> 
  </aside>

  <!---------------------content ----------------->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
@yield('ubicacion')

    <!------ Main content -------------------------------->
    <section class="content">

    @yield('contenido')

    </section>
  </div>

</div>

<!-- jQuery 3 -->

<script src="{{ asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>



<!-- Slimscroll -->
<script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>



<!-- datatable -->
<script src="{{ asset('js/dataTables.min.js')}}"></script>
<!--sweetalert2-->
<script src="{{ asset('js/sweetalert2.min.js')}}"></script>
<script src="{{ asset('js/genero.js')}}"></script>

<!-- select2-->
<script src="{{ asset('bower_components/select2/dist/js/select2.js')}}"></script>

@yield('jsextra')
</body>
</html>
