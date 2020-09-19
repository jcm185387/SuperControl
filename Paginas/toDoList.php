<?php
session_start();
if (!$_SESSION['idUserLogueado'])
{
  header('Location: index.php');
}
  else
  {?>
            <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <?php
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
      $tb_problemas=mysqli_query($conexion,"select *from tb_ToDoList where  CreadoPor = '$usuarioLogueado' order by estatus asc") or
      die("Problemas en el select:".mysqli_error($conexion));
      ?>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- TO DO List -->
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">ToDo List</h5>

                  <p class="card-text">
                    En esta sección, podrás agregar una lista de pendientes. El sistema registrará la fecha y podrás marcarlos como completados. Agrega una fecha compromiso para que no te coman las prisas.
                  </p>
                </div>
              </div>
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="ion ion-clipboard mr-1"></i>
                    To Do List
                  </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="input-group mb-3">  
                    <!--<input type="text" class="form-control" id="inputBitacora" placeholder="Agrega algo nuevo a la bitácora">-->
                    <input type="text" class="form-control" id="inputBitacora" placeholder="Agrega algo nuevo a la lista">
                    <div class="input-group-append">
                      <button class="border-0 btn-transition btn btn-outline-success" id="addItemBitacora"> <i class="fa fa-check"></i></button>
                      <button class="border-0 btn-transition btn btn-outline-danger"> <i class="fas fa-eraser"></i> </button> 

                    </div>
                  </div>
                  <ul class="todo-list" data-widget="todo-list">
                    <?php
                    while ($reg=mysqli_fetch_array($tb_problemas))
                    {?>
                      <li>
                        <!-- drag handle -->
                        <span class="handle">
                          <i class="fas fa-ellipsis-v"></i>
                          <i class="fas fa-ellipsis-v"></i>
                        </span>
                        <!-- checkbox -->
                        <?php
                        if ($reg['estatus'] == true) {//está completado
                          ?>
                          <div  class="icheck d-inline ml-2">
                              <input type="checkbox" value="<?php echo $reg['id_Todo'];?>" data-toggle="tooltip" data-placement="top" title="Marcar como incompleto" class="undoneTask" checked  id="todoCheck1">
                          </div>
                          <?php
                        }else{?>
                          <div  class="icheck d-inline ml-2">
                              <input type="checkbox" value="<?php echo $reg['id_Todo'];?>" data-toggle="tooltip" data-placement="top" title="Marcar como completo" class="doneTask"   id="todoCheck1">
                          </div>
                          <?php
                        }
                        ?>

                        <!-- todo text -->
                        <span class="badge badge-<?php if ($reg['estatus'] == true){ echo "success"; }; ?>"><?php echo $reg['item']; ?></span>
                        <!-- Emphasis label -->
                        <?php ObtenerTiempoRestante($reg['FechaLimite'],$reg['estatus']); ?>
                        <!-- General tools such as edit or delete-->
                        <div class="tools">
                          <i class="fas fa-edit"></i>
                          <i class="fas fa-trash"></i>
                        </div>
                      </li>
                      <?php
                    }
                    ?>
                  </ul>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  
                </div>
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
      //$('[data-toggle="tooltip"]').tooltip()
      
      $(".doneTask").click(function(){
      var url="ToDo/DoneUndoneTask.php";
        var parametros = {
                "id_ToDo" : $(this).val(),
                "done": 1                   
        };
        $.ajax(
        {
          type: "POST",
          url: url,
          data: parametros,
          success: function(data)
          {                
            //GetTareasxIdUser($(".ActualizarTareas").val());    
            GetTareas();
          }
        });
    });

    $(".undoneTask").click(function(){
      var url="ToDo/DoneUndoneTask.php";
        var parametros = {
                "id_ToDo" :  $(this).val(),
                "done": 0               
        };
        $.ajax(
        {
          type: "POST",
          url: url,
          data: parametros,
          success: function(data)
          {                
            GetTareas();       
          }
        });
    });


    function GetTareas(){
      $.get('Paginas/toDoList.php',{},
      function(data)
      {    
        $("#dashboardContent").css("display","none");  
          $('#ContenidoPrincipal').html(data);          
      }); 
    }

    });
    //$(function () {
      
    //});
  </script>
  <?php
}?>