<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">

		<div class="row">
	<div class="span12">
    <ul class="breadcrumb">
		<li><a>Home</a> <span class="divider">/</span></li>
		<li class="active">Carrito</li>
    </ul>
	<div class="well well-small">
		<h1>Carrito <small class="pull-right"> {{numarticulos}} Items agregados al carrito </small></h1>
	<hr class="soften"/>	

	<table class="table table-bordered table-condensed">
              <thead>
                <tr>
                  <th>Foto</th>
                  <th>Producto</th>
				  <th>Precio</th>
                  <th>Cantidad</th>
                  <th>Total</th>
                  <th></th>
				</tr>
              </thead>
              <tbody>
                <tr ng-repeat = "item in data">
                  <td><img width="100" src="http://localhost/Tiendaonline/uploads/{{item.nombre_foto}}" alt=""></td>
                  <td>{{item.nombre}}<br>{{item.descripcion}}</td>
                  
                  <td>$ {{item.precio}}</td>
                  <td>
                  	<label class="span1" style="max-width:34px">{{item.cantidad}}</label>
									  
				</td>
                  <td>$ {{item.totalimporte}}</td>
                  <td>
                    <a href="<?php echo base_url(); ?>inicio/editarcarrito/{{item.id_detallecarrito}}"><button type="button" class="btn btn-success">Editar</button></a>
                    <a href="" ng-click="eliminarproducto(item.id_detallecarrito)"><button type="button" class="btn btn-danger">Eliminar</button></a>
                  </td>
                </tr>
				
                <tr>
                  <td colspan="5" class="alignR">Total a pagar:	</td>
                  <td> <b>$ {{totalapagar}}</b></td>
                </tr>
                 
				</tbody>
            </table><br/>
		
	         
			
	<a href="<?php echo base_url(); ?>" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Continuar Comprando </a>
	<a href ng-click = "comprar()" class="shopBtn btn-large pull-right">Comprar <span class="icon-arrow-right"></span></a>

</div>
</div>
</div>
	
</div>