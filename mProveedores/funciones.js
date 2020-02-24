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
    $("#proveedor").val('');
    $("#clave").val('');
}

function ver_alta(){
    // preCarga(800,4);
    $("#lista").slideUp('low');
    $("#alta").slideDown('low');
    $("#proveedor").focus();
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
  
    var proveedor   = $("#proveedor").val();
    var clave       = $("#clave").val();

        $.ajax({
            url:"guardar.php",
            type:"POST",
            dateType:"html",
            data:{
                    'proveedor':proveedor,
                    'clave':clave
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

function abrirModalEditar(idProveedor,proveedor,cveProveedor){
   
    $("#frmActuliza")[0].reset();
    $("#proveedorE").val(proveedor);
    $("#claveE").val(cveProveedor);
    $("#idE").val(idProveedor);

    $("#modalEditar").modal("show");

     $('#modalEditar').on('shown.bs.modal', function () {
         $('#proveedorE').focus();
     });   
}

$("#frmActuliza").submit(function(e){
  
    var proveedorE    = $("#proveedorE").val();
    var claveE    = $("#claveE").val();
    var ide       = $("#idE").val();

        $.ajax({
            url:"actualizar.php",
            type:"POST",
            dateType:"html",
            data:{
                    'proveedorE':proveedorE,
                    'claveE':claveE,
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
    var proveedor   = "#tProveedor"+concecutivo;
    var clave   = "#tcveProveedor"+concecutivo;
    var fecha    = "#tFecha"+concecutivo;
    var hora  = "#tHora"+concecutivo;


    if( $(nomToggle).is(':checked') ) {
        // console.log("activado");
        var valor=0;
        alertify.success('Registro habilitado' );
        $(nomBoton).removeAttr("disabled");
        $(numero).removeClass("desabilita");
        $(proveedor).removeClass("desabilita");
        $(clave).removeClass("desabilita");
        $(fecha).removeClass("desabilita");
        $(hora).removeClass("desabilita");
    }else{
        console.log("desactivado");
        var valor=1;
        alertify.error('Registro deshabilitado' );
        $(nomBoton).attr("disabled", "disabled");
        $(numero).addClass("desabilita");
        $(proveedor).removeClass("desabilita");
        $(clave).removeClass("desabilita");
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