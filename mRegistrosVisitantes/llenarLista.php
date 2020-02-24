<?php
        include('../sesiones/verificar_sesion.php');
        include('../funcionesPHP/filtroUsuario.php');
        $tUsuario=$_SESSION["user_tipo"];
        userA($tUsuario);
?>
<div class="table-responsive">
        <table id="example1" class="table table-responsive table-condensed table-bordered table-striped">
            <thead align="center">
                <tr class="info" >
                <th>Id Registro</th>
                <th>Clave de Visitante</th>
                <th>Nombre Visitante</th>
                <th>Fecha Ingreso</th>
                <th>Hora Ingreso</th>
                <th>Fecha Salida</th>
                <th>Hora Salida</th>
                </tr>
            </thead>

            <tbody align="center">

            </tbody>

            <tfoot align="center">
                <tr class="info">
                <th>Id Registro</th>
                <th>Clave de Visitante</th>
                <th>Nombre Visitante</th>
                <th>Fecha Ingreso</th>
                <th>Hora Ingreso</th>
                <th>Fecha Salida</th>
                <th>Hora Salida</th>
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
				 "ajax":{
						"method":"POST",
                        "url":"completarLista.php"
					},
					"columns":[
						{"data":"id_registro"},
						{"data":"cveVisitante"},
                        {"data":"visitante"},
                        {"data":"fecha_ingreso"},
						{"data":"hora_ingreso"},
						{"data":"fecha_salida"},
						{"data":"hora_salida"}
                    ],
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
                  ]
              } );
          } );

     </script>

    
    
