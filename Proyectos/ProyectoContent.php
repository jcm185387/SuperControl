<?php 
include('../Funciones.php');
$id_proyecto = $_REQUEST['id_proyecto'];
  include(Conexion());
  $tb_proyecto=mysqli_query($conexion,"select *from tb_proyectos where id_proyecto = $id_proyecto ") or
  die("Problemas en el select:".mysqli_error($conexion));
  if ($reg=mysqli_fetch_array($tb_proyecto))
  {
    ?>
    <!-- Content Wrapper. Contains page content -->

    <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="callout callout-info">
            <h5><i class="fas fa-info"></i> Note:</h5>
            Esta ventana, muestra toda la información del proyecto, aquí podrás ver y editar el nombre del proyecto, y agregar y quitar miembros del equipo.
          </div>


          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="fas fa-folder"></i> <?php echo $reg['NombredelProyecto']; ?>
                  <small class="float-right">Creado: <?php echo $reg['FechadeCreacion']; ?></small>
                </h4>
              </div>
              <!-- /.col -->
            </div>
                          <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">                
                <address>
                  <strong>última vez actualizado: </strong><br>
                  <?php echo $reg['FechadeModificacion']; ?><br>
                </address>
              </div>
            </div>
            <!-- /.row -->

            <div class="row">
              <!-- accepted payments column -->
              <div class="col-12">
                <p class="lead"><strong>Descripción:</strong></p>
                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                  <?php echo $reg['Descripcion']; ?>
                </p>
                <span class="alert alert-info row">
                  Queda pendiente la versión para la actualización de datos, quitar el disabled
                </span>
              </div>
              <!-- /.col -->
              <!-- info row -->
              <?php 

              /*$Team1=mysqli_query($conexion,"select *from tb_equiposproyecto where id_proyecto = $id_proyecto") or
                                    die("Problemas en el select:".mysqli_error($conexion));*/
                                    ?>
              <!--<<div class="row invoice-info">-->
                <?php
                /*
                $List_idusers = array();
                while ($reg_list=mysqli_fetch_array($Team1))
                {        
                  array_push($List_idusers, $reg_list['id_user']); 
                }
                $separado_por_comas = implode(",", $List_idusers);
                */
                ?>
              <!--</div>-->
              <!--
              <div class="col-12">               
                <div style="margin-bottom: 10%">
                  <p><button class="btn btn-primary" style="float: right;">Agregar nuevo integrante</button></p>
                </div>
                <?php
                if (strlen($separado_por_comas) == 0) {
                  echo "No has elegido tu equipo de trabajo.";
                }else{
                  $tb_users=mysqli_query($conexion,"select *from tb_users where id_user in ($separado_por_comas) order by id_rol") or
                die("Problemas en el select:".mysqli_error($conexion));

                ?>
                <p class="lead">Equipo de trabajo</p>
                
                <?php
                $Team=mysqli_query($conexion,"select *from tb_equiposproyecto where id_proyecto = $id_proyecto") or
                                    die("Problemas en el select:".mysqli_error($conexion));?>
                <div class="table-responsive">
                  <table class="table table-sm">
                    <thead>
                      <tr>
                        <th>Rol</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      while ($reg_team=mysqli_fetch_array($tb_users))
                      {?>
                        <tr>
                          <td><?php echo ObtenerelNombredelRol($reg_team['id_user']); ?></td>
                          <td><img alt="Avatar" width="3%" class="table-avatar item" src="<?php echo ObtenerImagendePerfilUsuario($reg_team['id_user']); ?>"><?php echo ObtenerNombredeUsuario($reg_team['id_user']); ?></td>
                          <td>
                              <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>  
                          </td>
                        </tr>
                        <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
                <?php
                }?>
              </div>
              -->
                      <!-- /.col -->
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
                                            <?php
                                            if(BuscarUsuarioenElequipodeTrabajo($reg['id_user'],$id_proyecto) == true){?>
                                              <input type="checkbox" disabled="" class="form-check-input inputEms" checked="" name="inputEms[]" value="<?php echo $reg['id_user']; ?>"><?php echo $reg['Nombre'];
                                            }else{?>
                                              <input type="checkbox" disabled="" class="form-check-input inputEms" name="inputEms[]" value="<?php echo $reg['id_user']; ?>"><?php echo $reg['Nombre'];
                                            }?>
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
                                <!--<input type="checkbox" class="form-check-input inputDevs" name="inputDevs[]" value="<?php echo $reg['id_user']; ?>"><?php echo $reg['Nombre']; ?>-->
                                <?php
                                if(BuscarUsuarioenElequipodeTrabajo($reg['id_user'],$id_proyecto) == true){?>
                                  <input type="checkbox" disabled="" class="form-check-input inputDevs" checked="" name="inputDevs[]" value="<?php echo $reg['id_user']; ?>"><?php echo $reg['Nombre'];
                                }else{?>
                                  <input type="checkbox" disabled="" class="form-check-input inputDevs" name="inputDevs[]" value="<?php echo $reg['id_user']; ?>"><?php echo $reg['Nombre'];
                                }?>
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
                                <!--<input type="checkbox" class="form-check-input inputL2" name="inputL2[]" value="<?php echo $reg['id_user']; ?>"><?php echo $reg['Nombre']; ?>-->
                                <?php
                                if(BuscarUsuarioenElequipodeTrabajo($reg['id_user'],$id_proyecto) == true){?>
                                  <input type="checkbox" disabled="" class="form-check-input inputL2" checked="" name="inputL2[]" value="<?php echo $reg['id_user']; ?>"><?php echo $reg['Nombre'];
                                }else{?>
                                  <input type="checkbox"  disabled="" class="form-check-input inputL2" name="inputL2[]" value="<?php echo $reg['id_user']; ?>"><?php echo $reg['Nombre'];
                                }?> 
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
                                  <!--<input type="checkbox" class="form-check-input inputQA" name="inputQA[]" value="<?php echo $reg['id_user']; ?>"><?php echo $reg['Nombre']; ?>-->
                                  <?php
                                  if(BuscarUsuarioenElequipodeTrabajo($reg['id_user'],$id_proyecto) == true){?>
                                    <input type="checkbox" disabled="" class="form-check-input inputQA" checked="" name="inputQA[]" value="<?php echo $reg['id_user']; ?>"><?php echo $reg['Nombre'];
                                  }else{?>
                                    <input type="checkbox" disabled="" class="form-check-input inputQA" name="inputQA[]" value="<?php echo $reg['id_user']; ?>"><?php echo $reg['Nombre'];
                                  }?> 
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
            </div>
            <!-- /.row -->

          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <?php
  }?>