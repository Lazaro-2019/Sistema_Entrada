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
    $('#nregpatronal').val('');
    $('#nombreCompletoP').val('');
    $('#nombreP').val('');
    $('#paternoP').val('');
    $('#maternoP').val('');
    $('#ciudadP').val('');
    $('#direccionP').val('');
    $('#sexoP').val(0);
    $('#telefonoP').val('');
    $('#correoP').val('');
    $("#nregpatronal").focus();
}

function ver_alta(){
    // preCarga(800,4);
    limpiarAlta();
    $("#lista").slideUp('low');
    $("#alta").slideDown('low');
    $("#nregpatronal").focus();
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
   $("#nregpatronal").focus();
    var nregpatronal = $("#nregpatronal").val();
    var nombreCompletoP = $("#nombreCompletoP").val();
    var nombreP = $("#nombreP").val();
    var paternoP = $("#paternoP").val();
    var maternoP = $("#maternoP").val();
    var ciudadP = $("#ciudadP").val();
    var direccionP = $("#direccionP").val();
    var sexoP = $("#sexoP").val();
    var telefonoP = $("#telefonoP").val();
    var fecha_nacP = $("#fecha_nacP").val();
    var correoP = $("#correoP").val();
    //Validaciones
    if(nregpatronal==""){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Información',
            'label':'Salir',
            'message': 'Debes Ingresar un Numero de Registro Patronal.' ,
            'onok': function(){ alertify.message('Gracias !');}
        }).show();
        return false;       
    }
    if(nombreCompletoP==""){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Información',
            'label':'Salir',
            'message': 'Debes Ingresar el Nombre Completo del Patron.' ,
            'onok': function(){ alertify.message('Gracias !');}
        }).show();
        return false;       
    }
    if(nombreP==""){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Información',
            'label':'Salir',
            'message': 'Debes Ingresar el Nombre del Patron.' ,
            'onok': function(){ alertify.message('Gracias !');}
        }).show();
        return false;       
    }
    if(paternoP==""){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Información',
            'label':'Salir',
            'message': 'Debes Ingresar el Apellido Paterno del Patron.' ,
            'onok': function(){ alertify.message('Gracias !');}
        }).show();
        return false;       
    }
    if(maternoP==""){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Información',
            'label':'Salir',
            'message': 'Debes Ingresar el Apellido Materno del Patron.' ,
            'onok': function(){ alertify.message('Gracias !');}
        }).show();
        return false;       
    }
    if(ciudadP==""){
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
    if(direccionP==""){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Información',
            'label':'Salir',
            'message': 'Debes Ingresar la Dirección del Patron.' ,
            'onok': function(){ alertify.message('Gracias !');}
        }).show();
        return false;       
    }
    if(sexoP==""){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Información',
            'label':'Salir',
            'message': 'Debes Seleccionar el Sexo del Patron.' ,
            'onok': function(){ alertify.message('Gracias !');}
        }).show();
        return false;       
    }
    if(telefonoP==""){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Información',
            'label':'Salir',
            'message': 'Debes Ingresar el Teléfono del Patron.' ,
            'onok': function(){ alertify.message('Gracias !');}
        }).show();
        return false;       
    }
    if(fecha_nacP==""){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Información',
            'label':'Salir',
            'message': 'Debes Ingresar la Fecha de Nacimiento del Patron.' ,
            'onok': function(){ alertify.message('Gracias !');}
        }).show();
        return false;       
    }
    if(correoP==""){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Información',
            'label':'Salir',
            'message': 'Debes Ingresar el Correo del Patron.' ,
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
                    'nregpatronal':nregpatronal,
                    'nombreCompletoP':nombreCompletoP,
                    'nombreP':nombreP,
                    'paternoP':paternoP,
                    'maternoP':maternoP,
                    'ciudadP':ciudadP,
                    'direccionP':direccionP,
                    'sexoP':sexoP,
                    'telefonoP':telefonoP,
                    'fecha_nacP':fecha_nacP,
                    'correoP':correoP
                 },
            success:function(respuesta){
              
            alertify.set('notifier','position', 'bottom-right');
            alertify.success('Se ha registrado al patron' );
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


$("#frmActualiza").submit(function(e){
    var idEP = $("#idEP").val();
    var nregpatronalE = $("#nregpatronalE").val();
    var nombreCompletoPE = $("#nombreCompletoPE").val();
    var nombrePE = $("#nombrePE").val();
    var paternoPE = $("#paternoPE").val();
    var maternoPE = $("#maternoPE").val();
    var ciudadPE = $("#ciudadPE").val();
    var direccionPE = $("#direccionPE").val();
    var sexoPE = $("#sexoPE").val();
    var telefonoPE = $("#telefonoPE").val();
    var fecha_nacPE = $("#fecha_nacPE").val();
    var correoPE = $("#correoPE").val();
    console.log(idEP);
    console.log(nregpatronalE);
    console.log(nombreCompletoPE);
    console.log(nombrePE);
    console.log(paternoPE);
    console.log(maternoPE);
    console.log(ciudadPE);
    console.log(direccionPE);
    console.log(sexoPE);
    console.log(telefonoPE);
    console.log(fecha_nacPE);
    console.log(correoPE);
    //Validaciones
    if(nregpatronalE==""){
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
    if(nombreCompletoPE==""){
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
    if(nombrePE==""){
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
    if(paternoPE==""){
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
    if(maternoPE==""){
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
    if(ciudadPE==""){
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
    if(direccionPE==""){
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
    if(sexoPE==""){
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
    if(telefonoPE==""){
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
    if(fecha_nacPE==""){
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
    if(correoPE==""){
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
                'idEP':idEP,
                'nregpatronalE':nregpatronalE,
                'nombreCompletoPE':nombreCompletoPE,
                'nombrePE':nombrePE,
                'paternoPE':paternoPE,
                'maternoPE':maternoPE,
                'ciudadPE':ciudadPE,
                'direccionPE':direccionPE,
                'sexoPE':sexoPE,
                'telefonoPE':telefonoPE,
                'fecha_nacPE':fecha_nacPE,
                'correoPE':correoPE 
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
        return false;
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

