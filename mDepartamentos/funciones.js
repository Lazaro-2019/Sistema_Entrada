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

function limpiarAlta() {
    $("#nombre").val('');
}

function ver_alta(){
    // preCarga(800,4);
    $("#lista").slideUp('low');
    $("#alta").slideDown('low');
    $("#nombre").focus();
    limpiarAlta();
}

function ver_lista(){
    $("#alta").slideUp('low');
    $("#lista").slideDown('low');
}

$('#btnLista').on('click',function(){
    llenar_lista();
    ver_lista();
    limpiarAlta();
});

$("#frmAlta").submit(function(e){
  
    var departamento    = $("#nombre").val();

        $.ajax({
            url:"guardar.php",
            type:"POST",
            dateType:"html",
            data:{
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

function abrirModalEditar(idDepartamento,departamento){
   
    $("#frmActuliza")[0].reset();
    $("#nombreE").val(departamento);
    $("#idE").val(idDepartamento);

    $("#modalEditar").modal("show");

     $('#modalEditar').on('shown.bs.modal', function () {
         $('#nombreE').focus();
     });   
}

$("#frmActuliza").submit(function(e){
  
    var nombreE    = $("#nombreE").val();
    var ide       = $("#idE").val();

        $.ajax({
            url:"actualizar.php",
            type:"POST",
            dateType:"html",
            data:{
                    'nombreE':nombreE,
                    'ide':ide
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
    var departamento   = "#tDepartamento"+concecutivo;
    var fecha    = "#tFecha"+concecutivo;
    var hora  = "#tHora"+concecutivo;


    if( $(nomToggle).is(':checked') ) {
        // console.log("activado");
        var valor=0;
        alertify.success('Registro habilitado' );
        $(nomBoton).removeAttr("disabled");
        $(numero).removeClass("desabilita");
        $(departamento).removeClass("desabilita");
        $(fecha).removeClass("desabilita");
        $(hora).removeClass("desabilita");
    }else{
        console.log("desactivado");
        var valor=1;
        alertify.error('Registro deshabilitado' );
        $(nomBoton).attr("disabled", "disabled");
        $(numero).addClass("desabilita");
        $(departamento).addClass("desabilita");
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