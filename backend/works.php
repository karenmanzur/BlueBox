 <?php
  session_start();
  error_reporting(0);
  $varsesion = $_SESSION['usuarios'];
  if (isset($varsesion)){
  ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.5">
  <title>Works - BlueBox</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="icon" href="../img/icon.png">
</head>
  
<body>
 
  
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" id="main">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Bluebox</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
              <button type="button" class="btn btn-sm btn-outline-success cancelar">Regresar</button>
            </div>
          </div>
        </div>
        <h2>Works</h2>
        <div class="table-responsive view" id="show_data">
          <table class="table table-striped table-sm" id="list_works">
            <thead>
              <tr>
                <th>Imagén</th>
                <th>Título</th>
                <th>Descripción</th> 
                <th>Editar</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
        <div id="insert_data" class="view">
          <form action="#"  id= "form_data" enctype="multipart/form-data">
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="nombre">Título</label>
                  <input type="name" id="nombre" name="nombre" class="form-control">
                </div>
                <div class="form-group">
                 <input type="file" id="foto" name="foto"  accept="image/x-png,image/gif,image/jpeg">
                <input type="hidden" name="ruta" id="ruta" readonly="readonly">
              </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="texto">Descripción</label>
                  <input type="text" id="texto" name="texto" class="form-control">
                </div>
              </div>
            </div>         
            <div class="row">
              <div class="col">
                <button type="button" class="btn btn-success" id="guardar_datos">Guardar</button>
                 <div class="alert alert-danger" id="correcto" style="display: none;"></div>
                <div class="alert alert-success" id="error" style="display: none;"></div>
              </div>
            </div>
          </div>
          </form>
      </main>
       </div>
    </div>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script>
   
    function change_view(vista = 'show_data'){
      $("#main").find(".view").each(function(){
        $(this).slideUp('fast');
        let id = $(this).attr("id");
        if(vista == id){
          $(this).slideDown(300);
        }
      });
    }
    function consultar(){
      let obj = {
        "accion" : "consultar_works"
      };
      $.post("includes/funciones.php", obj, function(respuesta){
        let template = ``;
        $.each(respuesta,function(i,e){
          template += `
          <tr>
          <td>${e.works_file}</td>
          <td>${e.works_title}</td>
          <td>${e.works_subtitle}</td>
          <td>
          <a href="#" data-id="${e.works_id}" class="editar_works">Editar</a>
          </td>
          </tr>
          `;
        });
        $("#list_works tbody").html(template);
      },"JSON");
    }
   
    $("#nuevo_registro").click(function(){
      change_view('insert_data');
    });

     $("#guardar_datos").click(function(r) {
     let ruta = $("#ruta").val();
     let nombre = $("#nombre").val();
     let texto = $("#texto").val();
     let obj ={
      "accion" : "insertar_works",
       "ruta" : ruta,
       "nombre" : nombre,
       "texto" : texto      
     }

      $("#form_data").find("input").each(function(){
        $(this).removeClass("has-error");
        if($(this).val() != ""){
          obj[$(this).prop("name")] =  $(this).val();
        }else{
          $(this).addClass("has-error").focus();
          return false;
        }
      });

      if($(this).data("editar") == 1){
        obj["id"]  = $(this).data('id');
        obj["accion"] = "editar_works";
        $(this).text("Guardar").removeData("editar").removeData("id");
      }

      $.post('includes/funciones.php', obj, function(response) {
        alert(response);
        $("#form_data")[0].reset();

       });
    });

 // $("#list_works").on("click",".eliminar_works",function(e){
 //        e.preventDefault();
 //        let confirmacion = confirm('¿Desea eliminar este registro?');
 //        if (confirmacion) {
 //          let id = $(this).data('id'),
 //          obj = {
 //            "accion":"eliminar_works",
 //            "id" : id
 //          };
 //          $.post("includes/funciones.php",obj,function(r){
 //            if (r == "1") {
 //           $("#correcto").html("Registro Eliminado Correctamente"); 
 //          consultar();
 
 //         } else {
 //           $("#error").html("Error al Eliminar Registro"); 
 //         }

 //          });

 //          }
 //      });

  $("#list_works").on("click",".editar_works",function(e){
        e.preventDefault();
          let id = $(this).data('id');
          obj = {
            "accion": "consultar_test",
            "id" : id
          };
          $("#form_data")[0].reset();
          change_view('insert_data');
          $("#guardar_datos").text("Editar").data("editar", 1).data("id", id);
          $.post("includes/funciones.php",obj,function(r){
            $("#ruta").val(r.works_file); 
            $("#nombre").val(r.works_title);
            $("#texto").val(r.works_subtitle);
          },"JSON");
          console.log(obj);
          console.log(id);
          });

 $(document).ready(function(){
      consultar();
      change_view();
    });
 
     //Para subir las fotos
$("#foto").on("change", function (e) {
      let formDatos = new FormData($("#form_data")[0]);
      formDatos.append("accion", "carga_foto");
      $.ajax({
        url: "includes/funciones.php",
        type: "POST",
        data: formDatos,
        contentType: false,
        processData: false,
        success: function (datos) {
          let respuesta = JSON.parse(datos);
          if(respuesta.status == 0){
            alert("No se cargó la foto");
          }
          let template = `
          <img src="${respuesta.archivo}" alt="" class="img-fluid" />
          `;
          $("#ruta").val(respuesta.archivo);
          $("#preview").html(template);
        }
      });
    });

    $("#main").find(".cancelar").click(function(){
      change_view();
      $("#form_data")[0].reset();
    });
  </script>
</body>
</html>

<?php
 }
  else 
  {
header("Location:index.php");
  }