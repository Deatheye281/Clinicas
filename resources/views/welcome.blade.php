<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Clinica | Starter</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      @if (Route::has('login'))
      @auth
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/home') }}" class="nav-link">Inicio</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <a href="{{route('users.index')}}" class="nav-link">Administrar usuarios</a>
      </li>
      @else
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('login') }}" class="nav-link">Iniciar sesion</a>
      </li>
      @if (Route::has('register'))
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('register') }}" class="nav-link">Registrarse</a>
      </li>
      @endif
      @endauth
    </ul>
    @endif
    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="adminlte/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="adminlte/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="adminlte/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fas fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="adminlte/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="adminlte/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Julian Perez</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <li class="nav-item">
                <a href="{{route('hospital.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hospitales</p>
                </a>
              </li>
          </li>
          <li class="nav-item">
            <a href="{{route('laboratorio.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Laboratorios
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('medico.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Medicos
              </p>
            </a>
          </li>         
          <li class="nav-item">
            <a href="{{route('sala.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Salas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('paciente.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Paciente
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('detalle.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Informacion del hospital
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('consulta.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Citas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('fechadia.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Fechas de diagnosicos
              </p>
            </a>
          </li>
          <li class="nav-item">
          <a href="{{route('diagnostico.index')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Diagnosticos
            </p>
          </a>
        </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Clinica</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Nuevo</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Lavate las manos</h5>

                <p class="card-text">
                  El lavado correcto de manos con agua y jabón puede eliminar hasta un 80% los virus y bacterias, según la Organización Mundial de Salud. 
                  Súmate a esta campaña y combatamos el coronavirus con una adecuada higiene empleando agua y jabón o alcohol en gel.
                </p>

                <a href="https://rpp.pe/peru/actualidad/tu-tambien-lavate-las-manos-y-sumate-a-la-prevencion-del-coronavirus-en-el-peru-noticia-1252665" class="card-link">Echa un vistazo</a>                
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Quedate en casa</h5>

                <p class="card-text">
                  Explicamos el decreto que regirá la medida de cuarentena anunciada por el presidente Iván Duque.
                </p>
                <a href="https://www.eltiempo.com/politica/explicacion-del-decreto-sobre-aislamiento-preventivo-obligatorio-en-colombia-476148" class="card-link">Echa un vistazo</a>                
              </div>
            </div><!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h5 class="m-0">Importante</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Protegete y protege a los demas</h6>

                <p class="card-text">Mantente limpio y sigue las medidas de salud para protegerte a ti y a tu familia del COVID-19</p>
                <a href="https://espanol.cdc.gov/enes/coronavirus/2019-ncov/prevent-getting-sick/prevention.html" class="btn btn-primary">Echa un vistazo</a>
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Importante</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Mensajes de prevencion</h6>

                <p class="card-text">Siga los siguientes mensajes para estar sano y evitar la propagación del virus</p>
                <a href="https://genotipia.com/genetica_medica_news/estrategias-terapeuticas-covid-19/" class="btn btn-primary">Echa un vistazo</a>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="adminlte/js/adminlte.min.js"></script>
</body>
</html>
