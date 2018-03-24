
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Chrisoft Soluciones</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap styles -->
    <link href="<?php echo base_url(); ?>librerias/assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- Customize styles -->
    <link href="<?php echo base_url(); ?>librerias/assets/style.css" rel="stylesheet"/>
    <!-- font awesome styles -->
	<link href="<?php echo base_url(); ?>librerias/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
	<link id="callCss" rel="stylesheet" href="<?php echo base_url(); ?>librerias/themes/bootshop/bootstrap.min.css" media="screen"/>

	<link id="callCss" rel="stylesheet" href="<?php echo base_url(); ?>librerias/assets/angularjs/angular-material.css" media="screen"/>
	<link id="callCss" rel="stylesheet" href="<?php echo base_url(); ?>librerias/assets/angularjs/angular-material.min.css" media="screen"/>
    
    <link rel="shortcut icon" href="<?php echo base_url(); ?>librerias/assets/ico/favicon.ico">

    <script src="<?php echo base_url(); ?>librerias/assets/js/jquery.js"></script>
	<script src="<?php echo base_url(); ?>librerias/assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>librerias/assets/js/jquery.easing-1.3.min.js"></script>
    <script src="<?php echo base_url(); ?>librerias/assets/js/jquery.scrollTo-1.4.3.1-min.js"></script>
    <script src="<?php echo base_url(); ?>librerias/assets/js/shop.js"></script>
    <script src="<?php echo base_url(); ?>librerias/assets/angularjs/angular.js"></script>
    <script src="<?php echo base_url(); ?>librerias/assets/angularjs/angular.min.js"></script>

    <script src="<?php echo base_url(); ?>librerias/assets/angularjs/angular-resource.js"></script>
    <script src="<?php echo base_url(); ?>librerias/assets/angularjs/angular-resource.min.js"></script>
    <script src="<?php echo base_url(); ?>librerias/assets/angularjs/angular-route.js"></script>
    <script src="<?php echo base_url(); ?>librerias/assets/angularjs/angular-route.min.js"></script>
    <script src="<?php echo base_url(); ?>librerias/assets/angularjs/angular-material.min.js"></script>
    <script src="<?php echo base_url(); ?>librerias/assets/angularjs/angular-material.js"></script>
    <script src="<?php echo base_url(); ?>librerias/assets/angularjs/angular-material-mocks.js"></script>
    <script src="<?php echo base_url(); ?>librerias/assets/angularjs/angular-animate.js"></script>
    <script src="<?php echo base_url(); ?>librerias/assets/angularjs/angular-animate.min.js"></script>
    <script src="<?php echo base_url(); ?>librerias/assets/angularjs/angular-aria.js"></script>
    <script src="<?php echo base_url(); ?>librerias/assets/angularjs/angular-aria.min.js"></script>
    <script src="<?php echo base_url(); ?>librerias/assets/angularjs/angular-messages.js"></script>
    <script src="<?php echo base_url(); ?>librerias/assets/angularjs/angular-messages.min.js"></script>

    <script src="<?php echo base_url(); ?>librerias/assets/js/moduloangularjs.js"></script>

    
  </head>
<body ng-app="Tienda" ng-controller="Carrito">
<!-- 
	Upper Header Section 
-->
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="topNav">
		<div class="container">
			<div class="alignR">
				<div class="pull-left socialNw">
					<a href=""><span class="icon-twitter"></span></a>
					<a href=""><span class="icon-facebook"></span></a>
					<a href=""><span class="icon-youtube"></span></a>
					<a href=""><span class="icon-tumblr"></span></a>
				</div>
				<a href="<?php echo base_url();?>"> <span class="icon-home"></span> Home</a> 
				<a href=""><span class="icon-envelope"></span> Contact us</a>
                                <a href="<?php echo base_url();?>inicio/carrito"><span class="icon-shopping-cart"></span> 0 Item(s) - <span class="badge badge-warning"> $ 0</span></a>
			</div>
		</div>
	</div>
</div>

<!--
Lower Header Section 
-->
<div class="container">
<div id="gototop"> </div>
<header id="header">
<div class="row">
	<div class="span4">
	<h1>
	<a class="logo" href=""><span>Chrisoft Soluciones</span> 
		<img src="<?php echo base_url(); ?>librerias/assets/img/logo-bootstrap-shoping-cart.png" alt="bootstrap sexy shop">
	</a>
	</h1>
	</div>
	
</div>
</header>

<div class="navbar">
	  <div class="navbar-inner">
		<div class="container">
		  <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </a>
		  <div class="nav-collapse">
			<ul class="nav">
			  <li class=""><a href="<?php echo base_url();?>">Inicio</a></li>
			  
			</ul>
			<form action="#" class="navbar-search pull-right">
			  <input type="text" placeholder="Buscar" class="search-query span2" disabled="true">
			</form>
			<ul class="nav pull-right">
			
			</ul>
		  </div>
		</div>
	  </div>
	</div>

</div><!-- /container -->



</div>
</body>
</html>