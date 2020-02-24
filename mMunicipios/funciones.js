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
    $("#municipio").val('');
}

function ver_alta(){
    // preCarga(800,4);
    limpiarAlta();
    $("#lista").slideUp('low');
    $("#alta").slideDown('low');
    $("#municipio").focus();
    
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
  
    var municipio    = $("#municipio").val();

        $.ajax({
            url:"guardar.php",
            type:"POST",
            dateType:"html",
            data:{
                    'municipio':municipio
                 },
            success:function(respuesta){
              
            alertify.set('notifier','position', 'bottom-right');
            alertify.success('Se ha guardado el registro' );
            $("#frmAlta")[0].reset();
            ver_lista();
            llenar_lista();
            limpiarAlta();
            },
            error:function(xhr,status){
                alert(xhr);
            },
        });
        e.preventDefault();
        return false;
});

function abrirModalEditar(idMunicipio,Municipio){
   
    $("#frmActuliza")[0].reset();
    $("#municipioE").val(Municipio);
    $("#idE").val(idMunicipio);

    $("#modalEditar").modal("show");

     $('#modalEditar').on('shown.bs.modal', function () {
         $('#municipioE').focus();
     });   
}

$("#frmActuliza").submit(function(e){
  
    var municipioE    = $("#municipioE").val();
    var ide       = $("#idE").val();

        $.ajax({
            url:"actualizar.php",
            type:"POST",
            dateType:"html",
            data:{
                    'municipioE':municipioE,
                    'ide':ide
                 },
            success:function(respuesta){

            alertify.set('notifier','position', 'bottom-right');
            alertify.success('Se ha actualizado el registro' );
            $("#frmActuliza")[0].reset();
            $("#modalEditar").modal("hide");
            llenar_lista();
            limpiarAlta();
            },
            error:function(xhr,status){
                alert(xhr);
            },
        });
        e.preventDefault();
        return false;
});

function status(concecutivo,id){
    var nomToggle = "#interruptor" + concecutivo;
    var nomBoton = "#boton" + concecutivo;
    var numero = "#tConsecutivo" + concecutivo;
    var municipio = "#tMunicipio" + concecutivo;
    var fecha = "#tFecha" + concecutivo;
    var hora = "#tHora" + concecutivo;


    if( $(nomToggle).is(':checked') ) {
        // console.log("activado");
        var valor=0;
        alertify.success('Registro habilitado' );
        $(nomBoton).removeAttr("disabled");
        $(numero).removeClass("desabilita");
        $(municipio).removeClass("desabilita");
        $(fecha).removeClass("desabilita");
        $(hora).removeClass("desabilita");
    }else{
        console.log("desactivado");
        var valor=1;
        alertify.error('Registro deshabilitado' );
        $(nomBoton).attr("disabled", "disabled");
        $(numero).addClass("desabilita");
        $(municipio).addClass("desabilita");
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