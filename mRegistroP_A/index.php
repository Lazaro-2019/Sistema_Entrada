<?php 
include('../conexion/conexion.php');
// include('../sesiones/verificar_sesion.php');
// include('../funcionesPHP/filtroUsuario.php');
// $tUsuario=$_SESSION["user_tipo"];
// userE($tUsuario);
// Variables de configuración
$titulo="Módulo de Registros";
$opcionMenu="A";

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registros</title>

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

	<div class="container" >
	<br><br>
	<center><h3>BIENVENIDOS</h3></center>
			   <div class="contenido borde sombra">

							<div class="contenido   " style="padding-right:18px;">
								<ul class="nav nav-tabs nav-justified animated zoomIn">
									<li class="active colornav"><a data-toggle="tab" href="#menu1">Registro Patrones</a></li>
									<li class="colornav"><a data-toggle="tab" href="#menu2">Registro Asegurados</a></li>
								</ul>
								<div class="tab-content">
									<div id="menu1" class="tab-pane fade in active">
										<br>
										<section id="registro_patronal"></section>

									</div>
									<div id="menu2" class="tab-pane fade">
										<br>
										<section id="registro_asegurado"></section>

									</div>
								</div>
							</div>
							
			   </div>
			   <center>
					<br>
					<a class="btn btn-login btn-md  btn-flat  pull-center animated bounceInUp delay-1s" id="btnlogin" href="../login/index.php">
						<i class="fas fa-lock-open"></i>
						Login
					</a>
				</center>	

			</div>			


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


    <!-- LLAMADAS A FUNCIONES E INICIALIZACION DE COMPONENTES -->

    <!-- Llamar la funcion para llenar la lista -->
	<script type="text/javascript">
	//   llenar_lista();
	llenar_registro_asegurados();
	llenar_registro_patronal();
	llenar_ciudad();


	// llenar_ciudadA();
	// llenar_departamentoA();
	// llenar_tramiteA();
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