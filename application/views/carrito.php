<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
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
					<a href="#"><span class="icon-twitter"></span></a>
					<a href="#"><span class="icon-facebook"></span></a>
					<a href="#"><span class="icon-youtube"></span></a>
					<a href="#"><span class="icon-tumblr"></span></a>
				</div>
				<a href="index.html"> <span class="icon-home"></span> Home</a> 
				<a href="contact.html"><span class="icon-envelope"></span> Contact us</a>
			</div>
		</div>
	</div>
</div>

<div class="container">
<div id="gototop"> </div>
<header id="header">
<div class="row">
	<div class="span4">
	<h1>
	<a class="logo" href="index.html"><span>Chrisoft Soluciones</span> 
		<img src="<?php echo base_url(); ?>librerias/assets/img/logo-bootstrap-shoping-cart.png" alt="bootstrap sexy shop">
	</a>
	</h1>
	</div>
	
</div>
</header>




    <div class="row">
	<div class="span12">
    <ul class="breadcrumb">
		<li><a href="http://localhost/Store/">Home</a> <span class="divider">/</span></li>
		<li class="active">Carrito</li>
    </ul>
	<div class="well well-small">
		<h1>Check Out <small class="pull-right">{{numarticulos}} articulo(s) agregados al carrito </small></h1>
	<hr class="soften"/>	

	<table class="table table-bordered table-condensed">
              <thead>
                <tr>
                  <th>Producto</th>
                  <th>Nombre</th>
	          <th>Precio</th>
                  <th>Cantidad</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                  <tr ng-repeat="item in data">
                  <td><img width="100" src="http://localhost/TiendaAdm/uploads/{{item.nombre_foto}}" alt=""></td>
                  <td>{{item.nombre}}</td>
                  <td>$ {{item.precio}}</td>
                  <td>
                      <label>{{item.cantidad}}</label>
			
				</td>
                  <td>${{item.importetotal}}</td>
                </tr>
				
                
				 <tr>
                  <td colspan="4" class="alignR">Total a pagar:	</td>
                  <td class="label label-primary"> $ {{totalapagar}}</td>
                </tr>
				</tbody>
            </table><br/>
		
		
            
			
	<a href="products.html" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Continue Shopping </a>
	<a href="login.html" class="shopBtn btn-large pull-right">Next <span class="icon-arrow-right"></span></a>

</div>
</div>
</div>
</div>
</body>
</html>

