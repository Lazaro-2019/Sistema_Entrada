function entrando(){
    window.location='../inicio/index.php';
}

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

function llenar_registro_visitantes() {
    
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

function limpiar(){
    $("#proveedor").val(0);
    $("#proveedor").select2();
    $("#clave").val('');
    // $("#nombreP").val('');
    $("#ciudad").val(0);
    $("#ciudad").select2();
    $("#departamento").val(0);
    $("#departamento").select2();
    $("#tramitePR").val('');
    $("#encuesta").val(0);
    $("#encuesta").select2();
    

}

$("#frmRegistrarProveedor").on('submit',function(e){
    
        //variables
        var idProveedor=$("#proveedor").val();
        var clave=$("#clave").val();
        // var nombre_patron=$("#nombreP").val();
        var ciudad=$("#ciudad").val();
        var departamento=$("#departamento").val();
        var tramite=$("#tramitePR").val();
        var encuesta=$("#encuesta").val();

        console.log(idProveedor);
        console.log(clave);
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
                    'idProveedor':idProveedor,
                    'clave':clave,
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
                    'message': 'Error el proveedor no esta registrado o esta desactivado.',
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




function limpiarV(){
    $("#visitante").val(0);
    $("#visitante").select2();
    $("#claveV").val('');
    // $("#nombreP").val('');
    $("#ciudadA").val(0);
    $("#ciudadA").select2();
    $("#departamentoA").val(0);
    $("#departamentoA").select2();
    $("#tramiteVI").val('');
    $("#encuestaA").val(0);
    $("#encuestaA").select2();
    

}


$("#frmRegistrarVisitante").on('submit',function(e){
    
        //variables
        var id_visitante=$("#visitante").val();
        var claveV=$("#claveV").val();
        // var nombreA=$("#nombreA").val();
        var ciudadA=$("#ciudadA").val();
        var departamentoA=$("#departamentoA").val();
        var tramiteVI=$("#tramiteVI").val();
        var encuestaA=$("#encuestaA").val();

        console.log(id_visitante);
        console.log(claveV);

        console.log(ciudadA);
        console.log(departamentoA);
        console.log(tramiteVI);
        console.log(encuestaA);

         $.ajax({
            url:"validar_registro_visitante.php",
            type:"POST",
            dateType:"html",
            data:{
                    'id_visitante':id_visitante,
                    'claveV':claveV,
                    'ciudadA':ciudadA,
                    'departamentoA':departamentoA,
                    'tramiteVI':tramiteVI,
                    'encuestaA':encuestaA
                 },
            success:function(respuesta){
              
              console.log(respuesta);
          
                if (respuesta.split(",")[0]!=='') {
                    alertify.success('Registro correcto' );
                    limpiarV();
              }else{
                    alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();
                    alertify.alert()
                    .setting({
                    'title':'Operacion denegada',
                    'label':'Aceptar',
                    'message': 'Error el visitante no esta registrado o esta desactivado.',
                    'onok': function(){ 
                    alertify.message('Gracias !');
                    limpiarV();
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


function llenar_visitantes()
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

function llenar_clave_visitante()
{
    var visitante = $("#visitante").val();
    // alert(idRepre);
    $.ajax({
        url : 'llenar_clave_visitante.php',
        // data : {'id':id},
        type : 'POST',
        dataType : 'html',
		data: 
		{
            'visitante': visitante
	    	},
        success : function(respuesta) {
            console.log(respuesta);
            if (respuesta.split(",")[0]!=='') {
                $("#claveV").val(respuesta.split(",")[0]);

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
    $('#visitante').val(0);
    

    $('#visitante').change(function(){
        llenar_clave_visitante();
        
    })
})

function llenar_ciudadVI()
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
            $("#ciudadA").empty();
            $("#ciudadA").html(respuesta);      
        },
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
}
