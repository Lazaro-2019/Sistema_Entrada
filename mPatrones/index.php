<?php 
include('../conexion/conexion.php');
include('../sesiones/verificar_sesion.php');
include('../funcionesPHP/filtroUsuario.php');
$tUsuario=$_SESSION["user_tipo"];
userE($tUsuario);
// Variables de configuración
$titulo="Catálogo de Patrones";
$opcionMenu="A";
$fecha=date("Y-m-d"); 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Patrones</title>

	<!-- Meta para compatibilidad en dispositivos mobiles -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap 3.3.5 -->
	<link rel="stylesheet" type="text/css" href="../plugins/bootstrap/css/bootstrap.min.css">

    <!-- fontawesome -->
	<link rel="stylesheet" href="../plugins/fontawesome-free-5.8.1-web/css/all.min.css">

	<!-- DataTableButtons -->
     <link rel="stylesheet" href="../plugins/dataTableButtons/buttons.dataTables.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">

    <!-- bootstrap-toggle-master -->
    <link href="../plugins/bootstrap-toggle-master/css/bootstrap-toggle.css" rel="stylesheet">
    <link href="../plugins/bootstrap-toggle-master/stylesheet.css" rel="stylesheet">
	
	<!-- select2 -->
    <link rel="stylesheet" href="../plugins/select2/select2.css">

	<!-- Estilos propios -->
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">

	<!-- Alertify	 -->
	<link rel="stylesheet" type="text/css" href="../plugins/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="../plugins/alertifyjs/css/themes/bootstrap.css">
</head>

