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
		<h1>Carrito </h1>
	<hr class="soften"/>	

	<table class="table table-bordered table-condensed">
              <thead>
                <tr>
                  <th>Foto</th>
                  <th>Producto</th>
				          <th>Precio</th>
                  <th>Cantidad</th>
                  
                  <th>Subtotal</th>
				</tr>
              </thead>
              <tbody>
                <?php foreach ($this->cart->contents() as $items):?>
                <tr>
                  <td><img width="100" src="http://localhost/Tiendaonline/uploads/<?php echo $items['nombre_foto']; ?>" alt=""></td>
                  <td><?php echo $items['name']; ?></td>
                  
                  <td>$ <?php echo $items['price']; ?></td>
                  <td>
                  	<label class="span1" style="max-width:34px"><?php echo $items['qty'] ?></label>
									  
				</td>
                  
                 <td>$ <?php echo $items['subtotal']; ?></td>
                </tr>
				<?php endforeach; ?>
                <tr>
                  <td colspan="4" class="alignR"><b>Total a pagar:	</b></td>
                  <td> <b>$ <?php echo $this->cart->format_number($this->cart->total()); ?></b></td>
                </tr>
                 
				</tbody>
            </table><br/>
		
	         
			
	<a href="<?php echo base_url(); ?>" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Continuar Comprando </a>
	<a href ng-click="comprar()" class="shopBtn btn-large pull-right">Comprar <span class="icon-arrow-right"></span></a>

</div>
</div>
</div>
	
</div>