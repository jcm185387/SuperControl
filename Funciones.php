<?php
	function Conexion(){
		$conect=$_SERVER['DOCUMENT_ROOT']."/SuperControl/Bd/conect.php";
		return $conect;
	}
	function Rol($Email){	
		include(Conexion());
		$asigna=mysqli_query($conexion,"select rol from usuarios where Email='$Email'") or die("Problemas en el select:".mysqli_error($conexion));
	 	if ($reg_asigna=mysqli_fetch_array($asigna)) 
	 	{
	 		return $reg_asigna['NombreRol'];	 
	 	}
	}
	function ObtenerelNombredelRol($id_usuario){	
		include(Conexion());
		$id_rol = ObtenerelIddelRoldeTb_users($id_usuario); 
		$asigna=mysqli_query($conexion,"select NombreRol from tb_rol where id_rol='$id_rol'") or die("Problemas en el select:".mysqli_error($conexion));
	 	if ($reg_asigna=mysqli_fetch_array($asigna)) 
	 	{
	 		return $reg_asigna['NombreRol'];	 
	 	}
	}

	function ObtenerelIddelRoldeTb_users($id_usuario){	
		include(Conexion());
		$asigna=mysqli_query($conexion,"select id_Rol from tb_users where id_user='$id_usuario'") or die("Problemas en el select:".mysqli_error($conexion));
	 	if ($reg_asigna=mysqli_fetch_array($asigna)) 
	 	{
	 		return $reg_asigna['id_Rol'];	 
	 	}
	}


	function ObtenerelCodigodelRol($id_usuario){	
		include(Conexion());

		$id_rol = ObtenerelIddelRoldeTb_users($id_usuario); 
		
		$asigna=mysqli_query($conexion,"select Codigo from tb_rol where id_rol='$id_rol'") or die("Problemas en el select:".mysqli_error($conexion));
	 	if ($reg_asigna=mysqli_fetch_array($asigna)) 
	 	{
	 		return $reg_asigna['Codigo'];	 
	 	}
	}
	function ObtenerIdUsuario($Email){	
		include(Conexion());
		$asigna=mysqli_query($conexion,"select id_user from tb_users where Email='$Email'") or die("Problemas en el select:".mysqli_error($conexion));
	 	if ($reg_asigna=mysqli_fetch_array($asigna)) 
	 	{
	 		return $reg_asigna['id_user'];	 
	 	}
	}
	function ObtenerNombredeUsuario($id_usuario){
		include(Conexion());
		$tb_usuario=mysqli_query($conexion,"select Nombre from tb_users where id_user='$id_usuario'") or die("Problemas en el select:".mysqli_error($conexion));
    	if ($reg_usuario=mysqli_fetch_array($tb_usuario)) 
    	{
      		return $reg_usuario['Nombre'];
   		}
	}
	function CuentalosProyectos(){//cuenta cuantos proyectos están registrados
	    include(Conexion());

	    $tb_proyectos=mysqli_query($conexion,"select count(*) as total from tb_proyectos") or die("Problemas en el select:".mysqli_error($conexion));
		 

	    $Cant=mysqli_fetch_array($tb_proyectos);

	 	return $Cant['total'];
	}
	function ObtenerImagendePerfilUsuario($id_usuario){
		include(Conexion());
		$tb_usuario=mysqli_query($conexion,"select FotodePerfil from tb_users where id_user='$id_usuario'") or die("Problemas en el select:".mysqli_error($conexion));
    	if ($reg_usuario=mysqli_fetch_array($tb_usuario)) 
    	{
      		return $reg_usuario['FotodePerfil'];
   		}
	}

	
	function ObtenerNombredelProyecto($id_proyecto){
		include(Conexion());
		$tb_proyectos=mysqli_query($conexion,"select NombredelProyecto from tb_proyectos where id_proyecto='$id_proyecto'") or die("Problemas en el select:".mysqli_error($conexion));
    	if ($reg_usuario=mysqli_fetch_array($tb_proyectos)) 
    	{
      		return $reg_usuario['NombredelProyecto'];
   		}
	}
	function ObtenerestatusProblem($Code_Estatus){
		include(Conexion());
		$tb=mysqli_query($conexion,"select NombreEstatus from tb_estatusproblem  where Code='$Code_Estatus'") or die("Problemas en el select:".mysqli_error($conexion));
    	if ($reg=mysqli_fetch_array($tb)) 
    	{
      		return $reg['NombreEstatus'];
   		}
	}

	

	function ObtenerestatusPrioridad($code_prioridad){
		include(Conexion());
		$tb=mysqli_query($conexion,"select Nombre from tb_prioridad  where Code='$code_prioridad'") or die("Problemas en el select:".mysqli_error($conexion));
    	if ($reg=mysqli_fetch_array($tb)) 
    	{
      		return $reg['Nombre'];
   		}
	}

	function ObtenerNumeroProblem($id_problema){
		include(Conexion());
		$tb=mysqli_query($conexion,"select ID_ProblemaSD from tb_problemas  where id_problema='$id_problema'") or die("Problemas en el select:".mysqli_error($conexion));
    	if ($reg=mysqli_fetch_array($tb)) 
    	{
      		return $reg['ID_ProblemaSD'];
   		}
	}
	function ObtenerNombreProblem($id_problema){
		include(Conexion());
		$tb=mysqli_query($conexion,"select NombredelProblema from tb_problemas  where id_problema='$id_problema'") or die("Problemas en el select:".mysqli_error($conexion));
    	if ($reg=mysqli_fetch_array($tb)) 
    	{
      		return $reg['NombredelProblema'];
   		}
	}
	function ObtenerEstadoDelChoXId($id_estado){
		include(Conexion());
		$tb=mysqli_query($conexion,"select Nombre from tb_EstatusCho  where id='$id_estado'") or die("Problemas en el select:".mysqli_error($conexion));
    	if ($reg=mysqli_fetch_array($tb)) 
    	{
      		return $reg['Nombre'];
   		}
	}

	function ObtenerEstadoDelChoxCode($Code){
		include(Conexion());
		$tb=mysqli_query($conexion,"select Nombre from tb_EstatusCho  where Code='$Code'") or die("Problemas en el select:".mysqli_error($conexion));
    	if ($reg=mysqli_fetch_array($tb)) 
    	{
      		return $reg['Nombre'];
   		}
	}
	function CuentalosProblemas(){//cuenta cuantos proyectos están registrados
	    include(Conexion());

	    $tb_proyectos=mysqli_query($conexion,"select count(*) as total from tb_problemas") or die("Problemas en el select:".mysqli_error($conexion));
		 

	    $Cant=mysqli_fetch_array($tb_proyectos);

	 	return $Cant['total'];
	}

	function CuentaloCHOs(){//cuenta cuantos proyectos están registrados
	    include(Conexion());

	    $tb_proyectos=mysqli_query($conexion,"select count(*) as total from tb_changeorders") or die("Problemas en el select:".mysqli_error($conexion));
		 

	    $Cant=mysqli_fetch_array($tb_proyectos);

	 	return $Cant['total'];
	}

	// PROYECTOS
	function ObtenerUsuariosxRol($Codigo){//por lo pronto será con un campo. Más adelante lo podemos mejorar
		include(Conexion());
		$id_rol = ObtenerelIddelRolxCode($Codigo);
		$tb=mysqli_query($conexion,"select *from tb_users  where id_Rol='$id_rol'") or die("Problemas en el select:".mysqli_error($conexion));

		return $tb;
		//return mysqli_query($conexion,"select *from tb_users  where id_Rol='$id_rol'") or die("Problemas en el select:".mysqli_error($conexion));
	}
	function ObtenerelIddelRolxCode($Codigo){	
		include(Conexion());
		$asigna=mysqli_query($conexion,"select id_rol from tb_rol where Codigo='$Codigo'") or die("Problemas en el select:".mysqli_error($conexion));
	 	if ($reg_asigna=mysqli_fetch_array($asigna)) 
	 	{
	 		return $reg_asigna['id_rol'];	 
	 	}
	}

	//PENDIENTE IMPLEMENTAR UNA BD que podamos usar con cualquier consulta

	#region Fecha compromiso
		function ObtenerTiempoPublicado($fechadecreacion){
		      
		    include(Conexion());
		      ini_set('date.timezone','America/Monterrey'); 
		      $time = time();
		      $hora= date("H:i:s", $time);
		      $fecha_parte1= date ("Y-m-d");
		      $fechaactual=$fecha_parte1." ".$hora;
		      $fecha1 = new DateTime($fechadecreacion);
		      $fecha2 = new DateTime($fechaactual);
		      $fecha = $fecha1->diff($fecha2);
		      echo "<small class=\"pull-right text-muted\"><span style=\"float:left\" class=\"glyphicon glyphicon-time\" ></span>"."  ";
		      if ((($fecha->y)==0)&&(($fecha->m)==0)&&(($fecha->d)==0)&&(($fecha->h)==0)&&(($fecha->i)==0)) 
		      {
		        echo "  Justo Ahora";
		      }
		      else
		      {
		        echo "  Hace ";
		        if (($fecha->y)>=1) 
		        {
		          echo $fecha->y." Años\n";
		        }
		        if (($fecha->m)>=1) 
		        {
		          echo $fecha->m." meses\n";
		        }         
		        if (($fecha->d)>=1) 
		        {
		          echo $fecha->d." días\n";
		        }
		        if (($fecha->h)>=1) 
		        {
		          echo $fecha->h." Horas\n";
		        } 
		        if (($fecha->i)>=1) 
		        {
		          echo $fecha->i." minutos\n";
		        } 
		        
		      }
		      echo "</small>";
		}
	  	function Obtenerdiasentrefechas($fechareferencia, $FechaFinal){
	    
		  	include(Conexion());
		    ini_set('date.timezone','America/Monterrey'); 
		    //$time = time();
		    //$hora= date("H:i:s", $time);
		    //$fecha_parte1= date ("Y-m-d");
		    //$fechaactual=$fecha_parte1." ".$hora;
		    $fecha1 = new DateTime($fechareferencia);
		    $fecha2 = new DateTime($FechaFinal);
		    $fecha = $fecha1->diff($fecha2);
		    //echo "<small class=\"pull-right text-muted\"><span class=\"glyphicon glyphicon-time\" ></span>";
		    if ((($fecha->y)==0)&&(($fecha->m)==0)&&(($fecha->d)==0)&&(($fecha->h)==0)&&(($fecha->i)==0)) 
		    {
		      echo "  Justo Ahora";
		    }
		    else
		    {
		      //echo "  Hace ";
		      if (($fecha->y)>=1) 
		      {
		        echo $fecha->y." Años\n";
		      }
		      if (($fecha->m)>=1) 
		      {
		        echo $fecha->m." meses\n";
		      }         
		      if (($fecha->d)>=1) 
		      {
		        echo $fecha->d." días\n";
		      }
		      if (($fecha->h)>=1) 
		      {
		        echo $fecha->h." Horas\n";
		      } 
		      if (($fecha->i)>=1) 
		      {
		        echo $fecha->i." minutos\n";
		      } 
		      
		    }
		    //echo "</small>";
		}

		function ObtenerTiempoRestante($p_FechaCompromiso,$estatus){
		      
		    include(Conexion());
		    //echo $estatus;
		      ini_set('date.timezone','America/Monterrey'); 
		      $time = time();
		      $hora= date("H:i:s", $time);
		      $fecha_parte1= date ("Y-m-d");
		      $fechaactual=$fecha_parte1." ".$hora;
		      $fecha1 = new DateTime($p_FechaCompromiso);
		      $fecha2 = new DateTime($fechaactual);
		      $fecha = $fecha1->diff($fecha2);
		      //echo "<small class=\"pull-right text-muted\"><span style=\"float:left\" class=\"glyphicon glyphicon-time\" ></span>"."  ";

		      if ((($fecha->y)==0)&&(($fecha->m)==0)&&(($fecha->d)==0)&&(($fecha->h)==0)&&(($fecha->i)==0)) 
		      {
		        echo "  Justo Ahora";
		      }
		      else
		      {
		      	/*fecha1 = fecha compromiso 
		      	fecha2 = fecha del día de hoy*/
		      	$mistring = '';
		      	$vencidoOno = 0;
		      	if ($fecha1 < $fecha2) {
		      		//echo "	Vencido	hace ";
		      		$mistring = "	Vencido	hace ";
		      		$vencido = 0;
		      	}else if($fecha1 > $fecha2){
		        	//echo "  Se vence en ";
		        	$mistring = "  Se vence en ";
		        	$vencido = 1;
		      	}
		        if (($fecha->y)>=1) 
		        {		      
		         	$mistring.$fecha->y." Años\n";    
		        	$mistring= $mistring.$fecha->y." Años\n";		        	
		        }
		        if (($fecha->m)>=1) 
		        {
		          //echo $fecha->m." meses\n";
		        	$mistring = $mistring.$fecha->m." meses\n";
		        }         
		        if (($fecha->d)>=1) 
		        {
		          //echo $fecha->d." días\n";
		        	$mistring = $mistring.$fecha->d." días\n";
		        }
		        if (($fecha->h)>=1) 
		        {
		          //echo $fecha->h." Horas\n";
		        	$mistring = $mistring.$fecha->h." Horas\n";
		        } 
		        if (($fecha->i)>=1) 
		        {
		          //echo $fecha->i." minutos\n";
		        	//echo $fecha->i." minutos\n";
		        	$mistring = $mistring.$fecha->i." minutos\n";
		        	//echo $mistring;
		        } 
		        
		      }
		      if($vencido == 0){
		      	$mistring = "<small class=\"badge badge-danger\">"."<i class=\"far fa-clock\"></i>  ".$mistring;
		      	//agregar una validación para revisar si el item éstá completado, sin lo está, no mostrar nada
		      }else{
		      	if(($fecha->d)>=5){
					$mistring = "<small class=\"badge badge-primary\">"."<i class=\"far fa-clock\"></i>  ".$mistring;
				}
				else if(($fecha->d)<5 && ($fecha->d)>= 3){
					$mistring = "<small class=\"badge badge-secondary\">"."<i class=\"far fa-clock\"></i>  ".$mistring;
				}else if(($fecha->d)<3 && ($fecha->d) >= 0){
					$mistring = "<small class=\"badge badge-warning\">"."<i class=\"far fa-clock\"></i>  ".$mistring;
				}
		      	
		      }
		      //$mistring = $mistring."</small";
		      //return $mistring;
		      //echo $mistring."</small>";
		      //$mistring =.$mistring;
		      if($estatus == 1){
		      	echo "<small class=\"text text-success\">"."Tarea completada"."</small>";
		      }else{
		      	echo $mistring."</small>";	
		      }
		      
		}
	#endregion
	function BuscarUsuarioenElequipodeTrabajo($id_user,$id_proyecto){
		include(Conexion());
		$tb=mysqli_query($conexion,"select *from tb_equiposproyecto where id_user='$id_user' and id_proyecto ='$id_proyecto'") or die("Problemas en el select:".mysqli_error($conexion));
	 	if ($reg=mysqli_fetch_array($tb)) 
	 	{
	 		return true; 
	 	}else{
	 		return false;
	 	}
	}


?>