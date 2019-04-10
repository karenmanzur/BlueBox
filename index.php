<!-- Header Edier-->
<?php
	require_once("conectar.php");
     $consulta ="SELECT * FROM slider";
    $resultado=mysqli_query($conectar,$consulta);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>BlueBox_Desarrollo de la Universidad</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
	<link rel="stylesheet"type="text/css" href="css/estilos.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/main.js"></script>
	<link href="http://fonts.googleapis.com/css?family=Cabin:400">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="img/icon.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

</head>
<body>
	<header class="container">
	    <div class="row">
		  <img src="img/logotipo.png" alt="Logotipo BlueBox" class="img-responsive" id="logo">
		    <nav class="col-lg-8 offset-lg-5">
			    <ul class="nav">
					<li class="nav-item"><a class="nav-link" href="sliders.php">ABOUT</a></li> |
					<li class="nav-item"><a class="nav-link" href="#">SERVICES</a></li> | 
					<li class="nav-item"><a class="nav-link" href="#">WORKS</a></li> |
					<li class="nav-item"><a class="nav-link" href="#">BLOG</a></li> |
					<li class="nav-item"><a class="nav-link" href="#">CONTACT US</a></li>
					<div id="barra">
				    <input class="form-control form-text" type="text" size="15" placeholder="Search">	
				    </div>    			    
                </ul>
            </nav>
         <div class="left">
	   	 <span class="fa fa-chevron-left"></span>
	     </div>
	     <div class="right">
	   	 <span class="fa fa-chevron-right"></span>
	     </div>
</header>
<div class="fondoblue">
        <div class="container">
            <div class="row">
              <div class="col-lg-6 offset-lg-1">
                <br><br><br><br>
		<?php
   			 while($fila = mysqli_fetch_array($resultado)){
        ?>
                   <a id="word"><?php echo $fila['texto'];?></a>
         <?php
            }
     	?>          <br>
                   <button type="button" class="btn btn-info" id="learn">Learn More</button>
              </div>
          </div>
     </div> 
 <div class="slideshow">
	<ul class="slider">
		    <li><img src="img/computadora.png" alt=""></li>
			<li><img src="img/computadora1.png" alt=""></li>
			<li><img src="img/computadora3.png" alt=""></li>
			<li><img src="img/computadora4.png" alt=""></li>
	   </ul> 
	   <!--<ol class="pagination">
	   </ol>-->
   </div>
    </div>
</body>
</html>