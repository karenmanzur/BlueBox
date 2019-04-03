<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LOGIN - BlueBox</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css"> 
</head>

<body>
  <div class="login">
    <div class="login-screen">
      <div class="app-title">
        <img src="../img/logotipo.png" alt="logo BlueBox">
      </div>

      <div class="login-form">
        <div class="control-group">
        <input type="text" class="login-field" value="" placeholder="Usuario" id="inputEmail">
        </div>

        <div class="control-group">
        <input type="password" class="login-field" value="" placeholder="Password" id="inputPassword">
        </div>

        <button class="btn btn-primary btn-large btn-block" id="buttonSing" type="button">Entrar</a>
      </div>
    </div>
  </div>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script>
    $("#buttonSing").click(function(){
      let correo = $("#inputEmail").val();
      let password = $("#inputPassword").val();
      let obj = {
        "accion" : "login",
        "correo" : correo,
        "password" :  password
      };
      $.post("includes/funciones.php", obj, function(r){
        if(r == "1"){
          window.location.replace("usuarios.php");
        }else{
          console.log("Can't connect to database");
        }
      });
    });
  </script>


</body>
</html>