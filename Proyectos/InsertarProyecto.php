<?php
	$inputEMS = $_POST['inputEms'];
	$inputDEV = $_POST['inputDevs'];
	$inputL2 = $_POST['inputL2'];
	$inputQA = $_POST['inputQA'];
	$ProjectName = $_POST['ProjectName'];
	$ProjectSummary = $_POST['ProjectSummary'];

	include('../Funciones.php');
 
  	include(Conexion());



	$sql = "INSERT INTO tb_proyectos(id_proyecto,NombredelProyecto,Descripcion,FechadeCreacion,FechadeModificacion) 
	VALUES (null,'$ProjectName','$ProjectSummary',now(),now());";


	if(mysqli_query($conexion, $sql)){
		//El registro se realizó con éxito
		// recuperar el id del proyecto.
		$rs = mysqli_query($conexion,"SELECT MAX(id_proyecto) AS id FROM tb_proyectos") or die("Problemas en el select".mysqli_error($conexion));;
		if ($row = mysqli_fetch_row($rs)) 
		{
			$id_proyecto = trim($row[0]);
		}
		//Hacer la inserción del equipo de trabajo
		//Insertando EMS
		$Error = 0;
		while (list($key, $val) = each($inputEMS))
		{
			//echo "$val<br>";
			$sql = "INSERT INTO tb_equiposproyecto(id_relUsuarioProyecto,id_proyecto,id_user) 
			VALUES (null,'$id_proyecto','$val');";
			if(mysqli_query($conexion, $sql)){
				$Error = 0;
			}else{
				$Error++;
			}
		}
		//Insertando devs
		while (list($key, $val) = each($inputDEV))
		{
			//echo "$val<br>";
			$sql = "INSERT INTO tb_equiposproyecto(id_relUsuarioProyecto,id_proyecto,id_user) 
			VALUES (null,'$id_proyecto','$val');";
			if(mysqli_query($conexion, $sql)){
				$Error = 0;
			}else{
				$Error++;
			}
		}
		//Insertando l2
		while (list($key, $val) = each($inputL2))
		{
			//echo "$val<br>";
			$sql = "INSERT INTO tb_equiposproyecto(id_relUsuarioProyecto,id_proyecto,id_user) 
			VALUES (null,'$id_proyecto','$val');";
			if(mysqli_query($conexion, $sql)){
				$Error = 0;
			}else{
				$Error++;
			}
		}
		//Insertando QA
		while (list($key, $val) = each($inputQA))
		{
			//echo "$val<br>";
			$sql = "INSERT INTO tb_equiposproyecto(id_relUsuarioProyecto,id_proyecto,id_user) 
			VALUES (null,'$id_proyecto','$val');";
			if(mysqli_query($conexion, $sql)){
				$Error = 0;
			}else{
				$Error++;
			}
		}
		if($Error > 0){
			return 0;
		}else{
			return 1; // quiere decir que hubo algún error al insertar todos los datos.
		}
	}else{
		echo "Error: ". $sql . "<br>". mysqli_error($conexion);
	}

	mysqli_close($conexion);

?>