<?php 
include('../sesiones/verificar_sesion.php');

$tUsuario=$_SESSION["user_tipo"];

if ($tUsuario=='Administrador') 
{
?>
				<div class="sidebar fondo borde fuenteAzul sombra vertical" >
					<h2 class="fondo"><?php echo $tUsuario;?></h2>
					<ul class="menuv">
						<li class="list-unstyled icoMedia">
							<a href="#" class="activo"><i class="fas fa-home"></i><label class="modulo">Inicio</label> </a>
						</li>
						<li class="list-unstyled icoMedia">
							<a href="../mPersonas/index.php"><i class="fas fa-users"></i><label class="modulo">Personas</label> </a>
						</li>
						<li class="list-unstyled icoMedia">
							<a href="../mUsuarios/index.php"><i class="fas fa-user-cog"></i><label class="modulo">Usuarios</label>  </a>
						</li >
						<li class="list-unstyled icoMedia">
							<a href="../mDepartamentos/index.php"><i class="fas fa-stream"></i><label class="modulo">Departamentos</label>  </a>
						</li>
						<li class="list-unstyled icoMedia">
							<a href="../mTramites/index.php"><i class="fas fa-file-alt"></i><label class="modulo">Trámites</label>  </a>
						</li>
						<li class="list-unstyled icoMedia">
							<a href="../mMunicipios/index.php"><i class="fas fa-globe-americas"></i><label class="modulo">Municipios</label>  </a>
						</li>
						<li class="list-unstyled icoMedia">
							<a href="../mRegistrosAdministracionMenu/index.php"><i class="far fa-list-alt"></i><label class="modulo">Reg. Administración</label>  </a>
						</li>

						<li class="list-unstyled icoMedia">
							<a href="../mRegistros/index.php"><i class="far fa-list-alt"></i><label class="modulo">Reg. P/A</label> </a>
						</li>
						<li class="list-unstyled icoMedia">
							<a href="#" onclick="salir();"><i class="fas fa-sign-out-alt"></i><label class="modulo">Salir</label> </a>
						</li>
					</ul>
				</div>
<?php
}
else{
?>
				<div class="sidebar fondo borde fuenteAzul sombra vertical" >
					<h2 class="fondo"><?php echo $tUsuario;?></h2>
					<ul class="menuv">
						<li class="list-unstyled icoMedia">
							<a href="#" class="activo"><i class="fas fa-home"></i><label class="modulo">Inicio</label> </a>
						</li>
						<li class="list-unstyled icoMedia">
							<a href="../mAsegurados/index.php"><i class="fas fa-user-shield"></i><label class="modulo">Asegurados</label>  </a>
						</li>
						<li class="list-unstyled icoMedia">
							<a href="../mPatrones/index.php"><i class="fas fa-user-tie"></i><label class="modulo">Patrones</label> </a>
						</li>
						<li class="list-unstyled icoMedia">
							<a href="../mProveedores/index.php"><i class="fas fa-truck"></i><label class="modulo">Proveedores</label> </a>
						</li>
						<li class="list-unstyled icoMedia">
							<a href="../mVisitantes/index.php"><i class="fas fa-user-tag"></i><label class="modulo">Visitantes</label> </a>
						</li>
						<li class="list-unstyled icoMedia">
							<a href="../mRegistrosAdministracionMenu/index.php"><i class="far fa-list-alt"></i><label class="modulo">Reg. Administración</label>  </a>
						</li>
						<li class="list-unstyled icoMedia">
							<a href="../mRegistros/index.php"><i class="far fa-list-alt"></i><label class="modulo">Reg. P/A</label> </a>
						</li>

						<li class="list-unstyled icoMedia">
							<a href="#" onclick="salir();"><i class="fas fa-sign-out-alt"></i><label class="modulo">Salir</label> </a>
						</li>
					</ul>
				</div>
<?php
}
?>