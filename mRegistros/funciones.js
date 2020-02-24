function entrando(){
    window.location='../inicio/index.php';
}

function llenar_registro_patronal() {
    $("#regPatronal").focus();
    $.ajax({
        url:"registro_patronal.php",
        type:"POST",
        dateType:"html",
        data:{
                
        },
        success:function(respuesta){
            $("#registro_patronal").html(respuesta);
             $("#registro_patronal").slideDown("fast");
             $("#regPatronal").focus();
        },
        error:function(xhr,status){
            alert("no se muestra");
        }
    }); 
}

function llenar_registro_asegurados() {
    $("#NSSocial").focus();
    $.ajax({
        url:"registro_asegurado.php",
        type:"POST",
        dateType:"html",
        data:{
                
        },
        success:function(respuesta){
            $("#registro_asegurado").html(respuesta);
             $("#registro_asegurado").slideDown("fast");
             $("#NSSocial").focus();
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

// function hablar(nombre,situacion){
//     var nombre=nombre.toString();
//     var situacion=situacion.toString();

// //Texto de lo que va a decir
//     responsiveVoice.speak("El alumno "+nombre+" ha registrado una"+ situacion , "Spanish Female");
// }

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