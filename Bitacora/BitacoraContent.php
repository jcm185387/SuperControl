  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
<?php            
  include('../Funciones.php');
  $id_Cho = $_REQUEST['id_Cho'];
  include(Conexion());
  $tb_bitacora=mysqli_query($conexion,"select *from tb_bitacora where id_ChangeOrder = $id_Cho order by FechadeRegistro desc") or
  die("Problemas en el select:".mysqli_error($conexion));
?>
<input type="" id="id_ChoBitacora" value="<?php echo $id_Cho?>" style ="display: none;" name="">
<div class="milistabitacora">
  <div class="input-group mb-3">  
    <!--<input type="text" class="form-control" id="inputBitacora" placeholder="Agrega algo nuevo a la bitácora">-->
    <textarea type="text" class="form-control" id="inputBitacora" placeholder="Agrega algo nuevo a la bitácora"></textarea>
    <div class="input-group-append">
      <button class="border-0 btn-transition btn btn-outline-success" id="addItemBitacora"> <i class="fa fa-check"></i></button>
      <button class="border-0 btn-transition btn btn-outline-danger"> <i class="fas fa-eraser"></i> </button> 

    </div>
  </div>
  <div class="row d-flex justify-content-center">
      <div class="col-md-12">
          <div class="card-hover-shadow-2x mb-3 card">
              <div class="scroll-area-sm">
                  <perfect-scrollbar class="ps-show-limits">
                      <div style="position: static;" class="ps ps--active-y">
                          <div class="ps-content">
                              <ul class=" list-group list-group-flush">
                                <?php
                                $cont = 0;
                                while ($reg=mysqli_fetch_array($tb_bitacora))
                                {
                                  $cont++;
                                  ?>
                                  <li class="list-group-item">
                                      <!--<div class="todo-indicator bg-warning"></div>-->
                                      <div class="widget-content p-0">
                                          <div class="widget-content-wrapper">
                                            <!--
                                              <div class="widget-content-left mr-2">
                                                  <div class="custom-checkbox custom-control"> <input class="custom-control-input" id="exampleCustomCheckbox12" type="checkbox"><label class="custom-control-label" for="exampleCustomCheckbox12">&nbsp;</label> </div>
                                              </div>
                                            -->
                                              <div class="widget-content-left">
                                                  <div class="widget-heading"> <?php echo $reg['ItemDescription'];?> <!--<div class="badge badge-danger ml-2">Rejected</div>-->
                                                  </div>
                                                  <div class="widget-subheading"><i>By <strong><?php echo ObtenerNombredeUsuario($reg['RegistradoPor']);?></strong></i></div>
                                                  <div class="widget-subheading"><i>Registrado: <strong><?php echo $reg['FechadeRegistro'];?></strong></i></div>
                                              </div>
                                              <div class="widget-content-right"> 
                                                <!--<button class="border-0 btn-transition btn btn-outline-success"> <i class="fa fa-check"></i></button> -->
                                                <div class="btn-group">
                                                  <button class="border-0 btn-transition btn btn-outline-danger eliminarItemBitacora" value="<?php echo  $reg['id_bitacora'] ?>"> <i class="fa fa-trash"></i> </button> 
                                                  <button class="border-0 btn-transition btn btn-outline-primary"> <i class="far fa-edit"></i> </button> 
                                                </div>
                                              </div>
                                          </div>
                                      </div>
                                  </li>
                                <?php
                                }?>

                              </ul><?php
                                if($cont == 0){?>
                                  <div class="text-info" style="margin-top: 2%;text-align: center;">
                                    Aún no hay elementos en la bitácora
                                  </div>
                                  <?php
                                }
                                ?>
                          </div>
                      </div>
                  </perfect-scrollbar>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<script>
$(document).ready(function(){
  $("#inputBitacora").keypress(function(e){if(e.keyCode == 13)$("#addItemBitacora").trigger("click");});

  $("#addItemBitacora").click(function(){
    if ($("#inputBitacora").val().trim().length == 0) {
      toastr.error('Debes capturar algo para agregar.', 'Atención', {timeOut: 5000})
    }else{
      var url="Bitacora/addItemBitacora.php";
      var parametros = {
          "inputBitacora" : $("#inputBitacora").val()  ,
          "id_ChoBitacora": $("#id_ChoBitacora").val(),
          "idUserLogueado": $("#idUserLogueado").val()                     
      };      
      $.ajax(
      {
        type: "POST",
        url: url,
          data: parametros,
          success: function(data)
          {
            if(data == 1){
              toastr.success('Se añadió correctamente a la bitácora.', 'Exitoso', {timeOut: 5000}) 
              BitacoraReload($("#id_ChoBitacora").val());
            }else{
              toastr.success(data, 'Atención', {timeOut: 5000}) 
            }
        }
      });
    }
  });

  function BitacoraReload(id_ChoBitacora){
    $.get('Bitacora/BitacoraContent.php',
    {id_Cho:id_ChoBitacora},
    function(data)
    {   
      $("#BitacoraContent").html(data);

    });
  }
  $(".eliminarItemBitacora").click(function(){
    var url="Bitacora/DeleteItemBitacora.php";
    var id_bitacora = $(this).val();
    var parametros = {
          "id_bitacora" : id_bitacora    
      };      
      $.ajax(
      {
        type: "POST",
        url: url,
          data: parametros,
          success: function(data)
          {
            if(data == 1){
              toastr.success('Se Eliminó correctamente el registro', 'Exitoso', {timeOut: 5000}) 
              BitacoraReload($("#id_ChoBitacora").val());
            }else{
              toastr.success(data, 'Atención', {timeOut: 5000}) 
            }
        }
      });

  });

  /*const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });
  $('.swalDefaultError').click(function() {
    Toast.fire({
      icon: 'error',
      title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    })
  });*/
}); 
</script>

