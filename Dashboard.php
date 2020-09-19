<?php
	session_start();
	if (!$_SESSION['idUserLogueado'])
	{
		header('Location: index.php');
	}
	else
	{
		include('Funciones.php');
	  
		include(Conexion());
		$NombredelUsuarioLogueado = ObtenerNombredeUsuario($_SESSION['idUserLogueado']);
		$usuarioLogueado = $_SESSION['idUserLogueado'];

		?>
		<!DOCTYPE html>
		<html>
			<head>
				<input type="" id="idUserLogueado" value="<?php echo $_SESSION['idUserLogueado']; ?>" name="">
			  	<meta charset="utf-8">
			  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
			  	<title>SuperControl | Dashboard</title>
			  	<!-- Tell the browser to be responsive to screen width -->
			  	<meta name="viewport" content="width=device-width, initial-scale=1">
			  	<!-- Font Awesome -->
			  	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
			  	<!-- Ionicons -->
			  	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
			  	<!-- Tempusdominus Bbootstrap 4 -->
			  	<link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
			  	<!-- iCheck -->
			  	<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
			  	<!-- JQVMap -->
			  	<link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
			  	<!-- Theme style -->
			  	<link rel="stylesheet" href="dist/css/adminlte.min.css">
			  	<!-- overlayScrollbars -->
			  	<link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
			  	<!-- Daterange picker -->
			  	<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
			  	<!-- summernote -->
			  	<link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
			  	<!-- Google Font: Source Sans Pro -->
			 	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
			  	<meta name="viewport" content="width=device-width, initial-scale=1">

			  	<!-- Font Awesome -->
			  	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
			  	<!-- Ionicons -->
			  	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
			  	<!-- DataTables -->
			  	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
			  	<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
			  	<link rel="stylesheet" href="css/style.css">
			  	  <!-- Toastr -->
  				<link rel="stylesheet" href="plugins/toastr/toastr.min.css">
			  	

				<!-- jQuery -->
				<script src="plugins/jquery/jquery.min.js"></script>
				<!-- Bootstrap 4 -->
				
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

				<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
				<!-- DataTables -->
				<script src="plugins/datatables/jquery.dataTables.min.js"></script>
				<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
				<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
				<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
				<!-- AdminLTE App -->
				<script src="/SuperControl/dist/js/adminlte.min.js"></script>
				<!-- AdminLTE for demo purposes -->
				<script src="dist/js/demo.js"></script>
				<!-- SweetAlert2 -->
				<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
				<!-- Toastr -->
				<script src="plugins/toastr/toastr.min.js"></script>
			</head>
			<body class="hold-transition sidebar-mini layout-fixed">

				<div class="wrapper" >

				  	<!-- Navbar -->
				  	<nav class="main-header navbar navbar-expand navbar-white navbar-light">
						<!-- Left navbar links -->
						<ul class="navbar-nav">
						  	<li class="nav-item">
								<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
						  	</li>
						  	<li class="nav-item d-none d-sm-inline-block">
								<a href="Dashboard.php" class="nav-link">Inicio</a>
						  	</li>
						</ul>

						<!-- SEARCH FORM -->
						<!-- Right navbar links -->
						<ul class="navbar-nav ml-auto">
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
								  	<span class="dropdown-item dropdown-header">15 Notifications</span>
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
								<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
							  		<i class="fas fa-th-large"></i>
								</a>
						  	</li>
						</ul>
				  	</nav>
				  	<!-- /.navbar -->

				  	<!-- Main Sidebar Container -->
				  	<aside class="main-sidebar sidebar-dark-primary elevation-4">
						<!-- Brand Logo -->
						<a href="Dashboard.php" class="brand-link">
						  	<!--<img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
							   style="opacity: .8">-->
							<img src="dist/img/SCLogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
							   style="opacity: .8">
						  	<small>
						  		<span class="badge badge-primary brand-text font-weight-light"><?php echo ObtenerelNombredelRol($_SESSION['idUserLogueado']); ?></span>
						  	</small>
						</a>

						<!-- Sidebar -->
						<div class="sidebar">
						  <!-- Sidebar user panel (optional) -->
						  	<div class="user-panel mt-3 pb-3 mb-3 d-flex">
								<div class="image">
								  <img src="<?php echo ObtenerImagendePerfilUsuario($_SESSION['idUserLogueado']); ?>" class="img-circle elevation-2" alt="User Image">
								</div>
								<div class="info">
								  <a href="#" class="d-block"><?php echo $NombredelUsuarioLogueado; ?></a>
								</div>
						  	</div>
						  	<div class="user-panel mt-3 pb-3 mb-3 d-flex">
								<div class="image">
								  <strong style="font-family: monospace;color: white;font-size: 20px">Super Control</strong>
								</div>
						  	</div>

						  	<!-- Sidebar Menu -->
						  	<nav class="mt-2">
								<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
							  	<li class="nav-item">
									<a href="Dashboard.php" class="nav-link">
									  <!--<i class="nav-icon fas fa-th"></i>-->
									  <i class="nav-icon fas fa-house-user"></i>
									  <p>
										Inicio
									  </p>
									</a>
								</li>
							  	<li class="nav-item">
									<a class="nav-link LinkProyectos">
									  <i class="nav-icon fas fa-project-diagram"></i>
										  <p>
											Proyectos	
										  </p>
									</a>
							  	</li>
							  	<li class="nav-item">
									<a class="nav-link LinkProblemas">
									  <i class="nav-icon fas fa-folder"></i>
									  <p>
										Problemas
									  </p>
									</a>
								</li>
							  	<li class="nav-item">
									<a class="nav-link LinkChangeOrders">
									  <i class="nav-icon fas fa-folder"></i>
									  <p>
										Change Orders
									  </p>
									</a>
							  	</li>
							  	<li class="nav-item">
									<a href="pages/gallery.html" class="nav-link">
									  <i class="nav-icon fas fa-headset"></i>
									  <p>
										Tickets
									  </p>
									</a>
							  	</li>
							  	<li class="nav-item">
									<a class="nav-link LinkDirectorio">
									  <i class="nav-icon fas fa-address-book"></i>
									  <p>
										Directorio
									  </p>
									</a>
							  	</li>
							  	<li class="nav-item">
									<a class="nav-link LinktoDoList">
									  <i class="nav-icon fas fa-clipboard-list"></i>
									  <p>
										ToDo List
									  </p>
									</a>
							  	</li>
							  	<li class="nav-item">
									<a class="nav-link LinkSettings">
									  <i class="nav-icon fas fa-cog"></i>
									  <p>
										Perfil
									  </p>
									</a>
							  	</li>
							  	<li class="nav-item">
									<a href="session/logout.php" class="nav-link">
									  <i class="nav-icon fas fa-sign-out-alt"></i>
									  <p>
										Cerrar Sesión
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
				  	<div id="ContenidoPrincipal">
				  		
				  	</div>
				 	<div class="content-wrapper" >

						<!-- Main content -->
						<section class="content" id="dashboardContent">
						  	<div class="container-fluid" >
								<!-- Small boxes (Stat box) -->
								<div class="row">
									
							  		<div class="col-lg-3 col-6">
									<!-- small box -->
										<div class="small-box bg-info">
										  	<div class="inner">
												<h3><?php echo CuentalosProyectos(); ?></h3>
											
												<p>Proyectos</p>
										  	</div>
										  	<div class="icon">
												<i class="ion ion-bag"></i>
										  	</div>
										  	<a href="#" class="small-box-footer LinkProyectos">Cosulta el detalle <i class="fas fa-arrow-circle-right"></i></a>
										</div>
									</div>
							  		<!-- ./col -->
									<div class="col-lg-3 col-6">
										<!-- small box -->
										<div class="small-box bg-success">
										  	<div class="inner">
												<h3><?php echo CuentalosProblemas(); ?></h3>

												<p>Problemas</p>
										  	</div>
										  	<div class="icon">
												<i class="ion ion-stats-bars"></i>
										  	</div>
										  	<a href="#" class="small-box-footer LinkProblemas">Consulta el detalle <i class="fas fa-arrow-circle-right"></i></a>
										</div>
									</div>
								  	<!-- ./col -->
								  	<div class="col-lg-3 col-6">
										<!-- small box -->
										<div class="small-box bg-warning LinkChangeOrders">
									  		<div class="inner">
												<h3><?php echo CuentaloCHOs(); ?></h3>
												<p>Change Orders</p>
									  		</div>
									  		<div class="icon">
												<i class="ion ion-person-add"></i>
									  		</div>
									  		<a href="#" class="small-box-footer">Consulta el detalle<i class="fas fa-arrow-circle-right"></i></a>
										</div>
								  	</div>
								  	<!-- ./col -->
								  	<div class="col-lg-3 col-6">
										<!-- small box -->
										<div class="small-box bg-danger">
									  		<div class="inner">
												<h3>65</h3>
												<p>Tickets</p>
											</div>
									  		<div class="icon">
												<i class="ion ion-pie-graph"></i>
									  		</div>
									  		<a href="#" class="small-box-footer">Consulta el detalle <i class="fas fa-arrow-circle-right"></i></a>
										</div>
								  	</div>
							  		<!-- ./col -->
								</div>
								<!-- /.row -->
								<!-- Main row -->
								<div class="row">
								  <!-- Left col -->
								  	<section class="col-lg-7 connectedSortable">										
										<!-- TO DO List -->
										<div class="card">
										  <div class="card-header">
											<h3 class="card-title">
											  <i class="ion ion-clipboard mr-1"></i>
											  To Do List
											</h3>
											<?php
												$tb_ToDoList=mysqli_query($conexion,"select *from tb_ToDoList where  CreadoPor = '$usuarioLogueado' order by estatus asc") or
      die("Problemas en el select:".mysqli_error($conexion));
											?>
										  </div>
										  <!-- /.card-header -->
										  <div class="card-body">
											<ul class="todo-list" data-widget="todo-list">
							                    <?php
							                    while ($regTodo=mysqli_fetch_array($tb_ToDoList))
							                    {?>
							                      <li>
							                        <!-- drag handle -->
							                        <span class="handle">
							                          <i class="fas fa-ellipsis-v"></i>
							                          <i class="fas fa-ellipsis-v"></i>
							                        </span>
							                        <!-- checkbox -->
							                        <?php
							                        if ($regTodo['estatus'] == true) {//está completado
							                          ?>
							                          <div  class="icheck d-inline ml-2">
							                              <input type="checkbox" value="<?php echo $regTodo['id_Todo'];?>" disabled data-toggle="tooltip" data-placement="top" title="Marcar como incompleto" class="undoneTask" checked  id="todoCheck1">
							                          </div>
							                          <?php
							                        }else{?>
							                          <div  class="icheck d-inline ml-2">
							                              <input type="checkbox" value="<?php echo $regTodo['id_Todo'];?>" disabled data-toggle="tooltip" data-placement="top" title="Marcar como completo" class="doneTask"   id="todoCheck1">
							                          </div>
							                          <?php
							                        }
							                        ?>

							                        <!-- todo text -->
							                        <span class="badge badge-<?php if ($regTodo['estatus'] == true){ echo "success"; }; ?>"><?php echo $regTodo['item']; ?></span>
							                        <!-- Emphasis label -->
							                        <small class="badge badge-danger"><i class="far fa-clock"></i> 2 mins</small>
							                      </li>
							                      <?php
							                    }
							                    ?>							               
											</ul>
										  </div>
										  <!-- /.card-body -->
										  <div class="card-footer clearfix">
											<button type="button" class="btn btn-sm btn-info float-right LinktoDoList"></i> Ir al ToDo List</button>
										  </div>
										</div>
										<!-- /.card -->
									</section>									
								</div>
							
							<!-- /.row (main row) -->
						  	</div><!-- /.container-fluid -->
						</section>
						<!-- /.content -->
				  	</div>

				  	<!-- /.content-wrapper -->
				  	<footer class="main-footer">
						<strong>Copyright &copy; 2020 <a href="http://adminlte.io">INOVATEKA - MG Soluciones Informáticas</a>.</strong>
						All rights reserved.
						<div class="float-right d-none d-sm-inline-block">
					  		<b>Version</b> 1
						</div>
				 	</footer>

				  	<!-- Control Sidebar -->
				  	<aside class="control-sidebar control-sidebar-dark">
					<!-- Control sidebar content goes here -->
				  	</aside>
				  <!-- /.control-sidebar -->
				</div>
				<!-- ./wrapper -->

				<!-- jQuery -->
				<script src="plugins/jquery/jquery.min.js"></script>
				<!-- jQuery UI 1.11.4 -->
				<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
				<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
				<script>
				  $.widget.bridge('uibutton', $.ui.button)
				</script>
				<!-- ChartJS -->
				<script src="plugins/chart.js/Chart.min.js"></script>
				<!-- Sparkline -->
				<script src="plugins/sparklines/sparkline.js"></script>
				<!-- JQVMap -->
				<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
				<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
				<!-- jQuery Knob Chart -->
				<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
				<!-- daterangepicker -->
				<script src="plugins/moment/moment.min.js"></script>
				<script src="plugins/daterangepicker/daterangepicker.js"></script>
				<!-- Tempusdominus Bootstrap 4 -->
				<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
				<!-- Summernote -->
				<script src="plugins/summernote/summernote-bs4.min.js"></script>
				<!-- overlayScrollbars -->
				<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
				<!-- AdminLTE App -->
				<script src="dist/js/pages/dashboard.js"></script>
				<!-- AdminLTE for demo purposes -->
				<script src="dist/js/demo.js"></script>
				<script src="js/Script.js"></script>
				<!-- AdminLTE App -->
				<script src="dist/js/adminlte.min.js"></script>
			</body>
		</html>
	<?php
	}
	?>