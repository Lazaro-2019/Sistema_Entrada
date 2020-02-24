    <div class="container-fluid">
        <form id="frmRegistrarAsegurado">
            <div class="row animated zoomIn">
                <div class="col-md-4 col-lg-5">
                    <br>
                    <br>
                    <br>
                    <label>Selecciona el Visitante</label>
                    <select  id="visitante" class="select2 form-control " style="width: 100%">
                    </select>

                    <div class="widget">
                        <div class="fecha">
                            <p id="diaSemanaVI" class="diaSemana"></p>
                            <p id="diaVI" class="dia"></p>
                            <p>de</p>
                            <p id="mesVI" class="mes"></p>
                            <p>del</p>
                            <p id="yearVI" class="year"></p>
                        </div>

                        <div class="reloj">
                                <p id="horasVI" class="horas"></p>
                                <p>:</p>
                                <p id="minutosVI" class="minutos"></p>
                                <p>:</p>
                            <div class="caja-segundos">
                                <p id="ampmVI" class="ampm"></p>
                                <p id="segundosVI" class="segundos"></p> 
                            </div>
                        </div>     
                    </div>
                </div>

                <div class="col-md-8 col-lg-7">
                    
                    <label for="ciudadVI">Procedencia</label>
                    <select  id="ciudadVI" class="select2 form-control " style="width: 100%">
                    </select>
                    
                    <label for="departamentoVI">Departamento</label>
                    <select  id="departamentoVI" class="select2 form-control" style="width: 100%" >
                        <option value="0">Seleccione ...</option>
                        <option value="1">Administración</option>
                    </select>

                    <label for="tramite">Trámite</label>
                    <br>
                    <textarea id="tramiteVI" class="form-control" rows="3" cols="85" placeholder="Escribe el trámite"></textarea>
                </div>

                <div class="col-md-2 col-lg-2">
                        <label for="encuestaVI">Encuesta:</label>
                        <select  id="encuestaVI" class="select2 form-control" align="right" style="width: 100%">
                            <option value="0">Seleccione ...</option>
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                </div>

                </div>
                    <br>
                <center>
                    <button type="submit" class="btn btn-login btn-md  btn-flat  pull-center animated bounceInLeft" id="btnRegistrarA">
                        <i class="fas fa-clipboard-check"></i>
                        Registrar
                    </button>
                </center>
            </div>
        </form>
    </div>
</div>





<script src="funciones.js"></script>
<script>
		$(function () {
			$(".select2").select2();
		});
    </script> 
    	<script type="text/javascript">
        llenar_visitante();
        llenar_ciudad_VI();
	</script>