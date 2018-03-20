<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container" >
<div class="row">
<div id="sidebar" class="span3">
<div class="well well-small">
	<ul class="nav nav-list">
		<li ng-repeat="item in tipoproducto">
		<a href ng-click="mostrarxtipoproducto(item.id_tipoproducto)"><span class="icon-chevron-right"></span>{{item.nombre_tipoproducto}}</a>
		</li>
		
		<li style="border:0"> &nbsp;</li>
		<li> <a class="totalInCart" href="cart.html"><strong>Total <span class="badge badge-warning pull-right" style="line-height:18px;">$ {{totalapagar}}</span></strong></a></li>
	</ul>
</div>
</div>
<div class="span9">
<div class="well well-small" ng-repeat = "item in productos | filter: buscar">
	<div class="row-fluid" >	  
		<div class="span2">
			<img src="http://localhost/Tiendaonline/uploads/{{item.nombre_foto}}" alt="">
		</div>
		<div class="span6">
			<h5>{{item.nombre}}</h5>
                        <p>MARCA: {{item.nombre_marca}}</p>
                        <p>{{item.descripcion}}</p>
			<p>{{item.stock}} unidades disponibles.</p>
		</div>
		<div class="span4 alignR">
		<form class="form-horizontal qtyFrm">
		<h3>$ {{item.precio_a}}</h3>
		
		<div class="btn-group">
		  <a href="<?php echo base_url();?>inicio/addcarrito/{{item.id}}" class="shopBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
		  
		 </div>
			</form>
		</div>
	</div>
	<hr class="soften">
	
	
</div>
</div>
</div>
</div>