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


 ?>
 
 <div class="table-responsive">
									<table id="example1" class="table table-responsive table-condensed table-bordered table-striped">
										<thead align="center">
											<tr class="info" >
												<th>#</th>
												<th>N° Reg Patronal</th>
												<th>Nombre Patron</th>
                                                <th>Nombre</th>
												<th>Ciudad</th>
												
												<th>Telefono</th>
												
												<th>Editar</th>
												<th>Estatus</th>
											</tr>
										</thead>
                                        
                                        <tbody align="center">
                                        
                                        </tbody>

                                        <tfoot align="center">
                                            <tr class="info" >
                                                <th>#</th>
												<th>N° Reg Patronal</th>
												<th>Nombre Patron</th>
                                                <th>Nombre</th>
                                                <th>Ciudad</th>
                                                
                                                <th>Telefono</th>
                                                
                                                <th>Editar</th>
                                                <th>Estatus</th>
                                            </tr>
				                    </tfoot>
									</table>
								</div>
			
      <!-- <script type="text/javascript">
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
                              text: 'Nuevo Alumno',
                              action: function (  ) {
							  ver_alta();
                              },
                              counter: 1
                          },
				  ],

              } );
          } );
      </script> -->

      	<!-- bootstrap-toggle-master -->
    <script src="../plugins/bootstrap-toggle-master/doc/script.js"></script>
    <script src="../plugins/bootstrap-toggle-master/js/bootstrap-toggle.js"></script>

    <script src="../plugins/select2/select2.full.min.js"></script>
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/buttons.flash.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/buttons.colVis.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/jszip.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/pdfmake.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/vfs_fonts.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/buttons.html5.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/buttons.print.min.js"></script>



    <script>
    
			$(document).on("ready",function(){
                listar();
                desactivar();
            });

			var listar = function(){
                
				var table = $("#example1").DataTable({

                "order": [[ 0, "asc" ]],
                "paging":   true,
                "ordering": true,
                "info":     true,
                "responsive": true,
                "searching": true,
                "destroy":true,
                "language":idioma_espanol,
                "ajax":{
						"method":"POST",
                        "url":"completarLista.php"
					},
					"columns":[
						{"data":"id_patron"},
						{"data":"NRegPatronal"},
                        {"data":"nombre_patron"},
                        {"data":"nombre"},
						{"data":"ciudad_procedencia"},
						
						{"data":"telefono"},
						
                        {"defaultContent":"<button type='button' data-toggle='modal' data-target='#modalEditar' class='editar btn btn-login btn-sm'><i class='far fa-edit'></i> </button>"},
                        {"defaultContent":"<button type='button' data-toggle='modal' data-target='#modalDesactivar' class='desactivar btn btn-sm btn-danger' ><i class='fas fa-trash-alt'></i></button>"}
                        
                    ],
                stateSave: false,
                  dom: 'Bfrtip',
                  lengthMenu: [
                      [ 10, 25, 50, -1 ],
                      [ '10 Registros', '25 Registros', '50 Registros', 'Todos' ],
				  ],
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
                              text: 'Nuevo Patron',
                              action: function (  ) {
                                ver_alta();
                                
                              },
                              counter: 1
                          },
				  ],


                });
                abrirModalEditar("#example1 tbody",table);
                funcion_desactivar("#example1 tbody",table);
            }
            
            var abrirModalEditar=function(tbody,table) {
                    $(tbody).on("click","button.editar",function(){
                        
                        var data = table.row($(this).parents("tr")).data();
                        console.log(data);
                            var idEP =$("#idEP").val(data.id_patron),
                            nregpatronalE =$("#nregpatronalE").val(data.NRegPatronal),
                            nombreCompletoPE =$("#nombreCompletoPE").val(data.nombre_patron),
                            nombreEP =$("#nombrePE").val(data.nombre),
                            paternoEP =$("#paternoPE").val(data.ap_paterno),
                            maternoEP =$("#maternoPE").val(data.ap_materno),
                            ciudadEP =$("#ciudadPE").val(data.ciudad_procedencia),
                            direccionEP =$("#direccionPE").val(data.direccion),
                            sexoEP =$("#sexoPE").val(data.sexo),
                            telefonoEP =$("#telefonoPE").val(data.telefono),
                            fecha_nacEP =$("#fecha_nacPE").val(data.fecha_nacimiento),
                            correoEP =$("#correoPE").val(data.correo);

                            $("#nregpatronalE").focus();
                            
                    });
                }

                var funcion_desactivar=function(tbody,table) 
                {
                    $(tbody).on("click","button.desactivar",function(){
                        
                        var data = table.row($(this).parents("tr")).data();
                        console.log(data);
                            var id =$("#idUP").val(data.id_patron);
                            console.log(id);
                    });
                };

                var desactivar = function(){
                    $("#aceptar").on("click",function(){
                        var id_patronU=$("#idUP").val();
                        var clase = $("#labelDesactivar").text('Desactivar');
                        $.ajax({
                            method:"POST",
                            url:"status.php",
                            data:{
                                "id_patronU":id_patronU
                            }
                        }).done(function(info){
                        alertify.set('notifier','position', 'bottom-right');
                        alertify.success('Se ha Actualizado la Información del Asegurado' );
                        listar();
                        });
                    });
                }

                var idioma_espanol = {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
                        
		</script>

        