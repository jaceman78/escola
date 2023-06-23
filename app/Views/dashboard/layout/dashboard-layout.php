<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <base href="/"><!-- Configuração baseURl -->
  
    <!-- ADEL Tell the browser to be responsive to screen width -->
    <?= csrf_meta()?>

    <!-- Google Font: Thai Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css') ?>">
    
    <!-- overlayScrollbars -->
    <!-- apaguei o overlayScrollbars -->
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('css/adminlte.min.css') ?>">
     <!--<link rel="stylesheet" href="<?php /* echo base_url('css/rtl/adminlte.rtl.min.css') */ ?>"> --> 
	 
    <!-- SweetAlert2 Bootstrap or Dark -->
    <link rel="stylesheet" href="<?= base_url('css/sweetalert2-dark.min.css') ?>">
    <!-- DataTables -->
  	<link rel="stylesheet" href="<?= base_url('plugins/datatables/DataTables-1.11.3/css/dataTables.bootstrap5.min.css') ;?>">
	  <link rel="stylesheet" href="<?= base_url('plugins/datatables/Responsive-2.2.9/css/responsive.bootstrap5.min.css') ;?>"> 

    <link rel="stylesheet" href="<?= base_url('plugins/datatables/StateRestore-1.1.1/css/stateRestore.bootstrap5.min.css') ?>">
    <!-- Dark style -->
    <!--ADEL<link rel="stylesheet" href="<?php /* echo base_url('css/dark/adminlte-dark-addon.min.css')*/ ?>">  --> 
    
  


    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- jQuery -->
    
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

    
<title><?= (isset($title))?$title:'ESJB';?></title>
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
      <li class="nav-item d-none d-sm-inline-block">
        <a href="" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="" class="nav-link">Outro</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

        <!-- Menu utilizador -->
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="<?=session()->get("LoggedUserData")['profile_img'];  ?>" class="user-image img-circle elevation-2" alt="User Image">
          
          <span class="d-none d-md-inline"><?=session()->get("LoggedUserData")['name']?session()->get("LoggedUserData")['name']:"";  ?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
            <img src="<?=session()->get("LoggedUserData")['profile_img'];  ?>" class="img-circle elevation-2" alt="User Image">

            <p>
              <?=session()->get("LoggedUserData")['name']?session()->get("LoggedUserData")['name']:"";  ?>
              <small>Escola Secundária João de Barros</small>
            </p>
          </li>
          <!-- Menu Body -->
          <li class="user-body">
            <div class="row">
              <div class="col-4 text-center">
                <a href="#">Turmas</a>
              </div>
              <div class="col-4 text-center">
                <a href="#">Alunos</a>
              </div>
              <div class="col-4 text-center">
                <a href="#"><?=session()->get("LoggedUserData")['level'];  ?></a>
              </div>
            </div>
            <!-- /.row -->
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="#" class="btn btn-default btn-flat">Perfil</a>
            <a href="<?=base_url("login/logout")?>" class="btn btn-default btn-flat float-right">Sair</a>
          </li>
        </ul>
      </li>


      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
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
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
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
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
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
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
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
        <a class="nav-link" data-widget="fullscreen" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- INÍCIO DO MENU DE NAVEGAÇÃO -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ESJB</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=session()->get("LoggedUserData")['profile_img'];  ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?= route_to('user.profile');?>" class="d-block <?=(current_url()==base_url('user/profile')) ? 'active' : '';?>"><?=session()->get("LoggedUserData")['name']?session()->get("LoggedUserData")['name']:"";  ?></a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?= route_to('user.home');?>" class="nav-link <?=(current_url()==base_url('user/home')) ? 'active' : '';?> ">
                <i class="nav-icon fas fa-home"></i>
                <p>
                Home               
                </p>
              </a>
            </li>

              <!--------------------- MANUTENÇÃO----------------------------->
            <li class="nav-item has-treeview ">
             <a href="#" class="nav-link  ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Manutenção
                <i class="right fas fa-angle-left"></i>
              </p>
              </a>
              <ul class="nav nav-treeview">

                <!--Turmas-->
                <li class="nav-item has-treeview2">
                  <a href="#" class="nav-link "  >  
                        <i class="fas fa-minus nav-icon"></i>
                        <p>Turmas
                        <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>                   
                  
                  <ul class="nav nav-treeview" name="itemturmaprofissinal">
                      <li class="nav-item">
                        <a href="<?= route_to('turmas.homeprofissional');?>" class="nav-link <?=(current_url()==base_url('turma/homeprofissional')) ? 'active' : '';?> ">
                            <i style="padding-left:1em" class="fas fa-dot-circle nav-icon"></i>
                            <p style="padding-left:1em">Profissional</p>
                          </a>
                      </li>
                      <li class="nav-item">
                        <a href="<?= route_to('turmas.homeregular');?>" class="nav-link <?=(current_url()==base_url('turma/homeregular')) ? 'active' : '';?> ">
                          <i style="padding-left:1em"class="fas fa-dot-circle nav-icon"></i>
                          <p style="padding-left:1em" >Regular</p>
                        </a>
                      </li>
                  </ul>
                </li>

                <!--Disciplinas-->
                <li class="nav-item has-treeview2">
                  <a href="#" class="nav-link "  >
                      <i class="fas fa-minus nav-icon"></i>
                      <p>Diciplinas
                      <i class="right fas fa-angle-left"></i>
                      </p>
                  </a>  

                  <ul class="nav nav-treeview" name="itemprofissional">
                    <li class="nav-item">
                      <a href="<?= route_to('disciplinas.homeprofissional');?>" class="nav-link <?=(current_url()==base_url('disciplina/homeprofissional')) ? 'active' : '';?> ">
                          <i style="padding-left:1em" class="fas fa-dot-circle nav-icon"></i>
                          <p style="padding-left:1em">Profissional</p>
                        </a>
                    </li>

                    <li class="nav-item">
                      <a href="<?= route_to('disciplinas.homeregular');?>" class="nav-link <?=(current_url()==base_url('disciplina/homeregular')) ? 'active' : '';?> ">
                        <i style="padding-left:1em"class="fas fa-dot-circle nav-icon"></i>
                        <p style="padding-left:1em" >Regular</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="<?= route_to('disciplinas.home');?>" class="nav-link <?=(current_url()==base_url('disciplina/home')) ? 'active' : '';?> ">
                          <i style="padding-left:1em" class="fas fa-dot-circle nav-icon"></i>
                          <p style="padding-left:1em">Adicionar/alterar</p>
                        </a>
                    </li>
                  </ul>  
                </li>

                <!--Alunos-->
                <li class="nav-item has-treeview2 ">
                  <a href="#" class="nav-link "  >
                    <i class="fas fa-minus nav-icon"></i>
                    <p >Alunos 
                    <i class="right fas fa-angle-left"></i>
                  </p>
                  </a>  
                  <ul class="nav nav-treeview ">
                    <li class="nav-item">
                    <a href="<?= route_to('aluno.listagem');?>" class="nav-link <?=(current_url()==base_url('aluno.listagem')) ? 'active' : '';?> ">
                          <i style="padding-left:1em"class="fas fa-dot-circle nav-icon"></i>
                          <p style="padding-left:1em" >Listagem de alunos</p>
                        </a>
                      </li>
                      <li class="nav-item">
                      <a href="<?= route_to('aluno.inserir');?>" class="nav-link <?=(current_url()==base_url('aluno.inserir')) ? 'active' : '';?> ">
                          <i style="padding-left:1em" class="fas fa-dot-circle nav-icon"></i>
                          <p style="padding-left:1em">Inserir</p>
                        </a>
                      </li>
                  </ul>  
                </li>

                <!--Professores-->
    
                <li class="nav-item has-treeview2">
                  <a href="#" class="nav-link "  >
                      <i class="fas fa-minus nav-icon"></i>
                      <p>Professores
                      <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>  
                  <ul class="nav nav-treeview ">
                    <li class="nav-item">
                      <a href="<?= route_to('user.home');?>" class="nav-link">
                          <i style="padding-left:1em"class="fas fa-dot-circle nav-icon"></i>
                          <p style="padding-left:1em" >Listagem</p>
                          </a>
                    </li>
                      <li class="nav-item">
                        <a href="" class="nav-link">
                          <i style="padding-left:1em" class="fas fa-dot-circle nav-icon"></i>
                          <p style="padding-left:1em">xxxx</p>
                        </a>
                    </li>
                  </ul>  
                </li>

                <!--Templates email-->
                <li class="nav-item">
                  <a href="<?php echo site_url(); ?>/manage-emailtemplate" class="nav-link">
                    <i class="fas fa-minus nav-icon"></i>
                    <p>Templates de Email</p>                  
                  </a>
                </li>
                <!--Anos letivos-->
                <li class="nav-item">
                  <a href="<?= route_to('anoletivo.home');?>" class="nav-link <?=(current_url()==base_url('anoletivo/home')) ? 'active' : '';?> ">
                    <i class="fas fa-minus nav-icon"></i>
                    <p>Anos letivos</p>                  
                  </a>
                </li>
              </ul>
            </li>
         <!---------------------------- Minhas Turmas------------------------------------->
         <li class="nav-item has-treeview2  ">
              <a href="#" class="nav-link  ">
              <i class="nav-icon fas fa-users-rectangle"></i>
              <p>
              Minhas Turmas
                <i class="right fas fa-angle-left"></i>
              </p>
              </a>
              <ul class="nav nav-treeview ">
                <li class="nav-item has-treeview">

                
                
                    <li class="nav-item">
                      <a href="<?php echo site_url(); ?>/contatar-aluno" class="nav-link">
                        <i style="padding-left:1em" class="far fa-dot-circle nav-icon"></i>
                        <p style="padding-left:1em" >Regular</p>
                      </a>
                    </li>
  
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i style="padding-left:1em" class="far fa-dot-circle nav-icon"></i>
                        <p style="padding-left:1em">Profissional</p>
                      </a>
                    </li>
                  


                </li>
              </ul>
            </li>

              <!---------------------------- COMUNICAÇÕES------------------------------------->
            <li class="nav-item has-treeview2  ">
              <a href="#" class="nav-link  ">
              <i class="nav-icon fas fad fa-address-book"></i>
              <p>
                Comunicações
                <i class="right fas fa-angle-left"></i>
              </p>
              </a>
              <ul class="nav nav-treeview ">
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Alunos
                    <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                
                  <ul class="nav nav-treeview ">
                    <li class="nav-item">
                      <a href="<?php echo site_url(); ?>/contatar-aluno" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Email</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>WhatsApp 3</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>SMS 3</p>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
              <!---------------------------- ------------------------------------->


            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- FIM DO MENU DE NAVEGAÇÃO -->





  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= (isset($pageTitle))?$pageTitle:'Document';?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=route_to("user.home");?>">Home</a></li>
              <li class="breadcrumb-item active"><?= (isset($title))?$title:'Document';?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        


      <?= $this->renderSection('content');?>


      

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
      <h5>Title 465</h5>
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
    <strong>Copyright &copy; 2023 <a href="<?=base_url();?>">AEJB</a>.</strong> Todos direitos reservados.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->


    <!-- Global Script ADEL globalscript.php- -->
    <?= $this->include('dashboard/layout/globalscript') ?>
    <!--/Global Script -->

    <!-- PageScript ADEL-->
    <?= $this->renderSection("pageScript") ?>
    <!-- /PageScript-->



  <script type="text/javascript">


  const url = window.location;
  /*remove all active and menu open classes(collapse)*/
  $('ul.nav-sidebar a').removeClass('active').parent().siblings().removeClass('menu-open');
    /*find active element add active class ,if it is inside treeview element, expand its elements and select treeview*/
    
  $('ul.nav-sidebar a').filter(function () {
    return this.href == url;
   }).addClass('active').closest(".has-treeview").addClass('menu-open').find("> a").addClass('active');

  $('ul.nav-sidebar a').filter(function () {
    return this.href == url;
  }).addClass('active').closest(".has-treeview2").addClass('menu-open').addClass('menu-open').find("> a").addClass('active');

  $('ul.nav-sidebar a').filter(function () {
    return this.href == url;
  }).addClass('active').closest(".has-treeview3").addClass('menu-open').addClass('menu-open').find("> a").addClass('active');





</script>

<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="<?= base_url('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') ?>">

<script src="<?= base_url('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') ?>"></script>

</body>
</html>