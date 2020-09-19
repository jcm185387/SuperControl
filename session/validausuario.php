<?php 
$usr=$_GET["usr"];
$pass=$_GET["pass"];

session_start();
if(empty($usr) || empty($pass))
{
header("Location: ../index.php");
exit();
}


$conect=$_SERVER['DOCUMENT_ROOT']."/SuperControl/Bd/conect.php";
include($conect);

$registros=mysqli_query($conexion,"select *from tb_users where Email='$usr'") or
  die("Problemas en el select:".mysqli_error($conexion));
                    
if ($reg=mysqli_fetch_array($registros))
{//EL USUARIO EXISTE	
	if ($reg['estatus']==0) {
		echo "3";
	}
	else
	{
		//Convertir el HASH EN PASSWORD	
		//if ($reg['password']==$pass) 
		if(password_verify($pass, $reg['Hash']))
		{
			echo "0";
		}	
		else
		{
			echo "1";
		}
	}
}
else
{
	echo "2";
}
mysqli_close($conexion);
?>