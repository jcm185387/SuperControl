            <!-- Toastr -->
<link rel="stylesheet" href="plugins/toastr/toastr.min.css">
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
	$tb_problemas=mysqli_query($conexion,"select *from tb_changeOrders") or
  die("Problemas en el select:".mysqli_error($conexion));
    ?>
	<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              	<div class="card-header">
                	<h3 class="card-title" style="float: left;">Change Orders</h3>
                  <!--<button class="success btn btn-success">Success</button>-->
              	</div>
              	<!-- /.card-header -->
              	<div class="card-body">
                  <br>
                  <h3 class="card-title" style="float: right;">
                    <button class="btn btn-primary btn-sm">Agregar Nuevo Cho</button>
                  </h3>
                  <div class="table-responsive">
                    <!--<br><table id="mytable" class="table table-striped table-bordered  nowrap dataTable dtr-inline collapsed" cellspacing="0" width="100%" style="display: table; width: 100%;" role="grid" aria-describedby="mytable_info">-->

  	                <table id="example2" class="table table-bordered table-striped projects table-responsive">
  	                  	<thead>
    		                  <tr>
    		                  	<th>Plataforma</th>
    		                    <th>L2</th>
    		                    <th>Prioridad</th>
    		                    <th>Problem</th>
    		                    <th>Cho Actual</th><!--se agregan cho's hijos-->
    		                    <th>Mantenimiento</th><!--registrado, en progreso, cerrado-->
                            <th>Desarrollador</th>
                            <th>QA</th>
                            <th>Estado</th>
                            <th>Fase</th>
                            <th>Bitácora</th>
    		                    <th>Acciones</th><!--registrado, en progreso, cerrado-->

    		                  </tr>
  	                  	</thead>
  	                  	<tbody>
  	                  		<?php
  	                		while ($reg=mysqli_fetch_array($tb_problemas))
  	                		{?>
  			                  	<tr>
  			                    	<td><?php echo ObtenerNombredelProyecto($reg['id_proyecto'])?></td>
  			                    	<td><?php echo ObtenerNombredeUsuario($reg['id_L2']);?></td>
  			                    	<td><?php echo ObtenerestatusPrioridad($reg['prioridad']);?></td>
  			                    	<td><?php echo ObtenerNumeroProblem($reg['Id_Problem']);?></td>
  			                    	<td>CHO</td>
                              <td><?php echo ObtenerNombreProblem($reg['Id_Problem']);?></td>
  			                    	<td><?php echo ObtenerNombredeUsuario($reg['id_dev']);?></td>
                              <td><?php echo ObtenerNombredeUsuario($reg['id_qa']);?></td>
                              <td><?php echo ObtenerEstadoDelChoxCode($reg['Code_estado']);?></td>
                              <td><?php echo ObtenerNombredeUsuario($reg['CodeFase']);?></td>
                              <td><button type="button" class="btn btn-info btn-sm OpenBitacora" value="<?php echo $reg['id_CHO'] ?>">Bitácora</button></td><!--Bitácora EMS/agregar tester, desarrollador -->
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
 <!-- The Modal -->
  <div class="modal fade" id="BitacoraModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header"> 
          Bitácora
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

            <div id="BitacoraContent">
              
            </div>

        </div>
        
      </div>
    </div>
  </div>

  <!-- /.control-sidebar -->
<!-- ./wrapper -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
</div> 
<script>
  $(document).ready(function(){
    $("#example2").DataTable({
      "responsive": false,
      "autoWidth": false,
    });
    

    $(".OpenBitacora").click(function(){      
      var id_Cho = $(this).val();
      $.get('Bitacora/BitacoraContent.php',
      {id_Cho:id_Cho},
      function(data)
      {   
        $("#BitacoraModal").modal(); 
        $("#BitacoraContent").html(data);

      });
    });
    /*$(".success").click(function(){
      toastr.success('We do have the Kapua suite available.', 'Success Alert', {timeOut: 5000})
    });*/
  });
  //$(function () {
    
  //});
</script>