<body>
	<header>
		<?php 
			include('../layout/encabezado.php');
		 ?>
	</header><!-- /header -->	
	<div class="container-fluid" >
		<div class="row">
		<div class="col-xs-0 col-sm-3 col-md-2 col-lg-2 vertical" id="menu" style="display:none">
			<?php 
				include('menuv.php');
			 ?>
			</div>
			<div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 cont" id="titulo" style="display:none">
			   <div class="titulo borde sombra">
			        <h3><?php echo $titulo; ?></h3>
			   </div>	
			   <div class="contenido borde sombra">
				    <div class="container-fluid">
				        <section id="alta" style="display: none">
            				<form id="frmAlta">
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<div class="form-group">
											<label for="nregpatronal">Ingrese el Numero de Registro Patronal:</label>
											<input type="text" id="nregpatronal" class="form-control " autofocus="" required="" placeholder="Escribe el Numero de Registro Patronal">
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<div class="form-group">
											<label for="nombre">Nombre Completo del Patron:</label>
											<input type="text" id="nombreCompletoP" class="form-control " autofocus="" required="" placeholder="Escribe el Nombre Completo del Patron">
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
										<div class="form-group">
											<label for="nombre">Nombre del Patron:</label>
											<input type="text" id="nombreP" class="form-control " autofocus="" required="" placeholder="Escribe el Nombre del Patron">
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
										<div class="form-group">
											<label for="paterno">Apellido Paterno:</label>
											<input type="text" id="paternoP" class="form-control " required="" placeholder="Escribe el Apellido Paterno">
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
										<div class="form-group">
											<label for="materno">Apellido Materno:</label>
											<input type="text" id="maternoP" class="form-control " required="" placeholder="Escribe el Apellido Materno">
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<div class="form-group">
											<label for="ciudad">Ciudad:</label>
											<input type="text" id="ciudadP" class="form-control " required="" placeholder="Escribe la Ciudad o Municipio">
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md6 col-lg-6">
										<div class="form-group">
											<label for="direccion">Dirección:</label>
											<input type="text" id="direccionP" class="form-control " required="" placeholder="Escribe la Dirección">
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
										<div class="form-group">
											<label for="sexoP">Sexo:</label>
											<select  id="sexoP" class="select2 form-control " style="width: 100%">
												<option value="0">Seleccione ...</option>
												<option value="M">Masculino</option>
												<option value="F">Femenino</option>
											</select>
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
										<div class="form-group">
											<label for="telefono">Teléfono:</label>
											<input type="text" id="telefonoP" class="form-control " required="" placeholder="Escribe el Telefono">
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
										<div class="form-group">
											<label for="fecha_nac">Fecha de Nacimiento:</label>
											<input type="date" id="fecha_nacP" class="form-control " required="" placeholder="yyyy-mm-dd" value="<?php echo $fecha;?>">
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<div class="form-group">
											<label for="correo">Correo:</label>
											<input type="text" id="correoP" class="form-control " required="" placeholder="Escribe el Correo Electronico">
										</div>
									</div>

									<hr class="linea">
								</div>
								<div class="row">
									<div class="col-lg-12">
										<button type="button" id="btnLista" class="btn btn-login  btn-flat  pull-left">Lista de Patrones</button>
										<input type="submit" class="btn btn-login  btn-flat  pull-right" value="Guardar Información">										
									</div>
								</div>
            				</form>
				        </section>

				        <section id="lista">

						</section>

				        
				    </div>
			   </div>	

			</div>			
		</div>
	</div>
	<footer class="fondo">
		<?php 
			include('../layout/pie.php');
		 ?>			

	</footer>

	<!-- Modal -->
	<div id="modalEditar" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg">
	    <!-- Modal content-->
	    <form id="frmActualiza">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Editar datos de patron</h4>
	      </div>
	      <div class="modal-body">
				<input type="hidden" id="idEP">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<div class="form-group">
							<label for="nregpatronalE">Ingrese el Numero de Registro Patronal:</label>
							<input type="text" id="nregpatronalE" class="form-control " autofocus="" required="" placeholder="Escribe el Numero de Registro Patronal">
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<div class="form-group">
							<label for="nombreCompletoE">Nombre Completo del Patron:</label>
							<input type="text" id="nombreCompletoPE" class="form-control " autofocus="" required="" placeholder="Escribe el Nombre Completo del Patron">
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
						<div class="form-group">
							<label for="nombreE">Nombre:</label>
							<input type="text" id="nombrePE" class="form-control " autofocus="" required="" placeholder="Escribe el Nombre del Patron">
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
						<div class="form-group">
							<label for="paternoE">Apellido Paterno:</label>
							<input type="text" id="paternoPE" class="form-control " required="" placeholder="Escribe el Apellido Paterno">
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
						<div class="form-group">
							<label for="maternoE">Apellido Materno:</label>
							<input type="text" id="maternoPE" class="form-control " required="" placeholder="Escribe el Apellido Materno">
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<div class="form-group">
							<label for="ciudadE">Ciudad o Municipio:</label>
							<input type="text" id="ciudadPE" class="form-control " required="" placeholder="Escribe la Ciudad o Municipio">
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<div class="form-group">
							<label for="direccionE">Dirección:</label>
							<input type="text" id="direccionPE" class="form-control " required="" placeholder="Escribe la Dirección">
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
						<div class="form-group">
							<label for="sexoPE">Sexo:</label>
							<select  id="sexoPE" class="form-control " style="width: 100%">
								<option value="">Seleccione ...</option>
								<option value="M">Masculino</option>
								<option value="F">Femenino</option>
							</select>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
						<div class="form-group">
							<label for="telefonoPE">Teléfono:</label>
							<input type="text" id="telefonoPE" class="form-control " required="" placeholder="Escribe el telefono">
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
						<div class="form-group">
							<label for="fecha_nacPE">Fecha de Nacimiento:</label>
							<input type="date" id="fecha_nacPE" class="form-control " required="" placeholder="yyyy-mm-dd" value="<?php echo $fecha;?>">
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="form-group">
							<label for="correoPE">Correo:</label>
							<input type="text" id="correoPE" class="form-control " required="" placeholder="Escribe el Correo Electronico">
						</div>
					</div>
					<hr class="linea">
				</div>
	      </div>
	      <div class="modal-footer">
				<div class="row">
					<div class="col-lg-12">
						<button type="button" id="btnCerrar" class="btn btn-login  btn-flat  pull-left" data-dismiss="modal">Cerrar</button>
						<input type="submit" class="btn btn-login  btn-flat  pull-right" value="Actualizar Información">	
					</div>
				</div>
	      </div>
	    </div>
		</form>
	  </div>
	</div>
	<!-- Modal -->

	<form id="frmDesactivarAsegurado" action="" method="POST">
			<input type="hidden" id="idUP" name="idU" value="">
			
			<!-- Modal -->
			<div class="modal fade" id="modalDesactivar" tabindex="-1" role="dialog" aria-labelledby="modalDesactivarLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="modalDesactiivarLabel">Eliminar Patron</h4>
						</div>
						<div class="modal-body">							
							¿Está seguro de eliminar al patron?<strong data-name=""></strong>
						</div>
						<div class="modal-footer">
							<button type="button" id="aceptar" onclick="" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal -->
		</form>

	<!-- ENLACE A ARCHIVOS JS -->

	<!-- jquery -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>

    <!-- Select2 -->
    <script src="../plugins/select2/select2.full.min.js"></script>

    <!-- Bootstrap 3.3.5 -->
    <script src="../plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- DataTables -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>

	<!-- Preloaders -->
    <script src="../plugins/Preloaders/jquery.preloaders.js"></script>

	<!-- bootstrap-toggle-master -->
    <script src="../plugins/bootstrap-toggle-master/doc/script.js"></script>
    <script src="../plugins/bootstrap-toggle-master/js/bootstrap-toggle.js"></script>

 	 <!-- dataTableButtons -->
    <script type="text/javascript" src="../plugins/dataTableButtons/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/buttons.flash.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/buttons.colVis.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/jszip.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/pdfmake.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/vfs_fonts.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/buttons.html5.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/buttons.print.min.js"></script>
	
	<!-- alertify -->
	<script type="text/javascript" src="../plugins/alertifyjs/alertify.js"></script>

    <!-- Funciones propias -->
    <script src="funciones.js"></script>
    <script src="../js/menu.js"></script>
    <script src="../js/precarga.js"></script>
		<script src="../js/salir.js"></script>
		<script src="../js/cambiarcontra.js"></script>
	<script src="../js/editardatos.js"></script>

    <!-- LLAMADAS A FUNCIONES E INICIALIZACION DE COMPONENTES -->

    <!-- Llamar la funcion para llenar la lista -->
	<script type="text/javascript">
		llenar_lista();
	</script>

    <!-- Inicializador de elemento -->
     <script>
      $(function () {
        $(".select2").select2();
        
      });
    </script> 

	<script>
		var letra ='<?php echo $opcionMenu; ?>';
		$(document).ready(function() { menuActivo(letra); });
	</script>

	<script type="text/javascript" src="../plugins/stacktable/stacktable.js"></script>
	<script>
		window.onload = function() {
			$("#listaInicial").fadeIn("slow");
			$("#menu").fadeIn("slow");
			$("#titulo").fadeIn("slow");
		};	
	</script> 
</body>
</html>