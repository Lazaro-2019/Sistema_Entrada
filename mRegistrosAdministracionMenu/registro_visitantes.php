<?php
    include('../sesiones/verificar_sesion.php');
    include('../funcionesPHP/filtroUsuario.php');
    $tUsuario=$_SESSION["user_tipo"];
    userE($tUsuario);
?>
<div class="container-fluid animated zoomIn">
    <form id="frmRegistrarVisitante">
        <div class="row ">
            <div class="col-md-4 col-lg-5">
                <br>
                <br>
                <label>Selecciona el Visitante</label>
                <input type="hidden" id="claveV">
                <select  id="visitante" class="select2 form-control " style="width: 100%">
                </select>

                <div class="widget">
                    <div class="fecha">
                        <p id="diaSemanaA" class="diaSemana"></p>
                        <p id="diaA" class="dia"></p>
                        <p>de</p>
                        <p id="mesA" class="mes"></p>
                        <p>del</p>
                        <p id="yearA" class="year"></p>
                    </div>

                    <div class="reloj">
                            <p id="horasA" class="horas"></p>
                            <p>:</p>
                            <p id="minutosA" class="minutos"></p>
                            <p>:</p>
                        <div class="caja-segundos">
                            <p id="ampmA" class="ampm"></p>
                            <p id="segundosA" class="segundos"></p> 
                        </div>
                    </div>     
                </div>
            </div>

            <div class="col-md-8 col-lg-7">
                <!-- <label>Nombre</label>
                <br>
                <input type="hidden" id="idAsegurado"  class="form-control">
                <input type="text" id="nombreA" class="form-control" disabled=""> -->
                
                <label for="ciudadA">Procedencia</label>
                <select  id="ciudadA" class="select2 form-control " style="width: 100%">
                </select>
                
                <label for="departamentoA">Departamento</label>
                <select  id="departamentoA" class="select2 form-control" style="width: 100%" >
                    <option value="0">Seleccione ...</option>
                    <option value="Administracion">Administración</option>
                </select>

                <label for="tramite">Trámite</label>
                    <br>
                    <textarea id="tramiteVI" class="form-control" rows="3" cols="85" placeholder="Escribe el trámite"></textarea>
            </div>

            <div class="col-md-2 col-lg-2">
                    <label for="encuestaA">Encuesta:</label>
                    <select  id="encuestaA" class="select2 form-control" align="right" style="width: 100%">
                        <option value="0">Seleccione ...</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
            </div>

            </div>
                <br>
            <center>
                <button type="submit" class="btn btn-login btn-md  btn-flat  pull-center" id="btnRegistrarA">
                    <i class="fas fa-clipboard-check"></i>
                    Registrar
                </button>
            </center>
        </div>

        </div>
    </form>
</div>




<script src="funciones.js"></script>

<script type="text/javascript">
        llenar_visitantes();
        // llenar_ciudad_PR();
	</script>

<!-- Inicializador de elemento -->
<script>
    $(function () {
    $(".select2").select2();
    
    });
</script> 