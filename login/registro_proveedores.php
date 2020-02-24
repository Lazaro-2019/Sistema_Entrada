    <div class="container-fluid">
        <form id="frmRegistrarProveedor">
            <div class="row animated zoomIn">
                <div class="col-md-4 col-lg-5">
                    <br>
                    <br>
                    <br>
                    <label>Selecciona el Proveedor</label>
                    <input type="hidden" id="clave">
                    <select  id="proveedor" class="select2 form-control " style="width: 100%">
                    </select>

                    <div class="widget">
                        <div class="fecha">
                            <p id="diaSemanaPR" class="diaSemana"></p>
                            <p id="diaPR" class="dia"></p>
                            <p>de</p>
                            <p id="mesPR" class="mes"></p>
                            <p>del</p>
                            <p id="yearPR" class="year"></p>
                        </div>

                        <div class="reloj">
                                <p id="horasPR" class="horas"></p>
                                <p>:</p>
                                <p id="minutosPR" class="minutos"></p>
                                <p>:</p>
                            <div class="caja-segundos">
                                <p id="ampmPR" class="ampm"></p>
                                <p id="segundosPR" class="segundos"></p> 
                            </div>
                        </div>     
                    </div>
                </div>

                <div class="col-md-8 col-lg-7">
                    
                    <label for="ciudadPR">Procedencia</label>
                    <select  id="ciudadPR" class="select2 form-control " style="width: 100%">
                    </select>
                    
                    <label for="departamentoPR">Departamento</label>
                    <select  id="departamentoPR" class="select2 form-control" style="width: 100%" >
                        <option value="0">Seleccione ...</option>
                        <option value="1">Administración</option>
                    </select>

                    <label for="tramite">Trámite</label>
                    <br>
                    <textarea id="tramitePR" class="form-control" rows="3" cols="85" placeholder="Escribe el trámite"></textarea>
                </div>

                <div class="col-md-2 col-lg-2">
                        <label for="encuestaPR">Encuesta:</label>
                        <select  id="encuestaPR" class="select2 form-control" align="right" style="width: 100%">
                            <option value="0">Seleccione ...</option>
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                </div>

                </div>
                    <br>
                <center>
                    <button type="submit" class="btn btn-login btn-md  btn-flat  pull-center animated bounceInLeft" id="btnRegistrarPR">
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
        llenar_proveedor();
        llenar_ciudad_PR();
	</script>