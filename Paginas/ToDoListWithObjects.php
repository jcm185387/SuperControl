            <!-- Toastr -->
<link rel="stylesheet" href="plugins/toastr/toastr.min.css">
<!-- jsGrid -->
<link rel="stylesheet" href="plugins/jsgrid/jsgrid.min.css">
<link rel="stylesheet" href="plugins/jsgrid/jsgrid-theme.min.css">
<!-- jsGrid -->
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
  die("Problemas en el select:".mysqli_error($conexion));?>
    <!-- Main content -->
    <section class="content"> 
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
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
          <h3 class="card-title">jsGrid</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div id="jsGrid1"></div>
        </div>
        <!-- /.card-body -->
      </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
      <!-- /.card -->
    </section>
    <!-- /.content -->

  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>

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
<!-- jsGrid -->
<script src="js/ToDoList.js"></script>
<script src="plugins/jsgrid/jsgrid.min.js"></script>
</div> 
<script>
  $(function () {
    $("#jsGrid1").jsGrid({
        height: "100%",
        width: "100%",
 
        sorting: true,
        paging: true,
 
        data: db.clients,
 
        fields: [
            { name: "Name", type: "text", width: 150 },
            { name: "Age", type: "number", width: 50 },
            { name: "Address", type: "text", width: 200 },
            { name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name" },
            { name: "Married", type: "checkbox", title: "Is Married" }
        ]
    });
  });
</script>
