<?php 
	include('../conexion/conexion.php');
	include('../sesiones/verificar_sesion.php');
	
	$tUsuario=$_SESSION["user_tipo"];
$fecha=date("Y-m-d");
	// Codificacion de lenguaje
	mysql_query("SET NAMES utf8");

	$consulta=mysql_query("SELECT 
								id_registro
							FROM registropatrones WHERE fecha_ingreso='$fecha'",$conexion) or die (mysql_error());
	$consulta2=mysql_query("SELECT 
								id_registro
							FROM registroasegurados WHERE fecha_ingreso='$fecha'",$conexion) or die (mysql_error());
	$consulta3=mysql_query("SELECT 
								id_asegurado
							FROM asegurados",$conexion) or die (mysql_error());
	$consulta4=mysql_query("SELECT 
								id_patron
							FROM patrones",$conexion) or die (mysql_error());
	$consulta5=mysql_query("SELECT 
								id_registro
							FROM registroproveedores WHERE fecha_ingreso='$fecha'",$conexion) or die (mysql_error());
	$consulta6=mysql_query("SELECT 
								id_proveedor
							FROM proveedores",$conexion) or die (mysql_error());
	$consulta7=mysql_query("SELECT 
								id_registro
							FROM registrovisitantes WHERE fecha_ingreso='$fecha'",$conexion) or die (mysql_error());
	$consulta8=mysql_query("SELECT 
								id_visitante
							FROM visitantes",$conexion) or die (mysql_error());

	$cantidad=mysql_num_rows($consulta);
	$cantidad2=mysql_num_rows($consulta2);
	$cantidad3=mysql_num_rows($consulta3);
	$cantidad4=mysql_num_rows($consulta4);
	$cantidad5=mysql_num_rows($consulta5);
	$cantidad6=mysql_num_rows($consulta6);
	$cantidad7=mysql_num_rows($consulta7);
	$cantidad8=mysql_num_rows($consulta8);


// Variables de configuración
$titulo="Panel Inicial";
$opcionMenu="A";

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sistema de Registros</title>
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

	<link rel="stylesheet" href="../plugins/animate/animate.css">
</head>
<body>
	<header>
		<?php 
			include('../layout/encabezado.php');
		 ?>
	</header><!-- /header -->	
	<div class="container-fluid" >
		<div class="row" id="cuerpo" style="display:none">
			<div class="col-xs-0 col-sm-3 col-md-2 col-lg-2">
			<?php 
				include('../layout/menuv.php');
			 ?>
			</div>
			<div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 cont">
			   <div class="titulo borde sombra">
			        <h3><?php echo $titulo; ?></h3>
			   </div>	
				<div class="contenido borde sombra">
					<div class="container-fluid">
						<?php 
							if ($tUsuario=='Administrador') 
							{
						?>
								<div class="col-lg-3 col-md-6">
									<br>
									<div class="panel colorArchivo textoPanel2 animated flipInX">
										<div class="panel-heading">
											<div class="row">
												<div class="col-xs-1">
													<i class="far fa-list-alt iconoArchivo"></i>
												</div>
												<div class="col-xs-11 text-right textoPanel">
													<!-- <div class="huge">26</div> -->
													<i class="letraArchivoRegistros"><?php echo $cantidad ?></i>
													<br>
													<p class="letraArchivo">Registros de Patrones de Hoy</p>
												</div>
											</div>
										</div>
										<a data-toggle="tooltip" data-placement="bottom" title="" href="../mRegistrosPatrones/index.php">
											<div class="panel-footer colorArchivo_base">
												<span class="pull-left">Mostrar</span>
												<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

												<div class="clearfix"></div>
											</div>
										</a>
									</div>
								</div>

								<div class="col-lg-3 col-md-6">
									<br>
									<div class="panel colorArchivo textoPanel2 animated flipInX">
										<div class="panel-heading">
											<div class="row">
												<div class="col-xs-1">
													<i class="far fa-list-alt iconoArchivo"></i>
												</div>
												<div class="col-xs-11 text-right textoPanel">
													<!-- <div class="huge">26</div> -->
													<i class="letraArchivoRegistros"><?php echo $cantidad2 ?></i>
													<br>
													<p class="letraArchivo">Registros de Asegurados de Hoy</p>
												</div>
											</div>
										</div>
										<a data-toggle="tooltip" data-placement="bottom" title="" href="../mRegistrosAsegurados/index.php">
											<div class="panel-footer colorArchivo_base">
												<span class="pull-left">Mostrar</span>
												<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

												<div class="clearfix"></div>
											</div>
										</a>
									</div>
								</div>

								<div class="col-lg-3 col-md-6">
									<br>
									<div class="panel colorArchivo textoPanel2 animated flipInX">
										<div class="panel-heading">
											<div class="row">
												<div class="col-xs-1">
													<i class="fas fa-user-shield iconoArchivo"></i>
												</div>
												<div class="col-xs-11 text-right textoPanel">
													<!-- <div class="huge">26</div> -->
													<i class="letraArchivoRegistros"><?php echo $cantidad3 ?></i>
													<br>
													<p class="letraArchivo">Asegurados Registrados</p>
												</div>
											</div>
										</div>
										<a data-toggle="tooltip" data-placement="bottom" title="" href="../mAsegurados/index.php">
											<div class="panel-footer colorArchivo_base">
												<span class="pull-left">Mostrar</span>
												<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

												<div class="clearfix"></div>
											</div>
										</a>
									</div>
								</div>

								<div class="col-lg-3 col-md-6">
									<br>
									<div class="panel colorArchivo textoPanel2 animated flipInX">
										<div class="panel-heading">
											<div class="row">
												<div class="col-xs-1">
													<i class="fas fa-user-tie iconoArchivo"></i>
												</div>
												<div class="col-xs-11 text-right textoPanel">
													<!-- <div class="huge">26</div> -->
													<i class="letraArchivoRegistros"><?php echo $cantidad4 ?></i>
													<br>
													<p class="letraArchivo">Patrones Registrados</p>
												</div>
											</div>
										</div>
										<a data-toggle="tooltip" data-placement="bottom" title="" href="../mPatrones/index.php">
											<div class="panel-footer colorArchivo_base">
												<span class="pull-left">Mostrar</span>
												<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

												<div class="clearfix"></div>
											</div>
										</a>
									</div>
								</div>
								<div class="col-lg-3 col-md-6">
									<br>
									<div class="panel colorArchivo textoPanel2 animated flipInX">
										<div class="panel-heading">
											<div class="row">
												<div class="col-xs-1">
													<i class="far fa-list-alt iconoArchivo"></i>
												</div>
												<div class="col-xs-11 text-right textoPanel">
													<!-- <div class="huge">26</div> -->
													<i class="letraArchivoRegistros"><?php echo $cantidad5 ?></i>
													<br>
													<p class="letraArchivo">Registros de Proveedores de Hoy</p>
												</div>
											</div>
										</div>
										<a data-toggle="tooltip" data-placement="bottom" title="" href="../mRegistrosProveedores/index.php">
											<div class="panel-footer colorArchivo_base">
												<span class="pull-left">Mostrar</span>
												<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

												<div class="clearfix"></div>
											</div>
										</a>
									</div>
								</div>
								<div class="col-lg-3 col-md-6">
									<br>
									<div class="panel colorArchivo textoPanel2 animated flipInX">
										<div class="panel-heading">
											<div class="row">
												<div class="col-xs-1">
													<i class="far fa-list-alt iconoArchivo"></i>
												</div>
												<div class="col-xs-11 text-right textoPanel">
													<!-- <div class="huge">26</div> -->
													<i class="letraArchivoRegistros"><?php echo $cantidad7 ?></i>
													<br>
													<p class="letraArchivo">Registros de Visitantes de Hoy</p>
												</div>
											</div>
										</div>
										<a data-toggle="tooltip" data-placement="bottom" title="" href="../mRegistrosVisitantes/index.php">
											<div class="panel-footer colorArchivo_base">
												<span class="pull-left">Mostrar</span>
												<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

												<div class="clearfix"></div>
											</div>
										</a>
									</div>
								</div>
								<div class="col-lg-3 col-md-6">
									<br>
									<div class="panel colorArchivo textoPanel2 animated flipInX">
										<div class="panel-heading">
											<div class="row">
												<div class="col-xs-1">
													<i class="fas fa-truck iconoArchivo"></i>
												</div>
												<div class="col-xs-11 text-right textoPanel">
													<!-- <div class="huge">26</div> -->
													<i class="letraArchivoRegistros"><?php echo $cantidad6 ?></i>
													<br>
													<br>
													<p class="letraArchivo">Proveedores Registrados</p>
												</div>
											</div>
										</div>
										<a data-toggle="tooltip" data-placement="bottom" title="" href="../mProveedores/index.php">
											<div class="panel-footer colorArchivo_base">
												<span class="pull-left">Mostrar</span>
												<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

												<div class="clearfix"></div>
											</div>
										</a>
									</div>
								</div>
								<div class="col-lg-3 col-md-6">
									<br>
									<div class="panel colorArchivo textoPanel2 animated flipInX">
										<div class="panel-heading">
											<div class="row">
												<div class="col-xs-1">
													<i class="fas fa-user-tag iconoArchivo"></i>
												</div>
												<div class="col-xs-11 text-right textoPanel">
													<!-- <div class="huge">26</div> -->
													<i class="letraArchivoRegistros"><?php echo $cantidad8 ?></i>
													<br>
													<br>
													<p class="letraArchivo">Visitantes Registrados</p>
												</div>
											</div>
										</div>
										<a data-toggle="tooltip" data-placement="bottom" title="" href="../mVisitantes/index.php">
											<div class="panel-footer colorArchivo_base">
												<span class="pull-left">Mostrar</span>
												<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

												<div class="clearfix"></div>
											</div>
										</a>
									</div>
								</div>

								<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
						<?php
							}
							else
							{
						?>
						<!-- //////////////////////////////////////////////// -->
								<div class="col-lg-3 col-md-6">
									<br>
									<div class="panel colorArchivo textoPanel2 animated flipInX">
										<div class="panel-heading">
											<div class="row">
												<div class="col-xs-1">
													<i class="far fa-list-alt iconoArchivo"></i>
												</div>
												<div class="col-xs-11 text-right textoPanel">
													<!-- <div class="huge">26</div> -->
													<i class="letraArchivoRegistros"><?php echo $cantidad ?></i>
													<br>
													<p class="letraArchivo">Registros de Patrones de Hoy</p>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-md-6">
									<br>
									<div class="panel colorArchivo textoPanel2 animated flipInX">
										<div class="panel-heading">
											<div class="row">
												<div class="col-xs-1">
													<i class="far fa-list-alt iconoArchivo"></i>
												</div>
												<div class="col-xs-11 text-right textoPanel">
													<!-- <div class="huge">26</div> -->
													<i class="letraArchivoRegistros"><?php echo $cantidad2 ?></i>
													<br>
													<p class="letraArchivo">Registros de Asegurados de Hoy</p>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-md-6">
									<br>
									<div class="panel colorArchivo textoPanel2 animated flipInX">
										<div class="panel-heading">
											<div class="row">
												<div class="col-xs-1">
													<i class="fas fa-user-shield iconoArchivo"></i>
												</div>
												<div class="col-xs-11 text-right textoPanel">
													<!-- <div class="huge">26</div> -->
													<i class="letraArchivoRegistros"><?php echo $cantidad3 ?></i>
													<br>
													<p class="letraArchivo">Asegurados Registrados</p>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-md-6">
									<br>
									<div class="panel colorArchivo textoPanel2 animated flipInX">
										<div class="panel-heading">
											<div class="row">
												<div class="col-xs-1">
													<i class="fas fa-user-tie iconoArchivo"></i>
												</div>
												<div class="col-xs-11 text-right textoPanel">
													<!-- <div class="huge">26</div> -->
													<i class="letraArchivoRegistros"><?php echo $cantidad4 ?></i>
													<br>
													<p class="letraArchivo">Patrones Registrados</p>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-lg-3 col-md-6">
									<br>
									<div class="panel colorArchivo textoPanel2 animated flipInX">
										<div class="panel-heading">
											<div class="row">
												<div class="col-xs-1">
													<i class="far fa-list-alt iconoArchivo"></i>
												</div>
												<div class="col-xs-11 text-right textoPanel">
													<!-- <div class="huge">26</div> -->
													<i class="letraArchivoRegistros"><?php echo $cantidad2 ?></i>
													<br>
													<p class="letraArchivo">Registros de Proveedores de Hoy</p>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-lg-3 col-md-6">
									<br>
									<div class="panel colorArchivo textoPanel2 animated flipInX">
										<div class="panel-heading">
											<div class="row">
												<div class="col-xs-1">
													<i class="far fa-list-alt iconoArchivo"></i>
												</div>
												<div class="col-xs-11 text-right textoPanel">
													<!-- <div class="huge">26</div> -->
													<i class="letraArchivoRegistros"><?php echo $cantidad2 ?></i>
													<br>
													<p class="letraArchivo">Registros de Visitantes de Hoy</p>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-md-6">
									<br>
									<div class="panel colorArchivo textoPanel2 animated flipInX">
										<div class="panel-heading">
											<div class="row">
												<div class="col-xs-1">
													<i class="fas fa-truck iconoArchivo"></i>
												</div>
												<div class="col-xs-11 text-right textoPanel">
													<!-- <div class="huge">26</div> -->
													<i class="letraArchivoRegistros"><?php echo $cantidad4 ?></i>
													<br>
													<p class="letraArchivo">Proveedores Registrados</p>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-md-6">
									<br>
									<div class="panel colorArchivo textoPanel2 animated flipInX">
										<div class="panel-heading">
											<div class="row">
												<div class="col-xs-1">
													<i class="fas fa-user-tag iconoArchivo"></i>
												</div>
												<div class="col-xs-11 text-right textoPanel">
													<!-- <div class="huge">26</div> -->
													<i class="letraArchivoRegistros"><?php echo $cantidad4 ?></i>
													<br>
													<p class="letraArchivo">Visitantes Registrados</p>
												</div>
											</div>
										</div>
									</div>
								</div>
						<?php
							}
						?>
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
	
	<!-- <script src="../js/menu.js"></script> -->
	<script src="../js/precarga.js"></script>
	<script src="../js/salir.js"></script>
	<script src="../plugins/bootstrap/js/bootstrap.min.js"></script>

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

	<script>
		window.onload = function() {
			$("#cuerpo").fadeIn("slow");
		};	
	</script>

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
			$("#cuerpo").fadeIn("slow");
		};	
	</script>
</body>
</html>