<?php 
// Conexion a la base de datos
include('../conexion/conexion.php');
include('../sesiones/verificar_sesion.php');
include('../funcionesPHP/filtroUsuario.php');
$tUsuario=$_SESSION["user_tipo"];
userE($tUsuario);

// Codificacion de lenguaje
mysql_query("SET NAMES utf8");

// Consulta a la base de datos
$consulta=mysql_query("SELECT
							id_proveedor,
							proveedor,
							cveProveedor,
							fecha_registro,
							hora_registro,
							activo
						FROM
							proveedores",$conexion) or die (mysql_error());
// $row=mysql_fetch_row($consulta)
 ?>
				            <div class="table-responsive">
				                <table id="example1" class="table table-responsive table-condensed table-bordered table-striped">

				                    <thead align="center">
				                      <tr class="info" >
				                        <th>#</th>
				                        <th>Proveedor</th>
										<th>Clave de Proveedor</th>
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
										$idProveedor		= $row[0];
										$proveedor			= $row[1];
										$cveProveedor		= $row[2];
										$fecha				= $row[3];
										$hora				= $row[4];
										$activo				= $row[5];
			
										
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
											<p id="<?php echo "tProveedor".$n; ?>" class="<?php echo $claseDesabilita; ?>">
				                          	<?php echo $proveedor; ?>
				                          </p>
				                        </td>
										<td>
											<p id="<?php echo "tcveProveedor".$n; ?>" class="<?php echo $claseDesabilita; ?>">
				                          	<?php echo $cveProveedor; ?>
				                          </p>
				                        </td>
				                        <td>
											<p id="<?php echo "tFecha".$n; ?>" class="<?php echo $claseDesabilita; ?>">
				                          	<?php echo $fecha; ?>
				                          </p>
				                        </td>
				                        <td>
											<p id="<?php echo "tHora".$n; ?>"  class="<?php echo $claseDesabilita; ?>">
				                          	<?php echo $hora; ?>
				                          </p>
				                        </td>
				                        <td>
				                          <button id="<?php echo "boton".$n; ?>" <?php echo $desabilitar ?>  type="button" class="btn btn-login btn-sm" 
				                          onclick="abrirModalEditar(
				                          							'<?php echo $idProveedor ?>',
																	'<?php echo $proveedor ?>',
																	'<?php echo $cveProveedor ?>'
				                          							);">
				                          	<i class="far fa-edit"></i>
				                          </button>
				                        </td>
				                        <td>
											<input  data-size="small" data-style="android" value="<?php echo "$valor"; ?>" type="checkbox" <?php echo "$checado"; ?>  id="<?php echo "interruptor".$n; ?>"  data-toggle="toggle" data-on="Desactivar" data-off="Activar" data-onstyle="danger" data-offstyle="success" class="interruptor" data-width="100" onchange="status(<?php echo $n; ?>,<?php echo $idProveedor; ?>);">
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
										<th>Proveedor</th>
										<th>Clave de Proveedor</th>
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
                 "order": [[ 0, "asc" ]],
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
                              text: 'Nuevo Proveedor',
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
    
    
