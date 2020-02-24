function llenar_grafica(){
     // console.log("Se ha llenado lista");
    // preCarga(1000,4);
    var fecha = $('#fechaModal').val();
    var departamento = $('#departamento').val();
    var idM = $('#idM').val();
    $.ajax({
        url:"grafica.php",
        type:"POST",
        dateType:"html",
        data:{
            "fecha":fecha,
            "departamento":departamento,
            "idM":idM
        },
        success:function(respuesta){
            $("#container").html(respuesta);
            $("#container").slideDown("fast");
        },
        error:function(xhr,status){
            alert("no se muestra");
        }
    });	
}

function llenar_cantidad(){
    // console.log("Se ha llenado lista");
   // preCarga(1000,4);
   var fecha = $('#fechaModal').val();
   var departamento = $('#departamento').val();
   var idM = $('#idM').val();
   $.ajax({
       url:"datos_grafica.php",
       type:"POST",
       dateType:"html",
       data:{
            "fecha":fecha,
            "departamento":departamento,
            "idM":idM
       },
       success:function(respuesta){
           $('#no').val(respuesta.split(",")[1]);
           $('#si').val(respuesta.split(",")[2]);
           $('#total').val(respuesta.split(",")[0]);
       },
       error:function(xhr,status){
           alert("no se muestra");
       }
   });	
}

function llenar_departamento(){
    // console.log("Se ha llenado lista");
   // preCarga(1000,4);
   $.ajax({
       url:"comboDepartamento.php",
       type:"POST",
       dateType:"html",
       data:{
           
       },
       success:function(respuesta){
            $("#departamento").empty();
            $("#departamento").html(respuesta);
       },
       error:function(xhr,status){
           alert("no se muestra");
       }
   });	
}

$(document).ready(function(){
    $('#fechaModal').val();
    $('#departamento').val();
    llenar_grafica();
    llenar_cantidad();

    $('#departamento').change(function(){
        llenar_grafica();
        llenar_cantidad();
    })
})

function abrirModalGrafica(){
 

    $("#modalGrafica").modal("show");
     $('#modalGrafica').on('shown.bs.modal', function () {
     });   
}

function llenar_graficaP(){
    // console.log("Se ha llenado lista");
   // preCarga(1000,4);
   var fecha = $('#fechaModalP').val();
   var departamento = $('#departamentoP').val();

   $.ajax({
       url:"graficaP.php",
       type:"POST",
       dateType:"html",
       data:{
           "fecha":fecha,
           "departamento":departamento
       },
       success:function(respuesta){
           $("#containerP").html(respuesta);
           $("#containerP").slideDown("fast");
       },
       error:function(xhr,status){
           alert("no se muestra");
       }
   });	
}

function llenar_cantidadP(){
   // console.log("Se ha llenado lista");
  // preCarga(1000,4);
  var fecha = $('#fechaModalP').val();
  var departamento = $('#departamentoP').val();

  $.ajax({
      url:"datos_graficaP.php",
      type:"POST",
      dateType:"html",
      data:{
           "fecha":fecha,
           "departamento":departamento
      },
      success:function(respuesta){
          $('#noP').val(respuesta.split(",")[1]);
          $('#siP').val(respuesta.split(",")[2]);
          $('#totalP').val(respuesta.split(",")[0]);
      },
      error:function(xhr,status){
          alert("no se muestra");
      }
  });	
}

function llenar_departamentoP(){
   // console.log("Se ha llenado lista");
  // preCarga(1000,4);
  $.ajax({
      url:"comboDepartamentoP.php",
      type:"POST",
      dateType:"html",
      data:{
          
      },
      success:function(respuesta){
           $("#departamentoP").empty();
           $("#departamentoP").html(respuesta);
      },
      error:function(xhr,status){
          alert("no se muestra");
      }
  });	
}

$(document).ready(function(){
   $('#fechaModalP').val();
   $('#departamentoP').val();
   llenar_graficaP();
   llenar_cantidadP();

   $('#departamentoP').change(function(){
       llenar_graficaP();
       llenar_cantidadP();
   })
})

function abrirModalGraficaP(){


    $("#modalGraficaP").modal("show");
     $('#modalGraficaP').on('shown.bs.modal', function () {
     });   
}

function abrirModalGraficaPRV(){


    $("#modalGraficaPRV").modal("show");
     $('#modalGraficaPRV').on('shown.bs.modal', function () {
     });   
}

