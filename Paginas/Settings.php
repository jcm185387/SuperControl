<?php
session_start();
if (!$_SESSION['idUserLogueado'])
{
	header('Location: index.php');
}
	else
	{

		
		include('..\Funciones.php');
			  
		include(Conexion());
		$idUserLogueadoSettings = $_SESSION['idUserLogueado'];
		$SettingsUser=mysqli_query($conexion,"select *from tb_users where id_rol='$idUserLogueadoSettings'") or die("Problemas en el select:".mysqli_error($conexion));
		if ($reg_Settings=mysqli_fetch_array($SettingsUser)) 
	 	{
			?>

			<div class="wrapper">

			  	<!-- Content Wrapper. Contains page content -->
			  	<div class="content-wrapper">
				    <!-- Content Header (Page header) -->
				    <section class="content-header">
				      	<div class="container-fluid">
					        <div class="row mb-2">
					          <div class="col-sm-6">
					            <h1>Perfil</h1>
					          </div>
					          <div class="col-sm-6">
					            <ol class="breadcrumb float-sm-right">
					              <li class="breadcrumb-item"><a href="Dashboard.php">Inicio</a></li>
					              <li class="breadcrumb-item active">Perfil</li>
					            </ol>
					          </div>
					        </div>
				      	</div><!-- /.container-fluid -->
				    </section>

				    <!-- Main content -->
				    <section class="content">
				      	<div class="container-fluid">
					        <div class="row">
					          	<div class="col-md-3">

						            <!-- Profile Image -->
						            <div class="card card-primary card-outline">
						              <div class="card-body box-profile">
						                <div class="text-center">
						                  <img class="profile-user-img img-fluid img-circle"
						                       src="<?php echo ObtenerImagendePerfilUsuario($reg_Settings['id_user']); ?>"
						                       alt="User profile picture">
						                </div>
						                <h3 class="profile-username text-center"><?php echo ObtenerNombredeUsuario($reg_Settings['id_user']); ?></h3>

						                <p class="text-muted text-center"><?php echo ObtenerelNombredelRol($reg_Settings['id_user']); ?></p>
						                <div class="form-group row">
								            <label for="inputEmail" class="col-sm-4 col-form-label">Cambiar Foto</label>
					                        <div class="col-sm-8">
					                        	
											  	<div class="input-group mb-3">  
												    <!--<input type="text" class="form-control" id="inputBitacora" placeholder="Agrega algo nuevo a la bitácora">-->
												    <input type="file" class="form-control" id="imgPerfil">
												    <div class="input-group-append">
												      <button class="border-0 btn-transition btn btn-outline-success" id="addItemBitacora"> <i class="fa fa-check"></i></button>
												      <button class="border-0 btn-transition btn btn-outline-danger"> <i class="fas fa-eraser"></i> </button> 

												    </div>
												</div>
					                        </div>
				                      	</div>
						                <ul class="list-group list-group-unbordered mb-3">
						                  <li class="list-group-item">
						                    <b>Followers</b> <a class="float-right">1,322</a>
						                  </li>
						                  <li class="list-group-item">
						                    <b>Following</b> <a class="float-right">543</a>
						                  </li>
						                  <li class="list-group-item">
						                    <b>Friends</b> <a class="float-right">13,287</a>
						                  </li>
						                </ul>

						              </div>
						              <!-- /.card-body -->
						            </div>
						            <!-- /.card -->

						            <!-- About Me Box -->
						            <div class="card card-primary">
						              <div class="card-header">
						                <h3 class="card-title">Acerca de mí</h3>
						              </div>
						              <!-- /.card-header -->
						              <div class="card-body">
						                <strong><i class="fas fa-book mr-1"></i> Education</strong>

						                <p class="text-muted">
						                  B.S. in Computer Science from the University of Tennessee at Knoxville
						                </p>

						                <hr>

						                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

						                <p class="text-muted">Malibu, California</p>

						                <hr>

						                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

						                <p class="text-muted">
						                  <span class="tag tag-danger">UI Design</span>
						                  <span class="tag tag-success">Coding</span>
						                  <span class="tag tag-info">Javascript</span>
						                  <span class="tag tag-warning">PHP</span>
						                  <span class="tag tag-primary">Node.js</span>
						                </p>

						                <hr>

						                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

						                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
						              </div>
						              <!-- /.card-body -->
						            </div>
						            <!-- /.card -->
					          	</div>
					          	<!-- /.col -->

					          	<div class="col-md-9">
					          		<div class="card">
						              	<div class="card-header p-2">
						              		Configuración
						              	</div>
					       				<div class="card-body">
						                	<div class="tab-content">
							                    <form class="form-horizontal">
							                      	<div class="form-group row">
								                        <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
								                        <div class="col-sm-10">
								                          <input type="email" class="form-control" value="<?php echo $reg_Settings['Nombre']; ?>" id="inputName" placeholder="Name">
								                        </div>
								                    </div>
							                      	<div class="form-group row">
								                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
								                        <div class="col-sm-10">
								                          <input type="email" class="form-control" value="<?php echo $reg_Settings['Email']; ?>" id="inputEmail" placeholder="Email">
								                        </div>
							                      	</div>
							                      	<div class="form-group row">
								                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
								                        <div class="col-sm-10">
								                          <input type="text" class="form-control" id="inputName2" placeholder="Name">
								                        </div>
							                      	</div>
							                      	<div class="form-group row">
								                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
								                        <div class="col-sm-10">
								                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
								                        </div>
							                      	</div>
							                      	<div class="form-group row">
								                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
								                        <div class="col-sm-10">
								                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
								                        </div>
							                      	</div>
							                      	<div class="form-group row">
								                        <div class="offset-sm-2 col-sm-10">
								                          <button type="submit" class="btn btn-primary">Guardar</button>
								                        </div>
							                      	</div>
							                      	<div class="form-group row">
								                        <div class="offset-sm-2 col-sm-10">
								                          <span class="text-info">Modificar Contraseña</span>
								                        </div>
							                      	</div>
							                      	<div class="form-group row">
								                        <label for="inputSkills" class="col-sm-2 col-form-label">Contraseña actual</label>
								                        <div class="col-sm-10">
								                          <input type="password" class="form-control" id="inputSkills" placeholder="Contraseña actual">
								                        </div>
							                      	</div>
							                      	<div class="form-group row">
								                        <label for="inputSkills" class="col-sm-2 col-form-label">Nueva Contraseña</label>
								                        <div class="col-sm-10">
								                          <input type="password" class="form-control" id="inputSkills" placeholder="Nueva contraseña">
								                        </div>
							                      	</div>
							                      	<div class="form-group row">
								                        <label for="inputSkills" class="col-sm-2 col-form-label">Confirma contraseña</label>
								                        <div class="col-sm-10">
								                          <input type="password" class="form-control" id="inputSkills" placeholder="confirmar Nueva contraseña">
								                        </div>
							                      	</div>
							                      	<div class="form-group row">
								                        <div class="offset-sm-2 col-sm-10">
								                          <button type="submit" class="btn btn-primary">Guardar Contraseña</button>
								                        </div>
							                      	</div>
							                    </form>
						                	</div>
						                </div>
					          		</div>
					          	</div>
					          	
					        </div>
					          <!-- /.col -->

					    </div>
					        <!-- /.row -->
				    </section>
				    <!-- /.content -->
				</div>
				<!-- /.content-wrapper -->
			</div>
			<!-- ./wrapper -->
			<script>
				$(document).ready(function(){		  
				});
			</script>
			<?php
		}
	}
?>