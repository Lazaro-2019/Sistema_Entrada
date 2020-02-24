function llenar_lista(){
     // console.log("Se ha llenado lista");
    // preCarga(1000,4);
    $.ajax({
        url:"llenarLista.php",
        type:"POST",
        dateType:"html",
        data:{},
        success:function(respuesta){
            $("#lista").html(respuesta);
            $("#lista").slideDown("fast");
        },
        error:function(xhr,status){
            alert("no se muestra");
        }
    });	
}

function limpiar_Alta() {
    $("#nombre").val('');
    $("#pertenece").val(0);
    $("#pertenece").select2();
    $("#departamento").val(0);
    $("#departamento").select2();
}

function ver_alta(){
    // preCarga(800,4);
    $("#lista").slideUp('low');
    $("#alta").slideDown('low');
    $("#nombre").focus();
}

function ver_lista(){
    $("#alta").slideUp('low');
    $("#lista").slideDown('low');
    limpiar_Alta();
}

$('#btnLista').on('click',function(){
    llenar_lista();
    ver_lista();
});

$("#frmAlta").submit(function(e){
  
    var nombre    = $("#nombre").val();
    var pertenece   = $("#pertenece").val();
    var departamento   = $("#departamento").val();


        $.ajax({
            url:"guardar.php",
            type:"POST",
            dateType:"html",
            data:{
                    'nombre':nombre,
                    'pertenece':pertenece,
                    'departamento':departamento

                 },
            success:function(respuesta){
              
            alertify.set('notifier','position', 'bottom-right');
            alertify.success('Se ha guardado el registro' );
            $("#frmAlta")[0].reset();
            ver_lista();
            llenar_lista();
            },
            error:function(xhr,status){
                alert(xhr);
            },
        });
        e.preventDefault();
        return false;
});

function abrirModalEditar(idTramite,tramite,idDepartamento,pertenece){
   $("#frmActuliza")[0].reset();
//    console.log(idTramite);
//    console.log(tramite);
//    console.log(idDepartamento);
//    console.log(departamento);
//    console.log(pertenece);

    llenar_departamentoE(idDepartamento);
    llenar_perteneceE(pertenece);
    $("#idE").val(idTramite);
    $("#nombreE").val(tramite);
    $("#perteneceE").val(pertenece);
    
    
    $("#idDepartamentoE").val(idDepartamento);

    $("#modalEditar").modal("show");
     $('#modalEditar').on('shown.bs.modal', function () {
         $('#nombreE').focus();
     });   
}

$("#frmActuliza").submit(function(e){
  
    var nombre    = $("#nombreE").val();
    var perteneceE   = $("#perteneceE").val();
    var departamentoE   = $("#departamentoE").val();
    var idE = $("#idE").val();
        $.ajax({
            url:"actualizar.php",
            type:"POST",
            dateType:"html",
            data:{
                    'nombre':nombre,
                    'perteneceE':perteneceE,
                    'departamentoE':departamentoE,
                    'idE':idE
                 },
            success:function(respuesta){

            alertify.set('notifier','position', 'bottom-right');
            alertify.success('Se ha actualizado el registro' );
            $("#frmActuliza")[0].reset();
            $("#modalEditar").modal("hide");
            llenar_lista();
            },
            error:function(xhr,status){
                alert(xhr);
            },
        });
        e.preventDefault();
        return false;
});

function status(concecutivo,id){
    var nomToggle = "#interruptor"+concecutivo;
    var nomBoton  = "#boton"+concecutivo;
    var numero    = "#tConsecutivo"+concecutivo;
    var tramite   = "#tTramite"+concecutivo;
    var departamento = "#tDepartamento"+concecutivo;
    var pertenece  = "#tPertenece"+concecutivo;
    var fecha      = "#tFecha"+concecutivo;
    var hora      = "#tHora"+concecutivo;

    if( $(nomToggle).is(':checked') ) {
        // console.log("activado");
        var valor=0;
        alertify.success('Registro habilitado' );
        $(nomBoton).removeAttr("disabled");
        $(numero).removeClass("desabilita");
        $(tramite).removeClass("desabilita");
        $(departamento).removeClass("desabilita");
        $(pertenece).removeClass("desabilita");
        $(fecha).removeClass("desabilita");
        $(hora).removeClass("desabilita");
    }else{
        console.log("desactivado");
        var valor=1;
        alertify.error('Registro deshabilitado' );
        $(nomBoton).attr("disabled", "disabled");
        $(numero).addClass("desabilita");
        $(tramite).addClass("desabilita");
        $(departamento).addClass("desabilita");
        $(pertenece).addClass("desabilita");
        $(fecha).addClass("desabilita");
        $(hora).addClass("desabilita");
    }
    // console.log(concecutivo+' | '+id);
    $.ajax({
        url:"status.php",
        type:"POST",
        dateType:"html",
        data:{
                'valor':valor,
                'id':id
             },
        success:function(respuesta){
            // console.log(respuesta);
        },
        error:function(xhr,status){
            alert(xhr);
        },
    });
}

function llenar_departamento()
{
    // alert(idRepre);
    $.ajax({
        url : 'comboDepartamento.php',
        // data : {'id':id},
        type : 'POST',
        dataType : 'html',
		data: 
		{
	    	},
        success : function(respuesta) {
            $("#departamento").empty();
            $("#departamento").html(respuesta);      
        },
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
}

function llenar_departamentoE(idDepartamento)
{
    // alert(idRepre);
    $.ajax({
        url : 'comboDepartamentoE.php',
        // data : {'id':id},
        type : 'POST',
        dataType : 'html',
		data: 
		{
            'idDepartamento': idDepartamento
	    	},
        success : function(respuesta) {
            $("#departamentoE").empty();
            $("#departamentoE").html(respuesta);  
            $("#departamentoE").val(idDepartamento);
            $(".select2").select2();        
        },
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
}

function llenar_perteneceE(pertenece)
{
    // alert(idRepre);
    $.ajax({
        url : 'comboPertenece.php',
        // data : {'id':id},
        type : 'POST',
        dataType : 'html',
		data: 
		{
	    	},
        success : function(respuesta) {
            $("#perteneceE").empty();
            $("#perteneceE").html(respuesta);  
            $("#perteneceE").val(pertenece);
            $(".select2").select2();        
        },
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
}