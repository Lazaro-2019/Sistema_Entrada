<?php 
// Conexion a la base de datos
include('../conexion/conexion.php');
include('../sesiones/verificar_sesion.php');
include('../funcionesPHP/filtroUsuario.php');
$tUsuario=$_SESSION["user_tipo"];
userA($tUsuario);

// Codificacion de lenguaje
mysql_query("SET NAMES utf8");

// Consulta a la base de datos
$consulta=mysql_query("SELECT
							tramites.id_tramite,
							tramites.tramite,
							departamentos.id_departamento,
							departamentos.departamento,
							tramites.pertenece,
							tramites.fecha_registro,
							tramites.hora_registro,
							tramites.activo
						FROM
							tramites
						INNER JOIN departamentos ON departamentos.id_departamento = tramites.id_departamento ORDER BY id_tramite asc",$conexion) or die (mysql_error());
// $row=mysql_fetch_row($consulta)
 ?>
				            <div class="table-responsive">
				                <table id="example1" class="table table-responsive table-condensed table-bordered table-striped">

				                    <thead align="center">
				                      <tr class="info" >
				                        <th>#</th>
				                        <th>Tramite</th>
				                        <th>Departamento</th>
										<th>Pertenece</th>
				                        <th>Fecha</th>
				                        <th>Hora</th>
				                        <th>Editar</th>
				                        <th>Estatus</th>
				                      </tr>
				                    </thead>

				                    <tbody align="center">
				                    <?php 
				                    $n=1;
				                    while ($row=mysql_fetch_row($consulta)) {
										$idTramite			= $row[0];
										$tramite			= $row[1];
										$idDepartamento		= $row[2];
										$departamento       = $row[3];
										$pertenece			= $row[4];
										$fecha				= $row[5];
										$hora				= $row[6];
										$activo				= $row[7];
			
										$checado=($activo==1)?'checked':'';		
										$desabilitar=($activo==0)?'disabled':'';
										$claseDesabilita=($activo==0)?'desabilita':'';
									?>
				                      <tr>
				                        <td >
				                          <p id="<?php echo "tConsecutivo".$n; ?>" class="<?php echo $claseDesabilita; ?>">
				                          	<?php echo "$n"; ?>
				                          </p>
				                        </td>
				                        <td>
																<p id="<?php echo "tTramite".$n; ?>" class="<?php echo $claseDesabilita; ?>">
				                          	<?php echo $tramite; ?>
				                          </p>
				                        </td>
				                        <td>
																<p id="<?php echo "tDepartamento".$n; ?>" class="<?php echo $claseDesabilita; ?>">
				                          	<?php echo $departamento; ?>
				                          </p>
				                        </td>
										<td>
																<p id="<?php echo "tPertenece".$n; ?>" class="<?php echo $claseDesabilita; ?>">
				                          	<?php echo $pertenece; ?>
				                          </p>
				                        </td>
				                        <td>
																<p id="<?php echo "tFecha".$n; ?>"  class="<?php echo $claseDesabilita; ?>">
				                          	<?php echo $fecha; ?>
				                          </p>
				                        </td>
				                        <td>
																<p id="<?php echo "tHora".$n; ?>" class="<?php echo $claseDesabilita; ?>">
				                          	<?php echo $hora; ?>
				                          </p>	
																</td>
				                        <td>
				                          <button id="<?php echo "boton".$n; ?>" <?php echo $desabilitar ?>  type="button" class="btn btn-login btn-sm" 
				                          onclick="abrirModalEditar(
																	  '<?php echo $idTramite		?>',
																	  '<?php echo $tramite			?>',
																	  '<?php echo $idDepartamento	?>',
																	  '<?php echo $pertenece		?>'
				                          							);">
				                          	<i class="far fa-edit"></i>
				                          </button>
				                        </td>
				                        <td>
											<input  data-size="small" data-style="android" value="<?php echo "$valor"; ?>" type="checkbox" <?php echo "$checado"; ?>  id="<?php echo "interruptor".$n; ?>"  data-toggle="toggle" data-on="Desactivar" data-off="Activar" data-onstyle="danger" data-offstyle="success" class="interruptor" data-width="100" onchange="status(<?php echo $n; ?>,<?php echo $idTramite; ?>);">
				                        </td>
				                      </tr>
				                      <?php
				                      $n++;
				                    }
				                     ?>

				                    </tbody>

				                    <tfoot align="center">
				                      <tr class="info">
				                        <th>#</th>
				                        <th>Tramite</th>
				                        <th>Departamento</th>
										<th>Pertenece</th>
				                        <th>Fecha</th>
				                        <th>Hora</th>
				                        <th>Editar</th>
				                        <th>Estatus</th>
				                      </tr>
				                    </tfoot>
				                </table>
				            </div>
			
      <script type="text/javascript">
        $(document).ready(function() {
              $('#example1').DataTable( {
                 "language": {
                         // "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                          "url": "../plugins/datatables/langauge/Spanish.json"
                      },
                 "order": [[ 0, "desc" ]],
                 "paging":   true,
                 "ordering": true,
                 "info":     true,
                 "responsive": true,
                 "searching": true,
                 stateSave: false,
                  dom: 'Bfrtip',
                  lengthMenu: [
                      [ 10, 25, 50, -1 ],
                      [ '10 Registros', '25 Registros', '50 Registros', 'Todos' ],
                  ],
                 columnDefs: [ {
                      // targets: 0,
                      // visible: false
                  }],
                  buttons: [
                            {
                                extend: 'pageLength',
                                text: 'Registros',
                                className: 'btn btn-default'
                            },
                          {
                              extend: 'excel',
                              text: 'Exportar a Excel',
                              className: 'btn btn-default',
                              title:'Bajas-Estaditicas',
                              exportOptions: {
                                  columns: ':visible'
                              }
                          },
                         {
                              text: 'Nuevo Tramite',
                              action: function (  ) {
                                      ver_alta();
                              },
                              counter: 1
                          },
                  ]
              } );
          } );

      </script>
      <script>
            $(".interruptor").bootstrapToggle('destroy');
            $(".interruptor").bootstrapToggle();
      </script>
    
    
