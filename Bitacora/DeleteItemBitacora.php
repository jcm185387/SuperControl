<?php
include('../Funciones.php');
 
include(Conexion());

  $id_bitacora = $_POST['id_bitacora'];
  $sql = "delete from tb_bitacora where id_bitacora='$id_bitacora'";

  if(mysqli_query($conexion, $sql)){
    //echo "Nuevo registro creado correctamente";
    echo "1";
  }else{
    echo "Error: ". $sql . "<br>". mysqli_error($conexion);
  }


mysqli_close($conexion);
?>