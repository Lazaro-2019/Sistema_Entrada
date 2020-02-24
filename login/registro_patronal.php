<div class="container-fluid">
    <form id="frmRegistrarPatron">
        
            <div class="row ">
                <div class="col-md-4 col-lg-5">
                    <br>
                    <br>
                    <label>Ingresa el Número de Registro Patronal</label>
                    <input type="text" id="regPatronal" class="patronal form-control">

                           <div class="widget">
                                <div class="fecha">
                                    <p id="diaSemana" class="diaSemana"></p>
                                    <p id="dia" class="dia"></p>
                                    <p>de</p>
                                    <p id="mes" class="mes"></p>
                                    <p>del</p>
                                    <p id="year" class="year"></p>
                                </div>

                                <div class="reloj">
                                        <p id="horas" class="horas"></p>
                                        <p>:</p>
                                        <p id="minutos" class="minutos"></p>
                                        <p>:</p>
                                    <div class="caja-segundos">
                                        <p id="ampm" class="ampm"></p>
                                        <p id="segundos" class="segundos"></p> 
                                    </div>
                                </div>     
                            </div>
                </div>

                <div class="col-md-8 col-lg-7">
                    <label>Nombre</label><br>
                    <input type="hidden" id="idPatron"  class="form-control">
                    
                    <input type="text" id="nombreP" class="form-control" disabled="">
                    
                    <label>Procedencia</label>
                    <select  id="ciudad" class="select2 form-control " style="width: 100%">
                    </select>
                    
                    <label for="departamento">Departamento</label>
                    <select  id="departamento" class="select2 form-control" style="width: 100%" >
                    </select>

                    <label for="tramite">Tramite</label>
                    <select  id="tramite" class="select2 form-control" style="width: 100%" >
                    </select>
                </div>
                <div class="col-md-2 col-lg-2">
                    <label for="encuesta">Encuesta:</label>
                    <select  id="encuesta" class="select2 form-control" style="width: 100%">
                        <option value="0">Seleccione ...</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                </div>

                </div>
                <br>
            <center>
                <button type="submit" class="btn btn-login btn-md  btn-flat  pull-center" id="btnRegistrar">
                    <i class="fas fa-clipboard-check"></i>
                    Registrar
                </button>
            </center> 
            </div>

    </form>
</div>


<script src="funciones.js"></script>
<script type="text/javascript">
		//   llenar_lista();
		// llenar_registro_asegurados();
		// llenar_registro_patronal();
		llenar_ciudad();
		llenar_departamento();
		llenar_tramite();

		// llenar_ciudadA();
		// llenar_departamentoA();
		// llenar_tramiteA();
	</script>