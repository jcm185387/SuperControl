<?php   	
	include('../Funciones.php'); 
	include(Conexion());
?>
<div class="callout callout-info">
	<h5><i class="fas fa-info"></i> Note:</h5>
	<p>Esta ventana, te permitirá crear un nuevo Proyecto, agrega el nombre, la descripción y los integrantes que la conformarán.</p>
	<p>Los campos con <span class="text text-danger"> * </span> son mandatorios</p>
</div>
<div class="col-sm-12">
	<form class="form-horizontal" role="form" method="POST" id="form-agregarproyecto">
		<div class="form-group">
		    <label for="ProjectName">Nombre del Proyecto</label><span class="text text-danger"> * </span>
		    <input type="text" class="form-control" name="ProjectName" placeholder="Ingresa un Nombre" id="ProjectName">
		</div>
		<div class="form-group">
		    <label for="ProjectSummary">Descripción:</label><span class="text text-danger"> * </span>
			<textarea class="form-control" placeholder="Descripción" name="ProjectSummary" id="ProjectSummary"></textarea>
		</div>
		<div class="form-group">
		    <label>Elige el equipo de trabajo:</label>
		</div>
	  	<div class="form-group row">
	  		<div class="col-sm-3">
	  			<div class="card">
	              	<div class="card-header">
	                	<h3 class="card-title">	                  		
	                  		Encargada de Mejora de Software
	                	</h3>
	              	</div>
	              	<div class="card-body">

					  	<div  style="overflow-y: auto;">
							<ul class="list-group list-group-flush">
			    	            <?php
			    	            $id_rol = ObtenerelIddelRolxCode('EMS');
			    	            $EMS=mysqli_query($conexion,"select *from tb_users where id_Rol = '$id_rol' ") or
			          			die("Problemas en el select:".mysqli_error($conexion));
			            		while ($reg=mysqli_fetch_array($EMS))
			            		{?>
									<li class="list-group-item">
				            			<div class="form-check">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input inputEms" name="inputEms[]" value="<?php echo $reg['id_user']; ?>"><?php echo $reg['Nombre']; ?>
											</label>
										</div>													
									</li>
									<?php
								}
								?>
						  	</ul>
					  	</div>
	              	</div>
	  			</div>
			  	<?php
			  		//echo print_r(ObtenerUsuariosxRol('EMS'));
			  	?>
		    </div>
	  		<div class="col-sm-3">
	  			<div class="card">
	              	<div class="card-header">
	                	<h3 class="card-title">	                  		
	                  		Desarrollador
	                	</h3>
	              	</div>
	              	<div class="card-body">
                	
					  	<div  style="overflow-y: auto;">
							<ul class="list-group list-group-flush">
			    	            <?php
			    	            $id_rol = ObtenerelIddelRolxCode('DEV');
			    	            $DEV=mysqli_query($conexion,"select *from tb_users where id_Rol = '$id_rol' ") or
			          			die("Problemas en el select:".mysqli_error($conexion));
			            		while ($reg=mysqli_fetch_array($DEV))
			            		{?>
									<li class="list-group-item">
				            			<div class="form-check">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input inputDevs" name="inputDevs[]" value="<?php echo $reg['id_user']; ?>"><?php echo $reg['Nombre']; ?>
											</label>
										</div>													
									</li>
									<?php
								}
								?>
						  	</ul>
					  	</div>
	                	
	              	</div>
	  			</div>
			  	<?php
			  		//echo print_r(ObtenerUsuariosxRol('EMS'));
			  	?>
		    </div>
	  		<div class="col-sm-3">
	  			<div class="card">
	              	<div class="card-header">
	                	<h3 class="card-title">	                  		
	                  		Soporte Nivel 2
	                	</h3>
	              	</div>
	              	<div class="card-body">
	                	
					  	<div  style="overflow-y: auto;">
							<ul class="list-group list-group-flush">
			    	            <?php
			    	            $id_rol = ObtenerelIddelRolxCode('L2');
			    	            $L2=mysqli_query($conexion,"select *from tb_users where id_Rol = '$id_rol' ") or
			          			die("Problemas en el select:".mysqli_error($conexion));
			            		while ($reg=mysqli_fetch_array($L2))
			            		{?>
									<li class="list-group-item">
				            			<div class="form-check">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input inputL2" name="inputL2[]" value="<?php echo $reg['id_user']; ?>"><?php echo $reg['Nombre']; ?>
											</label>
										</div>													
									</li>
									<?php
								}
								?>
						  	</ul>
					  	</div>
	                	
	              	</div>
	  			</div>
			  	<?php
			  		//echo print_r(ObtenerUsuariosxRol('EMS'));
			  	?>
		    </div>
	  		<div class="col-sm-3">
	  			<div class="card">
	              	<div class="card-header">
	                	<h3 class="card-title">	                  		
	                  		QA
	                	</h3>
	              	</div>
	              	<div class="card-body">
	                	
					  	<div  style="overflow-y: auto;">
							<ul class="list-group list-group-flush">
			    	            <?php
			    	            $id_rol = ObtenerelIddelRolxCode('QA');
			    	            $QA=mysqli_query($conexion,"select *from tb_users where id_Rol = '$id_rol' ") or
			          			die("Problemas en el select:".mysqli_error($conexion));
			            		while ($reg=mysqli_fetch_array($QA))
			            		{?>
									<li class="list-group-item">
				            			<div class="form-check">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input inputQA" name="inputQA[]" value="<?php echo $reg['id_user']; ?>"><?php echo $reg['Nombre']; ?>
											</label>
										</div>													
									</li>
									<?php
								}
								?>
								
						  	</ul>
					  	</div>
	                	
	              	</div>
	  			</div>
			  	<?php
			  		//echo print_r(ObtenerUsuariosxRol('EMS'));
			  	?>
		    </div>
		</div>
	  <!--
	  <div class="form-group form-check">
	    <label class="form-check-label">
	      <input class="form-check-input" type="checkbox"> Remember me
	    </label>
	  </div>-->
	  <button type="button" id="agregarproyecto" class="btn btn-primary" style="float: right;">Guardar</button>
	</form>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#agregarproyecto").click(function(){
			//Validar nombre y descripción.
			if ($("#ProjectName").val().trim().length == 0 || $("#ProjectSummary").val().trim().length == 0 ) {
				toastr.error('Existen algunos campos vacíos', 'Atención', {timeOut: 2000}) 
			}else{
				var checkboxEMSValues = new Array();
				$(".inputEms").each(function(){
					
					if ($(this).prop( "checked" )) {
						checkboxEMSValues.push($(this).val());					
					}					
				});
				if(checkboxEMSValues.length == 0){
					toastr.error('Debes seleccionar al menos a un Encargado de Mejora de Software', 'Atención', {timeOut: 2000}) 	
				}
				var checkboxDEVValues = new Array();
				$(".inputDevs").each(function(){
					
					if ($(this).prop( "checked" )) {
						checkboxDEVValues.push($(this).val());					
					}					
				});
				if(checkboxDEVValues.length == 0){
					toastr.error('Debes seleccionar al menos a un Desarrollador de Software', 'Atención', {timeOut: 2000}) 	
				}
				var checkboxL2Values = new Array();
				$(".inputL2").each(function(){
					
					if ($(this).prop( "checked" )) {
						checkboxL2Values.push($(this).val());					
					}					
				});
				if(checkboxL2Values.length == 0){
					toastr.error('Debes seleccionar al menos a un Soporte de Nivel 2', 'Atención', {timeOut: 2000}) 	
				}
				var checkboxQAValues = new Array();
				$(".inputQA").each(function(){
					
					if ($(this).prop( "checked" )) {
						checkboxQAValues.push($(this).val());					
					}					
				});
				if(checkboxQAValues.length == 0){
					toastr.error('Debes seleccionar al menos a un Tester de Software', 'Atención', {timeOut: 2000}) 	
				}
				if(checkboxEMSValues.length  == 0 ||checkboxDEVValues.length == 0  || checkboxL2Values.length == 0 || checkboxQAValues.length == 0){
					return false;	
				}
				//var object = new Object();
				//var object =JSON.stringify($("#form-agregarproyecto").serializeArray());
				//var formData =JSON.parse(JSON.stringify($("#form-agregarproyecto").serializeArray()));
				//console.log(formData);
				//var aux = JSON.stringify(object);
				//console.log(aux);
				/*if(formData.name.inputEms == undefined){
					toastr.error('Debes seleccionar al menos a un Encargado de Mejora de Software', 'Atención', {timeOut: 1000}); 	
				}*/
				var url="Proyectos/InsertarProyecto.php";
				//console.log($("#form-agregarproyecto").serialize());
			    $.ajax(
			    {
			      type: "POST",
			      url: url,
			      data: $("#form-agregarproyecto").serialize(),
			      success: function(data)
			      {        
			       
			      }
			    });
			}			
		});
			
	});
</script>