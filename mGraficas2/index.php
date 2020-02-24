<?php 
// include('../conexion/conexion.php');

// // Variables de configuración
$titulo="Gráficas de Buen Trato";
$asegurados="asegurados";
$patrones="patrones";
// $opcionMenu="A";
$fecha=date("Y-m-d"); 
// $mes=date("m");
// $year=date("Y");
// $anteriores=$mes-6;
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Gráficas</title>

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
		<div class="col-xs-0 col-sm-3 col-md-2 col-lg-2 vertical" >
			<?php 
				include('menuv.php');
			 ?>
			</div>
			<div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 cont">
			   <div class="titulo borde sombra">
			        <h3><?php echo $titulo; ?></h3>
			   </div>	
			   <div class="contenido borde sombra">
				    <div class="container-fluid">
						<div class="row">
							<div class="col-lg-3 col-md-6">
								<br>
								<div class="panel colorArchivo textoPanel2 animated bounceIn">
									<div class="panel-heading">
										<div class="row">
											<div class="col-xs-1">
												<i class="fas fa-chart-pie iconoArchivo"></i>
											</div>
											<div class="col-xs-11 text-right textoPanel">
												<!-- <div class="huge">26</div> -->
												<i class="letraGrafica">Encuesta de Asegurados</i>
												<br>
											</div>
										</div>
									</div>
									<a data-toggle="tooltip" data-placement="bottom" id="botonModal" title="" onclick="abrirModalGrafica();">
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
								<div class="panel colorArchivo textoPanel2 animated bounceIn">
									<div class="panel-heading">
										<div class="row">
											<div class="col-xs-1">
												<i class="fas fa-chart-pie iconoArchivo"></i>
											</div>
											<div class="col-xs-11 text-right textoPanel">
												<!-- <div class="huge">26</div> -->
												<i class="letraGrafica">Encuesta de Patrones</i>
												<br>
											</div>
										</div>
									</div>
									<a data-toggle="tooltip" data-placement="bottom" id="botonModal" title="" onclick="abrirModalGraficaP();">
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
								<div class="panel colorArchivo textoPanel2 animated bounceIn">
									<div class="panel-heading">
										<div class="row">
											<div class="col-xs-1">
												<i class="fas fa-chart-pie iconoArchivo"></i>
											</div>
											<div class="col-xs-11 text-right textoPanel">
												<!-- <div class="huge">26</div> -->
												<i class="letraGrafica">Encuesta de Proveedores</i>
												<br>
											</div>
										</div>
									</div>
									<a data-toggle="tooltip" data-placement="bottom" id="botonModal" title="" onclick="abrirModalGraficaPRV();">
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
								<div class="panel colorArchivo textoPanel2 animated bounceIn">
									<div class="panel-heading">
										<div class="row">
											<div class="col-xs-1">
												<i class="fas fa-chart-pie iconoArchivo"></i>
											</div>
											<div class="col-xs-11 text-right textoPanel">
												<!-- <div class="huge">26</div> -->
												<i class="letraGrafica">Encuesta de Visitantes</i>
												<br>
											</div>
										</div>
									</div>
									<a data-toggle="tooltip" data-placement="bottom" id="botonModal" title="" onclick="abrirModalGraficaVI();">
										<div class="panel-footer colorArchivo_base">
											<span class="pull-left">Mostrar</span>
											<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
											<div class="clearfix"></div>
										</div>
									</a>
								</div>
							</div>
						</div>
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
			<div id="modalGrafica" class="modal fade" role="dialog">
				<div class="modal-dialog modal-lg">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Grafica de Buen Trato de Asegurados</h4>
							<input type="hidden" id="idM" value="asegurados">
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-lg-2">
									<br>
									<label for="Telefono">Total de personas encuestadas:</label>
									<input type="text" id="total" class="form-control ">
									<br><br><br>
										<label for="Telefono">Personas que respondiero SI:</label>
										<input type="text" id="si" class="form-control ">
										<br><br><br>
										<label for="Telefono">Personas que respondiero NO:</label>
										<input type="text" id="no" class="form-control ">
										
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
									<label for="fechaM">Seleccione la Fecha:</label>
									<input type="date" id="fechaModal" class="form-control" placeholder="yyyy-mm-dd" value="<?php echo $fecha;?>">
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
									<label for="departamento">Seleccione el departamento:</label>
									<select  id="departamento" class="select2 form-control " style="width: 100%">
									</select>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
									<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
								</div>
							</div>

						</div>
						<div class="modal-footer">
							<div class="row">
								<div class="col-lg-12">
									<button type="button" id="btnCerrar" class="btn btn-login  btn-flat  pull-left" data-dismiss="modal">Cerrar</button>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- Modal -->

		<!-- Modal -->
		<div id="modalGraficaP" class="modal fade" role="dialog">
				<div class="modal-dialog modal-lg">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Grafica de Buen Trato de Patrones</h4>
							<input type="hidden" id="idMP" value="patrones">
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-lg-2">
									<br>
									<label for="Telefono">Total de personas encuestadas:</label>
									<input type="text" id="totalP" class="form-control ">
									<br><br><br>
										<label for="Telefono">Personas que respondiero SI:</label>
										<input type="text" id="siP" class="form-control ">
										<br><br><br>
										<label for="Telefono">Personas que respondiero NO:</label>
										<input type="text" id="noP" class="form-control ">
										
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
									<label for="fechaM">Seleccione la Fecha:</label>
									<input type="date" id="fechaModalP" class="form-control" placeholder="yyyy-mm-dd" value="<?php echo $fecha;?>">
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
									<label for="departamentoP">Seleccione el departamento:</label>
									<select  id="departamentoP" class="select2 form-control " style="width: 100%">
									</select>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
									<div id="containerP" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
								</div>
							</div>

						</div>
						<div class="modal-footer">
							<div class="row">
								<div class="col-lg-12">
									<button type="button" id="btnCerrar" class="btn btn-login  btn-flat  pull-left" data-dismiss="modal">Cerrar</button>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- Modal -->

				<!-- Modal -->
				<div id="modalGraficaPRV" class="modal fade" role="dialog">
				<div class="modal-dialog modal-lg">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Grafica de Buen Trato de Proveedores</h4>
							<input type="hidden" id="idMPRV" value="proveedores">
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-lg-2">
									<br>
									<label for="Telefono">Total de proveedores encuestados:</label>
									<input type="text" id="totalPRV" class="form-control ">
									<br><br><br>
										<label for="Telefono">Proveedores que respondiero SI:</label>
										<input type="text" id="siPRV" class="form-control ">
										<br><br><br>
										<label for="Telefono">Proveedores que respondiero NO:</label>
										<input type="text" id="noPRV" class="form-control ">
										
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
									<label for="fechaM">Seleccione la Fecha:</label>
									<input type="date" id="fechaModalPRV" class="form-control" placeholder="yyyy-mm-dd" value="<?php echo $fecha;?>">
								</div>
								<!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
									<label for="departamentoP">Seleccione el departamento:</label>
									<select  id="departamentoP" class="select2 form-control " style="width: 100%">
									</select>
								</div> -->
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
									<div id="containerPRV" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
								</div>
							</div>

						</div>
						<div class="modal-footer">
							<div class="row">
								<div class="col-lg-12">
									<button type="button" id="btnCerrar" class="btn btn-login  btn-flat  pull-left" data-dismiss="modal">Cerrar</button>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- Modal -->

		<!-- Modal -->
			<div id="modalGraficaVI" class="modal fade" role="dialog">
				<div class="modal-dialog modal-lg">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Grafica de Buen Trato de Visitantes</h4>
							<input type="hidden" id="idMVI" value="visitantes">
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-lg-2">
									<br>
									<label for="Telefono">Total de visitantes encuestados:</label>
									<input type="text" id="totalVI" class="form-control ">
									<br><br><br>
										<label for="Telefono">Visitantes que respondiero SI:</label>
										<input type="text" id="siVI" class="form-control ">
										<br><br><br>
										<label for="Telefono">Visitantes que respondiero NO:</label>
										<input type="text" id="noVI" class="form-control ">
										
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
									<label for="fechaM">Seleccione la Fecha:</label>
									<input type="date" id="fechaModalVI" class="form-control" placeholder="yyyy-mm-dd" value="<?php echo $fecha;?>">
								</div>
								<!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
									<label for="departamentoP">Seleccione el departamento:</label>
									<select  id="departamentoP" class="select2 form-control " style="width: 100%">
									</select>
								</div> -->
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
									<div id="containerVI" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
								</div>
							</div>

						</div>
						<div class="modal-footer">
							<div class="row">
								<div class="col-lg-12">
									<button type="button" id="btnCerrar" class="btn btn-login  btn-flat  pull-left" data-dismiss="modal">Cerrar</button>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- Modal -->

	<!-- ENLACE A ARCHIVOS JS -->

	<script src="../plugins/highcharts/highcharts.js"></script>
	<script src="../plugins/highcharts/exporting.js"></script>
	
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
	
	<script type="text/javascript">
		llenar_grafica();
		llenar_cantidad();
		llenar_departamento();

		llenar_graficaP();
		llenar_cantidadP();
		llenar_departamentoP();
	</script>

    <!-- LLAMADAS A FUNCIONES E INICIALIZACION DE COMPONENTES -->

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