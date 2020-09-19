<?php
	include('../Funciones.php');
	  
	include(Conexion());
?>
<div class="float:left">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="text-align: left;">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>

    <?php
	$tb_problemas=mysqli_query($conexion,"select *from tb_problemas") or
  die("Problemas en el select:".mysqli_error($conexion));
    ?>
	<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              	<div class="card-header">
                	<h3 class="card-title">Problemas registrados</h3>
              	</div>
              	<!-- /.card-header -->
              	<div class="card-body">
	                <table id="example2" class="table table-bordered table-striped projects">
	                  	<thead>
  		                  <tr>
  		                  	<th>Proyecto</th>
  		                    <th>Nombre del problema</th>
  		                    <th>Descripción</th>
  		                    <th>Soporte L2</th>
  		                    <th>Proridad</th>
  		                    <th>Estatus</th><!--registrado, en progreso, cerrado-->
  		                    <th>Acciones</th><!--registrado, en progreso, cerrado-->
  		                  </tr>
	                  	</thead>
	                  	<tbody>
	                  		<?php
	                		while ($reg=mysqli_fetch_array($tb_problemas))
	                		{?>
			                  	<tr>
			                    	<td><?php echo ObtenerNombredelProyecto($reg['id_proyecto'])?></td>
			                    	<td><?php echo $reg['NombredelProblema'];?></td>
			                    	<td><?php echo $reg['Descripcion'];?></td>
			                    	<td><?php echo ObtenerNombredeUsuario($reg['SoporteL2']);?></td>
			                    	<td><?php echo ObtenerestatusPrioridad($reg['Prioridad']);?></td>
			                    	<td><?php echo ObtenerestatusProblem($reg['Estatus']);?></td>
                            <td class="project-actions text-right">
                              <div class="btn-group">                                                        
                                <button class="btn btn-primary btn-sm" href="#">
                                  <i class="fas fa-eye">
                                  </i>  
                                  Detalle                              
                                </button>
                                <button class="btn btn-info btn-sm"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>                              
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
    </section>
    <!-- /.content -->
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
<!-- ./wrapper -->
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
</div> 
<script>
  $(function () {
    $("#example2").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>