function llenar_graficaPRV(){
    // console.log("Se ha llenado lista");
   // preCarga(1000,4);
   var fechaPRV = $('#fechaModalPRV').val();
//    var departamento = $('#departamento').val();
//    var idMPRV = $('#idMPRV').val();
   $.ajax({
       url:"graficaPRV.php",
       type:"POST",
       dateType:"html",
       data:{
           "fechaPRV":fechaPRV
        //    "departamento":departamento,
        //    "idMPRV":idMPRV
       },
       success:function(respuesta){
           $("#containerPRV").html(respuesta);
           $("#containerPRV").slideDown("fast");
       },
       error:function(xhr,status){
           alert("no se muestra");
       }
   });	
}

function llenar_cantidadPRV(){
   // console.log("Se ha llenado lista");
  // preCarga(1000,4);
  var fechaPRV = $('#fechaModalPRV').val();
//   var departamento = $('#departamento').val();
  var idMPRV = $('#idMPRV').val();
  $.ajax({
      url:"datos_graficaPRV.php",
      type:"POST",
      dateType:"html",
      data:{
           "fechaPRV":fechaPRV
        //    "departamento":departamento,
        //    "idMPRV":idMPRV
      },
      success:function(respuesta){
          $('#noPRV').val(respuesta.split(",")[1]);
          $('#siPRV').val(respuesta.split(",")[2]);
          $('#totalPRV').val(respuesta.split(",")[0]);
      },
      error:function(xhr,status){
          alert("no se muestra");
      }
  });	
}

// function llenar_departamento(){
//    // console.log("Se ha llenado lista");
//   // preCarga(1000,4);
//   $.ajax({
//       url:"comboDepartamento.php",
//       type:"POST",
//       dateType:"html",
//       data:{
          
//       },
//       success:function(respuesta){
//            $("#departamento").empty();
//            $("#departamento").html(respuesta);
//       },
//       error:function(xhr,status){
//           alert("no se muestra");
//       }
//   });	
// }

$(document).ready(function(){
   $('#fechaModalPRV').val();
//    $('#departamento').val();
   llenar_graficaPRV();
   llenar_cantidadPRV();

   $('#fechaModalPRV').change(function(){
       llenar_graficaPRV();
       llenar_cantidadPRV();
   })
})


function abrirModalGraficaVI(){


    $("#modalGraficaVI").modal("show");
     $('#modalGraficaVI').on('shown.bs.modal', function () {
     });   
}

function llenar_graficaVI(){
    // console.log("Se ha llenado lista");
   // preCarga(1000,4);
   var fechaVI = $('#fechaModalVI').val();
//    var departamento = $('#departamento').val();
//    var idMPRV = $('#idMPRV').val();
   $.ajax({
       url:"graficaVI.php",
       type:"POST",
       dateType:"html",
       data:{
           "fechaVI":fechaVI
        //    "departamento":departamento,
        //    "idMPRV":idMPRV
       },
       success:function(respuesta){
           $("#containerVI").html(respuesta);
           $("#containerVI").slideDown("fast");
       },
       error:function(xhr,status){
           alert("no se muestra");
       }
   });	
}

function llenar_cantidadVI(){
   // console.log("Se ha llenado lista");
  // preCarga(1000,4);
  var fechaVI = $('#fechaModalVI').val();
//   var departamento = $('#departamento').val();
//   var idMVI = $('#idMVI').val();
  $.ajax({
      url:"datos_graficaVI.php",
      type:"POST",
      dateType:"html",
      data:{
           "fechaVI":fechaVI
        //    "departamento":departamento,
        //    "idMPRV":idMPRV
      },
      success:function(respuesta){
          $('#noVI').val(respuesta.split(",")[1]);
          $('#siVI').val(respuesta.split(",")[2]);
          $('#totalVI').val(respuesta.split(",")[0]);
      },
      error:function(xhr,status){
          alert("no se muestra");
      }
  });	
}

// function llenar_departamento(){
//    // console.log("Se ha llenado lista");
//   // preCarga(1000,4);
//   $.ajax({
//       url:"comboDepartamento.php",
//       type:"POST",
//       dateType:"html",
//       data:{
          
//       },
//       success:function(respuesta){
//            $("#departamento").empty();
//            $("#departamento").html(respuesta);
//       },
//       error:function(xhr,status){
//           alert("no se muestra");
//       }
//   });	
// }

$(document).ready(function(){
   $('#fechaModalVI').val();
//    $('#departamento').val();
   llenar_graficaVI();
   llenar_cantidadVI();

   $('#fechaModalVI').change(function(){
       llenar_graficaVI();
       llenar_cantidadVI();
   })
})