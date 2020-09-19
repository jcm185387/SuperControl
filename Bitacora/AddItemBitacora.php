<?php
  include('../Funciones.php');
 
  include(Conexion());
	$id_ChangeOrder = $_POST['id_ChoBitacora'];
	$ItemDescription = $_POST['inputBitacora'];
	$RegistradoPor = $_POST['idUserLogueado'];

	$sql = "INSERT INTO tb_bitacora(id_bitacora,id_ChangeOrder,ItemDescription,FechadeRegistro,RegistradoPor) 
	VALUES (null,$id_ChangeOrder,'$ItemDescription',now(),$RegistradoPor);";


	if(mysqli_query($conexion, $sql)){
		//echo "Nuevo registro creado correctamente";
		echo "1";
	}else{
		echo "Error: ". $sql . "<br>". mysqli_error($conexion);
	}

	mysqli_close($conexion);
?>