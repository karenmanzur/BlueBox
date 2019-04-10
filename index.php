<?php
    require_once("includes/db_con.php");    
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Blue Box</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="img/icon.png">
    <script src="js/jquery.flexisel.js"></script>
</head>
<body>


<!-- HEADER - EDIER -->
	<header class="container">
	<div class="row">
		<img src="img/logotipo.png" alt="Logotipo BlueBox" class="img-responsive" id="logo">
		<nav class="col-lg-8 offset-lg-5">
			<ul class="nav">
					<li class="nav-item"><a class="nav-link" href="#">ABOUT</a></li> |
					<li class="nav-item"><a class="nav-link" href="#">SERVICES</a></li> | 
					<li class="nav-item"><a class="nav-link" href="#">WORKS</a></li> |
					<li class="nav-item"><a class="nav-link" href="#">BLOG</a></li> |
					<li class="nav-item"><a class="nav-link" href="#">CONTACT</a>US</li>
					<div id="barra">
				    <input class="form-control form-text" type="text" size="15" placeholder="Search">	
				    </div>    			    
                </ul>
            </nav>
		</div>
	</header>
<div class="fondoblue">
        <div class="container">
            <div class="row">
              <div class="col-lg-6 offset-lg-1">
                	<br><br><br>
                  <a id="word">We are a Creative Digital Agency</a>
                   <button type="button" class="btn btn-info" id="learn">Learn More</button>
                   <br><br>
              </div>
           </div>
     </div>  
         <div id="computadora">
         	<ul>
              <li><img src="img/computadora.png"></li>
          </ul>
         </div>
 </div>

 <!--What we do - HUGO-->
    <div class="warp" id="whatwedo">
        <div class="content-top">
            <div class="col_what span_what">
                <h3>Web Design</h3>
                <img src="img/web.png" alt="">
                <p>Lorem ipsum dolor sit amet, consectetur <br>adipisicing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                    nisi ut aliquip.</p>
                <div class="btn-link"><a href="#">read more</a></div>
            </div>
            <div class="col_what span_what">
                <h3>Social Media</h3>
                <img src="img/social.png" alt="">
                <p>Lorem ipsum dolor sit amet, consectetur <br>adipisicing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                    nisi ut aliquip.</p>
                <div class="btn-link"><a href="#">read more</a></div>
            </div>
            <div class="col_what span_what">
                <h3>Mobile Apps</h3>
                <img src="img/mobile.png" alt="">
                <p>Lorem ipsum dolor sit amet, consectetur <br>adipisicing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                    nisi ut aliquip.</p>
                <div class="btn-link"><a href="#">read more</a></div>
            </div>
        </div>
    </div>


<!-- WORKS - KAREN-->
<section class="works">
	<div class="container-fluid">
	    	<h2 class="title">Our Works</h2>

 <?php
    $consulta = "SELECT works_file, works_title, works_subtitle FROM works";
    $resultado = $mysqli->query($consulta);
    while ($fila = mysqli_fetch_array($resultado)) {

   ?>
			<div class="content">
            <img src="<?php echo $fila["works_file"];?>" alt="1" class="image">
            <div class="overlay">
            <div class="text"><h4><?php echo $fila["works_title"];?></h4>
            <p><?php echo $fila["works_subtitle"];?></p></div>
            <i class="far fa-eye"></i>
            <i class="fas fa-link"></i>
            </div>
        </div>

<?php 
} 
?>
	         </div>
		</section>
<!--FIN DE WORKS -->

<!-- CLIENTS - ISAAC -->
<div class="clients">
	  <div class="wrap">
	  	<h2 class="head">Clients</h2>
		 <ul id="flexiselDemo3">
			<li><a href="#1"><img src="img/c1.png" /></a></li>
			<li><a href="#2"><img src="img/c2.png" /></li>
			<li><a href="#3"><img src="img/c3.png" /></li>
			<li><a href="#4"><img src="img/c4.png" /></li>
			<li><a href="#5"><img src="img/c5.png" /></li>
		 </ul>
	<script type="text/javascript">
		$(window).load(function() {
			$("#flexiselDemo1").flexisel();
			$("#flexiselDemo2").flexisel({
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		
			$("#flexiselDemo3").flexisel({
				visibleItems: 5,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		    
		});
	</script>
	<script type="text/javascript" src="js/jquery.flexisel.js"></script>
     </div>
	</div>	  
   </div>


   <div class="footer">
   	    <div class="wrap">
   	    	<div class="footer-left">
		 		<ul class="footer-nav">
					<li><a href="login/features.php">Clientes</a></li> |
					<li><a href="#about">About</a></li> | 
					<li><a href="#index">Services</a></li> | 
					<li><a href="#works">Work</a></li> |
					<li><a href="#blog">Blog</a></li> | 
					<li><a href="#contact">Contact</a></li>
				</ul>
				<div class="copy">
			       <p>© 2014 Bluebox. All rights reserved | Template by <a href="" target="_blank">Equipo 1</a></p>
		        </div>
			</div>
			<div class="social">	
	           <ul>	
				    <li class="facebook"><a href="#facebook" ><img src="img/FACEBOOK.png" /><span> </span></a></li>
				    <li class="linkedin"><a href="#pinterest"><img src="img/PINTEREST.png" /><span> </span></a></li>
				    <li class="twitter"><a href="#nose como se llama xD"><img src="img/IN2.png" /><span> </span></a></li>	 
				    <li class="pinterest"><a href="#TWITTER"><img src="img/TWITTER.png" /><span> </span></a></li>
				    <li class="dribble"><a href="#"><span> </span></a></li>			
					<li class="google"><a href="#"><span> </span></a></li>
			  </ul>
		   </div>
		   <div class="clear"></div>
	    </div>
   </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src='//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
	
	

</body>
</html>
