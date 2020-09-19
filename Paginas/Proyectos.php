<?php

session_start();
if (!$_SESSION['idUserLogueado'])
{
  header('Location: index.php');
}
  else
  {
  	include('../Funciones.php');
  	  
  	include(Conexion());
    $usuarioLogueado = $_SESSION['idUserLogueado']; 
    ?>
    <div class="float:left">
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="text-align: left;">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <?php
        ///echo ObtenerelCodigodelRol($_SESSION['idUserLogueado']);
        //echo $usuarioLogueado;
        
        if(ObtenerelCodigodelRol($usuarioLogueado) == 'ADMPLAT')
        {
          
          $tb_proyectos=mysqli_query($conexion,"select *from tb_proyectos") or
          die("Problemas en el select:".mysqli_error($conexion));
          //si es un adminplat, trae todos los proyectos
          
        }else{// de lo contrario, solo traerá los proyectos donde está involucrado, por una razón cree 2 tablas con el mismo propósito, si más adelante tengo problemas, hay que ver porqué en su momento lo hice así. tb_relproyectousuario | tb_equiposproyecto
          //$tb_relproyectousuario=mysqli_query($conexion,"select *from tb_relproyectousuario where  id_user = $usuarioLogueado") or
          $tb_relproyectousuario=mysqli_query($conexion,"select *from tb_equiposproyecto where  id_user = $usuarioLogueado") or
          die("Problemas en el select:".mysqli_error($conexion));
          //echo var_dump($tb_proyectos);
          $List_IdProyectos = array();
          while ($reg_rel=mysqli_fetch_array($tb_relproyectousuario))
          {        
            array_push($List_IdProyectos, $reg_rel['id_proyecto']); 
          }
          $separado_por_comas = implode(",", $List_IdProyectos);
          //echo $separado_por_comas;

          $tb_proyectos=mysqli_query($conexion,"select *from tb_proyectos where id_proyecto in ($separado_por_comas)") or
          die("Problemas en el select:".mysqli_error($conexion));
        }
                
        ?>
    	 <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <?php /*echo ObtenerelCodigodelRol($_SESSION['idUserLogueado'])
                */
              ?>
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">ToDo List</h5>

                    <p class="card-text">
                      <span>En esta sección debemos definir que solo un Encargado de Plataforma puede realizar modificaciones o eliminar nombres de proyectos.</span>
                      <span>Si el logueado es un encargado de plataforma cargará todos los Proyectos, en dado contrario, cargará solo los proyectos donde esté incluido el usuario logueado</span>
                    </p>
                    <div class="col-12">
                      <div class="pull-right" style="float: right;">
                        <strong>Nuevo Proyecto</strong>
                        <button class="btn  btn-primary" id="AddProject">+ <i class="fas fa-folder"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  	<div class="card-header">
                    	<h3 class="card-title">Proyectos Oxxo</h3>
                  	</div>
                  	<!-- /.card-header -->
                  	<div class="card-body">
    	                <table id="example1" class="table table-bordered table-striped projects">
    	                  	<thead>
      		                  <tr>
      		                    <th>Nombre del Proyecto</th>
                              <th>Descripción</th>
      		                    <th>Miembros del Equipo</th>
      		                    <th>Acciones</th>
      		                  </tr>
    	                  	</thead>
    	                  	<tbody>
    	                  		<?php
                            //print_r($tb_proyectos);
      	                		while ($reg=mysqli_fetch_array($tb_proyectos))
      	                		{?>
    			                  	<tr>
    			                    	<td>
                                  <?php echo $reg['NombredelProyecto'];?>
                                  <br/>
                                  <small>
                                    Creado: <?php echo $reg['FechadeCreacion'];?>
                                  </small>    
                                </td>
    			                    	<td><?php echo $reg['Descripcion'];?></td>
                                <td>
                                  <?php //obtener mediante el id del proyecto, los usuarios
                                    $id_proyecto = $reg['id_proyecto'];
                                    $Team=mysqli_query($conexion,"select *from tb_equiposproyecto where id_proyecto = $id_proyecto") or
                                    die("Problemas en el select:".mysqli_error($conexion));?>
                                  
                                  <ul class="list-inline">
                                    <?php
                                    while ($reg_team=mysqli_fetch_array($Team))
                                    {
                                      ?>
                                      <li class="list-inline-item">
                                        <img alt="Avatar" class="table-avatar" src="<?php echo ObtenerImagendePerfilUsuario($reg_team['id_user']); ?>">
                                      </li>
                                      <?php
                                    }
                                    ?>
                                  </ul>    
                                </td>                             
    			                	    <td class="project-actions text-right">
                                  <div class="btn-group">
                                    <button class="btn btn-primary btn-sm Btnverdetalledelproyecto" value="<?php echo $reg['id_proyecto']?>" href="#">
                                      <i class="fas fa-eye">
                                      </i>
                                      Ver detalle
                                    </button>
                                    <?php
                                      if(ObtenerelCodigodelRol($_SESSION['idUserLogueado'] == 'ADMPLAT')){                                        
                                      ?>
    		                      		      <button class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Editar</button>
    		                      		      <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Eliminar</button>		                    			
                                      <?php
                                      }
                                    ?>
                                  </div> 
    			                	    </td>
    			                	</tr>	
    			                <?php
    			                }
    			                ?>                  
    		            	 </tbody>
    	                </table>
                  	</div>
                  	<!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->

          <!-- The Modal -->
          <div class="modal fade" id="modalProyecto">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
              
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Detalle del Proyectos</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                  <div id="ProyectoContent"></div>
                  
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                
              </div>
            </div>
          </div>
        </section>
        <!-- /.content -->
          <!-- The Modal -->
        <div class="modal" id="AddProjectModal">
          <div class="modal-dialog  modal-xl">
            <div class="modal-content">
            
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Nuevo Proyecto</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              
              <!-- Modal body -->
              <div class="modal-body">
                <div id="containerNuevoProyecto">
                  
                </div>
              </div>
              
            </div>
          </div>
        </div>

      </div>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
      <!-- ./wrapper -->
    </div> 
    <!-- DataTables -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable({
          "responsive": true,
          "autoWidth": false,
        });

        $(".Btnverdetalledelproyecto").click(function(){         
          ProyectoReload($(this).val());
          $("#modalProyecto").modal(); 
        });

        $("#AddProject").click(function(){
          $.get('Proyectos/NuevoProyecto.php',
          {},
          function(data)
          {   
            $("#containerNuevoProyecto").html(data);
            $("#AddProjectModal").modal(); 
          });
          
        });

        function ProyectoReload(idProyecto){
          $.get('Proyectos/ProyectoContent.php',
          {id_proyecto:idProyecto},
          function(data)
          {   
            $("#ProyectoContent").html(data);

          });
        }

      });
    </script>
    <?php
  }
  ?>

