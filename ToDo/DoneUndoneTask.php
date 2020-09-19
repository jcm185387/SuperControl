<?php

$id_ToDo=$_REQUEST['id_ToDo'];
$done = $_REQUEST['done'];
include('../Funciones.php');
 
include(Conexion());


	$sql = "update 
				tb_ToDoList
				set estatus = '$done'
				where id_Todo='$id_ToDo'";

	if(mysqli_query($conexion, $sql)){
		//modificado con éxito
		echo "1";
	}else{
		echo "Error: ". $sql . "<br>". mysqli_error($conexion);
	}


mysqli_close($conexion);
?>