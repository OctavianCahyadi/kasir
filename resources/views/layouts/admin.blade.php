<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  @yield('title')
  <link rel="icon" href="../image/logo.png"/>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset("/bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css") }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("/bower_components/admin-lte/dist/css/adminlte.min.css") }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
  <!-- Standalone -->
  <link href="{{ asset("/bower_components/datepicker/dist/css/datepicker.min.css") }}" rel="stylesheet" >
  <!-- For Bootstrap 4 -->
  <link href="{{ asset("/bower_components/datepicker/dist/css/datepicker-bs4.min.css") }}" rel="stylesheet" >
  <!-- For Bulma -->
  <link href="{{ asset("/bower_components/datepicker/dist/css/datepicker-bulma.min.css") }}" rel="stylesheet" >
  <!-- For Foundation -->
  <link href="{{ asset("/bower_components/datepicker/dist/css/datepicker-foundation.min.css") }}" rel="stylesheet" >
  <link rel="stylesheet" href="{{ asset("/bower_components/admin-lte/plugins/select2/css/select2.min.css") }}">
  <link rel="stylesheet" href="{{ asset("/bower_components/admin-lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css") }}" >
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
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <b> {{Auth::user()->name}}</b><span class="caret">&nbsp; </span>
       </li>
       <li class="nav-item">
        <a class="nav-item" href="{{ route('logout')}}"
        onclick="event.preventDefault();
         document.getElementById('logout-form').submit();">Logout
      </a> 
      </li>
    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display:none;">
      @csrf
    </form>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed;">
    <!-- Brand Logo -->
    <div class="container text-center">
    <a href="index3.html" class="brand-link text-center">
      <img src="../image/logo.png" alt="Logo Dinpar Bantul" class="img-circle elevation-3"
           style="opacity: .8; width: 20%">
           
    </a>
  </div>
    <!-- Sidebar -->
    <div class="sidebar" >
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-1 mb-0 text-center">
        <div class="info center">
          <h6 class="text-light">Dinas Pariwisata</h6>
          <h5 class="text-light"><b>Kabupaten Bantul</b></h5>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" > 
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->   
            <style>
              #active{
                background: #94c1ff;
                color: black;
              }
              
            </style> 
          <li class="nav-item">
          <a {{ $module == "Dashboard" ? 'id=active' : ''}}  href="/dashboard" class=nav-link>
              <i class="nav-icon fas fa-th"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a {{ $module == "Pegawai" ? 'id=active' : ''}} href="/pegawai" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Data Pegawai</p>
              
            </a>
          </li>
          <li class="nav-item">
            <a {{ $module == "PPTK" ? 'id=active' : ''}} href="/pptk" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>Data PPTK</p>
            </a>
          </li>
          <li class="nav-item">
            <a {{ $module == "SPPD" ? 'id=active' : ''}} href="/sppd" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>Data SPPD</p>
            </a>
          </li>
          <li class="nav-item">
            <a {{ $module == "user" ? 'id=active' : ''}} href="/user" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>Data User</p>
            </a>
          </li>
          <li class="nav-item">
            <a {{ $module == "Setting" ? 'id=active' : ''}} href="/setting" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>Setting</p>
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-1">
          <div class="col-sm-6">
            <h1 class="mb-0 text-dark">{{$judul}}</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    @yield('content')
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
      Developed by OctavianCahyadi <strong><a href="mailto:octaviancahyadi@gmail.com?subject=Getting Toch">Contact me</a></strong>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset("/bower_components/admin-lte/plugins/jquery/jquery.min.js" )}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset("/bower_components/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js"  )}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset("/bower_components/admin-lte/dist/js/adminlte.min.js"  )}}"></script>
<script src="{{ asset("/bower_components/datepicker/dist/js/datepicker.min.js" )}}"></script>
<script src="{{ asset("/bower_components/datepicker/dist/js/locales/fr.min.js" )}}"></script>
<script src="{{ asset("/bower_components/datepicker/dist/js/datepicker-full.min.js")}}"></script>
<script src="{{ asset("/bower_components/admin-lte/plugins/select2/js/select2.full.min.js" )}}"></script>
<script>
  $('#delete').on('show.bs.modal', function (event){
   var button = $(event.relatedTarget)
   var dataid = button.data('id')
   var modal=$(this)
   modal.find('.modal-body #id').val(dataid);
  })

  $('.cetak').on('show.bs.modal', function (event){
   var button = $(event.relatedTarget)
   var dataid = button.data('idcetak')
   var modal=$(this)
    
   var container = document.getElementById('buttonContainer');
   var a = document.createElement('a');
   var a2 = document.createElement('a');
   a.textContent = 'Cetak SPPD Depan';
   a.className='btn btn-block btn-warning';
   a.style='color:white;'
   a.target='_blank';
    
  // Buttons don't have an href. You need to set up a click event handler
   a.href = '/cetak_sppd/'+dataid;
   container.appendChild(a);

   a2.textContent = 'Cetak SPPD Belakang';
   a2.className='btn btn-block btn-warning';
   a2.style='color:white;'
   a2.target='_blank';
    
  // Buttons don't have an href. You need to set up a click event handler
   a2.href = '/cetak_sppd_belakang/'+dataid;
   container.appendChild(a2);
  }); 

  const elem = document.querySelector('input[id="datepicker"]');
  const datepicker = new Datepicker(elem, {
        // options here
  });
 </script>
  <script>
    const elem2 = document.querySelector('input[id="datepicker2"]');
    const datepicker2 = new Datepicker(elem2, {
          // options here
    });
  </script>
  <script>
    const elem3 = document.querySelector('input[id="datepicker3"]');
    const datepicker3 = new Datepicker(elem3, {
          // options here
    });
  </script>  
  <script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
  
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })  
    })
  </script>
</body>
</html>
