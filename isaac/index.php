<!DOCTYPE HTML>
<html>
<head>
<title>Proyecto de PROFE PECH</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery -->

</head>
<body>
<script src='//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>




<body>
 
    <div class="clients">
	  <div class="wrap">
	  	<h2 class="head">Clients</h2>
		 <ul id="flexiselDemo3">
			<li><a href="#1"><img src="images/c1.png" /></a></li>
			<li><a href="#2"><img src="images/c2.png" /></li>
			<li><a href="#3"><img src="images/c3.png" /></li>
			<li><a href="#4"><img src="images/c4.png" /></li>
			<li><a href="#5"><img src="images/c5.png" /></li>
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
					<li><a href="about.html">About</a></li> | 
					<li><a href="index.html">Services</a></li> | 
					<li><a href="works.html">Work</a></li> |
					<li><a href="blog.html">Blog</a></li> | 
					<li><a href="contact.html">Contact</a></li>
				</ul>
				<div class="copy">
			       <p>© 2014 Bluebox. All rights reserved | Template by <a href="" target="_blank">Equipo 1</a></p>
		        </div>
			</div>
			<div class="social">	
	           <ul>	
				    <li class="facebook"><a href="#facebook" ><img src="images/facebook.png" /><span> </span></a></li>
				    <li class="linkedin"><a href="#pinterest"><img src="images/pinterest.png" /><span> </span></a></li>
				    <li class="twitter"><a href="#nose como se llama xD"><img src="images/in2.png" /><span> </span></a></li>	 
				    <li class="pinterest"><a href="#TWITTER"><img src="images/twitter.png" /><span> </span></a></li>
				    <li class="dribble"><a href="#"><span> </span></a></li>			
					<li class="google"><a href="#"><span> </span></a></li>
			  </ul>
		   </div>
		   <div class="clear"></div>
	    </div>
   </div>
</body>
</html>