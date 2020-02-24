<?php 
	include('../conexion/conexion.php');
	$nomb=$_POST["nombre"];

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../plugins/fontawesome-free-5.8.1-web/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">

		<!-- select2 -->
		<link rel="stylesheet" href="../plugins/select2/select2.css">
	<!-- Alertify	 -->
	<link rel="stylesheet" type="text/css" href="../plugins/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="../plugins/alertifyjs/css/themes/bootstrap.css">

	    <!-- bootstrap-toggle-master -->
	<link href="../plugins/bootstrap-toggle-master/css/bootstrap-toggle.css" rel="stylesheet">
	<link href="../plugins/bootstrap-toggle-master/stylesheet.css" rel="stylesheet">
	
	<link rel="stylesheet" href="../plugins/animate/animate.css">
</head>
<body>

	<div class="container">
		<section id="registro" style="display: none">
			<br><br>
			<center><h3>BIENVENIDOS</h3></center>
				<div class="contenido borde sombra " style="padding-right:18px;">
					<ul class="nav nav-tabs nav-justified animated zoomIn">
						<li class="active colornav"><a data-toggle="tab" href="#menu1">Registro Patronal</a></li>
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
				<center>
					<br>
					<button type="submit" class="btn btn-login btn-md  btn-flat  pull-center" id="btnlogin" onclick="verlogin()">
						<i class="fas fa-lock-open"></i>
						Login
					</button>
				</center>
		</section>
	</div>

	<div class="container">
		<section id="administracion" style="display: none">
			<br><br>
			<center><h3>BIENVENIDOS</h3></center>
				<div class="contenido borde sombra " style="padding-right:18px;">
					<ul class="nav nav-tabs nav-justified animated zoomIn">
						<li class="active colornav"><a data-toggle="tab" href="#menu3">Registro Visitantes</a></li>
						<li class="colornav"><a data-toggle="tab" href="#menu4">Registro Proveedores</a></li>
					</ul>
					<div class="tab-content">
						<div id="menu3" class="tab-pane fade in active">
							<br>
							<section id="registro_visitantes"></section>
						</div>
						<div id="menu4" class="tab-pane fade">
							<br>
							<section id="registro_proveedores"></section>
						</div>
					</div>
				</div>
				<center>
					<br>
					<button type="submit" class="btn btn-login btn-md  btn-flat  pull-center animated bounceInRight" id="btnlogin" onclick="verlogin_administracion()">
						<i class="fas fa-lock-open"></i>
						Login
					</button>
				</center>
		</section>
	</div>
	
	<div class="container" style="display:none" id="cuerpo">	
		<section id="login">	
		<div class="row justify-content-md-center">
			<div class="col-md-auto login-box borde sombra animated fadeInLeft">
				<h3 class="text-center titulo">Iniciar Sesión</h3>
				<hr>
				<section id="login">
						<form id="frmIngreso">
						<div class="form-row">
							<div class="col-md-12">
								<label for="" class="colorLetra">Nombre de usuario:</label>
						          <div class="form-group has-feedback salto">
						            <input type="text" id="username" placeholder="Usuario" class="form-control " autofocus>
						            <span class="glyphicon glyphicon-user form-control-feedback"></span>
						          </div>
							</div>
							<div class="col-md-12">
								<label for="" class="colorLetra">Contraseña:</label>
						          <div class="form-group has-feedback salto">
						            <input type="password" id="pass" placeholder="Contraseña" class="form-control " >
						            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
						          </div>
							</div>
						</div>
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-12 animated fadeInUpBig">
													<input id="chkContra"  onchange='evaluarCheck(this.value)' data-on="Si" data-off="No" type="checkbox" checked data-toggle="toggle" data-size="mini" value='no'><label class="colorLetra"> &nbsp; Cambiar Contraseña</label>
			              			<button type="submit" class="btn btn-login  btn-flat  pull-right" id="btnIngresar">
				              			<i class="fas fa-lock-open"></i>
				              			Ingresar
			              			</button>
		              			</div>
		            		</div><!-- /.col -->
						</div>
					</form>	
			</div>	
			<div class="col-lg-6">
				<div align="right">
					<a class="btn btn-login  btn-flat  pull-center animated fadeInUpBig" id="btnregistrar" href="../mRegistroP_A/index.php">
						<i class="far fa-list-alt"></i>
						Registro Patronal y Asegurados
					</a>
				</div>
			</div>
			<div  class="col-lg-6">
				<a  class="btn btn-login  btn-flat  pull-center animated fadeInUpBig" id="btnregistrar" href="../mRegistrosAdministracion/index.php">
          			<i class="far fa-list-alt"></i>
          			Registro Administración
		        </a>
			</div>
		</section>
	</div>

	<div class="container" style="display:none" id="cambiarContra">
		<div class="row justify-content-md-center">
			<div class="col-md-auto login-box borde sombra">
				<h3 class="text-center titulo">Cambiar Contraseña</h3>
				<hr>
				<form id="frmCambiar">
					<div class="form-row">
						<div class="col-md-12">
							<input type="hidden" id="usuario" class="form-control">
						<div class="col-md-12">
							<label for="" class="colorLetra">Contraseña:</label>
					          <div class="form-group has-feedback salto">
					            <input type="password" id="vContra1"  class="form-control " >
					            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
					          </div>
						</div>
						<div class="col-md-12">
							<label for="" class="colorLetra">Verificar Contraseña:</label>
					          <div class="form-group has-feedback salto">
					            <input type="password" id="vContra2"  class="form-control " >
					            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
					          </div>
						</div>
					</div>
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
												<button type="button" class="btn btn-login  btn-flat  pull-left" id="btnCancelar" onclick="cancelar()">
			              			<i class="fas fa-times"></i>
			              			Cancelar
		              			</button>
		              			<button type="submit" class="btn btn-login  btn-flat  pull-right" id="btnActualizar">
			              			<i class="fas fa-lock-open"></i>
			              			Actualizar
		              			</button>
	              			</div>
	            		</div><!-- /.col -->
					</div>
				</form>
			</div>
		</div>
	</div>

	
	
	<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<script src="../plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="../plugins/Preloaders/jquery.preloaders.js"></script>
	<script src="../plugins/select2/select2.full.min.js"></script>

	<!-- alertify -->
	<script type="text/javascript" src="../plugins/alertifyjs/alertify.js"></script>
	<!-- bootstrap-toggle-master -->
	<script src="../plugins/bootstrap-toggle-master/doc/script.js"></script>
    <script src="../plugins/bootstrap-toggle-master/js/bootstrap-toggle.js"></script>
    <!-- Funciones propias -->
    <script src="funciones.js"></script>
    <script src="../js/menu.js"></script>
    <script src="../js/precarga.js"></script>
	    <!-- Inicializador de elemento -->
	<script>
		$(function () {
			$(".select2").select2();
		});
    </script> 
	<script type="text/javascript">
		//   llenar_lista();
		// llenar_registro_asegurados();
		// llenar_registro_patronal();

		// llenar_registro_proveedores();
		// llenar_registro_visitante();

		// llenar_ciudad();
		// llenar_departamento();
		// llenar_tramite();

		// llenar_ciudadA();
		// llenar_departamentoA();
		// llenar_tramiteA();
	</script>
<script type="text/javascript" src="../plugins/stacktable/stacktable.js"></script> 
    <!-- Plugin Voice -->

    <script type="text/javascript" src="../plugins/voice/responsivevoice.js"></script>
	<script>
		window.onload = function() {
			$("#cuerpo").fadeIn("slow");
			$("#username").focus();
		};	

		$('#chkContra').bootstrapToggle('off');
		$('#chkContra').val('no');

	</script>


</body>
</html>