function entrando(){
    window.location='../inicio/index.php';
}

function cambioContra(){
    $("#cuerpo").hide();
    $("#cambiarContra").fadeIn('low');
    alertify.warning("Debes de cambiar tu contraseña , ya que es tu primer ingreso al sistema",3);
    $("#vContra1").val('');
    $("#vContra2").val('');
    $("#vContra1").focus();
}

$("#frmIngreso").submit(function(e){
    var usuario,contra;
    var usuario = $("#username").val();
    var contra  = $("#pass").val();
    var usuario=usuario.trim();
    $("#username").focus();

    console.log(usuario);
    console.log(contra);
    
    // contra=contra.trim();
    if(usuario=='' || contra==''){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Acceso denegado',
            'label':'Aceptar',
            'message': 'Debes de colocar nombre de usuario y contraseña' ,
            'onok': function(){ 
                alertify.message('Gracias !');
                $("#username").val('');
                $("#pass").val('');
                $("#username").focus();
            }
        }).show();
        return false;    
    }else{
        $.ajax({
            url:"verificar.php",
            type:"POST",
            dateType:"html",
            data:{
                    'usuario':usuario,
                    'contra':contra
                 },
            success:function(respuesta){
              
              respuesta=parseInt(respuesta);
              console.log(respuesta);
              switch(respuesta){
                  case 0 :
                        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

                        alertify.alert()
                        .setting({
                            'title':'Acceso denegado',
                            'label':'Aceptar',
                            'message': 'Nombre de usuario o contraseña incorrectos' ,
                            'onok': function(){ 
                             
                                alertify.message('Gracias !');
                                $("#username").val('');
                                $("#pass").val('');

                            }
                        }).show();   
                    break;
                  case 1 :
                        var valorChk=$('#chkContra').val();
                        if(valorChk=='si'){
                            cambioContra();
                            $("#usuario").val(usuario);                       
                        }else{
                            
                            alertify.success('Ingresando....') ; 
                            preCarga(2000,2);
                            setInterval(entrando, 2000);
                    }
                    break;
                  case 2 :
                        cambioContra();
                        $("#usuario").val(usuario);

                    break;
              }

            },
            error:function(xhr,status){
                alert(xhr);
            },
        });
    } 
        e.preventDefault();
        return false;
});

function evaluarCheck(valor){
    
    if(valor=='no'){
        $('#chkContra').val('si');
    }else{
        $('#chkContra').val('no');
    }

    console.log(valor);
   
}

