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
  <link rel="icon" href="../img/logo.png"/>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset("/bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css") }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("/bower_components/admin-lte/dist/css/adminlte.min.css") }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset("/bower_components/admin-lte/plugins/select2/css/select2.min.css") }}">
  <link rel="stylesheet" href="{{ asset("/bower_components/admin-lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css") }}" >
<style>
  /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* Firefox */
    input[type=number] {
      -moz-appearance: textfield;
    }
  </style>
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
       <strong>{{Auth::user()->name}}</strong>
       <a class="nav-item btn btn-danger" href="{{ route('logout')}}"
       onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
          <span class="caret">&nbsp; </span><i class="fas fa-sign-out-alt"></i> <b>Logout</b>
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
    <div class="container">
    <a href="index3.html" class="brand-link ">
      <img src="../img/logo_title_right_bg.png" alt="Logo Toko" class="img"
           style=" width: 100%">
           
    </a>
  </div>
    <!-- Sidebar -->
    <div class="sidebar" >
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-1 mb-0 text-center">
        <div class="info center">
          <h6 class="text-light">Managemen Transaksi Toko</h6>
          <h5 class="text-light"><b>Kasir Panel</b></h5>
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
          <a {{ $module == "Dashboard" ? 'id=active' : ''}}  href="/dashboard-kasir" class=nav-link>
              <i class="nav-icon fas fa-th"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a {{ $module == "transaksi" ? 'id=active' : ''}} href="/transaksi-kasir" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>Data Transaksi</p>
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
          <div class="col-sm-12">
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
<script src="{{ asset("/bower_components/admin-lte/plugins/select2/js/select2.full.min.js" )}}"></script>
<script>
    $('#modal-sm').on('show.bs.modal', function(e) {
        var qty = $(e.relatedTarget).data('book-id');
        var id = $(e.relatedTarget).data('id');
        $(e.currentTarget).find('input[name="qty"]').val(qty);
        $(e.currentTarget).find('input[name="id"]').val(id);
    });

    
  
    $(function() {
      var alert = $('div.alert[auto-close]');
      alert.each(function() {
        var that = $(this);
        var time_period = that.attr('auto-close');
        setTimeout(function() {
          that.alert('close');
        }, time_period);
      });
    });

</script>
<script>
  $(function () {    
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })  
  })
</script>
</body>
</html>
