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
    $('#nssocial').val('');
    $('#nombreCompleto').val('');
    $('#nombre').val('');
    $('#paterno').val('');
    $('#materno').val('');
    $('#ciudad').val('');
    $('#direccion').val('');
    $('#sexo').val(0);
    $('#telefono').val('');
    $('#correo').val('');
    $("#nssocial").focus();
}

function ver_alta(){
    // preCarga(800,4);
    limpiarAlta();
    $("#lista").slideUp('low');
    $("#alta").slideDown('low');
    $("#nssocial").focus();
}

function ver_lista(){
    limpiarAlta();
    $("#alta").slideUp('low');
    $("#lista").slideDown('low');
}

$('#btnLista').on('click',function(){
    ver_lista();
    llenar_lista();
});

$("#frmAlta").submit(function(e){
    
    var nssocial = $("#nssocial").val();
    var nombreCompleto = $("#nombreCompleto").val();
    var nombre = $("#nombre").val();
    var paterno = $("#paterno").val();
    var materno = $("#materno").val();
    var ciudad = $("#ciudad").val();
    var direccion = $("#direccion").val();
    var sexo = $("#sexo").val();
    var telefono = $("#telefono").val();
    var fecha_nac = $("#fecha_nac").val();
    var correo = $("#correo").val();
    //Validaciones
    if(nssocial==""){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Información',
            'label':'Salir',
            'message': 'Debes Ingresar un Numero de Seguro Social.' ,
            'onok': function(){ alertify.message('Gracias !');}
        }).show();
        return false;       
    }
    if(nombre==""){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Información',
            'label':'Salir',
            'message': 'Debes Ingresar el Nombre del Asegurado.' ,
            'onok': function(){ alertify.message('Gracias !');}
        }).show();
        return false;       
    }
    if(nombreCompleto==""){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Información',
            'label':'Salir',
            'message': 'Debes Ingresar el Nombre Completo del Asegurado.' ,
            'onok': function(){ alertify.message('Gracias !');}
        }).show();
        return false;       
    }
    if(paterno==""){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Información',
            'label':'Salir',
            'message': 'Debes Ingresar el Apellido Paterno del Asegurado.' ,
            'onok': function(){ alertify.message('Gracias !');}
        }).show();
        return false;       
    }
    if(materno==""){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Información',
            'label':'Salir',
            'message': 'Debes Ingresar el Apellido Materno del Asegurado.' ,
            'onok': function(){ alertify.message('Gracias !');}
        }).show();
        return false;       
    }
    if(ciudad==""){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Información',
            'label':'Salir',
            'message': 'Debes Ingresar la Ciudad o Municipio.' ,
            'onok': function(){ alertify.message('Gracias !');}
        }).show();
        return false;       
    }    
    if(direccion==""){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Información',
            'label':'Salir',
            'message': 'Debes Ingresar la Dirección del Asegurado.' ,
            'onok': function(){ alertify.message('Gracias !');}
        }).show();
        return false;       
    }
    if(sexo==""){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Información',
            'label':'Salir',
            'message': 'Debes Seleccionar el Sexo del Asegurado.' ,
            'onok': function(){ alertify.message('Gracias !');}
        }).show();
        return false;       
    }
    if(telefono==""){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Información',
            'label':'Salir',
            'message': 'Debes Ingresar el Teléfono del Asegurado.' ,
            'onok': function(){ alertify.message('Gracias !');}
        }).show();
        return false;       
    }
    if(fecha_nac==""){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Información',
            'label':'Salir',
            'message': 'Debes Ingresar la Fecha de Nacimiento del Asegurado.' ,
            'onok': function(){ alertify.message('Gracias !');}
        }).show();
        return false;       
    }
    if(correo==""){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Información',
            'label':'Salir',
            'message': 'Debes Ingresar el Correo del Asegurado.' ,
            'onok': function(){ alertify.message('Gracias !');}
        }).show();
        return false;       
    }
    
    // console.log(nombreCompleto);

        $.ajax({
            url:"guardar.php",
            type:"POST",
            dateType:"html",
            data:{
                    'nssocial':nssocial,
                    'nombreCompleto':nombreCompleto,
                    'nombre':nombre,
                    'paterno':paterno,
                    'materno':materno,
                    'ciudad':ciudad,
                    'direccion':direccion,
                    'sexo':sexo,
                    'telefono':telefono,
                    'fecha_nac':fecha_nac,
                    'correo':correo
                 },
            success:function(respuesta){
              
            alertify.set('notifier','position', 'bottom-right');
            alertify.success('Se ha registrado al asegurado' );
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

// function abrirModal()
// {
   

//     $("#modalEditar").modal("show");

//      $('#modalEditar').on('shown.bs.modal', function () {
//          $('#noControlE').focus();
//      });   
// }

$("#frmActualiza").submit(function(e){
    var idE = $("#idE").val();
    var nssocialE = $("#nssocialE").val();
    var nombreCompletoE = $("#nombreCompletoE").val();
    var nombreE = $("#nombreE").val();
    var paternoE = $("#paternoE").val();
    var maternoE = $("#maternoE").val();
    var ciudadE = $("#ciudadE").val();
    var direccionE = $("#direccionE").val();
    var sexoE = $("#sexoE").val();
    var telefonoE = $("#telefonoE").val();
    console.log(telefonoE);
    var fecha_nacE = $("#fecha_nacE").val();
    var correoE = $("#correoE").val();
    
    //Validaciones
    if(nssocialE==""){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Información',
            'label':'Salir',
            'message': 'Debes Ingresar un Numero de Seguro Social.' ,
            'onok': function(){ alertify.message('Gracias !');}
        }).show();
        return false;       
    }
    if(nombreCompletoE==""){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Información',
            'label':'Salir',
            'message': 'Debes Ingresar el Nombre Completo del Asegurado.' ,
            'onok': function(){ alertify.message('Gracias !');}
        }).show();
        return false;       
    }
    if(nombreE==""){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Información',
            'label':'Salir',
            'message': 'Debes Ingresar el Nombre del Asegurado.' ,
            'onok': function(){ alertify.message('Gracias !');}
        }).show();
        return false;       
    }
    if(paternoE==""){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Información',
            'label':'Salir',
            'message': 'Debes Ingresar el Apellido Paterno del Asegurado.' ,
            'onok': function(){ alertify.message('Gracias !');}
        }).show();
        return false;       
    }
    if(maternoE==""){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Información',
            'label':'Salir',
            'message': 'Debes Ingresar el Apellido Materno del Asegurado.' ,
            'onok': function(){ alertify.message('Gracias !');}
        }).show();
        return false;       
    }
    if(ciudadE==""){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Información',
            'label':'Salir',
            'message': 'Debes Ingresar la Ciudad o Municipio.' ,
            'onok': function(){ alertify.message('Gracias !');}
        }).show();
        return false;       
    }    
    if(direccionE==""){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Información',
            'label':'Salir',
            'message': 'Debes Ingresar la Dirección del Asegurado.' ,
            'onok': function(){ alertify.message('Gracias !');}
        }).show();
        return false;       
    }
    if(sexoE==""){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Información',
            'label':'Salir',
            'message': 'Debes Seleccionar el Sexo del Asegurado.' ,
            'onok': function(){ alertify.message('Gracias !');}
        }).show();
        return false;       
    }
    if(telefonoE==""){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Información',
            'label':'Salir',
            'message': 'Debes Ingresar el Teléfono del Asegurado.' ,
            'onok': function(){ alertify.message('Gracias !');}
        }).show();
        return false;       
    }
    if(fecha_nacE==""){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Información',
            'label':'Salir',
            'message': 'Debes Ingresar la Fecha de Nacimiento del Asegurado.' ,
            'onok': function(){ alertify.message('Gracias !');}
        }).show();
        return false;       
    }
    if(correoE==""){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Información',
            'label':'Salir',
            'message': 'Debes Ingresar el Correo del Asegurado.' ,
            'onok': function(){ alertify.message('Gracias !');}
        }).show();
        return false;       
    }


        $.ajax({
            url:"actualizar.php",
            type:"POST",
            dateType:"html",
            data:{
                'idE':idE,
                'nssocialE':nssocialE,
                'nombreCompletoE':nombreCompletoE,
                'nombreE':nombreE,
                'paternoE':paternoE,
                'maternoE':maternoE,
                'ciudadE':ciudadE,
                'direccionE':direccionE,
                'sexoE':sexoE,
                'telefonoE':telefonoE,
                'fecha_nacE':fecha_nacE,
                'correoE':correoE
                 },
            success:function(respuesta){
                alertify.set('notifier','position', 'bottom-right');
                alertify.success('Se ha Actualizado la Información del Asegurado' );
                $("#frmActualiza")[0].reset();
                $("#modalEditar #btnCerrar").click();
                llenar_lista();
            },
            error:function(xhr,status){
                alert(xhr);
            },
        });
        e.preventDefault();
        
});

function llenar_personaA(idPersona)
{
    // alert(idRepre);
    $.ajax({
        url : 'comboPersonasA.php',
        // data : {'id':id},
        type : 'POST',
        dataType : 'html',
        success : function(respuesta) {
            $("#nombreE").empty();
            $("#nombreE").html(respuesta);  
            $("#nombreE").val(idPersona);
            $(".select2").select2();

        },
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
}

function llenar_carreraA(idCarrera)
{
    // alert(idRepre);
    $.ajax({
        url : 'comboCarrerasA.php',
        // data : {'id':id},
        type : 'POST',
        dataType : 'html',
        success : function(respuesta) {
            $("#carreraE").empty();
            $("#carreraE").html(respuesta);  
            $("#carreraE").val(idCarrera);
            $(".select2").select2();

        },
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
}

