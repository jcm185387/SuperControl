<?php
	//al llegar a este archivo, el usuario ya ha sido validado, solo queda crear la sesión, se usará un mismo dashboard para todas las funciones a usar, pero se separarán por rol de usuario. 
	$usr=$_POST["usr"];
	$pass=$_POST["cont"];

	//session_start();
	echo $usr;
	if(empty($usr) || empty($pass))
	{
		header("Location: ../index.php");
	exit();
	}
	session_start();
	include('../Funciones.php');
	  
	include(Conexion());

	$idUserLogueado = ObtenerIdUsuario($usr);
	
	$_SESSION["idUserLogueado"] = $idUserLogueado;
	header('Location: ../Dashboard.php');
	exit();


mysqli_close($conexion);
?>