function cancelar(){
        // console.log("Saliendo del sistema...")
        alertify.confirm('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();
        alertify.confirm(
            'Sistema de Registro de Alumnos', 
            '¿ Deseas cancelar el cambio de contraseña?', 
            function(){ 
                $("#cuerpo").fadeIn();
                $("#cambiarContra").hide('low'); 
                $("#frmIngreso")[0].reset();   
                $("#frmCambiar")[0].reset();    
                $("#username").focus();      
                }, 
            function(){ 
                    alertify.error('Cancelar') ; 
                    console.log('cancelado')}
        ).set('labels',{ok:'Si',cancel:'No'});
}

$("#frmCambiar").submit(function(e){
  
    var usuario = $("#usuario").val();
    var contra  = $("#vContra1").val();
    var vContra  = $("#vContra2").val();

      if (contra !=vContra) {
           alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();
   
           alertify.alert()
           .setting({
               'title':'Información',
               'label':'Salir',
               'message': 'Las contraseñas deben ser iguales' ,
               'onok': function(){ alertify.message('Gracias !');}
           }).show();
           return false;       
       }
   
    //var ide= $("#usuario").val();

        $.ajax({
            url:"actualizar.php",
            type:"POST",
            dateType:"html",
            data:{
                    'usuario':usuario,
                    'contra':contra,
                    //'usuario':usuario
                    //'ide':ide
                    //'restaurar':1
                 },
            success:function(respuesta){

            alertify.set('notifier','position', 'bottom-right');
            alertify.success('Se ha actualizado el registro' );
            $("#frmCambiar")[0].reset();
           entrando();
            },
            error:function(xhr,status){
                alert(xhr);
            },
        });
        e.preventDefault();
        return false;
});


function verregistro(){
    $("#registro").slideDown('low');
    $("#login").slideUp('low');
    llenar_registro_asegurados();
    llenar_registro_patronal();
    
}

function verlogin(){
    $("#login").slideDown('low');
    $("#registro").slideUp('low');
    
}

function llenar_registro_patronal() {
    $.ajax({
        url:"registro_patronal.php",
        type:"POST",
        dateType:"html",
        data:{
                
        },
        success:function(respuesta){
            $("#registro_patronal").html(respuesta);
             $("#registro_patronal").slideDown("fast");
        },
        error:function(xhr,status){
            alert("no se muestra");
        }
    }); 
}

function llenar_registro_asegurados() {
    $.ajax({
        url:"registro_asegurado.php",
        type:"POST",
        dateType:"html",
        data:{
                
        },
        success:function(respuesta){
            $("#registro_asegurado").html(respuesta);
             $("#registro_asegurado").slideDown("fast");
        },
        error:function(xhr,status){
            alert("no se muestra");
        }
    }); 
}


(function(){
    var actualizarHora = function(){
        var fecha = new Date(),
            horas = fecha.getHours(),
            ampm,
            minutos = fecha.getMinutes(),
            segundos = fecha.getSeconds(),
            diaSemana = fecha.getDay(),
            dia = fecha.getDate(),
            mes = fecha.getMonth(),
            year = fecha.getFullYear();

        var pHoras = document.getElementById('horas');
            pAMPM = document.getElementById('ampm');
            pMinutos = document.getElementById('minutos');
            pSegundos = document.getElementById('segundos');
            pDiaSemana = document.getElementById('diaSemana');
            pDia = document.getElementById('dia');
            pMes = document.getElementById('mes');
            pYear = document.getElementById('year');

         var semana = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
         pDiaSemana.textContent = semana[diaSemana];

         pDia.textContent = dia;

          var meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Ágosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
          pMes.textContent = meses[mes];

          pYear.textContent = year;


          if (horas >= 12) {//condicional
            horas = horas - 12;
            ampm = 'PM';

          }else{
            ampm = 'AM';
          }

          if (horas == 0) {
            horas = 12;
          };

          pHoras.textContent = horas;
          pAMPM.textContent = ampm;

          if (minutos < 10) { minutos = '0' + minutos }; //Cadena de texto

          if (segundos < 10) { segundos = '0' + segundos}


          pMinutos.textContent = minutos;
          pSegundos.textContent = segundos;


    };
    actualizarHora();
    var intervalo = setInterval(actualizarHora, 1000)
}())

$("#frmRegistrarPatron").on('keypress',function(e){
    if (e.which ==13) {
        //variables
        var regPatronal=$("#regPatronal").val();
     //   var img $("#imgPersona").val();
     console.log(regPatronal);
         $.ajax({
            url:"llenar_datos.php",
            type:"POST",
            dateType:"html",
            data:{
                    'regPatronal':regPatronal,
                 },
            success:function(respuesta){
              
              console.log(respuesta);
          
              if (respuesta.split(",")[0]!=='') {
                $("#nombreP").val(respuesta.split(",")[1]);
                $("#idPatron").val(respuesta.split(",")[2]);
              }else{
                    alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();
                    alertify.alert()
                    .setting({
                    'title':'Operacion denegada',
                    'label':'Aceptar',
                    'message': 'Este número no esta registrado.',
                    'onok': function(){ 
                    alertify.message('Gracias !');
                    limpiar();
                }
                  
                    }).show();
              }
            },
            error:function(xhr,status){
                alert(xhr);
            },
        });
        e.preventDefault();
        return false;
    }
  });


$("#frmRegistrarPatron").on('submit',function(e){
    
        //variables
        var id_patron=$("#idPatron").val();
        var regPatronal=$("#regPatronal").val();
        var nombre_patron=$("#nombreP").val();
        var ciudad=$("#ciudad").val();
        var departamento=$("#departamento").val();
        var tramite=$("#tramite").val();
        var encuesta=$("#encuesta").val();

        console.log(id_patron);
        console.log(nombre_patron);
        console.log(ciudad);
        console.log(departamento);
        console.log(tramite);
        console.log(encuesta);
     //   var img $("#imgPersona").val();
         $.ajax({
            url:"validar_registro.php",
            type:"POST",
            dateType:"html",
            data:{
                    'id_patron':id_patron,
                    'regPatronal':regPatronal,
                    'nombre_patron':nombre_patron,
                    'ciudad':ciudad,
                    'departamento':departamento,
                    'tramite':tramite,
                    'encuesta':encuesta
                 },
            success:function(respuesta){
              
              console.log(respuesta);
          
                if (respuesta.split(",")[0]!=='') {
                    alertify.success('Registro correcto' );
                    limpiar();
              }else{
                    alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();
                    alertify.alert()
                    .setting({
                    'title':'Operacion denegada',
                    'label':'Aceptar',
                    'message': 'Error al registrar.',
                    'onok': function(){ 
                    alertify.message('Gracias !');
                    limpiar();
                }
                  
                    }).show();
              }
            },
            error:function(xhr,status){
                alert(xhr);
            },
        });
        e.preventDefault();
        return false;
    
  });

function limpiar(){
    $("#idPatron").val('');
    $("#regPatronal").val('');
    $("#nombreP").val('');
    $("#ciudad").val(0);
    $("#ciudad").select2();
    $("#departamento").val(0);
    $("#departamento").select2();
    $("#tramite").val(0);
    $("#tramite").select2();
    $("#encuesta").val(0);
    $("#encuesta").select2();
    $("#regPatronal").focus();

}

function llenar_ciudad()
{
    // alert(idRepre);
    $.ajax({
        url : 'comboMunicipio.php',
        // data : {'id':id},
        type : 'POST',
        dataType : 'html',
		data: 
		{
	    	},
        success : function(respuesta) {
            $("#ciudad").empty();
            $("#ciudad").html(respuesta);      
        },
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
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
function llenar_tramite()
{
    var departamento = $("#departamento").val();
    // alert(idRepre);
    $.ajax({
        url : 'comboTramite.php',
        // data : {'id':id},
        type : 'POST',
        dataType : 'html',
		data: 
		{
            'departamento': departamento
	    	},
        success : function(respuesta) {
            $("#tramite").empty();
            $("#tramite").html(respuesta);      
        },
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
}

$(document).ready(function(){
    $('#departamento').val(0);
    llenar_tramite();

    $('#departamento').change(function(){
        llenar_tramite();
    })
})

function limpiarA(){
    $("#idAsegurado").val('');
    $("#NSSocial").val('');
    $("#nombreA").val('');
    $("#ciudadA").val(0);
    $("#ciudadA").select2();
    $("#departamentoA").val(0);
    $("#departamentoA").select2();
    $("#tramiteA").val(0);
    $("#tramiteA").select2();
    $("#encuestaA").val(0);
    $("#encuestaA").select2();
    $("#NSSocial").focus();

}

$("#frmRegistrarAsegurado").on('keypress',function(e){
    if (e.which ==13) {
        //variables
        var NSSocial=$("#NSSocial").val();
     //   var img $("#imgPersona").val();
     console.log(NSSocial);
         $.ajax({
            url:"llenar_datos_asegurado.php",
            type:"POST",
            dateType:"html",
            data:{
                    'NSSocial':NSSocial,
                 },
            success:function(respuesta){
              
              console.log(respuesta);
          
              if (respuesta.split(",")[0]!=='') {
                $("#nombreA").val(respuesta.split(",")[1]);
                $("#idAsegurado").val(respuesta.split(",")[2]);
              }else{
                    alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();
                    alertify.alert()
                    .setting({
                    'title':'Operacion denegada',
                    'label':'Aceptar',
                    'message': 'Este número no esta registrado.',
                    'onok': function(){ 
                    alertify.message('Gracias !');
                    limpiarA();
                }
                  
                    }).show();
              }
            },
            error:function(xhr,status){
                alert(xhr);
            },
        });
        e.preventDefault();
        return false;
    }
  });


$("#frmRegistrarAsegurado").on('submit',function(e){
    
        //variables
        var idAsegurado=$("#idAsegurado").val();
        var NSSocial=$("#NSSocial").val();
        var nombreA=$("#nombreA").val();
        var ciudadA=$("#ciudadA").val();
        var departamentoA=$("#departamentoA").val();
        var tramiteA=$("#tramiteA").val();
        var encuestaA=$("#encuestaA").val();

        console.log(idAsegurado);
        console.log(NSSocial);
        console.log(nombreA);
        console.log(ciudadA);
        console.log(departamentoA);
        console.log(tramiteA);
        console.log(encuestaA);

         $.ajax({
            url:"validar_registro_asegurado.php",
            type:"POST",
            dateType:"html",
            data:{
                    'idAsegurado':idAsegurado,
                    'NSSocial':NSSocial,
                    'nombreA':nombreA,
                    'ciudadA':ciudadA,
                    'departamentoA':departamentoA,
                    'tramiteA':tramiteA,
                    'encuestaA':encuestaA
                 },
            success:function(respuesta){
              
              console.log(respuesta);
          
                if (respuesta.split(",")[0]!=='') {
                    alertify.success('Registro correcto' );
                    limpiarA();
              }else{
                    alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();
                    alertify.alert()
                    .setting({
                    'title':'Operacion denegada',
                    'label':'Aceptar',
                    'message': 'Error al registrar.',
                    'onok': function(){ 
                    alertify.message('Gracias !');
                    limpiarA();
                }
                  
                    }).show();
              }
            },
            error:function(xhr,status){
                alert(xhr);
            },
        });
        e.preventDefault();
        return false;
    
  });

  (function(){
    var actualizarHora = function(){
        var fecha = new Date(),
            horas = fecha.getHours(),
            ampm,
            minutos = fecha.getMinutes(),
            segundos = fecha.getSeconds(),
            diaSemana = fecha.getDay(),
            dia = fecha.getDate(),
            mes = fecha.getMonth(),
            year = fecha.getFullYear();

        var pHoras = document.getElementById('horasA');
            pAMPM = document.getElementById('ampmA');
            pMinutos = document.getElementById('minutosA');
            pSegundos = document.getElementById('segundosA');
            pDiaSemana = document.getElementById('diaSemanaA');
            pDia = document.getElementById('diaA');
            pMes = document.getElementById('mesA');
            pYear = document.getElementById('yearA');

         var semana = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
         pDiaSemana.textContent = semana[diaSemana];

         pDia.textContent = dia;

          var meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Ágosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
          pMes.textContent = meses[mes];

          pYear.textContent = year;


          if (horas >= 12) {//condicional
            horas = horas - 12;
            ampm = 'PM';

          }else{
            ampm = 'AM';
          }

          if (horas == 0) {
            horas = 12;
          };

          pHoras.textContent = horas;
          pAMPM.textContent = ampm;

          if (minutos < 10) { minutos = '0' + minutos }; //Cadena de texto

          if (segundos < 10) { segundos = '0' + segundos}


          pMinutos.textContent = minutos;
          pSegundos.textContent = segundos;


    };
    actualizarHora();
    var intervalo = setInterval(actualizarHora, 1000)
}())

function llenar_ciudadA()
{
    // alert(idRepre);
    $.ajax({
        url : 'comboMunicipioA.php',
        // data : {'id':id},
        type : 'POST',
        dataType : 'html',
		data: 
		{
	    	},
        success : function(respuesta) {
            $("#ciudadA").empty();
            $("#ciudadA").html(respuesta);      
        },
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
}

function llenar_departamentoA()
{
    // alert(idRepre);
    $.ajax({
        url : 'comboDepartamentoA.php',
        // data : {'id':id},
        type : 'POST',
        dataType : 'html',
		data: 
		{
	    	},
        success : function(respuesta) {
            $("#departamentoA").empty();
            $("#departamentoA").html(respuesta);      
        },
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
}

function llenar_tramiteA()
{
    var departamentoA = $("#departamentoA").val();
    // alert(idRepre);
    console.log(departamentoA);
    $.ajax({
        url : 'comboTramiteA.php',
        // data : {'id':id},
        type : 'POST',
        dataType : 'html',
		data: 
		{
            'departamentoA': departamentoA
	    	},
        success : function(respuesta) {
            $("#tramiteA").empty();
            $("#tramiteA").html(respuesta);      
        },
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
}



$(document).ready(function(){
    $('#departamentoA').val(0);
    llenar_tramiteA();

    $('#departamentoA').change(function(){
        llenar_tramiteA();

    })
})



function llenar_registro_proveedores() {
    $.ajax({
        url:"registro_proveedores.php",
        type:"POST",
        dateType:"html",
        data:{
                
        },
        success:function(respuesta){
            $("#registro_proveedores").html(respuesta);
            $("#registro_proveedores").slideDown("fast");
        },
        error:function(xhr,status){
            alert("no se muestra");
        }
    }); 
}

function llenar_registro_visitante() {
    $.ajax({
        url:"registro_visitantes.php",
        type:"POST",
        dateType:"html",
        data:{
                
        },
        success:function(respuesta){
            $("#registro_visitantes").html(respuesta);
            $("#registro_visitantes").slideDown("fast");
        },
        error:function(xhr,status){
            alert("no se muestra");
        }
    }); 
}

function verregistro_administracion(){
    $("#administracion").slideDown('low');
    $("#login").slideUp('low');
    llenar_registro_proveedores();
    llenar_registro_visitante();
}

function verlogin_administracion(){
    $("#login").slideDown('low');
    $("#administracion").slideUp('low');
    
}

(function(){
    var actualizarHora = function(){
        var fecha = new Date(),
            horas = fecha.getHours(),
            ampm,
            minutos = fecha.getMinutes(),
            segundos = fecha.getSeconds(),
            diaSemana = fecha.getDay(),
            dia = fecha.getDate(),
            mes = fecha.getMonth(),
            year = fecha.getFullYear();

        var pHoras = document.getElementById('horasPR');
            pAMPM = document.getElementById('ampmPR');
            pMinutos = document.getElementById('minutosPR');
            pSegundos = document.getElementById('segundosPR');
            pDiaSemana = document.getElementById('diaSemanaPR');
            pDia = document.getElementById('diaPR');
            pMes = document.getElementById('mesPR');
            pYear = document.getElementById('yearPR');

         var semana = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
         pDiaSemana.textContent = semana[diaSemana];

         pDia.textContent = dia;

          var meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Ágosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
          pMes.textContent = meses[mes];

          pYear.textContent = year;


          if (horas >= 12) {//condicional
            horas = horas - 12;
            ampm = 'PM';

          }else{
            ampm = 'AM';
          }

          if (horas == 0) {
            horas = 12;
          };

          pHoras.textContent = horas;
          pAMPM.textContent = ampm;

          if (minutos < 10) { minutos = '0' + minutos }; //Cadena de texto

          if (segundos < 10) { segundos = '0' + segundos}


          pMinutos.textContent = minutos;
          pSegundos.textContent = segundos;


    };
    actualizarHora();
    var intervalo = setInterval(actualizarHora, 1000)
}())

function llenar_proveedor()
{
    // alert(idRepre);
    $.ajax({
        url : 'comboProveedores.php',
        // data : {'id':id},
        type : 'POST',
        dataType : 'html',
		data: 
		{
	    	},
        success : function(respuesta) {
            $("#proveedor").empty();
            $("#proveedor").html(respuesta);      
        },
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
}

function llenar_visitante()
{
    // alert(idRepre);
    $.ajax({
        url : 'comboVisitantes.php',
        // data : {'id':id},
        type : 'POST',
        dataType : 'html',
		data: 
		{
	    	},
        success : function(respuesta) {
            $("#visitante").empty();
            $("#visitante").html(respuesta);      
        },
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
}

function llenar_ciudad_VI()
{
    // alert(idRepre);
    $.ajax({
        url : 'comboMunicipioVI.php',
        // data : {'id':id},
        type : 'POST',
        dataType : 'html',
		data: 
		{
	    	},
        success : function(respuesta) {
            $("#ciudadVI").empty();
            $("#ciudadVI").html(respuesta);      
        },
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
}

function llenar_ciudad_PR()
{
    // alert(idRepre);
    $.ajax({
        url : 'comboMunicipioPR.php',
        // data : {'id':id},
        type : 'POST',
        dataType : 'html',
		data: 
		{
	    	},
        success : function(respuesta) {
            $("#ciudadPR").empty();
            $("#ciudadPR").html(respuesta);      
        },
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
}

(function(){
    var actualizarHora = function(){
        var fecha = new Date(),
            horas = fecha.getHours(),
            ampm,
            minutos = fecha.getMinutes(),
            segundos = fecha.getSeconds(),
            diaSemana = fecha.getDay(),
            dia = fecha.getDate(),
            mes = fecha.getMonth(),
            year = fecha.getFullYear();

        var pHoras = document.getElementById('horasVI');
            pAMPM = document.getElementById('ampmVI');
            pMinutos = document.getElementById('minutosVI');
            pSegundos = document.getElementById('segundosVI');
            pDiaSemana = document.getElementById('diaSemanaVI');
            pDia = document.getElementById('diaVI');
            pMes = document.getElementById('mesVI');
            pYear = document.getElementById('yearVI');

         var semana = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
         pDiaSemana.textContent = semana[diaSemana];

         pDia.textContent = dia;

          var meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Ágosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
          pMes.textContent = meses[mes];

          pYear.textContent = year;


          if (horas >= 12) {//condicional
            horas = horas - 12;
            ampm = 'PM';

          }else{
            ampm = 'AM';
          }

          if (horas == 0) {
            horas = 12;
          };

          pHoras.textContent = horas;
          pAMPM.textContent = ampm;

          if (minutos < 10) { minutos = '0' + minutos }; //Cadena de texto

          if (segundos < 10) { segundos = '0' + segundos}


          pMinutos.textContent = minutos;
          pSegundos.textContent = segundos;


    };
    actualizarHora();
    var intervalo = setInterval(actualizarHora, 1000)
}())

$("#frmRegistrarProveedor").on('submit',function(e){
    
    //variables
    var provedor=$("#proveedor").val();
    var clave=$("#clave").val();
    var ciudadPR=$("#ciudadPR").val();
    var departamentoPR=$("#departamentoPR").val();
    var tramitePR=$("#tramitePR").val();
    var encuestaPR=$("#encuestaPR").val();
    

    console.log(provedor);
    
    console.log(ciudadPR);
    console.log(departamentoPR);
    console.log(tramitePR);
    console.log(encuestaPR);
    console.log(clave);


     $.ajax({
        url:"validar_registro_proveedores.php",
        type:"POST",
        dateType:"html",
        data:{
                'proveedor':proveedor,
                'ciudadPR':ciudadPR,
                'departamentoPR':departamentoPR,
                'tramitePR':tramitePR,
                'encuestaPR':encuestaPR,
                'clave':clave
             },
        success:function(respuesta){
          
          console.log(respuesta);
      
        //     if (respuesta.split(",")[0]!=='') {
        //         alertify.success('Registro correcto' );
        //         // limpiarA();
        //   }else{
        //         alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();
        //         alertify.alert()
        //         .setting({
        //         'title':'Operacion denegada',
        //         'label':'Aceptar',
        //         'message': 'Error al registrar.',
        //         'onok': function(){ 
        //         alertify.message('Gracias !');
        //         // limpiarA();
        //     }
              
        //         }).show();
        //   }
        
        },
        error:function(xhr,status){
            alert(xhr);
        },
    });
    e.preventDefault();
    return false;

});

function llenar_clave_proveedor()
{
    var proveedor = $("#proveedor").val();
    // alert(idRepre);
    $.ajax({
        url : 'llenar_clave_proveedor.php',
        // data : {'id':id},
        type : 'POST',
        dataType : 'html',
		data: 
		{
            'proveedor': proveedor
	    	},
        success : function(respuesta) {
            console.log(respuesta);
            if (respuesta.split(",")[0]!=='') {
                $("#clave").val(respuesta.split(",")[0]);

              }else{
                    alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();
                    alertify.alert()
                    .setting({
                    'title':'Operacion denegada',
                    'label':'Aceptar',
                    'message': 'Este número no esta registrado.',
                    'onok': function(){ 
                    alertify.message('Gracias !');
                    
                }
                  
                    }).show();
              }     
        },
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
}

$(document).ready(function(){
    $('#proveedor').val(0);
    

    $('#proveedor').change(function(){
        llenar_clave_proveedor();
        
    })
})